<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

require_once 'users.class.php'; 

class UsersAdmin extends Users
{
	var $db;
	var $conf;
	var $messages;
	var $table;
	var $mail;
	var $limit_admin_page;
	
	function UsersAdmin(&$root, $table='users')
	{
		$this -> Users($root, $table);
	}
	
	/* funkcja dodaje uzytkownika do bazy -- od razu aktywuje konto */
	function AddUser(&$user)
	{
		if($user['pass1'] != $user['pass2'])
		{
			$this -> messages -> setMessage('register_error', $GLOBALS['_USER_BAD_BOTH_PASS']);
			return false;
		}elseif(!$this -> checkLogin($user['login']))
		{
			$this -> messages -> setMessage('register_error', $GLOBALS['_USER_BAD_LOGIN']);
			return false;
		}elseif($this -> userExists($user['login']))
		{
			$this -> messages -> setMessage('register_error', $GLOBALS['_USER_REGISTER']);
			return false;
		}elseif($user['email1'] != $user['email2'])
		{
			$this -> messages -> setMessage('register_error', $GLOBALS['_USER_BOTH_EMAIL']);
			return false;
		}elseif(!checkEmail($user['email1']))
		{
			$this -> messages -> setMessage('register_error', $GLOBALS['_USER_BAD_EMAIL']);
			return false;			
		}else
		{
			$q = "INSERT INTO ".$this -> table." SET login='".strtolower($user['login'])."', password='".md5($user['pass1'])."', ";
			$q.= " first_name='".$user['first_name']."', last_name='".$user['last_name']."', ";
			$q.= "street='".$user['street']."', nr_bud='".$user['nr_bud']."', nr_lok='".$user['nr_lok']."', ";
			$q.= "city='".$user['city']."', post_code='".$user['post_code']."', ";
			$q.= "email='".$user['email1']."', phone='".$user['phone']."', ";
			$q.= "admin_login='".$user['admin_login']."', group_id='".$user['group_id']."', ";
			$q.= "active='".$user['active']."', discount='".(float)$user['discount']."'";  
			
			if($this -> db -> query($q))
			{
				$user['id'] = $this -> db -> insert_id();
				
				$q_mailing = "INSERT INTO ".DB_PREFIX."newsletter SET first_name='".$user['first_name']."', ";
				$q_mailing.= "last_name='".$user['last_name']."', email='".$user['email1']."', active='1'";
				
				$this -> db -> query($q_mailing);

				$this -> messages -> setInfo($GLOBALS['_USER_MAKE_USER']);
				return true;
			}else
			{
				$this -> messages -> setError($GLOBALS['_USER_BAD_ACCOUNT']);
				return false;
			}		
		}// end - weryfikacja danych
	}// end AddUser
	
	/* funkcja wczytuje wszystkich uzytkownikow */
	function LoadUsers(&$filter, $page = 0, $limit)
	{
		if(empty($limit)) $limit = $this -> limit_admin_page;
		$where = $this -> getUsersFilter($filter);			
		$order = $this -> getUsersOrder($filter);
        		$q = "SELECT u.*,g.name as group_name ";
		$q.= "FROM ".$this -> table." u ";
		$q.= "LEFT JOIN ".$this -> tableGroups." g ON u.group_id=g.id ";
		$q.= "WHERE ".$where." AND (`admin`!=1 OR ".$_SESSION['user']['admin']."=1)";
		$q.= " ORDER BY ".$order;
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$users[] = mstripslashes($row);
		}
		
		return $users;
	}

	/* funkcja wczytuje uzytkownika wg ID */
	function LoadUserById($id)
	{
		$this -> db -> query("SELECT * FROM ".$this -> table." WHERE id='".(int)$id."' AND (`admin`!=1 OR ".$_SESSION['user']['admin']."=1)");
		if($row = $this -> db -> fetch_assoc())
		{
			return mstripslashes($row);
		}else
		{
			$this -> messages -> setError($GLOBALS['_USER_NO_USER']);
			return false;		
		}
	}

	/* funkcja zwraca ilosc stron z wynikami */
	function getPages(&$filter, $limit)
	{
		if(empty($limit)) $limit = $this -> limit_admin_page;
		$where = $this -> getUsersFilter($filter);
		$this -> db -> query("SELECT COUNT(id) FROM ".$this -> table." WHERE ".$where." AND `admin`!=1");
		return ceil($this -> db -> get_result()/$limit); 	
	}
	
	/* funkcja zwraca klauzule WHERE dla zapytania SQL na podstawie filtru */	
	function getUsersFilter(&$filter)
	{
		$where = ' 1=1 ';
		if(!empty($filter['login'])) $where.= " AND LOWER(login) LIKE '".strtolower($filter['login'])."' ";
		if(!empty($filter['firm_name'])) $where.= " AND LOWER(firm_name) LIKE '".strtolower($filter['firm_name'])."' ";
		if(!empty($filter['first_name'])) $where.= " AND LOWER(first_name) LIKE '".strtolower($filter['first_name'])."' " ;
		if(!empty($filter['last_name'])) $where.= " AND LOWER(last_name) LIKE '".strtolower($filter['last_name'])."' ";
		if(!empty($filter['email'])) $where.= " AND LOWER(email) LIKE '".strtolower($filter['email'])."' ";
		if(isset($filter['business'])) $where.= " AND business LIKE '".$filter['business']."' ";
		if(isset($filter['active'])) $where.= " AND active LIKE '".$filter['active']."' ";
		if(isset($filter['admin_login'])) $where.= " AND admin_login LIKE '".$filter['admin_login']."' ";
		if(isset($filter['group_id'])) $where.= " AND group_id LIKE '".$filter['group_id']."' "; 
		
		return $where;
	}
	
	/* funkcja zwraca klauzule ORDER dla zapytania SQL na podstawie filtru */	
	function getUsersOrder(&$filter)
	{
		if(empty($filter['order_type'])) $filter['order_type'] = 'ASC';
		if(empty($filter['order_field'])) $filter['order_field'] = 'last_name, firm_name'; 
		return $filter['order_field'].' '.$filter['order_type'];
	}


	/* funkcja dodaje uzytkownika do bazy */
	function Edit(&$user)
	{
		$search = array('-',' ', '/', '(', ')');
		$replace = array('', '', '', '', '');
		
		$user['nip'] = str_replace($search, $replace, $user['nip']);		
		$user['phone'] = str_replace($search, $replace, $user['phone']);
		
		foreach($user as $k => $v)
		{
			$user[$k] = addslashes(strip_tags($v));
		}
		
		if($user['business'] == 1 and empty($user['firm_name']))
		{
			$this -> messages -> setError($GLOBALS['_USER_EMPTY_FIRM_NAME']);
			return false;
		}elseif($user['business'] == 1 and !$this -> checkNIP($user['nip']))
		{
			$this -> messages -> setError($GLOBALS['_USER_EMPTY_NIP']);
			return false;
		}
		elseif(!checkEmail($user['email']))
		{
			$this -> messages -> setError($GLOBALS['_USER_BAD_EMAIL']);
			return false;			
		}else
		{
			
			$q = "UPDATE ".$this -> table." SET ";
			$q.= "business='".$user['business']."', firm_name='".$user['firm_name']."', first_name='";
			$q.= $user['first_name']."', last_name='".$user['last_name']."', street='".$user['street']."', nr_bud='".$user['nr_bud']."', nr_lok='".$user['nr_lok']."',";
			$q.= "city='".$user['city']."', post_code='".$user['post_code']."', nip='".$user['nip']."', ";
			$q.= "email='".$user['email']."', phone='".$user['phone']."', active='".$user['active']."', ";
			$q.= "admin_login='".$user['admin_login']."', group_id='".(int)$user['group_id']."', ";
                        if($user['haslo']) $q.= "password='".md5($user['haslo'])."', ";
			$q.= "discount='".(float)$user['discount']."' ";
			$q.= "WHERE id='".$user['id']."' AND login!='admin'";  

			if($this -> db -> query($q))
			{
				$this -> messages -> setInfo($GLOBALS['_USER_CHANGE_SAVE']);
				return true;
			}
		}// end - weryfikacja danych
				
	}// end Edit();	

	/* funkcja usuwa uzytkownika o podanym ID */
	function Delete($id)
	{
		if($this -> db -> query("DELETE FROM ".$this -> table." WHERE id='".$id."' AND `admin`!=1"))
		{
			$this -> messages -> setInfo($GLOBALS['_USER_DELETE']);
			return true;
		}
	}

/*
 *		GRUPY
 */
	/* funkcja laduje wszystkie grupy z bazy */
	function LoadGroups()
	{
		$this -> db -> query("SELECT id, name FROM ".$this -> tableGroups." ORDER BY name ASC");
		return $this -> db -> get_all_rows();
	}
	
	/* funkcja laduje uprawnienia dla danej grupy */
	function LoadGroupPrivileges($id)
	{
		$q = "SELECT LEFT(`privileges`, LENGTH(`privileges`)-1) as `privileges` FROM ".$this -> tableGroups;
		$q.= " WHERE id='".(int)$id."'";
		
		$this -> db -> query($q);
		if($this -> db -> num_rows())
		{
			$row = $this -> db -> get_result();
			$group_privileges = explode('|', $row);
			$privileges =& $this -> LoadPrivileges();
			for($i=0; $i<count($privileges); $i++)
			{
				$all_privileges[$i]				= $privileges[$i];
				$all_privileges[$i]['status']	= in_array($privileges[$i]['id'], $group_privileges) ? 1 : 0;
			}
			return $all_privileges;
		}
	}
	
	/* funkcja pobiera nazwe grupy */
	function GetGroupName($id)
	{
		$this -> db -> query("SELECT name FROM ".$this -> tableGroups." WHERE id='".(int)$id."'");
		return stripslashes($this -> db -> get_result());
	}

	
	/* funkcja dodaje grupe */
	function AddGroup(&$group)
	{
		if(!$this -> _groupExists($group['name']))
		{
			$q = "INSERT INTO ".$this -> tableGroups." SET name='".$group['name']."', `privileges`='".implode('|', $group['privileges'])."|'";
			if($this -> db -> query($q))
			{
				$this -> messages -> setInfo($GLOBALS['_USER_GROUP_ADD']);
				return true;
			}else
			{
				$this -> messages -> setError($GLOBALS['_USER_GROUP_ADD_PRIV']);
				return false;
			}
		}else
		{
			$this -> messages -> setError($GLOBALS['_USER_GROUP_EXIST']);
			return false;
		}
	}
	
	/* funkcja zmienia nazwe grupy */
	function ChangeGroupName($id, $name)
	{
		$name = addslashes($name);
		$q = "UPDATE ".$this -> tableGroups." SET name='".$name."' WHERE id='".(int)$id."'";
		if($this -> db -> query($q))
		{
			$this -> messages -> setInfo($GLOBALS['_USER_CHANGE_SAVE']);
			return true;
		}else
		{	
			$this -> messages -> setError($GLOBALS['_USER_NOT_SEVE']);
			return false;
		}
	}

	/* funkcja zapisuje zmiany w uprawnieniach dla grupy */
	function EditGroup($id, &$privileges)
	{
		$q = "UPDATE ".$this -> tableGroups." SET `privileges`='".implode('|', $privileges)."|' WHERE id='".(int)$id."'";
		if($this -> db -> query($q))
		{
			$this -> messages -> setInfo($GLOBALS['_USER_CHANGE_SAVE']);
			return true;
		}else
		{	
			$this -> messages -> setError($GLOBALS['_USER_NOT_SEVE']);
			return false;
		}
	}
	
	/* funkcja kasuje grupe */
	function DeleteGroup($id)
	{
		if($this -> db -> query("DELETE FROM ".$this -> tableGroups." WHERE id='".$id."'"))
		{
			if($this -> db -> query("UPDATE ".$this -> tableUsers." SET group_id='0' WHERE group_id='".$id."'"))
			{
				$this -> messages -> setInfo($GLOBALS['_USER_GROUP_DEL']);
				return true;
			}else
			{
				$this -> messages -> setError($GLOBALS['_USER_GROUP_DEL_USERS']);
				return false;
			}
		}else
		{
			$this -> messages -> setError($GLOBALS['_USER_GROUP_NO_DEL']);
			return false;
		}
	}
	
	/* funkcja sprawdza, czy podana grupa istnieje */
	function _groupExists($name)
	{
		return $this -> _itemExists($name, $this -> tableGroups);
	}
	
/*
 *		UPRAWNIENIA
 */
	/* funkcja laduje wszystkie uprawnienia z bazy */
	function LoadPrivileges()
	{
		$this -> db -> query("SELECT * FROM ".$this -> tablePrivileges." ORDER BY name ASC");
		return $this -> db -> get_all_rows();
	}
	
	/* funkcja dodaje uprawnienia */
	function AddPrivilege(&$p)
	{
		$p = maddslashes($p);
		
		if(!$this -> _privilegeExists($p['name']))
		{
			$q = "INSERT INTO ".$this -> tablePrivileges." SET ";
			$q.= "name='".$p['name']."', description='".$p['description']."'";

			if($this -> db -> query($q))
			{
				$this -> messages -> setInfo($GLOBALS['_USER_PRIV_ADD']);
				return true;
			}else
			{
				$this -> messages -> setError($GLOBALS['_USER_PRIV_NO_ADD']);
				return false;
			}
		}else
		{
			$this -> messages -> setError($GLOBALS['_USER_PRIV_EXIST']);		
			return false;
		}
	}
	
	/* funkcja zmienia nazwe uprawnienia */
	function EditPrivilege(&$p)
	{
		$p =& maddslashes($p);
		
		$q = "UPDATE ".$this -> tablePrivileges." SET name='".$p['name']."',description='".$p['description']."' ";
		$q.= "WHERE id='".(int)$p['id']."'";
		if($this -> db -> query($q))
		{
			$this -> messages -> setInfo($GLOBALS['_USER_CHANGE_SAVE']);
			return true;
		}else
		{
			$this -> messages -> setError($GLOBALS['_USER_NOT_SEVE']);
			return false;
		}
	}
	
	/* funkcja kasuje przywilej z bazy */
	function DeletePrivilege($id)
	{
		if($this -> db -> query("DELETE FROM ".$this -> tablePrivileges." WHERE id='".(int)$id."'"))
		{
			$q = "UPDATE ".$this -> tableGroups." SET `privileges`=REPLACE(`privileges`, '".(int)$id."|', '') ";
			$q.= "WHERE `privileges` LIKE '".(int)$id."|%' OR `privileges` LIKE '%|".(int)$id."|%'";
			if($this -> db -> query($q))
			{
				$this -> messages -> setInfo($GLOBALS['_USER_PRIV_DEL']);
				return true;
			}else
			{
				$this -> messages -> setError($GLOBALS['_USER_PRIV_DEL_GROUP']);
				return false;
			}
		}else
		{
			$this -> error -> setError($GLOBALS['_USER_PRIV_NO_DEL']);
			return false;
		}
	}
	
	/* funkcja pobiera liste nieudanych prob logowania */
	function LoadLog($limit = 50)
	{
		if(empty($_GET['page'])) $_GET['page'] = 1;
		
		$q = "SELECT *,'***' as pass FROM ".$this -> tableLog." ORDER BY date_add DESC LIMIT ".((int)$_GET['page']-1)*$limit.",".$limit;
		$this -> db -> query($q);
		return $this -> db -> get_all_rows();
	}		
	
	/* funkcja zlicza ilosc stron loga */
	function GetPagesLog($limit = 50)
	{
		$this -> db -> query("SELECT COUNT(id) FROM ".$this -> tableLog);
		$count = (int)$this -> db -> get_result();
		$pages = ceil($count / $limit);
		if($pages < 1) $pages = 1;
		return $pages;
	}	
	
	/* funkcja pobiera liste nieudanych prob logowania */
	function LoadZalogowani($limit = 50)
	{
		if(empty($_GET['page'])) $_GET['page'] = 1;
		
		$q = "SELECT * FROM ".$this -> tableZalogowani." ORDER BY date_add DESC LIMIT ".((int)$_GET['page']-1)*$limit.",".$limit;
		$this -> db -> query($q);
		return $this -> db -> get_all_rows();
	}		
	
	/* funkcja zlicza ilosc stron loga */
	function GetPagesZalogowani($limit = 50)
	{
		$this -> db -> query("SELECT COUNT(id) FROM ".$this -> tableZalogowani);
		$count = (int)$this -> db -> get_result();
		$pages = ceil($count / $limit);
		if($pages < 1) $pages = 1;
		return $pages;
	}	
	
	/* funkcja sprawdza, czy uprawnienie o podanej nazwie istnieje */
	function _privilegeExists($name)
	{
		return $this -> _itemExists($name, $this -> tablePrivileges);
	}

	/* funkcja sprawdza czy istnieje obiekt o podanej nazwie w podanej tabeli */
	function _itemExists($name, $table, $field='name')
	{
		$this -> db -> query("SELECT COUNT(id) FROM `".$table."` WHERE `".$field."`='".$name."'");
		$rekord = $this -> db -> fetch_row();
		return ($rekord[0]>0) ? true : false;				
	}	

}
?>