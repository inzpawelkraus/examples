<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
	if($_POST['action']=='zapisz_konfiguracja')
	{
		$root -> conf -> Update('op_page_title', $_POST['op_page_title']);
		$root -> conf -> Update('op_page_keywords', $_POST['op_page_keywords']);
		$root -> conf -> Update('op_page_description', $_POST['op_page_description']);
	}

	$opcje['op_page_title'] = $root -> conf -> LoadOption('op_page_title');
	$opcje['op_page_keywords'] = $root -> conf -> LoadOption('op_page_keywords');
	$opcje['op_page_description'] = $root -> conf -> LoadOption('op_page_description');
	
	$tpl -> assign_by_ref('opcje', $opcje);
	$tpl -> setPageTitle('Konfiguracja domyślna SEO');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('misc/seo-konfiguracja.html');

?>