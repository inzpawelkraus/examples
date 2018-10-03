<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$tpl->setPageTitle($GLOBALS['_PAGE_REMINDER'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'remind_pass') {
    if ($oUser->remindPass($_POST['login'])) {
        $tpl->displayInfo();
    } else {
        showPassForm();
    }
} else {
    showPassForm();
}

function showPassForm() {
    global $tpl;
    $tpl->displayPage('uzytkownik/przypomnienie-hasla.html');
}

?>