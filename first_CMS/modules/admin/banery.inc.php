<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$oUsers->CheckPrivileges('banery_administration');

require_once ROOT_PATH . '/includes/baneryAdmin.class.php';
require_once ROOT_PATH . '/includes/gallery.class.php';
require_once ROOT_PATH . '/includes/filesAdmin.class.php';

$modul = 'banery'; // nazwa modulu, tabela w bazie, link w adresie
$oFiles = new FilesAdmin($root);
$oAktualnosci = new BaneryAdmin($root, $modul);
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
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete_plik' and !empty($_GET['id'])) {
    $oFiles->Delete($_GET['id']);
    showEdit($_GET['parent_id'], 'pliki');
    
// dodajemy do bazy
} elseif ($_POST['action'] == 'Dodaj baner') {
    if ($oAktualnosci->Add($_POST, $_FILES)) {
        showArticles();
    } else {
        showAdd();
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
} elseif ($_GET['action'] == 'delete' and !empty($_GET['id'])) {
    if ($oAktualnosci->Delete($_GET['id'])) {
        showArticles();
    }
    
// wyswietl formularz edycji miniatury
} elseif (isset($_GET['action']) && $_GET['action'] == 'edit_thumb' and !empty($_GET['id'])) {
    showEditThumb($_GET['id'], $_GET['type']);
    
// zapisujemy zmiany dla miniatury
} elseif (isset($_POST['action']) && $_POST['action'] == 'Zapisz miniturę') {
    $oAktualnosci->EditMiniatura($_POST);
    showEdit($_POST['id'], 'miniaturki');

} else {
    showArticles();
}

function showAdd() {
    global $oGallery, $config, $tpl, $modul;

    $opcje['op_page_title'] = $config->LoadOption('op_page_title');
    $opcje['op_page_keywords'] = $config->LoadOption('op_page_keywords');
    $opcje['op_page_description'] = $config->LoadOption('op_page_description');

    $tpl->assign('opcje', $opcje);
    $tpl->assign('galleries', $oGallery->LoadGalleriesNames());
    $tpl->setPageTitle('Nowy baner');
    $tpl -> assign('menu_selected', 'banery');
    $tpl->displayPage($modul . '/dodaj.html');
    ;
}

function showEdit($id, $zakladka = 'glowna') {
    global $oAktualnosci, $oGallery, $oFiles, $files_type, $modul, $tpl;

    if ($article = $oAktualnosci->LoadArticleById($id)) {
        $opis = $oAktualnosci->LoadOpisById($article['id']);
        $pliki = $oFiles->LoadFilesAdmin($article['id'], $files_type, $modul);

        $tpl->assign('files_type', $files_type);
        $tpl->assign('pliki', $pliki);
        $tpl->assign('article', ($article));
        $tpl->assign('opis', ($opis));
        $tpl->assign('galleries', $oGallery->LoadGalleriesNames());
        $tpl->setPageTitle('Edycja banera');
        $tpl->assign('zakladka_selected', $zakladka);
        $tpl->assign('menu_selected', $modul);
        $tpl->displayPage($modul . '/edytuj.html');
    } else {
        $tpl->displayError();
    }
}

function showEditThumb($id, $type) {
    global $oAktualnosci, $tpl, $modul;

    if ($article = $oAktualnosci->LoadArticleById($id)) {
        $opis = $oAktualnosci->LoadOpisById($article['id']);
        $thumb = $oAktualnosci->GetThumbConfig($type);
        $tpl->assign('article', $article);
        $tpl->assign('thumb', $thumb);
        $tpl->assign('type', $type);
        $tpl->setPageTitle('Edycja miniaturki dla aktualności "' . $opis[_ID]['title'] . '"');
        $tpl->assign('menu_selected', $modul);
        $tpl->displayPage($modul . '/miniatura.html');
    } else {
        $tpl->displayError();
    }
}

function showArticles() {
    global $oAktualnosci, $tpl, $modul;

    $articles = $oAktualnosci->LoadArticlesAdmin();
    $tpl->assign('pages', $oAktualnosci->getArticlesAdmin());
    $tpl->assign('articles', $articles);
    $tpl->assign('page', $_GET['page']);

    $tpl->setPageTitle('Zarządzanie banerami');
    $tpl->assign('menu_selected', $modul);
    $tpl->displayPage($modul . '/pokaz.html');
}

?>