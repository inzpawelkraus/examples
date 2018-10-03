<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$tpl->setPageTitle($GLOBALS['_PAGE_LOGIN_USER'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);

if (!empty($_POST)) {
    if ($oUser->logIn($_POST)) {
        $tpl->assign('logged', true);
        $tpl->assign('user', $_SESSION['user']);

        $tpl->displayPage('uzytkownik/zalogowany.html');
    } else {
        $tpl->displayPage('uzytkownik/logowanie.html');
    }
} else {
    $tpl->displayPage('uzytkownik/logowanie.html');
}
?>