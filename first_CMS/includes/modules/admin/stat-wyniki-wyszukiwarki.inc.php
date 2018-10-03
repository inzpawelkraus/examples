<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('stat_administration');

require_once ROOT_PATH.'/includes/pagesAdmin.class.php';

$oPagesAdmin = new PagesAdmin($root);

$tpl -> assign_by_ref('wyniki', $oPagesAdmin -> LoadWyniki());
$tpl -> assign_by_ref('pages', $oPagesAdmin -> GetPagesSearch());
$tpl -> assign_by_ref('page', $_GET['page']);
$tpl -> assign('interval', 50*($_GET['page']-1));

	$tpl -> setPageTitle('Frazy wpisane w wyszukiawrce');
	$tpl -> assign('menu_selected', 'statystyki');
	$tpl -> displayPage('statystyki/wyniki-wyszukiwarki.html');

?>