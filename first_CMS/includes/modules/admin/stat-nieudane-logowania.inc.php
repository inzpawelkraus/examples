<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('stat_administration');

require_once ROOT_PATH.'/includes/usersAdmin.class.php';

$oUsers = new UsersAdmin($root);

$tpl -> assign_by_ref('log', $oUsers -> LoadLog());
$tpl -> assign_by_ref('pages', $oUsers -> GetPagesLog());
$tpl -> assign_by_ref('page', $_GET['page']);
$tpl -> assign('interval', 50*($_GET['page']-1));

	$tpl -> setPageTitle('Nieudane logowania');
	$tpl -> assign('menu_selected', 'statystyki');
	$tpl -> displayPage('statystyki/nieudane-logowania.html');

?>