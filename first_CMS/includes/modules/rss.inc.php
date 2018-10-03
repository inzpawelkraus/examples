<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)'); 

require_once ROOT_PATH.'/includes/pages.class.php';
require_once ROOT_PATH.'/includes/aktualnosci.class.php';
require_once ROOT_PATH.'/includes/gallery.class.php';

$oPage = new Pages($root);
$oAktualnosci = new Aktualnosci($root);
$oGallery = new Gallery($root, 'gallery', 'gallery');

$pages = $oPage -> LoadRss();
$aktualnosci = $oAktualnosci -> LoadRss();
$gallery = $oGallery -> LoadRss();

$tpl -> assign_by_ref('pages_art', $pages);
$tpl -> assign_by_ref('aktualnosci_art', $aktualnosci);
$tpl -> assign_by_ref('gallery_art', $gallery);
$tpl -> display('rss/artykuly.xml');
die;

?>