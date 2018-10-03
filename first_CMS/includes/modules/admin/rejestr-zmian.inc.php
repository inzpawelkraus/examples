<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)'); 
 
$oUsers -> CheckPrivileges('stat_administration');
 
require_once ROOT_PATH.'/includes/rejestrZmian.class.php';

$oRejestr = new Rejestr($root);

		$rejestr = $oRejestr -> LoadRejestr();
		$tpl -> assign_by_ref('rejestr', $rejestr);
		$tpl -> assign('pages', $oRejestr -> getPages());
		$tpl -> assign('page', $_GET['page']);
		
		$tpl -> setPageTitle('Rejestr zmian');
		$tpl -> assign('menu_selected', 'statystyki');
		$tpl -> displayPage('statystyki/rejestr-zmian.html');
?>