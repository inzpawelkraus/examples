<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
$oUsers -> CheckPrivileges('page_config');

if($_REQUEST['action'] == 'save')
{
	if($root -> conf -> Update('default_template', $_POST['template']))
	{
		$tpl -> assign('info', 'Zmiany zostały zapisane.');
	}else
	{
		$tpl -> assign('error', 'Wystąpił błąd podczas zapisywania zmian!');
	}
}

$tpl -> assign('currTpl', $root -> conf -> LoadOption('default_template')); 
$tpl -> assign('templates', loadTemplates());

	$tpl -> setPageTitle('Wybór domyślnego szablonu');
	$tpl -> assign('menu_selected', 'ustawienia');
	$tpl -> displayPage('misc/szablony.html');

function loadTemplates()
{
	$tplDir = ROOT_PATH.'/templates';
	if($dp = opendir($tplDir))
	{
		$i = 0;
		while($item = readdir($dp))
		{
			if($item!='..' and $item!='.' and $item!='admin' and is_dir($tplDir.'/'.$item) and !preg_match('/^_/i', $item))
			{
				$templates[$i]['name'] = $item;
				$templates[$i]['compile'] = checkDir($tplDir.'/_compile/'.$item);
				$templates[$i]['cache'] = checkDir($tplDir.'/_cache/'.$item);
				
				if(($templates[$i]['compile'] == true) and ($templates[$i]['cache'] == true))
				{
					$templates[$i]['ready'] = true;
				}else
					$templates[$i]['ready'] = false;
				$i++;	
			}
		}
		closedir($dp);
		return $templates;
	}else
	{
		return false;
	}
}// end function

function checkDir($dir)
{
	if(file_exists($dir))
	{
		if(is_writable($dir))
		{
			return true;		
		}
		if(@chmod($dir, 0777))
		{
			return true;
		}
	}else
	{
		if(@mkdir($dir))
		{
			return true;
		}
	}
	return false;
}
?>