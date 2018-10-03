<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

$submodule = isset($_GET['params'][0]) ? $_GET['params'][0] . '.inc.php' : 'inc.php';

require_once ROOT_PATH . '/includes/pagesAdmin.class.php';
require_once ROOT_PATH . '/includes/aktualnosciAdmin.class.php';
require_once ROOT_PATH . '/includes/galleryAdmin.class.php';
require_once ROOT_PATH . '/includes/rejestrZmian.class.php';
require_once ROOT_PATH.'/includes/usersAdmin.class.php';

$type = $_GET['type'];

$oPagesAdmin = new PagesAdmin($root);
$oAktualnosciAdmin = new AktualnosciAdmin($root);
$oGallery = new GalleryAdmin($root, 'photo', 'Gallery');
$oRejestr = new Rejestr($root);
$oUsers = new UsersAdmin($root);

$tpl->assign_by_ref('sodwiedz', $oPagesAdmin->LoadOdwiedziny());
$tpl->assign_by_ref('spages', $oPagesAdmin->GetPagesOdwiedziny());

$tpl->assign_by_ref('wodwiedz', $oAktualnosciAdmin->LoadOdwiedziny());
$tpl->assign_by_ref('wpages', $oAktualnosciAdmin->GetPagesOdwiedziny());

$tpl -> assign_by_ref('log', $oUsers -> LoadLog());

if (file_exists(ROOT_PATH . '/modules/admin/' . $submodule)) {
    require_once ROOT_PATH . '/modules/admin/' . $submodule;
} else {
    $tpl->assign('menu_selected', 'admin');
    $rejestr = $oRejestr->LoadRejestr();
    $tpl->assign_by_ref('rejestr', $rejestr);
    $tpl->display('index.tpl'); // wyswietlamy strone glowna panelu
}
?>