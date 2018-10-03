<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/aktualnosciAdmin.class.php';
require_once ROOT_PATH . '/includes/gallery.class.php';
require_once ROOT_PATH . '/includes/filesAdmin.class.php';

$modul = 'petycje'; // nazwa modulu, tabela w bazie, link w adresie
$oFiles = new FilesAdmin($root);
$oAktualnosci = new AktualnosciAdmin($root, $modul);
$oGallery = new Gallery($root, 'gallery', 'gallery');
$config = &$root->conf;
$files_type = Files::NEWS;

// wyswietlamy formularz dodawania
if ($_GET['action'] == 'add') {
    showAdd();

// dodajemy plik
} elseif (isset($_POST['action']) && $_POST['action'] == 'Dodaj plik') {
    $oFiles->Add($_POST, $_FILES);
    showEdit($_POST['parent_id'], 'pliki');

// edytujemy plik
} elseif (isset($_POST['action']) && $_POST['action'] == 'Zapisz plik') {
    $oFiles->Edit($_POST, $_FILES);
    showEdit($_POST['parent_id'], 'pliki');

// usuwamy plik
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete_plik' and ! empty($_GET['id'])) {
    $oFiles->Delete($_GET['id']);
    showEdit($_GET['parent_id'], 'pliki');

// dodajemy do bazy
} elseif ($_POST['action'] == 'Dodaj') {
    if ($oAktualnosci->Add($_POST, $_FILES)) {
        $tpl->displayInfo();
        return false;
    } else {
        
    }

// zapisujemy zmiany i otwieramy edycje
} elseif ($_POST['action'] == 'Zapisz i kontynuuj edycję') {
    $oAktualnosci->Edit($_POST, $_FILES);
    showEdit($_POST['id']);

// zapisujemy zmiany i wyswietalmy spis
} elseif ($_POST['action'] == 'Zapisz') {
    $oAktualnosci->Edit($_POST, $_FILES);
    showArticles();
} elseif ($_POST['action'] == 'Porzuć zmiany') {
    showArticles();

// wyswietlamy formularz edycji
} elseif ($_GET['action'] == 'edit') {
    showEdit($_GET['id']);

// kasujemy zdjecie do artykulu
} elseif ($_REQUEST['action'] == 'delete_photo') {
    $oAktualnosci->DeletePhoto($_GET['id']);
    showEdit($_GET['id']);

// kasujemy wpis z bazy
} elseif ($_GET['action'] == 'delete' and ! empty($_GET['id'])) {
    if ($oAktualnosci->Delete($_GET['id'])) {
        showArticles();
    }

// wyswietl formularz edycji miniatury
} elseif (isset($_GET['action']) && $_GET['action'] == 'edit_thumb' and ! empty($_GET['id'])) {
    showEditThumb($_GET['id'], $_GET['type']);

// zapisujemy zmiany dla miniatury
} elseif (isset($_POST['action']) && $_POST['action'] == 'Zapisz miniturę') {
    $oAktualnosci->EditMiniatura($_POST);
    showEdit($_POST['id'], 'miniaturki');
} else {
//    showArticles();
}

function showAdd() {
//    global $oGallery, $config, $tpl, $modul;
//
//    $opcje['op_page_title'] = $config->LoadOption('op_page_title');
//    $opcje['op_page_keywords'] = $config->LoadOption('op_page_keywords');
//    $opcje['op_page_description'] = $config->LoadOption('op_page_description');
//
//    $tpl->assign('opcje', $opcje);
//    $tpl->assign('galleries', $oGallery->LoadGalleriesNames());
//    $tpl->setPageTitle('Nowa aktualność');
//    $tpl -> assign('menu_selected', 'aktualnosci');
//    $tpl->displayPage($modul . '/dodaj.html');
//    ;
}

function showEditThumb($id, $type) {
    global $oAktualnosci, $tpl, $modul;

    if ($article = $oAktualnosci->LoadArticleById($id)) {
        $opis = $oAktualnosci->LoadOpisById($article['id']);
        $thumb = $oAktualnosci->GetThumbConfig($type);
        $tpl->assign('article', $article);
        $tpl->assign('thumb', $thumb);
        $tpl->assign('type', $type);
        $tpl->setPageTitle('Edycja miniaturki');
        $tpl->assign('menu_selected', $modul);
        $tpl->displayPage($modul . '/miniatura.html');
    } else {
        $tpl->displayError();
    }
}

$path[0]['name'] = $GLOBALS['_PAGE_CONTAKT'];
$path[0]['url'] = BASE_URL . '/nowa-petycja.html';

$tokensmax = sizeof(file(ROOT_PATH . '/js/token/tokens.txt'));
$tokenid = rand(0, $tokensmax - 1);
$tpl->assign('tokenid', $tokenid);

$tpl->assign('path', $path);
$tpl->setPageTitle('Nowa petycja - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);
$tpl->displayPage('misc/kontakt.html');
?>