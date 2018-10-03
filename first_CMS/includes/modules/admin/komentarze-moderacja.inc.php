<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> CheckPrivileges('komentarze_administration');

require_once ROOT_PATH.'/includes/comments.class.php';

$oComments = new Comments($root, $comments_group);

if($_REQUEST['action'] == 'edit') 
{
	$_POST['parent_id'] = $comments_parent_id;
	$oComments -> Edit($_POST);
	
}elseif($_REQUEST['action'] == 'delete') 
{
	$oComments -> Delete($_GET['id']);
}	

// ladujemy wszytkie komentarze
	$_GET['group'] = ($_POST['group'] ? $_POST['group'] : $_GET['group']);
	$_GET['group'] = ($_GET['group'] ? $_GET['group'] : 'pages');
		$comments =& $oComments -> LoadAll($_GET['group']);
		$tpl -> assign_by_ref('comments', $comments);
		$tpl -> assign('show_comments', true);
		$tpl -> assign('page', $_GET['page']);
		$tpl -> assign('group', $_GET['group']);
		$tpl -> assign('pages', $oComments -> getPagesAll($_GET['group'])); 

	$tpl -> setPageTitle('Moderacja komentarzy');
	$tpl -> assign('menu_selected', 'komentarze');
	$tpl -> displayPage('komentarze/moderacja.html');

?>