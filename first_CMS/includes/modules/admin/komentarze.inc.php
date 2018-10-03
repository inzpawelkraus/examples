<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('komentarze_administration');

$config =& $root -> conf;

if($_POST['action'] == 'save')
{
	$return1 = $config -> Update('comments_not_logged', $_POST['comments_not_logged']);
	$return2 = $config -> Update('comments_not_logged_post', $_POST['comments_not_logged_post']);
	
	if($return1 and $return2)
	{
		$tpl -> assign('info', 'Zmiany w konfiguracji zostały zapisane!');
	}else
	{
		$tpl -> assign('error', 'Wystąpił błąd podczas zapisywania zmian w konfiguracji!');
	}
}

	$tpl -> assign('comments_not_logged', $config -> LoadOption('comments_not_logged'));
	$tpl -> assign('comments_not_logged_post', $config -> LoadOption('comments_not_logged_post'));

	$tpl -> setPageTitle('Konfiguracja komentarzy');
	$tpl -> assign('menu_selected', 'komentarze');
	$tpl -> displayPage('komentarze/konfiguracja.html');

?>