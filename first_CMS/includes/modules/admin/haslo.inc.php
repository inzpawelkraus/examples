<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

if($_REQUEST['action'] == 'save_pass')
{
	if($oUsers -> ChangePass($_POST))
	{
		$tpl -> display('index.tpl');
	}else
	{
		showPassForm();
	}
}else
{
	showPassForm();
}

function showPassForm()
{
	global $tpl;
	$tpl -> setPageTitle('Zmiana hasła');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('misc/haslo.html');
}

?>