<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
require_once ROOT_PATH.'/includes/mysqlAdmin.class.php';

$oUsers -> CheckPrivileges('page_config');

$oMysqlAdmin = new MysqlAdmin($root);
$config =& $root -> conf;

if($_POST['action'] == 'export')
{
	$katalog = $oMysqlAdmin -> sprawdzKatalog();
	//$oMysqlAdmin -> _mysqlExport($katalog);
	$oMysqlAdmin -> _mysqlExportZip($katalog);
}
elseif($_POST['action'] == 'import')
{
	$oMysqlAdmin -> _mysqlImport($_POST['name_file']);
}
elseif($_GET['action'] == 'pobierz' and !empty($_GET['name']))
{
	$file = $_GET['name'];
	$katalog_baza = $opcje['op_page_title'] = $config -> LoadOption('katalog_baza');
	if($file)
	{
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$file.'"');
		readfile(ROOT_PATH.'/'.$katalog_baza.'/'.$file.'');
		die;
	}
}

	showForm($katalog);

function showForm($katalog)
{
	global $tpl, $oMysqlAdmin;
		$file =& $oMysqlAdmin -> LoadPliki($katalog);
		$tpl -> assign('file', $file);
	
	$tpl -> setPageTitle('Export bazy danych MYSQL');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('misc/baza-mysql.html');
}

?>