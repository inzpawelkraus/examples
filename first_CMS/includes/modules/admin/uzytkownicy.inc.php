<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('users_administration');

require_once ROOT_PATH.'/includes/usersAdmin.class.php';

$oUsers = new UsersAdmin($root);

if($_REQUEST['action'] == 'edit_user')
{
	showUser($_GET['id']);
}elseif($_REQUEST['action'] == 'save_user')
{
	if($oUsers -> Edit($_POST))
	{
		showUsers();
	}else
	{
		showUser($_POST['id']);
	}
}elseif($_REQUEST['action'] == 'delete_user')
{
	$oUsers -> Delete($_GET['id']);
	showUsers();
}elseif($_POST['action'] == 'add_user')
{
	if($oUsers -> AddUser($_POST))
	{
		showUsers();
	}else
	{
		showAddUser();
	}

}elseif($_GET['action'] == 'add_user')
{
	showAddUser();
}else
{
	showUsers();
}

function showAddUser()
{
	global $tpl, $oUsers;

	$tpl -> assign_by_ref('groups', $oUsers -> LoadGroups());	
	$tpl -> setPageTitle('Dodawanie nowego użytkownika');
	$tpl -> assign('menu_selected', 'uzytkownicy');
	$tpl -> displayPage('uzytkownicy/dodaj.html');
}

function showUsers()
{
	global $tpl, $oUsers;
	
	$_GET['limit'] = empty($_GET['limit']) ? 50 : $_GET['limit'];
	$_GET['page'] = empty($_GET['page']) ? 0 : $_GET['page'];
	
	$_GET['order_type'] = empty($_GET['order_type']) ? 'ASC' : $_GET['order_type'];
	$_GET['order_field'] = empty($_GET['order_field']) ? 'first_name' : $_GET['order_field'];
	
	$_GET['active'] = ($_GET['active']<0) ? '%' : $_GET['active'];
	$_GET['business'] = ($_GET['business']<0) ? '%' : $_GET['business'];	
	
	
	$tpl -> assign('pages', $oUsers -> getPages($_GET, $_GET['limit']));
	$tpl -> assign('page', $_GET['page']);
	$tpl -> assign('interval', $_GET['limit']*$_GET['page']);
	$tpl -> assign_by_ref('users', $oUsers -> LoadUsers($_GET, $_GET['page'], $_GET['limit']));
	$tpl -> assign_by_ref('groups', $oUsers -> LoadGroups());
	$tpl -> assign('qs', $_SERVER['QUERY_STRING']);
	
	$tpl -> setPageTitle('Zarządzanie użytkownikami');
	$tpl -> assign('menu_selected', 'uzytkownicy');
	$tpl -> displayPage('uzytkownicy/uzytkownicy.html');
	
}

function showUser($id)
{
	global $tpl, $oUsers;
	
	if($user =& $oUsers -> LoadUserById($id))
	{
		if(!empty($_POST))
		{
			$user =& $_POST;
		}
		$groups =& $oUsers -> LoadGroups();
		
		$tpl -> assign_by_ref('u', $user);
		$tpl -> assign_by_ref('groups', $groups);
		
		$tpl -> setPageTitle('Edycja użytkownika');
		$tpl -> assign('menu_selected', 'uzytkownicy');
		$tpl -> displayPage('uzytkownicy/edytuj.html');
	}else
	{
		showUsers();
	}
}

?>