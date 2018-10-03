<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('page_config');

if($_POST['action'] == 'save')
{
	$root -> conf -> UpdateExtra($_POST['id'], addslashes($_POST['mail_value']));
	$root -> messages -> setInfo('Zmiany zostały zapisane!');
	showMenu();
	 
}elseif(!empty($_GET['id']))
{
	showEditForm($_GET['id']);
}else
{
	showMenu();
}

function showMenu()
{
	global $root;
	$root -> tpl -> assign_by_ref('mail_tpl', $root -> conf -> LoadAllDescriptionExtra('mail_%'));
	
	$root -> tpl -> setPageTitle('Zarządzanie szablonami biuletynu');
	$root -> tpl -> assign('menu_selected', 'ustawienia');
	$root -> tpl -> displayPage('mailing/pokaz.html');
}	

function showEditForm($id)
{
	global $root;
	
	$option =& $root -> conf -> LoadOptionWithDescriptionExtra($id);
	$root -> tpl -> assign_by_ref('mail_value', htmlspecialchars($option['value']));
	$root -> tpl -> assign_by_ref('description', $option['description']);
	
	$root -> tpl -> setPageTitle('Edycja szablonu biuletynu');
	$root -> tpl -> assign('menu_selected', 'ustawienia');
	$root -> tpl -> displayPage('mailing/edytuj.html');
}

?>