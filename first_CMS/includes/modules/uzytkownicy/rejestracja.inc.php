<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$tpl->setPageTitle($GLOBALS['_PAGE_REGISTER'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'register') {
    if ($oUser->Add($_POST)) {
        $tpl->displayInfo();
    } else {
        $tpl->displayPage('uzytkownik/rejestracja.html');
    }
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'activate') {
    if ($oUser->setActive($_GET['id'])) {
        $tpl->displayInfo();
    } else {
        $tpl->displayError();
    }
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'remove') {
    if ($oUser->Delete($_GET['id'])) {
        $tpl->displayInfo();
    } else {
        $tpl->displayError();
    }
} else {
    $tpl->displayPage('uzytkownik/rejestracja.html');
}
?>