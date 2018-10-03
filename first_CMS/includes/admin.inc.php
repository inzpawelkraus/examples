<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$tpl->setTemplatePath('admin');
$tpl->assign('TPL_URL', $CONF['base_url'] . '/templates/admin');

require_once ROOT_PATH . '/includes/usersAdmin.class.php';
$oUsers = new UsersAdmin($root);

if (!$oUsers->isLogged()) {
    if (isset($_POST['act']) && $_POST['act'] == 'log_in') {
        if (!$oUsers->logIn($_POST, true)) {
            $tpl->display('misc/loguj.html');
            die;
        }
    } else {
        $tpl->display('misc/loguj.html');
        die;
    }
}

if (!$oUsers->logAdmin()) {
    $tpl->display('misc/loguj.html');
    die;
}

$tpl->assign_by_ref('user', $_SESSION['user']);
if (DEBUG_MODE == 1)
    echo '<div class="center error">DEBUG_MODE ON</div>';
?>