<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('page_config');

require_once ROOT_PATH.'/includes/slownikAdmin.class.php';

$oSlownik = new SlownikAdmin($root);

if($_POST['action'] == 'save_all')
{
	$oSlownik -> SaveAll($_POST);
	showSlownik();
}
elseif($_GET['action'] == 'delete')
{
	$oSlownik->Delete($_GET['id']);
	showSlownik();
}
elseif($_GET['action'] == 'add')
{
	showAdd();
}
elseif($_POST['action'] == 'save')
{
	$oSlownik->Save($_POST);
	showSlownik();
}
elseif($_POST['action'] == 'save_new')
{
	$oSlownik->Add($_POST);
	showSlownik();
}
elseif($_POST['action'] == 'szukaj')
{
	showSzukajWyniki($_POST['keyword']);
}
else
{
	showSlownik();
}

function showAdd()
{
	global $tpl, $oSlownik;

	$tpl -> setPageTitle('Zarządzanie słownikiem');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('slownik/dodaj.html');
}

function showSlownik()
{
	global $tpl, $oSlownik;
	
	$_GET['page'] = !empty($_POST['page']) ? $_POST['page'] : $_GET['page'];
   $_GET['page'] = empty($_GET['page']) ? 0 : $_GET['page'];
	
	$tpl -> assign('pages', $oSlownik -> getArticlesAdmin());
	$tpl -> assign('page', $_GET['page']);
	$result = $oSlownik->LoadArticlesAdmin();
	$tpl -> assign('articles', $result);

	$tpl -> setPageTitle('Zarządzanie słownikiem');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('slownik/wszystko.html');
}

function showSzukajWyniki($keyword)
{
        global $tpl, $oSlownik;

	$result = $oSlownik->Szukaj($keyword);
	$tpl -> assign('articles', $result);

	$tpl -> assign('articles', $result);

	$tpl -> setPageTitle('Zarządzanie słownikiem');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('slownik/wszystko.html');
}
?>