<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$tpl -> setPageTitle($GLOBALS['_PAGE_LOGOUT'].' - '.TITLE);
$tpl -> setPageKeywords(KEYWORDS);
$tpl -> setPageDescription(DESCRIPTION);

if($oUser -> logOut())
{
	$tpl -> assign('logged', false); 
	$tpl -> displayPage('uzytkownik/wylogowany.html');
}else
{
	$tpl -> displayError();
}

?>