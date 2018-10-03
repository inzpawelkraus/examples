<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('galeria_administration');

require_once ROOT_PATH.'/includes/galleryAdmin.class.php';

$oGallery = new GalleryAdmin($root, 'gallery', 'gallery');
$config = $root -> conf;

if($_POST['action'] == 'add_photo')
{
	$oGallery -> Add($_POST['gallery_id'], $_POST['title_url'], $_POST);
	showGallery($_POST['gallery_id']);
}elseif($_GET['delete_photo'])
{
	$oGallery -> Delete($_GET['id'], $_GET['delete_photo']);
	showGallery($_GET['id']);
}elseif($_GET['action'] == 'up')
{
	$oGallery -> MoveUp($_GET['id']);
	showGallery($_GET['gallery_id']);
}elseif($_GET['action'] == 'down')
{
	$oGallery -> MoveDown($_GET['id']);
	showGallery($_GET['gallery_id']);
}elseif($_POST['action'] == 'Dodaj galerię')
{
	if($oGallery -> AddGallery($_POST))
	{
		showGalleries();
	}else
	{
		showNewGalleryForm();
	}
}elseif($_GET['action'] == 'add_gallery')
{
	showNewGalleryForm();
}elseif($_POST['action'] == 'Zapisz i kontynuuj edycję')
{
	$oGallery -> EditGallery($_POST);
	showEditGalleryForm($_POST['id']);
}elseif($_POST['action'] == 'Zapisz')
{
	$oGallery -> EditGallery($_POST);
	showGalleries();
}elseif($_GET['action'] == 'edit_gallery')
{
	showEditGalleryForm($_GET['id']);
}elseif($_GET['action'] == 'show_gallery')
{
	showGallery($_GET['id']);
}elseif($_GET['action'] == 'delete_gallery')
{
	$oGallery -> DeleteGallery($_GET['id']);
	showGalleries();
}elseif($_GET['action'] == 'up_gal')
{
	$oGallery -> MoveUpGal($_GET['id']);
	showGalleries();
}elseif($_GET['action'] == 'down_gal')
{
	$oGallery -> MoveDownGal($_GET['id']);
	showGalleries();
}elseif($_POST['action'] == 'zmien_opis')
{
    $oGallery -> ZmienOpis($_POST);
    showGallery($_POST['gal_id']);
}elseif($_GET['action']=="delete_serv_photo")
{
    $oGallery->DeleteServPhoto($_GET['plik'], $_GET['id']);
    showGallery($_GET['id']);
}
else
{
	showGalleries();
}

function showGalleries()
{
	global $tpl, $oGallery;
	
	$galleries =& $oGallery -> LoadGalleries();
	$tpl -> assign_by_ref('galleries', $galleries);
	$tpl -> setPageTitle('Zarządzanie galeriami zdjęć');
	$tpl -> assign('menu_selected', 'galeria');
	$tpl -> displayPage('galeria/pokaz.html');
}

function showNewGalleryForm()
{
	global $tpl, $oGallery, $config;
	
	$opcje['thumb_height_default'] = $config -> LoadOption('thumb_height_default');
	$opcje['thumb_width_default'] = $config -> LoadOption('thumb_width_default');
	$opcje['op_page_title'] = $config -> LoadOption('op_page_title');
	$opcje['op_page_keywords'] = $config -> LoadOption('op_page_keywords');
	$opcje['op_page_description'] = $config -> LoadOption('op_page_description');
	
	$tpl -> assign_by_ref('opcje', $opcje);
	$tpl -> setPageTitle('Nowa galeria zdjęć');
	$tpl -> assign('menu_selected', 'galeria');
	$tpl -> displayPage('galeria/dodaj.html');  
}

function showEditGalleryForm($id)
{
	global $tpl, $oGallery;
	
	$article =& $oGallery -> LoadGallery(0, $id);
	$opis =& $oGallery -> LoadOpisById($article['id']);

	$tpl -> assign_by_ref('article', $article);
	$tpl -> assign('opis', $opis);
	$tpl -> setPageTitle('Edycja galerii zdjęć');
	$tpl -> assign('menu_selected', 'galeria');
	$tpl -> displayPage('galeria/edytuj.html');  
}

function showGallery($id)
{
	global $tpl, $oGallery;
	$gal =& $oGallery -> LoadGallery(0, $id);
	$gallery =& $oGallery -> Load($id);

      $aPliki = $oGallery->ListDir(false, $id);
      $tpl -> assign_by_ref('aPliki', $aPliki);
      $tpl -> assign_by_ref('gal_url', $oGallery->url);
      $tpl -> assign("gal_dir", "gallery");
      $tpl -> assign_by_ref('kadrowanie_znacznik', $gal['kadruj']);
      $tpl -> assign_by_ref('lista_ile_row', ceil(600/$gal['width']));
      
      
      
      if(preg_match("/WINDOWS/", $_SERVER['SystemRoot'])) $tpl -> assign("path", BASE_URL);
      else $tpl -> assign("path", ROOT_PATH);


	$tpl -> assign_by_ref('gal', $gal);
	$tpl -> assign_by_ref('gallery', $gallery);
	$tpl -> setPageTitle('Zarządzanie galerią zdjęć');
	$tpl -> assign('menu_selected', 'galeria');
	$tpl -> displayPage('galeria/zdjecia.html');
}

?>