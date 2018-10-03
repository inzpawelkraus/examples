<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/pages.class.php';
require_once ROOT_PATH . '/includes/aktualnosci.class.php';
require_once ROOT_PATH . '/includes/gallery.class.php';

$oPage = new Pages($root);
$oAktualnosci = new Aktualnosci($root, 'aktualnosci');
$oGallery = new Gallery($root, 'gallery', 'gallery');

$keyword = isset($_GET['params'][0]) ? $_GET['params'][0] : '';
if (empty($keyword))
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$keyword = urldecode(str_replace('-', ' ', $keyword));

$path[0]['name'] = $GLOBALS['_PAGE_SZUKAJ'];
$path[0]['url'] = BASE_URL . '/szukaj.html';
$tpl->assign('menu_selected', BASE_URL . '/szukaj.html');

$count = 0;
if (!empty($keyword)) {
    if ($aStrony = $oPage->Search($keyword)) {
        $c_strony = (int) count($aStrony);
        $count += $c_strony;
        $tpl->assign('c_strony', $c_strony);
        $tpl->assign('aStrony', $aStrony);
    }

    if ($aAktualnosci = $oAktualnosci->Search($keyword)) {
        $c_aktualnosci = (int) count($aAktualnosci);
        $count += $c_aktualnosci;
        $tpl->assign('c_aktualnosci', $c_aktualnosci);
        $tpl->assign('aAktualnosci', $aAktualnosci);
    }

    if ($aGaleria = $oGallery->Search($keyword)) {
        $c_galeria = (int) count($aGaleria);
        $count += $c_galeria;
        $tpl->assign('c_galeria', $c_galeria);
        $tpl->assign('aGaleria', $aGaleria);
    }
}

if ($count > 0) {
    $oPage->_countSearch($keyword, $count);
    $tpl->assign('wyniki', true);
    $tpl->setPageTitle($keyword . ' - ' . TITLE);
} else {
    $tpl->setPageTitle($GLOBALS['_PAGE_SZUKAJ'] . ' - ' . TITLE);
}

$tpl->assign('path', $path);
$tpl->assign('keyword', $keyword);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);
$tpl->displayPage('szukaj/wyniki.html');
?>