<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once(ROOT_PATH . '/includes/cache.class.php');
$oCache = new Cache($root);


require_once ROOT_PATH . '/includes/menu.class.php';

if (empty($oMenu))
    $oMenu = new Menu($root);

if (!$menu_l = $oCache->getVariable('user_inc_menu_l', false, true)) {
    $menu_l = $oMenu->Load(0, 'left');
    $oCache->saveVariable($menu_l, "user_inc_menu_l", false, true);
}

if (!$menu_t = $oCache->getVariable('user_inc_menu_t', false, true)) {
    $menu_t = $oMenu->Load(0, 'top');
    $oCache->saveVariable($menu_t, "user_inc_menu_t", false, true);
}

if (!$menu_b = $oCache->getVariable('user_inc_menu_b', false, true)) {
    $menu_b = $oMenu->Load(0, 'bottom');
    $oCache->saveVariable($menu_b, "user_inc_menu_b", false, true);
}

// nowe submenu do wszytkich pozycji 
if (!$submenu = $oCache->getVariable('user_inc_submenu', false, true)) {
    $submenu = $oMenu->LoadSubmenu($menu_l, 'left');
    $oCache->saveVariable($submenu, "user_inc_submenu", false, true);
}

//PRZEKIEROWNIE do ".html"
$host = $_SERVER['HTTP_HOST'];
$self = $_SERVER['PHP_SELF'];
if ($self && $self != BASE_URL) {
    $temp_name = explode('.', $self);
    if ($temp_name[1] != 'html') {
        $temp_name[1] = '.html';
        $self = $temp_name[0] . $temp_name[1];
        $query = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
        $newUrl = !empty($query) ? "http://" . $host . $self . "?" . $query : "http://" . $host . $self;
        redirect301($newUrl);
    }
}

$tpl->assign('mt', $menu_t);
$tpl->assign('mb', $menu_b);
$tpl->assign('ml', $menu_l);
if (!empty($submenu)) {
    $tpl->assign('submenu', $submenu);
}

$tpl->assign('menu_selected', $_SERVER['REQUEST_URI']);

if (user_is_logged('user'))
    $tpl->assign('logged', 1);
if (DEBUG_MODE == 1)
    echo '<div class="center error">DEBUG_MODE ON</div>';

require_once 'users.class.php';

$oUser = new Users($root);

// sprawdzamy czy uzytkownik jest zalogowany	
if ($oUser->isLogged()) {
    $tpl->assign('logged', 1);
    $tpl->assign('user', $_SESSION['user']);
    define('LOGGED', 1);
} else {
    define('LOGGED', 0);
}

function check_login() {
    global $tpl;
    if (LOGGED == 0) {
        $tpl->displayError();
        die;
    }
}

?>