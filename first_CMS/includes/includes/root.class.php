<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
require_once 'db.class.php';
require_once 'templates.class.php';
require_once 'config.class.php';
require_once 'messages.class.php';

/* klasa glowna, z niej dziedzicza inne klasy */
class Root
{
	var $db;
	var $tpl;
	var $conf;
	var $messages;
	
	function Root()
	{
		// obsluga szablonow
		$this -> tpl = new Templates();

		// komunikaty systemu
		$this -> messages = new Messages($this -> tpl);

		// obsluga bazy danych		
		$this -> db = new db($this -> messages);
		
		// konfiguracja	
		$this -> conf = new Config($this -> db);			
		return true;
	}
	
	function displayError($errorMsg='')
	{
		return $this -> messages -> displayError($errorMsg);
	}
		
	function displayInfo($infoMsg='')
	{
		return $this -> messages -> displayInfo($infoMsg);
	}	
}
?>