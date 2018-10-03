<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('stat_administration');

require_once ROOT_PATH.'/includes/pagesAdmin.class.php';
require_once ROOT_PATH.'/includes/aktualnosciAdmin.class.php';
require_once ROOT_PATH.'/includes/galleryAdmin.class.php';

$type = $_GET['type'];

$oPagesAdmin = new PagesAdmin($root);
$oAktualnosciAdmin = new AktualnosciAdmin($root);
$oGallery = new GalleryAdmin($root, 'photo', 'Gallery');
if($type=='podstrony')
	{
	$tpl -> assign_by_ref('odwiedz', $oPagesAdmin -> LoadOdwiedziny());
	$tpl -> assign_by_ref('pages', $oPagesAdmin -> GetPagesOdwiedziny());
	}
elseif($type=='aktualnosci')
	{
	$tpl -> assign_by_ref('odwiedz', $oAktualnosciAdmin -> LoadOdwiedziny());
	$tpl -> assign_by_ref('pages', $oAktualnosciAdmin -> GetPagesOdwiedziny());
	}
elseif($type=='galeria')
	{
	$tpl -> assign_by_ref('odwiedz', $oGallery -> LoadOdwiedziny());
	$tpl -> assign_by_ref('pages', $oGallery -> GetPagesOdwiedziny());
	}
	
$tpl -> assign_by_ref('page', $_GET['page']);
$tpl -> assign('interval', 50*($_GET['page']-1));

	$tpl -> setPageTitle('Odweidzalność ');
	$tpl -> assign('menu_selected', 'statystyki');
	$tpl -> displayPage('statystyki/odwiedziny.html');

?>