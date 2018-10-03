<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('biuletyn_administration');

require_once ROOT_PATH.'/includes/newsletter.class.php';

$oNewsletter = new Newsletter($root);

if($_POST['action'] == 'Zapisz')
{
	$oNewsletter -> UpdateTemplate($_POST);
	showMenu();

}elseif($_POST['action'] == 'Zapisz i kontynuuj edycję')
{
	$oNewsletter -> UpdateTemplate($_POST);
	showEditForm($_POST['id']);

}elseif($_POST['action'] == 'Porzuć zmiany')
{
	showMenu();

}elseif($_GET['action'] == 'edit')
{
	showEditForm($_GET['id']);
	
}elseif($_POST['action'] == 'Dodaj szablon')
{
	$oNewsletter -> AddTemplate($_POST);
	showMenu();
	
}else
{
	showMenu();
}

function showMenu()
{
	global $tpl, $oNewsletter;
	$szablon =& $oNewsletter -> LoadTemplateAll();
	$tpl -> assign_by_ref('mail_tpl', $szablon);
	
	$tpl -> setPageTitle('Zarządzanie szablonami biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/pokaz-template.html');
}	

function showEditForm($id)
{
	global $tpl, $oNewsletter;
	
	$mail =& $oNewsletter -> LoadTemplate($id);
	$tpl -> assign_by_ref('mail', $mail);
	
	$tpl -> setPageTitle('Zarządzanie szablonami biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/edytuj-template.html');
}

?>