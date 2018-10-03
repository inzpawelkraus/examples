<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/aktualnosci.class.php';
require_once ROOT_PATH . '/includes/gallery.class.php';

if (empty($oMenu))
    $oMenu = new Menu($root);
$oAktualnosci = new Aktualnosci($root, 'aktualnosci');
$oGallery = new Gallery($root, 'gallery', 'gallery');

$tpl->assign('menu_selected', BASE_URL . '/mapa-strony.html');

$path[0]['name'] = $GLOBALS['_PAGE_SITEMAP'];
$path[0]['url'] = BASE_URL . '/mapa-strony.html';

if (!$sitemap = $oCache->getVariable('sitemap')) {
    $sitemap = $oMenu->LoadMap();
    $oCache->saveVariable($sitemap, "sitemap");
}

if ($sitemap) {
    if (!$aktualnoscimap = $oCache->getVariable('aktualnoscimap')) {
        $aktualnoscimap = $oAktualnosci->LoadMap();
        $oCache->saveVariable($aktualnoscimap, "aktualnoscimap");
    }

    if (!$gallerymap = $oCache->getVariable('gallerymap')) {
        $gallerymap = $oGallery->LoadMap();
        $oCache->saveVariable($gallerymap, "gallerymap");
    }

    $tpl->assign('aktualnoscimap', $aktualnoscimap);
    $tpl->assign('gallerymap', $gallerymap);
    $tpl->assign('map', $sitemap);

    $tpl->assign('path', $path);
    $tpl->setPageTitle($GLOBALS['_PAGE_SITEMAP'] . ' - ' . TITLE);
    $tpl->setPageKeywords(KEYWORDS);
    $tpl->setPageDescription(DESCRIPTION);
    $tpl->displayPage('misc/mapa-strony.html');

    //dump($gallerymap);
} else {
    $root->displayError();
}
?>