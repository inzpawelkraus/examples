<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/pages.class.php';

$oPage = new Pages($root);

if (isset($_POST['action']) && $_POST['action'] == 'send') {
    if ($oPage->SendKontakt($_POST)) {
        $tpl->displayInfo();
        die;
    }
}

$path[0]['name'] = $GLOBALS['_PAGE_CONTAKT'];
$path[0]['url'] = BASE_URL . '/nowa-petycja.html';

$tokensmax = sizeof(file(ROOT_PATH . '/js/token/tokens.txt'));
$tokenid = rand(0, $tokensmax - 1);
$tpl->assign('tokenid', $tokenid);

$tpl->assign('path', $path);
$tpl->setPageTitle($GLOBALS['_PAGE_CONTAKT'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);
$tpl->displayPage('misc/kontakt.html');
?>