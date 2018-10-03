<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
$oUsers -> CheckPrivileges('page_config');

require_once ROOT_PATH.'/includes/rejestrZmian.class.php';

$oRejestr = new Rejestr($root);
 
if($_POST['action'] == 'save')
{
	for ($i=1;$i<=count($_POST['main_page']); $i++) {
		$root -> conf -> UpdateExtra('main_page_'.$i, addslashes($_POST['main_page'][$i]));
		$oRejestr -> addWpis('Strona główna', '/', 'zmieniono', 'main');
	}
	$root -> messages -> setInfo('Zmiany zostały zapisane!'); 
}

for ($i=1;$i<=2; $i++) {
	$main_page =& htmlspecialchars($root -> conf -> LoadOptionExtra('main_page_'.$i));
	$mp[] = $main_page;
}
	$tpl -> assign_by_ref('main_page', $mp);
	$tpl -> setPageTitle('Zawartość strony głównej');
	$tpl -> assign('menu_selected', 'strony');
	$tpl -> displayPage('strony/glowna.html');


?>