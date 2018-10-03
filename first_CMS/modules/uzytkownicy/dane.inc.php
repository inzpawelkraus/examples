<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

check_login();

$tpl->setPageTitle($GLOBALS['_PAGE_USER'] . ' - ' . TITLE);
$tpl->setPageKeywords(KEYWORDS);
$tpl->setPageDescription(DESCRIPTION);

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save_changes') {
    if ($oUser->Edit($_POST)) {
        $tpl->displayInfo();
    } else {
        showEditForm();
    }
} else {
    showEditForm();
}

function showEditForm() {
    global $tpl, $oUser;

    if ($user = $oUser->Load($_SESSION['user']['id'])) {
        if (!empty($_POST)) {
            $user['first_name'] = & $_POST['first_name'];
            $user['last_name'] = & $_POST['last_name'];
            $user['firm_name'] = & $_POST['firm_name'];
            $user['phone'] = & $_POST['phone'];
            $user['address'] = & $_POST['address'];
            $user['post_code'] = & $_POST['post_code'];
            $user['business'] = & $_POST['business'];
            $user['nip'] = & $_POST['nip'];
            $user['city'] = & $_POST['city'];
        }
        $tpl->assign('u', $user);
        $tpl->displayPage('uzytkownik/dane.html');
    } else {
        $tpl->displayError();
    }
}

?>