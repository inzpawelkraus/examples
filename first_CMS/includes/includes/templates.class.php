<?php
 
if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

require_once 'config.inc.php';
require_once 'smarty/Smarty.class.php';

class Templates extends Smarty
{
	function Templates()
	{
		// inicjujemy Smarty'ego
		$this -> Smarty();
		$this -> initVars();
		return true;
	}
	
	// funkcja inicjuje zmienne 
	function initVars()
	{
		// ustawiamy sciezki
		$this -> template_dir	= ROOT_PATH.'/templates/';
		$this -> cache_dir		= ROOT_PATH.'/templates/_cache';
		$this -> compile_dir	= ROOT_PATH.'/templates/_compile';

		// wlaczamy(wylaczamy) cach'owanie
		if(SMARTY_CACHE==1) $this -> caching = true;
		else $this -> caching = false;
		
	}
	// funkcja ustawia sciezke do szablonow
	function setTemplatePath($path)
	{
		$this -> initVars();
		$this -> template_dir	= $this -> template_dir.'/'.$path;
		$this -> cache_dir		= $this -> cache_dir.'/'.$path;
		$this -> compile_dir	= $this -> compile_dir.'/'.$path;
		return true;
	}

	// funkcja ustawia tytul strony
	function setPageTitle($title)
	{
		if(!empty($title))
		{
			return $this -> assign('pageTitle', $title);
		}else
		{
			return false;
		}
	}
	
	// funkcja ustawia slowa kluczowe dla strony 
	function setPageKeywords($keywords)
	{
		if(!empty($keywords))
		{		
			return $this -> assign('pageKeywords', $keywords);
		}else
		{
			return false;
		}
	}
	
	// funkcja ustawia opis dla strony
	function setPageDescription($description)
	{
		if(!empty($description))
		{		
			return $this -> assign('pageDescription', $description);
		}else
		{
			return false;
		}	
	}
	
	// funkcja podmienia winiete w topie
	function setTopImage($img)
	{
		$this -> assign('top_image', $img);
		return true;
	}	
	
	// funkcja wyswietla podana strone
	function displayPage($page)
	{
		$this -> assign('body', $page);
		if(SMARTY_CACHE==1) $this -> display('index.tpl', str_replace(BASE_URL, '',$_SERVER['REQUEST_URI']));
		else $this -> display('index.tpl');
		return true;
	}
	
	// funkcja wyswietla informacje o bledzie
	function displayError($error = '', $pageError = 'misc/error.html')
	{
		if(!empty($error)) $this -> assign('error', $error);
		$this -> displayPage($pageError);
	}
	
	// funkcja wyswietla informacje systemowa
	function displayInfo($info = '', $pageInfo = 'misc/info.html')
	{
		if(!empty($info)) $this -> assign('info', $info);
		$this -> displayPage($pageInfo);
	}
}
?>