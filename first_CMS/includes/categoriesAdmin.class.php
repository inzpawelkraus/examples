<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
require_once 'categories.class.php';

class CategoriesAdmin extends Categories
{
	var $db;
	var $conf;
	var $messages;
	var $table;
	
	function CategoriesAdmin(&$root, $table='')
	{
		$this -> Categories($root, $table);
	}
	
	/* funkcja dodaje nową kategorie */
	function Add(&$cat)
	{
		$cat['name_url'] = make_url($cat['name']);
		if(!$this -> _categoryExists($cat['name_url'], $cat['pid']))
		{
			$cat['name'] = addslashes(strip_tags($cat['name'],'<b><i><u>'));
			$cat['order'] = $this -> _getMaxOrder($cat['pid']) + 1;
			$cat['path_id'] = $this -> getPathById($cat['pid']);
			$cat['depth'] = (empty($cat['path_id']) ? 0 : substr_count($cat['path_id'], '.')) + 1;		
			
			$q = "INSERT INTO ".$this -> table." SET parent_id='".$cat['pid']."', name='".$cat['name']."', ";
			$q.= "name_url='".$cat['name_url']."', path_id='".$cat['path_id']."', `order`='".$cat['order']."', ";
			$q.= "depth='".$cat['depth']."'";
			
			if($this -> db -> query($q))
			{
				$id = $this -> db -> insert_id();

				// uaktualniamy sciezke 
				$q = "UPDATE ".$this -> table." SET path_id=CONCAT(path_id,'".$id.".') WHERE id='".$id."'";
				if($this -> db -> query($q))
				{
					$this -> messages -> setInfo('Nowa kategoria została dodana!');
					return true;
				}else
				{
					$msg = 'Wystąpił błąd podczas aktualizowania ścieżki! Drzewko kategorii mogło ulec ';
					$msg.= 'uszkodzeniu dla ID='.$id.'. Prawdopodobna przyczyna: zerwane połączenie z serwerem ';
					$msg.= 'baz danych. Należy ręcznie wyedytować tabelę '.$this -> table.' dla ID='.$id.' należy '; 
					$msg.= 'poprawić pole "path_id".';
					
					$this -> messages -> setError($msg);
					return false;
				}
			}else
			{
				$this -> messages -> setError('Wystąpił błąd podczas dodawania nowej kategorii. Operacja nie powiodła się!');
				return false;
			}
		}else
		{
			$this -> messages -> setError('Kategoria o podanej nazwie już istnieje. Nazwa kategorii musi być unikalna w danej podkategorii.');
			return false;
		}
	}

	/* funkcja przenosi podana kategorie o stopien wyzej */
	function MoveUp($id)
	{
		if($item = $this -> _getCategory($id))
		{
			$q = "UPDATE ".$this -> table." SET `order`=`order`+1 WHERE ";
			$q.= " parent_id='".$item['parent_id']."' AND ";
			$q.= "`order`='".($item['order']-1)."'";
			if($this -> db -> query($q))
			{
				if($this -> db -> query("UPDATE ".$this -> table." SET `order`=`order`-1 WHERE id='".$id."'"))
				{
					$this -> messages -> setInfo('Element przeniesiony o jeden poziom w górę!'); 
					return true;
				}
			}
		}
		return false; 
	}

	/* funkcja przenosi podana kategorie o stopien nizej */
	function MoveDown($id)
	{
		if($item = $this -> _getCategory($id))
		{
			$q = "UPDATE ".$this -> table." SET `order`=`order`-1 WHERE ";
			$q.= " parent_id='".$item['parent_id']."' AND ";
			$q.= "`order`='".($item['order']+1)."'";
			if($this -> db -> query($q))
			{
				if($this -> db -> query("UPDATE ".$this -> table." SET `order`=`order`+1 WHERE id='".$id."'"))
				{
					$this -> messages -> setInfo('Element przeniesiony o jeden poziom w dół!');
					return true;
				}
			}
		}
		return false;
	}
	
	/* funkcja zmienia nazwe kategorii */
	function EditName(&$cat)
	{
		$cat['name_url'] = make_url($cat['name']);
		if(!$this -> _categoryExists($cat['name_url'], $cat['cat']))
		{
			$q = "UPDATE ".$this -> table." SET name='".addslashes($cat['name'])."', name_url='";
			$q.= $cat['name_url']."' WHERE id='".$cat['id']."'";
			if($this -> db -> query($q))
			{
				$this -> messages -> setInfo('Nazwa kategorii została zmieniona!');
				return true;
			}
		}else
		{
			$this -> messages -> setError('Kategoria o podanej nazwie już istnieje. Nazwa kategorii musi być unikalna w danej podkategorii.');
			return false;
		} 
	}


	/* funkcja usuwa podana kategorie i wszystkie podkategorie */
	function Delete($id)
	{	
		$path = $this -> getPathById($id);
		if(!empty($path) AND $this -> db -> query("DELETE FROM ".$this -> table." WHERE path_id LIKE '".$path."%'"))
		{	
			$msg = 'Kategoria i jej podkategorie zostały usunięte! W bazie pozostały nadal produkty ';
			$msg.= 'które były przypisane do usuniętych kategorii. Można im przypisać inne kategorie lub ';
			$msg.= 'ostatecznie usunąć używając opcji <a href="?action=show_all">Pokaż wszystkie produkty</a>';
			$this -> messages -> setInfo($msg);
			return true;
		}else
		{
			return false;
		}	
	}
	
	/* funkcja tworzy pole SELECT o podanej nazwie z wszystkimi kategoriami */
	function createHtmlSelect($name, $type = 'id', $selected='', $onChange='')
	{
		switch($type)
		{
			case 'id'; break;
			case 'name_url'; break;
			default: $type = 'id';
		}
		
		$subTree =& $this -> getSubtree($path_id);

		$html = '<select name="'.$name.'" onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor; '.$onChange.'">'."\n";
		$html.= $this -> _createOption($subTree, $type, $selected);
		$html.= '</select>';
		
		return $html;
	}
	
	/* funkcja rekurencyjnie tworzy opcje <option> do pola <select> */	
	function _createOption(&$tree, $type, $selected, $parent=0, $depth=0)
	{
		$html = '';
		$item = '';
		$temp_depth = '';
				
		$nbsp = str_repeat('&nbsp;', $depth*4);
		
		$decColor = 220+7*$depth; 
		$hexColor = dechex($decColor > 255 ? 255 : $decColor); 
		$color = '#'.$hexColor.$hexColor.$hexColor;
				
		$depth++;
		$temp_depth =& $tree['depth'][$depth];
		
		for($i = 0; $i<count($temp_depth); $i++)
		{
			$item =& $tree['item'][$temp_depth[$i]];
			if($parent == $item['parent_id'])
			{	
				$html.= '<option value="'.$item[$type].'" style="background:'.$color.'"';
				if($selected == $item[$type]) $html.= ' selected="true"';
				$html.= '>'.$nbsp;
//				if($depth > 1) $html .= '|';
				$html.= '&nbsp;'.$item['name'].'</option>'."\n";
				$html.= $this -> _createOption($tree, $type, $selected, $item['id'], $depth);
			} 
		}
		
		return $html; 
	}
	
	/* funkcja sprawdza, czy kategoria istnieje */
	function _categoryExists($name_url, $parent_id)
	{
		$q = "SELECT COUNT(id) FROM ".$this -> table." WHERE name_url='".$name_url."' AND ";
		$q.= "parent_id='".$parent_id."'";
		$this -> db -> query($q);
		return ($this -> db -> get_result() > 0) ? true : false;
	}
	
	/* funkcja pobiera numer kolejny ostatniego elementu w danej podkategorii */
	function _getMaxOrder($pid)
	{
		$this -> db -> query("SELECT MAX(`order`) FROM ".$this -> table." WHERE parent_id='".$pid."'");
		return $this -> db -> get_result();
	}
	
	/* funkcja zwraca kategorie o danym id */
	function _getCategory($id)
	{
		$q = "SELECT id, parent_id, name, name_url, path_id, `order` FROM ".$this -> table." WHERE id='".$id."'";
		$this -> db -> query($q);
		if($row = $this -> db -> fetch_assoc())
		{
			$row['name'] = stripslashes($row['name']);
			return $row;
		}else
		{
			$this -> messages -> setError('Kategoria o podanym ID nie istnieje!');
			return false;
		} 
	}
	
}
?>