<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('stat_administration');

require_once ROOT_PATH.'/includes/usersAdmin.class.php';

$oUsers = new UsersAdmin($root);

$tpl -> assign_by_ref('log', $oUsers -> LoadZalogowani());
$tpl -> assign_by_ref('pages', $oUsers -> GetPagesZalogowani());
$tpl -> assign_by_ref('page', $_GET['page']);
$tpl -> assign('interval', 50*($_GET['page']-1));

	$tpl -> setPageTitle('Logowania do panelu');
	$tpl -> assign('menu_selected', 'statystyki');
	$tpl -> displayPage('statystyki/logowania-panel.html');

?>