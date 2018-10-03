<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 

class Categories
{
	var $db;
	var $conf;
	var $messages;
	var $table;
	
	function Categories(&$root, $table='')
	{
		$this -> db		= &$root -> db;		
		$this -> conf	= &$root -> conf;
		$this -> messages	= &$root -> messages;
		$this -> tpl		= &$root -> tpl;
				
		$this -> table	= empty($table) ? DB_PREFIX.'categories' : DB_PREFIX.$table.'_categories';
	}
	
	/* funkcja wczytuje kategorie o podanym parent_id */
	function LoadByPid($pid = 0)
	{
		$q = "SELECT id, parent_id, name, name_url, `order`, path_id FROM ".$this -> table." WHERE parent_id='".(int)$pid."'";
		$q.= " ORDER BY `order` ASC";
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$row['name'] = stripslashes($row['name']);
			$categories[] = $row;
		}
		return $categories;
	}
		
	/* funkcja pobiera id rodzica wg parent_id */
	function getParentIdByPid($pid)
	{
		$this -> db -> query("SELECT parent_id FROM ".$this -> table." WHERE id='".(int)$pid."' LIMIT 1");
		return $this -> db -> get_result();
	}

	/* funkcja zwraca path_id dla podanej kategorii */
	function getPathById($id)
	{
		$this -> db -> query("SELECT path_id FROM ".$this -> table." WHERE id='".$id."'");
		return $this -> db -> get_result();
	}

	/* funkcja zwraca sciezke wg parent_id */	
	function getPathByPid($pid)
	{
		return $this -> getPath($this -> getPathById($pid));
	}
	
	/* funkcja zwraca sciezke wg name_url */
	function getPathByName($name_url = '', $parent_id)
	{
		$q = "SELECT path_id FROM ".$this -> table." WHERE name_url='".addslashes($name_url)."' AND ";
		$q.= "parent_id='".(int)$parent_id."'";
		
		$this -> db -> query($q);
		return $this -> getPath($this -> db -> get_result());
	}
	
	/* funkcja zwraca sciezke dla podaego parametru */
	function getPath($path_id)
	{
		$arrPathId = explode('.', substr($path_id, 0, strlen($path_id)-1));

		$q = "SELECT id, parent_id, name_url, name FROM ".$this -> table." WHERE ";
		for($i = 0; $i<count($arrPathId); $i++)
		{
			if($i>0) $q.= " OR ";
			$q.= "id='".$arrPathId[$i]."'";
		}
		$q.= " ORDER BY path_id";
		
		
		$this -> db -> query($q);
		$i = 0;
		while($row = $this -> db -> fetch_assoc())
		{
			$row['name'] = stripslashes($row['name']);
			$row['name_url'] = $row['id'].'/'.$row['name_url'].'.html';
			$path[$i++] = $row;
		}
		return $path;
	}
	
	/* funkcja pobiera kategorie wg name_url */
	function getCategoryByNameUrl($name_url = '', $parent_id = 0)
	{
		if(empty($name_url))
		{
			// pobieramy pierwsza kategorie
			$q = " WHERE depth=1 ORDER BY `order` ASC "; 
		}else
		{
			$q = " WHERE name_url='".addslashes($name_url)."' AND parent_id='".(int)$parent_id."'";
		}
				
		$this -> db -> query("SELECT * FROM ".$this -> table.$q);
		if($row = $this -> db -> fetch_assoc())
		{
			$row['name'] = stripslashes($row['name']);
			$row['name_url'] = $row['category_id'].'/'.$row['name_url'];
			return $row;
		}else
		{
			$this -> messages -> setError('Brak kategorii o podanej nazwie!');
			return false;
		}
	} // end getCategoryByNameUrl();
	
	
	/* funkcja laduje kategorie o podanej nazwie */
	function loadCategory($name_url = '', $parent_id)
	{
		return $this -> getCategoryByNameUrl($name_url, $parent_id);
	}// end loadCategory()
	
	function loadCategoryById($id)
	{
		$this -> db -> query("SELECT * FROM ".$this -> table." WHERE id='".$id."'");
		return $this -> db -> fetch_assoc();
	}		
	
	function loadCategories(&$category)
	{			
		
			$children =& $this -> loadSameParent($category['id']); // ladujemy "dzieci" 
			if(count($children) > 0) 
			{
				// kategoria ma podkategorie - ladujemy podkategorie i kategorie rownorzedne
				$currentCategory =& $this -> loadSameParent($category['parent_id']);
				for($i=0; $i<count($currentCategory); $i++)
				{
					if($currentCategory[$i]['id'] == $children[0]['parent_id'])
					{
						$currentCategory[$i]['subcategory'] =& $children;
					}
				}
				return $currentCategory;
			}else
			{
				// kategoria nie ma podkategorii - ladujemy kategorie rownorzedne i o poziom wyzsze
				$currentCategory =& $this -> loadSameParent($category['parent_id']);
				$upperCategory =& $this -> loadSameParent($this -> getParentIdByPid($category['parent_id']));
				
				for($i=0; $i<count($upperCategory); $i++)
				{
					if($upperCategory[$i]['id'] == $currentCategory[0]['parent_id'])
					{
						$upperCategory[$i]['subcategory'] =& $currentCategory;
					}
				}
				return $upperCategory;
				
			}// end hasChildren
	}// end loadCategory();

	
	/* funkcja laduje kategorie z tego samego poziomu */
	function loadSameParent($parent)
	{
		$this -> db -> query("SELECT * FROM ".$this -> table." WHERE parent_id='".(int)$parent."' ORDER BY `order` ASC");
		while($row = $this-> db -> fetch_assoc())
		{
			$row['name'] = stripslashes($row['name']);
			$row['name_url'] = BASE_URL.'/katalog/'.$row['parent_id'].'/'.$row['name_url'].'.html';
			$categories[] = $row;
		}
		return $categories;	
	}// end loadSameParent()
	
	/* funkcja tworzy mape strony wybranych kategorii */
	function createHtmlSiteMap($path_id = '')
	{
		$subTree =& $this -> getSubtree($path_id);

		$html = '<ul class="sitemap">'."\n";
		$html.= $this -> _createElement($subTree, 'name_url');
		$html.= '</ul>';
		
		return $html;
	}

	/* funkcja rekurencyjnie tworzy opcje <option> do pola <select> */	
	function _createElement(&$tree, $type, $parent=0, $depth=0)
	{
		$html = '';
		$item = '';
		$temp_depth = '';
				
		$nbsp = str_repeat('&nbsp;', $depth*4);
						
		$depth++;
		$temp_depth =& $tree['depth'][$depth];
		
		for($i = 0; $i<count($temp_depth); $i++)
		{
			$item =& $tree['item'][$temp_depth[$i]];
			if($parent == $item['parent_id'])
			{	
				$html.= '<li><a href="'.BASE_URL.'/'.$item['parent_id'].'/'.$item[$type].'.html">';
				$html.= $item['name'].'</li>'."\n";
				$html.= '<ul class="sitemap">';
				$html.= $this -> _createElement($tree, $type, $item['id'], $depth);
				$html.= '</ul>';
			} 
		}
		
		return $html; 
	}

	/* funkcja pobiera poddrzewo o podanym path_id */
	function getSubtree($path_id='')
	{
		$q = "SELECT id, name, name_url, parent_id, `order`, depth FROM ".$this -> table;
		$q.= " WHERE path_id LIKE '".$path_id."%' ORDER BY depth ASC, `order` ASC";
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$tree['item'][$row['id']] = $row;
			$tree['depth'][$row['depth']][] = $row['id'];
		} 
		return $tree;
	}	

	/* funkcja wczytuje podkategoria wg podanego name_url */
	function LoadSubcategoriesByNameUrl($name_url)
	{
		$q = "SELECT B.* FROM ";
		$q.= "(SELECT id FROM ".$this -> table." WHERE name_url='".addslashes($name_url)."') AS A LEFT JOIN ";
		$q.= "(SELECT * FROM ".$this -> table." ORDER BY name ASC) AS B ON A.id=B.parent_id";
		
		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			if(!empty($row['id']))
			$items[] = mstripslashes($row);
		} 
		return $items;
	
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
		
//		$decColor = 220+7*$depth;
		$decColor = 255; 
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

}
?>