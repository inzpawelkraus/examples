<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('strony_administration');

require_once ROOT_PATH.'/includes/pagesAdmin.class.php';
require_once ROOT_PATH.'/includes/gallery.class.php';
require_once ROOT_PATH.'/includes/menuAdmin.class.php';

$oPages = new PagesAdmin($root);
$oMenu = new MenuAdmin($root);
$oGallery = new Gallery($root, 'gallery', 'gallery');
$config =& $root -> conf;

// wyswietlamy formularz dodawania
if($_GET['action'] == 'add')
{
	showAdd();

// dodajemy do bazy
}elseif($_POST['action'] == 'Dodaj stronę')
{
	if($oPages -> Add($_POST, $_FILES))
	{
		showArticles();
	}else
	{
		showAdd();
	}

// zapisujemy zmiany i otwieramy edycje
}elseif($_POST['action'] == 'Zapisz i kontynuuj edycję')
{
	$oPages -> Edit($_POST, $_FILES);
	showEdit($_POST['id']);
	
// zapisujemy zmiany i wyswietalmy spis
}elseif($_POST['action'] == 'Zapisz')
{
	$oPages -> Edit($_POST, $_FILES);
	showArticles();

}elseif($_POST['action'] == 'Porzuć zmiany')
{
	showArticles();

// wyswietlamy formularz edycji
}elseif($_GET['action'] == 'edit')
{
	showEdit($_GET['id']);
	
// kasujemy wpis z bazy
}elseif($_GET['action'] == 'delete' and !empty($_GET['id']))
{
	if($oPages -> Delete($_GET['id']))
	{
		showArticles();
	}
}else
{
	showArticles();
}


function showAdd()
{
	global $oPages, $oGallery, $oMenu, $config, $tpl;
	
	$opcje['op_page_title'] = $config -> LoadOption('op_page_title');
	$opcje['op_page_keywords'] = $config -> LoadOption('op_page_keywords');
	$opcje['op_page_description'] = $config -> LoadOption('op_page_description');
	
	$tpl -> assign_by_ref('opcje', $opcje);
	$tpl -> assign_by_ref('galleries', $oGallery -> LoadGalleriesNames());
	$tpl -> setPageTitle('Nowa strona');
	$tpl -> assign('menu_selected', 'strony');
	$tpl -> displayPage('strony/dodaj.html');
}

function showEdit($id)
{
	global $oPages, $oGallery, $tpl; 

	if($article = $oPages -> LoadArticleById($id))
	{
		$opis =& $oPages -> LoadOpisById($article['id']);
		
		$tpl -> assign('article', ($article));
		$tpl -> assign('opis', ($opis));
		$tpl -> assign_by_ref('galleries', $oGallery -> LoadGalleriesNames());
		$tpl -> setPageTitle('Edycja strony');
		$tpl -> assign('menu_selected', 'strony');
		$tpl -> displayPage('strony/edytuj.html');
	}else
	{
		$tpl -> displayError();
	}
}

function showArticles()
{
	global $oPages, $oMenu, $tpl;
	
	$articles = $oPages -> LoadArticlesAdmin($_GET['grupa']);
	
	$tpl -> assign('pages', $oPages -> getArticlesAdmin($_GET['grupa']));
	$tpl -> assign('articles', $articles);
	$tpl -> assign('page', $_GET['page']);
	
	$tpl -> setPageTitle('Zarządzanie stronami');
	$tpl -> assign('menu_selected', 'strony');
	$tpl -> displayPage('strony/pokaz.html');
}
?>