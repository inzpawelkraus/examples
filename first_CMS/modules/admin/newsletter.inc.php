<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
$oUsers -> CheckPrivileges('biuletyn_administration');

require_once ROOT_PATH.'/includes/newsletter.class.php';

$oNewsletter = new Newsletter($root);

if($_REQUEST['action'] == 'edit_rules')
{
	$tpl -> assign_by_ref('newsletter_rules', htmlspecialchars($oNewsletter -> LoadRules()));
	
	$tpl -> setPageTitle('Regulamin biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/regulamin.html');
	
}elseif($_REQUEST['action'] == 'update_rules')
{
    if($oNewsletter -> UpdateRules($_POST['newsletter_rules']))
    {
        $tpl -> assign('info', 'Zmiany w regulaminie biuletynu zostały zapisane!');
    }else
    {
        $tpl -> assign('error', 'Wystąpił błąd podczas zapisywania zmian w regulaminie biuletynu!');
    }
	
	$tpl -> assign_by_ref('newsletter_rules', htmlspecialchars($oNewsletter -> LoadRules()));

	$tpl -> setPageTitle('Regulamin biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/regulamin.html');
	
}elseif($_REQUEST['action'] == 'edit_info')
{
	$tpl -> assign('newsletter_info', htmlspecialchars($oNewsletter -> LoadInfo()));
	
	$tpl -> setPageTitle('Informacje o biuletynie');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/informacja.html');
	
}elseif($_REQUEST['action'] == 'update_info')
{
    if($oNewsletter -> UpdateInfo($_POST['newsletter_info']))
    {
        $tpl -> assign('info', 'Zmiany w informacji o biuletynie zostały zapisane!');
    }else
    {
        $tpl -> assign('error', 'Wystąpił błąd podczas zapisywania zmian w informacji o biuletynie!');
    }
		
	$tpl -> assign('newsletter_info', htmlspecialchars($oNewsletter -> LoadInfo()));
	
	$tpl -> setPageTitle('Informacje o biuletynie');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/informacja.html');
	
}elseif($_REQUEST['action'] == 'load_template'){
	$tpl -> assign_by_ref('template', $oNewsletter -> LoadTemplate($_POST['template']));
	$tpl -> assign('stats', $oNewsletter -> getStats());

	$tpl -> setPageTitle('Wysyłanie biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/mailing.html');
	
}elseif($_REQUEST['action'] == 'mailing')
{
	$szablon = $oNewsletter -> LoadTemplateAll();
    $tpl -> assign_by_ref('mail_tpl', $szablon);
	$tpl -> assign('stats', $oNewsletter -> getStats());
	$tpl -> assign('info', $oNewsletter -> sprawdzAutomat2());
	
	$tpl -> setPageTitle('Wysyłanie biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/mailing.html');

}elseif($_REQUEST['action'] == 'sender')
{
    $oNewsletter->wysliAutomat(10);
    $szablon = $oNewsletter -> LoadTemplateAll();
    $tpl -> assign_by_ref('mail_tpl', $szablon);
	$tpl -> assign('stats', $oNewsletter -> getStats());
	$tpl -> assign('info', $oNewsletter -> sprawdzAutomat2());
	
	$tpl -> setPageTitle('Wysyłanie biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/mailing.html');

}elseif($_REQUEST['action'] == 'send')
{
	$oUsers -> CheckPrivileges('biuletyn_administration');
	$content = stripslashes($_POST['mailing_content']);
	$tpl -> assign('stats', $oNewsletter -> getStats());
	$tpl -> assign('template', $content);
	
	$tpl -> setPageTitle('Wysyłanie newslettera');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/potwierdzenie.html');

}elseif($_REQUEST['action'] == 'send_mailing')
{
	$oUsers -> CheckPrivileges('biuletyn_administration');
    $count = $oNewsletter -> sendNewsletter($_POST);
    if($count > 0)
    {
			$oNewsletter -> _countSend($_POST['id'], $count);
      $tpl -> assign('info', 'Biuletyn wysłano do <b>'.$count.'</b> odbiorców.');
    }else
    {
      $tpl -> assign('error', 'Biuletyn nie został wysłany do nikogo! Prawdopodobnie brak aktywnych adresów e-mail w bazie!');
    }
    $tpl -> display('index.tpl');
}elseif($_GET['action'] == 'user')
{
	showUsers();
}elseif($_GET['action'] == 'edit_user')
{
	showUser($_GET['id']);
}elseif($_REQUEST['action'] == 'save_user')
{
	if($oNewsletter -> Edit($_POST))
	{
		showUsers();
	}else
	{
		showUser($_POST['id']);
	}
}elseif($_REQUEST['action'] == 'delete_user')
{
	$oNewsletter -> Delete($_GET['id']);
	showUsers();
}

function showUsers()
{
	global $tpl, $oNewsletter;
	
	$_GET['limit'] = empty($_GET['limit']) ? 50 : $_GET['limit'];
	$_GET['page'] = empty($_GET['page']) ? 0 : $_GET['page'];
	
	$_GET['order_type'] = empty($_GET['order_type']) ? 'ASC' : $_GET['order_type'];
	$_GET['order_field'] = empty($_GET['order_field']) ? 'first_name' : $_GET['order_field'];
	
	$_GET['active'] = ($_GET['active']<0) ? '%' : $_GET['active'];
	
	$tpl -> assign('pages', $oNewsletter -> getPages($_GET, $_GET['limit']));
	$tpl -> assign('page', $_GET['page']);
	$tpl -> assign('interval', $_GET['limit']*$_GET['page']);
	$tpl -> assign_by_ref('users', $oNewsletter -> LoadUsers($_GET, $_GET['page'], $_GET['limit']));
	$tpl -> assign('qs', $_SERVER['QUERY_STRING']);
	
	$tpl -> setPageTitle('Zarządzanie użytkownikami biuletynu');
	$tpl -> assign('menu_selected', 'newsletter');
	$tpl -> displayPage('newsletter/uzytkownicy.html');
	
}

function showUser($id)
{
	global $tpl, $oNewsletter;
	
	if($user =& $oNewsletter -> LoadUserById($id))
	{
		if(!empty($_POST))
		{
			$user =& $_POST;
		}
		
		$tpl -> assign_by_ref('u', $user);
		$tpl -> setPageTitle('Edycja użytkownika biuletynu');
		$tpl -> assign('menu_selected', 'newsletter');
		$tpl -> displayPage('newsletter/edytuj.html');
	}else
	{
		showUsers();
	}
}

?>