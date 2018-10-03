<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

check_login();

$tpl->setPageTitle($GLOBALS['_PAGE_PASS'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save_pass') {
    if ($oUser->ChangePass($_POST)) {
        $tpl->displayInfo();
    } else {
        showPassForm();
    }
} else {
    showPassForm();
}

function showPassForm() {
    global $tpl;
    $tpl->displayPage('uzytkownik/haslo.html');
}

?>