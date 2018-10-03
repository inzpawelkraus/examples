<?php
 
if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
require_once 'ranking.class.php';

class RankingAdmin extends Ranking
{
	var $db;
	var $conf;
	var $messages;
	var $tpl;
	var $table;
	
	function RankingAdmin(&$root, $table='ranking')
	{
		$this -> Ranking($root, $table);
	}

	// funkcja dodaje link
	function addAnchor($post)
	{
		if($post['anchor']) {
		$post =& maddslashes($post);
		$q = "INSERT INTO ".$this -> table." SET anchor='".$post['anchor']."' ";

		if($this -> db -> query($q))
			{
			$this -> messages -> setInfo('Wpis został dodany do bazy!');
			return $true;	
			}
		}else {
			$this -> messages -> setError('Anchor nie może być pusty');
			return false;	
		}
	}
	
	// funkcja edytuje link
	function editAnchor($post)
	{
		if($post['anchor']) {
		$post =& maddslashes($post);
		$q = "UPDATE ".$this -> table." SET anchor='".$post['anchor']."' WHERE id='".(int)$post['id']."'";

		if($this -> db -> query($q))
			{
			$this -> messages -> setInfo('Wpis został edytowany do bazy!');
			return $true;	
			}
		}else {
			$this -> messages -> setError('Anchor nie może być pusty');
			return false;	
		}
	}
	
	// funkcja usuwa anchor i link
	function delAnchor($post)
	{
		$post =& maddslashes($post);
		$q = "DELETE FROM ".$this -> table." WHERE id='".(int)$post['id']."'";

		if($this -> db -> query($q))
			{
			$this -> messages -> setInfo('Wpis został usunięty z bazy!');
			return $true;	
			}
	}
	
	// funkcja wczytuje pozycje podanej frazy
	function LoadPozycje($parent_id)
	{
		$q = "SELECT * FROM ".$this -> tablePozycja." WHERE parent_id='".$parent_id."' ORDER BY date_add ASC ";

		$this -> db -> query($q);
			while($row =& $this -> db -> fetch_assoc())
			{
				$row =& mstripslashes($row);
				$articles[]= $row;
			}
		return $articles;
	}
	
}
?>