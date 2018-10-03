<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
class Rejestr
{
	var $db;
	var $conf;
	var $messages;
	var $tpl;
	var $table;
	var $dir;
	var $url;
	var $limit_rejestr;
	var $limit_admin;
	
	function Rejestr(&$root, $table='rejestr')
	{
		$this -> db		= &$root -> db;		
		$this -> conf	= &$root -> conf;
		$this -> messages	= &$root -> messages;
		$this -> tpl		= &$root -> tpl;
		$this -> table	= DB_PREFIX.$table;
		$this -> limit_rejestr = $this -> conf -> vars['limit_rejestr'];
		$this -> limit_admin = $this -> conf -> vars['limit_admin'];
	}
	
	/* funkcja wczytuje zmiany z bazy */
	function LoadRejestr()
	{
		if((int)$_GET['page'] < 1) $_GET['page'] = 1;
		$start = ($_GET['page']-1) * $this -> limit_rejestr;
		$q = "SELECT * FROM ".$this -> table." ";
		$q.= " ORDER BY date_add DESC LIMIT ".$start.",10";

		$this -> db -> query($q);
		while($row = $this -> db -> fetch_assoc())
		{
			$row =& mstripslashes($row);
			if($row['type']=='page') $row['title'] = 'Podstrony -> '.$row['title'];
			if($row['type']=='aktualnosci') $row['title'] = 'Aktualności -> '.$row['title'];
			if($row['type']=='gallery') $row['title'] = 'Galerie -> '.$row['title'];
			if($row['type']=='main') $row['title'] = $row['title'];
			$row['url'] = BASE_URL.$row['url'];
			$articles[] = $row;
		}
	return $articles;
	}
	
	/* funkcja zwraca liczbe podstron */
	function getPages()
	{
		$q = "SELECT COUNT(id) FROM ".$this -> table." ";
		$this -> db -> query($q);
		$count = $this -> db -> get_result();
		if($count < 1) $count = 1;
		return ceil($count / $this -> limit_rejestr);
	}
	
	/* funkcja dodaje wpis do rejestru */	
	function addWpis($title, $url, $action, $type)
	{
		$q = "INSERT INTO ".$this -> table." SET date_add=NOW(), title='".$title."', url='".$url."', action='".$action."', type='".$type."', login='".$_SESSION['user']['login']."'  ";		
		$this -> db -> query($q);
		
		return true;
	}

}
?>