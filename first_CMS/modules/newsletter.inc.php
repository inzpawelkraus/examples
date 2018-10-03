<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/newsletter.class.php';

$tpl->setPageTitle($GLOBALS['_PAGE_NEWSLETTER'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);
$tpl->assign('menu_selected', BASE_URL . '/newsletter.html');

$oNewsletter = new Newsletter($root);

$path[0]['name'] = $GLOBALS['_PAGE_NEWSLETTER'];
$path[0]['url'] = BASE_URL . '/newsletter.html';
$tpl->assign_by_ref('path', $path);

// wyswietlamy regulamin
if (isset($_REQUEST['show']) && $_REQUEST['show'] == 'rules') {
    $tpl->assign('rules', $oNewsletter->LoadRules());
    $tpl->display('newsletter/regulamin.html');

// dodajemy uzytkownika (wysylamy potwierdzenie rejestracji)    
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_email') {
    if ($oNewsletter->addUser($_POST)) {
        $tpl->assign('info', $GLOBALS['_NEWSLETTER_INFO']);
        $tpl->displayPage('misc/info.html');
    } else {
        $tpl->assign('informacja', $oNewsletter->LoadInfo());
        $tpl->assign('newsletter_error', $root->messages->getError());
        $tpl->displayPage('newsletter/zapisz.html');
        ;
    }

// aktywujemy subskrypcje
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'activate') {
    if (!empty($_GET['id'])) {
        if ($oNewsletter->activateUser($_GET['id'])) {
            $tpl->assign('info', $GLOBALS['_NEWSLETTER_REGISTER']);
            $tpl->displayPage('misc/info.html');
        } else {
            $root->displayError();
        }
    }

// usuwamy podany adres z bazy
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'remove') {
    if (!empty($_GET['id'])) {
        if ($oNewsletter->removeUser($_GET['id'])) {
            $tpl->assign('info', $GLOBALS['_NEWSLETTER_DEL_EMAIL']);
            $tpl->displayPage('misc/info.html');
        } else {
            $root->displayError();
        }
    }

// wysylamy potwierdzenie rezygnacji
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'remove_email') {
    if ($oNewsletter->sendConfirmRemove($_POST['email'])) {
        $tpl->assign('info', $GLOBALS['_NEWSLETTER_INFO2']);
        $tpl->displayPage('misc/info.html');
    } else {
        $root->displayError();
    }

// formularz rezygnacji z biuletynu        
} elseif (isset($_REQUEST['show']) && $_REQUEST['show'] == 'remove') {
    $tpl->displayPage('newsletter/usun.html');
} else {
    $tpl->assign('informacja', $oNewsletter->LoadInfo());
    $tpl->displayPage('newsletter/zapisz.html');
}
?>