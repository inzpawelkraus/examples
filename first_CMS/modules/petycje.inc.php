<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/aktualnosci.class.php';
require_once ROOT_PATH . '/includes/aktualnosciAdmin.class.php';
require_once ROOT_PATH . '/includes/gallery.class.php';
require_once ROOT_PATH . '/includes/files.class.php';

$modul = 'petycje'; // nazwa modulu, tabela w bazie, link w adresie
$oAktualnosci = new Aktualnosci($root, $modul);
$oFiles = new Files($root);

$strPageUrl = isset($_GET['params'][0]) ? $_GET['params'][0] : '';
$tpl->assign('menu_selected', BASE_URL . '/' . $modul . '.html');

$path[0]['name'] = $GLOBALS['_PAGE_NEWS'];
$path[0]['url'] = BASE_URL . '/' . $modul . '.html';

if (!$article = $oCache->getVariable('article')) {
    $article = $oAktualnosci->LoadArticle($strPageUrl);
    $oCache->saveVariable($article, "article");
//    dump($article);die;
}

if (!$article) {
    if (!$pages = $oCache->getVariable('pages')) {
        $pages = $oAktualnosci->getPages();
        $oCache->saveVariable($pages, "pages");
    }

    if (!$articles = $oCache->getVariable('articles')) {
        $articles = $oAktualnosci->LoadArticles($pages);
        $oCache->saveVariable($articles, "articles");
    }
    $tpl->assign('articles', $articles);
    $tpl->assign('pages', $pages);
    $tpl->assign('page', $_GET['page']);

    $tpl->assign_by_ref('path', $path);
    $tpl->setPageTitle($GLOBALS['_PAGE_NEWS'] . ' - ' . TITLE);
    $tpl->setPageKeywords(KEYWORDS);
    $tpl->setPageDescription(DESCRIPTION);
    $tpl->displayPage($modul . '/wszystko.html');

    die;
}

if (($article['auth'] == 1) and !LOGGED) {
    $tpl->displayError($GLOBALS['_PAGE_AUTH']);
    die;
}

if ($article['comments'] == 1) {
    $comments_group = $modul;
    $comments_parent_id = $article['id'];
    require_once ROOT_PATH . '/includes/comments.inc.php';
}

if (isset($_GET['print']) && $_GET['print'] == 1) {
    $tpl->assign_by_ref('article', $article);
    $tpl->display('misc/print.html');
    die;
}

if ($article['active'] != 1) {
    $tpl->displayError($GLOBALS['_PAGE_UPDATING']);
    die;
}

if (!empty($article['gallery_id'])) {
    $oGallery = new Gallery($root, 'gallery', 'gallery');

    if (!$gallery = $oCache->getVariable('gallery')) {
        $gallery = & $oGallery->LoadGallery(0, $article['gallery_id']);
        $oCache->saveVariable($gallery, "gallery");
    }

    if ($gallery['active'] == 1) {
        $tpl->assign_by_ref('gallery', $gallery);

        if (!$galleries = $oCache->getVariable('galleries')) {
            $galleries = $oGallery->Load($article['gallery_id'], $CONF['page_keywords']);
            $oCache->saveVariable($galleries, "galleries");
        }
        $tpl->assign_by_ref('galleries', $galleries);
    } else {
        unset($gallery);
    }
}

if ($pliki = $oFiles->LoadFiles($article['id'], Files::NEWS)) {
    $tpl->assign('pliki', $pliki);
}

$oAktualnosci->_countAktualnosci($article['id']); //zlicza odwiedziny aktualnosci
$path[1]['name'] = $article['title'];
$path[1]['url'] = $article['url'];

$tpl->assign('path', $path);
$tpl->assign('article', $article);
$tpl->setPageTitle($article['title'] . ' - ' . TITLE);
$tpl->setPageKeywords($article['page_keywords']);
$tpl->setPageDescription($article['page_description']);
$tpl->displayPage($modul . '/pokaz.html');
?>