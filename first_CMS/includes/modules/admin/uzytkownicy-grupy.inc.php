<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('users_administration');

require_once ROOT_PATH.'/includes/usersAdmin.class.php';

$oUsers = new UsersAdmin($root);

if($_POST['action'] == 'add_group')
{
	$oUsers -> AddGroup($_POST);
	showGroups();
}elseif($_POST['action'] == 'change_name')
{
	$oUsers -> ChangeGroupName($_POST['id'], $_POST['name']);
	showGroups();
}elseif($_POST['action'] == 'edit_group')
{
	$oUsers -> EditGroup($_POST['group_id'], $_POST['privileges']);
	$oUsers -> ReloadPrivileges();
	showGroups();
}elseif($_GET['action'] == 'delete_group')
{
	$oUsers -> DeleteGroup($_GET['id']);
	showGroups();

}elseif($_GET['action'] == 'load_group')
{
	showGroup($_GET['group_id']);
}else
{
	showGroups();
}

/* funkcja wyswietla uprawnienia dla jednej grupy */
function showGroup()
{
	global $tpl, $oUsers;
	$privileges =& $oUsers -> LoadGroupPrivileges($_GET['group_id']);
	$group_name =& $oUsers -> GetGroupName($_GET['group_id']);
	
	$tpl -> assign_by_ref('group_name', $group_name);
	$tpl -> assign_by_ref('privileges', $privileges);
	
	$tpl -> setPageTitle('Zarządzanie grupami użytkowników');
	$tpl -> assign('menu_selected', 'uzytkownicy');
	$tpl -> displayPage('uzytkownicy/grupy-pokaz-uprawnienia.html');
}

/* funkcja wyswietla grupy */
function showGroups()
{
	global $tpl, $oUsers;
	$groups =& $oUsers -> LoadGroups();
	$privileges =& $oUsers -> LoadPrivileges();

	$tpl -> assign_by_ref('groups', $groups);
	$tpl -> assign_by_ref('privileges', $privileges);
	
	$tpl -> setPageTitle('Zarządzanie grupami użytkowników');
	$tpl -> assign('menu_selected', 'uzytkownicy');
	$tpl -> displayPage('uzytkownicy/grupy-pokaz.html');	
}
?>