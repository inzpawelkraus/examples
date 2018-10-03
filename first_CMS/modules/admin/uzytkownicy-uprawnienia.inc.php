<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('users_administration');

require_once ROOT_PATH.'/includes/usersAdmin.class.php';

$oUsers = new UsersAdmin($root);

if($_POST['action'] == 'add_privilege')
{
	$oUsers -> AddPrivilege($_POST);
}elseif($_POST['action'] == 'edit_privilege')
{
	$oUsers -> EditPrivilege($_POST);
}elseif($_GET['action'] == 'delete_privilege')
{
	$oUsers -> DeletePrivilege($_GET['privilege_id']);
}

$oUsers -> ReloadPrivileges();

showPrivileges();


/* funkcja wyswietla uprawnienia */
function showPrivileges()
{
	global $tpl, $oUsers;
	$privileges =& $oUsers -> LoadPrivileges();

	$tpl -> assign_by_ref('privileges', $privileges);
	
	$tpl -> setPageTitle('Zarządzanie uprawnieniami użytkowników');
	$tpl -> assign('menu_selected', 'uzytkownicy');
	$tpl -> displayPage('uzytkownicy/uprawnienia-pokaz.html');
}

?>