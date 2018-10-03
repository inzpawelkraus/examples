<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

require_once ROOT_PATH.'/includes/comments.class.php';

if(($CONF['comments_not_logged'] == 0) and !LOGGED)
{
	$tpl -> assign('can_see_comments', false);
}else
{
	$tpl -> assign('can_see_comments', true);
}

if(($CONF['comments_not_logged_post'] == 0) and !LOGGED)
{
	$tpl -> assign('can_write_comments', false);
}else
{
	$tpl -> assign('can_write_comments', true);
}

$oComments = new Comments($root, $comments_group);

	$tokensmax=sizeof(file(ROOT_PATH.'/js/token/tokens.txt'));
	$tokenid=rand(0,$tokensmax-1);
	$tpl -> assign('tokenid', $tokenid);
	
if($_REQUEST['action'] == 'add'){
	$_POST['parent_id'] = $comments_parent_id;
	if($oComments -> Add($_POST)){
		unset($_POST);
		showComments($comments_parent_id);
	}else{
		showComments($comments_parent_id);
	}
}else
{	
	showComments($comments_parent_id);
}

function showComments($comments_parent_id)
	{
	global $oComments, $tpl; 
		// ladujemy komentarze dla podanego artykulu 
		if((int)$comments_parent_id > 0)
		{
			$comments = $oComments -> Load($comments_parent_id);
			$tpl -> assign_by_ref('comments', $comments);
			$tpl -> assign('show_comments', true);
			$tpl -> assign('c_page', $_GET['c_page']);
			$tpl -> assign('c_pages', $oComments -> getPages($comments_parent_id)); 
		}
	}
?>