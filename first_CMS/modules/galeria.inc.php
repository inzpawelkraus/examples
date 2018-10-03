<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/gallery.class.php';

$tpl->assign('menu_selected', BASE_URL . '/galeria.html');
$tpl->setPageTitle($GLOBALS['_PAGE_GALLERY']);

$oGallery = new Gallery($root, 'gallery', 'gallery');

$title_url = isset($_GET['params'][0]) ? $_GET['params'][0] : '';

$path[0]['name'] = $GLOBALS['_PAGE_GALLERY'];
$path[0]['url'] = BASE_URL . '/galeria.html';

if (empty($title_url)) {
    if (!$galleries = $oCache->getVariable('galleries')) {
        $galleries = $oGallery->LoadGalleries($active = 1);
        $oCache->saveVariable($galleries, "galleries");
    }

    $tpl->assign_by_ref('galleries', $galleries);

    $tpl->assign_by_ref('path', $path);
    $tpl->setPageTitle($GLOBALS['_PAGE_GALLERY'] . ' - ' . TITLE);
    $tpl->setPageKeywords(KEYWORDS);
    $tpl->setPageDescription(DESCRIPTION);
    $tpl->displayPage('galeria/wszystko.html');
} else {
    if (!$gal = $oCache->getVariable('gal')) {
        $gal = & $oGallery->LoadGallery($title_url);
        $oCache->saveVariable($gal, "gal");
    }

    if ($gal['active'] != 1) {
        $tpl->displayError($GLOBALS['_PAGE_UPDATING']);
        die;
    }

    $oGallery->_countGall($gal['id']); //zlicza odwiedziny galerii

    if (!$gallery = $oCache->getVariable('gallery')) {
        $gallery = $oGallery->Load($gal['id'], $CONF['page_keywords']);
        $oCache->saveVariable($gallery, "gallery");
    }

    $tpl->assign_by_ref('gal', $gal);
    $tpl->assign_by_ref('gallery', $gallery);

    if ($gal['comments'] == 1) {
        $comments_group = 'galeria';
        $comments_parent_id = $gal['id'];
        require_once ROOT_PATH . '/includes/comments.inc.php';
    }
    $path[1]['name'] = $gal['title'];
    $path[1]['url'] = $gal['url'];

    $tpl->assign_by_ref('path', $path);
    $tpl->setPageTitle($gal['page_title']);
    $tpl->setPageKeywords($gal['page_keywords']);
    $tpl->setPageDescription($gal['page_description']);
    $tpl->displayPage('galeria/pokaz.html');
}
?>