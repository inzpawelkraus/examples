<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$oUsers->CheckPrivileges('menu_administration');

require_once ROOT_PATH . '/includes/menuAdmin.class.php';
require_once ROOT_PATH . '/includes/pages.class.php';


$oMenu = new MenuAdmin($root);
$oPage = new Pages($root);

$mm[0]['nazwa'] = 'menu górne';
$mm[0]['typ'] = 'top';
$mm[1]['nazwa'] = 'menu główne';
$mm[1]['typ'] = 'left';
$mm[2]['nazwa'] = 'menu dolne';
$mm[2]['typ'] = 'bottom';

$mm_sel = $mm[1]['typ'];

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add') {
    $oMenu->Add($_POST);
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
    $oMenu->Edit($_POST);
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
    $oMenu->Delete($_GET['id']);
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'up') {
    $oMenu->MoveUp($_GET['id']);
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'down') {
    $oMenu->MoveDown($_GET['id']);
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'change_menu') {
    $_REQUEST['pid'] = 0;
    $_REQUEST['id'] = 0;
}

$tpl->setPageTitle('Zarządzanie menu');
$tpl->assign('menu_selected', 'menu');

displayPreview($mm, $mm_sel);

function displayPreview(&$mm, $mm_sel) {
    global $oPage, $oPokoje, $oMenu, $root;

    if (empty($_REQUEST['group']))
        $_REQUEST['group'] = $mm_sel;
    if (isset($_GET['action']) && $_GET['action'] == 'show_edit') {
        $opis = $oMenu->LoadId($_GET['id']);
        $root->tpl->assign_by_ref('opis', $opis);
    }

    $pID = empty($_REQUEST['pid']) ? 0 : $_REQUEST['pid'];
    $group = urldecode($_REQUEST['group']);

    $menu = $oMenu->Load($pID, $group);
    $modules = $oMenu->LoadModules();

    for ($i = 1; $i <= 4; $i++) {
        $pages = $oPage->LoadTitles($i);
        $options_pages = '<option value=""> - wybierz - </option>' . "\n";
        for ($j = 0; $j < count($pages); $j++) {
            $options_pages.= '<option value="' . $pages[$j]['title_url'] . '" ';
            if (isset($_GET['action']) && $_GET['action'] == 'show_edit') {
                if ($opis[$i - 1]['url'] == $pages[$j]['title_url'])
                    $options_pages.= 'selected="true"';
            }
            $options_pages.= '>' . $pages[$j]['title'] . '</option>' . "\n";
        }
        $op[] = $options_pages;
    }

    $root->tpl->assign('options_pages', $op);

    $options_modules = '<option value=""> - wybierz - </option>' . "\n";
    for ($i = 0; $i < count($modules); $i++) {
        if ($modules[$i] != 'konto' and $modules[$i] != 'mailing') {
            $options_modules.= '<option value="' . $modules[$i] . '" ';
            if (isset($_GET['action']) && $_GET['action'] == 'show_edit') {
                if ($opis[0]['url'] == $modules[$i])
                    $options_modules.= 'selected="true"';
            }
            $options_modules.= '>' . $modules[$i] . '</option>' . "\n";
        }
    }

    $path = $oMenu->LoadPath($pID, $group);

    $upPID = ($pID != 0) ? $oMenu->LoadUpperPID($pID) : 'none';

    $sitemap = $oMenu->LoadMapAdmin($mm);
    $root->tpl->assign_by_ref('mm', $mm);
    $root->tpl->assign_by_ref('map', $sitemap);

    $root->tpl->assign('pid', $pID);
    $root->tpl->assign('upperPID', $upPID);
    $root->tpl->assign('group', $group);
    $root->tpl->assign('path', $path);
    $root->tpl->assign('menu', $menu);
    $root->tpl->assign('options_modules', $options_modules);
    $root->tpl->assign('error', $root->messages->getError());

    $root->tpl->displayPage('misc/menu.html');
}

?>