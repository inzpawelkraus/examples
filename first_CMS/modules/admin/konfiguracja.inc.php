<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('page_config');

$config =& $root -> conf;

if($_POST['action'] == 'save_all')
{

	$return = $config -> UpdateAll($_POST);

	if($return === true)
	{
		$tpl -> assign('info', 'Zmiany w konfiguracji zostały zapisane!');
	}
	else
	{
		$tpl -> assign('error', 'Wystąpił błąd podczas zapisywania zmian w konfiguracji!');
	}
	
}
elseif($_POST['action'] == 'zapisz')
{
	$return = $config -> Update($_POST['conf_name'], $_POST['conf_value']);

	if($return === true)
	{
		$tpl -> assign('info', 'Zmiany w konfiguracji zostały zapisane!');
	}
	else
	{
		$tpl -> assign('error', 'Wystąpił błąd podczas zapisywania zmian w konfiguracji!');
	}
}
elseif($_POST['action'] == 'Kasuj')
{
	$return = $config -> Delete($_POST['conf_name']);

	if($return === true)
	{
		$tpl -> assign('info', 'Opcja została skasowana!');
	}else
	{
		$tpl -> assign('error', 'Wystąpił błąd podczas kasowania opcji!');
	}
}
elseif($_POST['action'] == 'new_option')
{
	$return = $config -> Insert($_POST['conf_name'], $_POST['conf_value'], $_POST['conf_description']);
	
	if($return === true)
	{
		$tpl -> assign('info', 'Nowa opcja została dodana!');
	}else
	{
		$tpl -> assign('error', 'Wystąpił błąd podczas dodawania nowej opcji!');
	}
}

$tpl -> assign('config', $config -> LoadToEdit());

	$tpl -> setPageTitle('Konfiguracja strony');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('misc/konfiguracja.html');

?>