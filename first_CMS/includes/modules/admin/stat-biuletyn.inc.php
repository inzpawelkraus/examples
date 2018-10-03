<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('stat_administration');

require_once ROOT_PATH.'/includes/newsletter.class.php';

$oNewsletter = new Newsletter($root);

	$tpl -> assign_by_ref('mail_tpl', $oNewsletter -> LoadTemplateAll());
	$tpl -> assign('stats', $oNewsletter -> getStats());
	
	$tpl -> setPageTitle('Statystyka wysyłania biuletynu');
	$tpl -> assign('menu_selected', 'statystyki');
	$tpl -> displayPage('statystyki/statystyka-biuletyn.html');

?>