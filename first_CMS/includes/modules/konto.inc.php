<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$submodule = isset($_GET['params'][0]) ? $_GET['params'][0].'.inc.php': 'inc.php'; 

if(file_exists(ROOT_PATH.'/modules/uzytkownicy/'.$submodule))
	{
		require_once ROOT_PATH.'/modules/uzytkownicy/'.$submodule;
	}else
	{
		$tpl -> displayError($GLOBALS['_PAGE_NOT_EXIST']); 
	}

?>