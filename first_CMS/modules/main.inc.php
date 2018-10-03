<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/pages.class.php';
require_once ROOT_PATH . '/includes/mysqlAdmin.class.php';
require_once ROOT_PATH . '/includes/ranking.class.php';
require_once ROOT_PATH . '/includes/gallery.class.php';
require_once ROOT_PATH . '/includes/aktualnosci.class.php';
require_once ROOT_PATH . '/includes/files.class.php';

$oPage = new Pages($root);
$oMysqlAdmin = new MysqlAdmin($root);
$oRanking = new Ranking($root);
$oAktualnosci = new Aktualnosci($root, $modul);
$oFiles = new Files($root);
$config = $root->conf;

$strPageUrl = isset($_GET['params'][0]) ? $_GET['params'][0] : '';

if (empty($oMenu))
    $oMenu = new Menu($root);

if (empty($strPageUrl)) {
    $path[0]['name'] = $GLOBALS['_PAGE_HOMEPAGE'];
    $path[0]['url'] = BASE_URL;

    if (!$aZmieniarka = $oCache->getVariable('aZmieniarka')) {
        require_once ROOT_PATH . '/includes/aktualnosci.class.php';
        $oAktualnosci = new Aktualnosci($root);
        $aHpNews = $oAktualnosci->LoadFirstPage();
        $oCache->saveVariable($aHpNews, "aHpNews");
    }
    $tpl->assign('aHpNews', $aHpNews);

    if (!$main_page_content = $oCache->getVariable('main_page_content')) {
        $main_page_content = stripslashes($root->conf->LoadOptionExtra('main_page_' . _ID));
        $oCache->saveVariable($main_page_content, "main_page_content");
    }

    if (!$articles = $oCache->getVariable('articles')) {
        $articles = $oAktualnosci->LoadArticles($pages);
        $oCache->saveVariable($articles, "articles");
    }
    
    if (!$commHistory = $oCache->getVariable('commHistory')) {
        $commHistory = $oAktualnosci->LoadComments($pages);
        $oCache->saveVariable($commHistory, "commHistory");
    }
    if (!$commMap = $oCache->getVariable('commMap')) {
        $commMap = $oAktualnosci->LoadCommentsMap($pages);
        $commMapAll = $commMap[1];
        $oCache->saveVariable($commMap, "commMap");
        $oCache->saveVariable($commMapAll, "commMapAll");
    }
//    dump($commMap);die;
    if (!$articlesglowna = $oCache->getVariable('articlesglowna')) {
        $articlesglowna = $oAktualnosci->LoadArticlesGlowna($pages);
        $oCache->saveVariable($articlesglowna, "articlesglowna");
    }
    if (!$articlesslider = $oCache->getVariable('articlesslider')) {
        $articlesslider = $oAktualnosci->LoadArticlesSlider($pages);
        $oCache->saveVariable($articlesslider, "articlesslider");
    }

//    if (!$sections = $oCache->getVariable('sections')) {
//        $sections = $oAktualnosci->LoadSections($pages);
//        $oCache->saveVariable($sections, "sections");
//    }
    $tpl->assign('main_page', $main_page_content);


    $tpl->assign('path', $path);
    $tpl->assign('glowna', true);
    $tpl->assign('articles', $articles);
    $tpl->assign('commHistory', $commHistory);
    $tpl->assign('commMap', $commMap);
    $tpl->assign('commMapAll', $commMapAll);
    $tpl->assign('articlesglowna', $articlesglowna);
    $tpl->assign('articlesslider', $articlesslider);
//    $tpl->assign('sections', $sections);
    $tpl->setPageTitle(TITLE);
    $tpl->setPageKeywords(KEYWORDS);
    $tpl->setPageDescription(DESCRIPTION);
    $tpl->displayPage('main.html');

    //dump($aZmieniarka);
} elseif ($page = $oPage->Load($strPageUrl)) {

    if (isset($_POST['action']) && $_POST['action'] == 'send') {
        if ($oPage->SendKontakt($_POST)) {
            $tpl->displayInfo();
            die;
        }
    }

    if (($page['auth'] == 1) and ! LOGGED) {
        $tpl->displayError($GLOBALS['_PAGE_AUTH']);
        die;
    }

    if ($page['active'] != 1) {
        $tpl->displayError($GLOBALS['_PAGE_UPDATING']);
        die;
    }

    if (isset($_GET['print']) && $_GET['print'] == 1) {
        $tpl->assign('article', $page);
        $tpl->display('misc/print.html');
        die;
    }

    if (!empty($page['gallery_id'])) {
        $oGallery = new Gallery($root, 'gallery', 'gallery');
        if (!$gallery = $oCache->getVariable('gallery')) {
            $gallery = & $oGallery->LoadGallery(0, $page['gallery_id']);
            $oCache->saveVariable($gallery, "gallery");
        }

        if ($gallery['active'] == 1) {
            $tpl->assign('gallery', $gallery);

            if (!$galleries = $oCache->getVariable('galleries')) {
                $galleries = $oGallery->Load($page['gallery_id'], $CONF['page_keywords']);
                $oCache->saveVariable($galleries, "galleries");
            }
            $tpl->assign('galleries', $galleries);
        } else {
            unset($gallery);
        }
    }


    if (!$sprawdzacz = $oPage->sprawdzAktualizacje(08, 23)) { // sprawdza czy zostala wykonana aktualizacja
        $oPage->sitemapXML();  // funkcja generuje sitemap.xml
        $date = date('Y-m-d');
        $config->Update('aktualizacja', $date); // zapisywanie do bazy daty aktualizacji
        if (date('d') == 01)
            $oMysqlAdmin->_mysqlExport();  // automat robi zrzut bazy danych pierwszego kazdego miesiaca




            
//if(date('d')==01) $oMysqlAdmin -> _mysqlExportZip();		// automat robi zrzut bazy danych pierwszego kazdego miesiaca
        if (date('d') % 3 == 1 and $CONF['check_google'] == 1)
            $oRanking->checkPozycje();  // ranking pozycji Google
    }

    $oPage->_countPage($page['id']); //zlicza odwiedziny podstrony
    $path[0]['name'] = $page['title'];
    $path[0]['url'] = $page['url'];

    $tokensmax = sizeof(file(ROOT_PATH . '/js/token/tokens.txt'));
    $tokenid = rand(0, $tokensmax - 1);
    $tpl->assign('tokenid', $tokenid);

    $tpl->assign('path', $path);
    $tpl->assign('page', $page);
    $tpl->setPageTitle($page['page_title']);
    $tpl->setPageKeywords($page['page_keywords']);
    $tpl->setPageDescription($page['page_description']);
    $tpl->displayPage('strona.html');
}else {
    if (!BASE_URL)
        redirect301('/');
    else
        redirect301(BASE_URL);
    die;
}
?>