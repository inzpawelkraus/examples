<?php
 
if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)'); 
 
require_once 'slownik.class.php';



class SlownikAdmin extends Slownik
{
	var $db;
	var $conf;
	var $messages;
	var $tpl;
	
	function SlownikAdmin(&$root)
	{
		$this -> Slownik($root);
	}

	/* funkcja laduje wszystkie artykuly w panelu admina */
	function LoadArticlesAdmin()
	{
		if((int)$_GET['page'] < 1) $_GET['page'] = 1;
		$start = ($_GET['page']-1) * $this -> limit_admin;	
		
		$q = "SELECT * FROM ".$this->table." ";
		$q.= "ORDER BY label ";
		$q.= "LIMIT ".$start.",".$this -> limit_admin;

		$this -> db -> query($q);
		while($row =& $this -> db -> fetch_assoc())
		{
			$row =& mstripslashes($row);
			$articles[] = $row;
		}		
		return $articles;		
	}
	
	/* funkcja zwraca liczbe podstron w panelu admin */
	function getArticlesAdmin()
	{
		$q = "SELECT count(*) as ile FROM ".$this->table." ";

		$this -> db -> query($q);
		$row =& $this -> db -> fetch_assoc();
		$count = $row['ile'];
		if($count < 1) $count = 1;
		return ceil($count / $this -> limit_admin);
	}
	
	function Save($dane)
	{
		$q = "UPDATE ".$this->table." SET pl='".$dane['pl']."' WHERE id='".$dane['id']."' LIMIT 1";
		$this -> db -> query($q);
	}

	function SaveAll($dane)
	{
      foreach($dane['pl'] as $items => $pl)
		{
      $q = "UPDATE ".$this->table." SET pl='".$pl."' WHERE id='".$items."' ";
      $this -> db -> query($q);
   	}
//      foreach($dane['en'] as $items => $en)
//		{
//      $q = "UPDATE ".$this->table." SET en='".$en."' WHERE id='".$items."' ";
//      $this -> db -> query($q);
//   	}
//      foreach($dane['de'] as $items => $de)
//		{
//      $q = "UPDATE ".$this->table." SET de='".$de."' WHERE id='".$items."' ";
//      $this -> db -> query($q);
//   	}
//      foreach($dane['ru'] as $items => $ru)
//		{
//      $q = "UPDATE ".$this->table." SET ru='".$ru."' WHERE id='".$items."' ";
//      $this -> db -> query($q);
//   	}
	}
	
	function Add($dane)
	{
		$q = "INSERT INTO ".$this->table." SET label='".$dane['label']."', pl='".$dane['pl']."'";
		$this -> db -> query($q);
	}
	
	function Delete($id)
	{
		$q = "DELETE FROM ".$this->table." WHERE id='".$id."' LIMIT 1";
		$this -> db -> query($q);
	}
	
	function Szukaj($keyword)
  {
		$q = "SELECT * FROM ".$this->table." ";
    $q.= "WHERE label like '%".$keyword."%' OR ";
    $q.= "pl like '%".$keyword."%' ";
    $q.= "ORDER BY label ";

		$this -> db -> query($q);
		while($row =& $this -> db -> fetch_assoc())
		{
			$row =& mstripslashes($row);
			$articles[] = $row;
		}
		return $articles;
  }
	
}
?>