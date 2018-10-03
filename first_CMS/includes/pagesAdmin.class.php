<?php
 
if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)'); 
 
require_once 'pages.class.php';
require_once 'rejestrZmian.class.php';
require_once 'imageUploader.class.php';


class PagesAdmin extends Pages
{
	var $db;
	var $conf;
	var $messages;
	var $tpl;
	var $table;
	var $tableMenu;
	var $dir;
	var $url;
	var $limit_admin;
	var $art_id;
	
	function PagesAdmin(&$root, $table='pages')
	{
		$this -> Pages($root, $table);
		$this -> rejestr = new Rejestr($root, 'rejestr');
	}

	/* funkcja dodaje nowy artykul */	
	function Add(&$post, &$files)
	{
		if($post['op_page_title']=='1' or $post['op_page_title']=='2' or $post['op_page_title']=='3') $post['page_title'] = '';
		if($post['op_page_keywords']=='1') $post['page_keywords'] = '';
		if($post['op_page_description']=='1') $post['page_description'] = '';
		//if($post['op_content_short']=='1') $post['content_short'] = substr(strip_tags($post['content']), 0 , 250);
		//if(substr($post['content_short'], -1)=='&') $post['content_short'] = substr($post['content_short'], 0, -1);
		//$title_url = make_url($post['title'][1]);
		
                $post['page_title'] = addslashes(str_replace('"', '&quot;', $post['page_title']));
                $post['page_keywords'] = addslashes(str_replace('"', '&quot;', $post['page_keywords']));
                $post['page_description'] = addslashes(str_replace('"', '&quot;', $post['page_description']));

                $q = "INSERT INTO ".$this -> table." SET date_add=NOW(), op_page_title='".$post['op_page_title']."', ";
                $q.= "page_title='".$post['page_title']."', op_page_keywords='".$post['op_page_keywords']."', page_keywords='".$post['page_keywords']."', ";
                $q.= "op_page_description='".$post['op_page_description']."', page_description='".$post['page_description']."', auth='".$post['auth']."', ";
                $q.= "gallery_id='".(int)$post['gallery_id']."', show_title='".$post['show_title']."', active='".$post['active']."', comments='".$post['comments']."' ";

                if($this -> db -> query($q))
                {
                        $this -> art_id =  $this -> db -> insert_id();

                        for ($i=1;$i<=count($post['title']); $i++) {
                                $post['title'][$i] = trim(strip_tags(stripslashes($post['title'][$i])));
                                $post['title'][$i] = addslashes(str_replace('"', '&quot;', $post['title'][$i]));
                                $post['content'][$i] = addslashes($post['content'][$i]);
                                $post['content_short'][$i] = addslashes($post['content_short'][$i]);
                                if(empty($post['content_short'][$i])) $post['content_short'][$i] = addslashes(substr(strip_tags($post['content'][$i]), 0 , 250));
                                $post['title_url'][$i] = make_url($post['title'][$i]);
                                        if($i==4)
                                        {
                                            $post['title_url'][$i] = $post['title_url'][1]."-ru";
                                        }
                                        else
                                        {
                                            $post['title_url'][$i] = $this->conf->make_unique_url(make_url($post['title'][$i]), $this->tableDescription, "title_url", $i);
                                        }
                                


                                $q = "INSERT INTO ".$this -> tableDescription." SET parent_id='".$this -> art_id."', language_id='".$i."', ";
                                $q.= "title='".$post['title'][$i]."', title_url='".$post['title_url'][$i]."', content='".$post['content'][$i]."', ";
                                $q.= "content_short='".$post['content_short'][$i]."', tagi='".$post['tagi'][$i]."' ";
                                $this -> db -> query($q);

                                $url = '/'.$post['title_url'][$i].'.html';
                                $this -> rejestr -> addWpis($post['title'][$i], $url, 'dodano', 'page');
                        }

                        $this -> messages -> setInfo($GLOBALS['_PAGE_ADD']);
                        return true;
                }else
                {
                        $this -> messages -> setError($GLOBALS['_PAGE_NO_ADD']);
                        return false;
                }
	}

	/* funkcja zapisuje zmiany w artykule */
	function Edit(&$post, &$files)
	{
		if($post['op_page_title']=='1' or $post['op_page_title']=='2' or $post['op_page_title']=='3') $post['page_title'] = '';
		if($post['op_page_keywords']=='1') $post['page_keywords'] = '';
		if($post['op_page_description']=='1') $post['page_description'] = '';
			
                $post['page_title'] = addslashes(str_replace('"', '&quot;', $post['page_title']));
                $post['page_keywords'] = addslashes(str_replace('"', '&quot;', $post['page_keywords']));
                $post['page_description'] = addslashes(str_replace('"', '&quot;', $post['page_description']));
                
			// aktualizujemy artykul
			$q = "UPDATE ".$this -> table." SET op_page_title='".$post['op_page_title']."', ";
			$q.= "page_title='".$post['page_title']."', op_page_keywords='".$post['op_page_keywords']."', page_keywords='".$post['page_keywords']."', ";
			$q.= "op_page_description='".$post['op_page_description']."', page_description='".$post['page_description']."', auth='".$post['auth']."', ";
			$q.= "gallery_id='".(int)$post['gallery_id']."', show_title='".$post['show_title']."', active='".$post['active']."', comments='".$post['comments']."' ";		
			$q.= "WHERE id='".$post['id']."'";

			if($this -> db -> query($q))
			{
				for ($i=1;$i<=count($post['title']); $i++) {
					$post['title'][$i] = trim(strip_tags(stripslashes($post['title'][$i])));
					$post['subtitle'][$i] = trim(strip_tags(stripslashes($post['subtitle'][$i])));
					$post['title'][$i] = addslashes(str_replace('"', '&quot;', $post['title'][$i]));
					$post['content'][$i] = addslashes($post['content'][$i]);
                                        $post['content_short'][$i] = addslashes($post['content_short'][$i]);
                                        if($i==4)
                                        {
                                            $post['title_url'][$i] = $post['title_url'][1]."-ru";
                                        }
                                        else
                                        {
                                            $post['title_url'][$i] = $this->conf->make_unique_url(make_url($post['title'][$i]), $this->tableDescription, "title_url", $i, $post['id']);
                                        }

					$q = "UPDATE ".$this -> tableDescription." SET title='".$post['title'][$i]."', subtitle='".$post['subtitle'][$i]."', title_url='".$post['title_url'][$i]."', content='".$post['content'][$i]."', ";
					$q.= "content_short='".$post['content_short'][$i]."', tagi='".$post['tagi'][$i]."' WHERE parent_id='".$post['id']."' AND language_id='".$i."' ";
                    $this -> db -> query($q);
					
					$url = '/'.$post['title_url'][$i].'.html';
					$this -> rejestr -> addWpis($post['title'][$i], $url, 'zmieniono', 'page');
				
						// uaktualniamy menu
					$q = "UPDATE ".$this -> tableMenuDescription." SET url='".$post['title_url'][$i]."' WHERE url='".$post['old_title_url'][$i]."' and language_id='".$i."'";
					$this -> db -> query($q);
				}

				
				$this -> messages -> setInfo($GLOBALS['_PAGE_CHANGE_SEVE']);
				return true;
			}else
			{
				$this -> messages -> setError($GLOBALS['_PAGE_NO_EDIT']);
				return false;
			}

	}// end Edit()	

	/* funckcja kasuje artykul z bazy */
	function Delete($id)
	{
		$q = "DELETE FROM ".$this -> table." WHERE id='".$id."'";
		if($this -> db -> query($q))
		{
			$q = "DELETE FROM ".$this -> tableDescription." WHERE parent_id='".$id."'";
			$this -> db -> query($q);
			$this -> messages -> setInfo($GLOBALS['_PAGE_DELETE']);
			return true;
		}else
		{
			$this -> messages -> setError($GLOBALS['_PAGE_NO_DEL']);
			return false;
		}
	}
	
	/* funkcja laduje artykul o podanym tytule */
	function LoadArticleById($id)
	{
		$q = "SELECT * FROM ".$this -> table." WHERE id='".$id."'";

		$this -> db -> query($q);
		if($row = $this -> db -> fetch_assoc())
		{
			$row['title'] = stripslashes($row['title']);
			$row['content'] = stripslashes($row['content']);
			return $row;
		}else
		{
			$this -> messages -> setError($GLOBALS['_PAGE_NOT_EXIST']);
			return false;
		}
	}
	
	/* funkcja wczytuje opis do artykulu o podanym id */
	function LoadOpisById($id)
	{
		$q = "SELECT * FROM ".$this -> tableDescription." ";
		$q.= "WHERE parent_id='".(int)$id."' ";
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$row =& mstripslashes($row);
			$opis[] = $row;
		}
		return $opis;
	}
	
	/* funkcja laduje wszystkie artykuly w panelu admina */
	function LoadArticlesAdmin($grupa = 0)
	{
		if((int)$_GET['page'] < 1) $_GET['page'] = 1;
		$start = ($_GET['page']-1) * $this -> limit_admin;
		
		$q = "SELECT a.*, d.title, d.title_url, d.content_short FROM ".$this -> table." a LEFT JOIN ".$this -> tableDescription." d ON a.id=d.parent_id ";
		$q.= "WHERE d.language_id='"._ID."' ORDER BY a.date_add DESC, a.id DESC ";
		$q.= "LIMIT ".$start.",".$this -> limit_admin;

		$this -> db -> query($q);
		while($row =& $this -> db -> fetch_assoc())
		{
			$row =& mstripslashes($row);
			$row['content_short'] = strip_tags($row['content_short']);
			$row['title_url'] = BASE_URL.'/'.$row['title_url'].'.html';
			$articles[] = $row;
		}
		return $articles;
	}
	
	/* funkcja zwraca liczbe podstron w panelu admin */
	function getArticlesAdmin($grupa = 0)
	{
		$q = "SELECT COUNT(id) FROM ".$this -> table." ";
		$this -> db -> query($q);
		$count = $this -> db -> get_result();
		if($count < 1) $count = 1;
		return ceil($count / $this -> limit_admin);
	}
	
	/* funkcja sprawdza czy strona o podanym title_url istnieje */
	function _titleUrlExists($title_url)
	{
		$this -> db -> query("SELECT COUNT(parent_id) FROM ".$this -> tableDescription." WHERE language_id='1' AND title_url='".$title_url."'");
		return ($this -> db -> get_result() > 0) ?  true: false;
	}

	/* funkcja laduje wszystkie strony */
	function LoadOdwiedziny($limit = 50)
	{
		if(empty($_GET['page'])) $_GET['page'] = 1;
		
		$q = "SELECT a.count, a.date_add, d.title, d.title_url FROM ".$this -> table." a LEFT JOIN ".$this -> tableDescription." d ON a.id=d.parent_id ";
		$q.= "WHERE d.language_id='"._ID."' ORDER BY a.count DESC LIMIT ".((int)$_GET['page']-1)*$this -> limit_admin.",".$this -> limit_admin;
        
//        dump($q);die;
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$row['title'] = stripslashes($row['title']);
			$row['title_url'] = BASE_URL.'/'.$row['title_url'].'.html';
			$articles[] = $row;
			$return = true;
		}
		
		if($return === true)
		{
			return $articles;
		}else
		{
			$this -> messages -> setError($GLOBALS['_PAGE_NOT']);
			return false;
		}
	}
	
	/* funkcja zlicza ilosc stron loga */
	function GetPagesOdwiedziny($limit = 50)
	{
		$this -> db -> query("SELECT COUNT(id) FROM ".$this -> table);
		$count = (int)$this -> db -> get_result();
		$pages = ceil($count / $limit);
		if($pages < 1) $pages = 1;
		return $pages;
	}
	
	/* funkcja laduje wszystkie strony */
	function LoadWyniki($limit = 50)
	{
		if(empty($_GET['page'])) $_GET['page'] = 1;
		
		$q = "SELECT * FROM ".$this -> tableSearch." ORDER BY count DESC, ilosc DESC, keyword ASC LIMIT ".((int)$_GET['page']-1)*$limit.",".$limit;
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$articles[] = $row;
			$return = true;
		}
		
		if($return === true)
		{
			return $articles;
		}else
		{
			$this -> messages -> setError($GLOBALS['_PAGE_NOT']);
			return false;
		}
	}
	
	/* funkcja zlicza ilosc stron Szukania */
	function GetPagesSearch($limit = 50)
	{
		$this -> db -> query("SELECT COUNT(id) FROM ".$this -> tableSearch);
		$count = (int)$this -> db -> get_result();
		$pages = ceil($count / $limit);
		if($pages < 1) $pages = 1;
		return $pages;
	}	
	
}
?>