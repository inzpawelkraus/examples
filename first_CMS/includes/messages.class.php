<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

/* klasa obslugujaca informacje zwracane z systemu */
class Messages
{
	var $templates;
	var $_errorMessage;
	var $_info;
	
	function Messages(&$tpl)
	{
		$this -> templates = &$tpl;
		$this -> _info = NULL;
		$this -> _error = NULL;
	}
	
	/* funkcja ustawia blad systemowy */
	function setError($errorMsg, $systemHalt = false)
	{
		$this -> _error = $errorMsg;
		$this -> templates -> assign('error', $errorMsg);
		
		if($systemHalt === true)
		{
			// natychmiastowe zatrzymanie skryptu, blad krytyczny!
			$this -> templates -> display('critical-error.html');
			exit;
		}
		return true;
	}
	
	/* funkcja ustawia komunikat systemowy */
	function setInfo($infoMsg)
	{
		$this -> _info = $infoMsg;
		$this -> templates -> assign('info', $infoMsg); 

		return true;
	}
	
	/* funkcja ustawia informacje systemowa o podanej nazwie */
	function setMessage($msgType, $msg)
	{
		$this -> templates -> assign_by_ref($msgType, $msg);
		return true;
	}	
	
	/* funkcja zwraca blad systemowy */
	function getError()
	{
		return $this -> _error;
	}
	
	/* funkcja zwraca komunikat systemowy */
	function getInfo()
	{
		return $this -> _info;
	}
	
	/* funkcja wyswietla blad */
	function displayError($errorMsg = '')
	{	
		if(empty($errorMsg))
		{
			$errorMsg = $this -> getError();
		}
		$this -> templates -> displayError($errorMsg);
		return true;
	}
	
	/* funkcja wyswietla komunikat systemowy */
	function displayInfo($infoMsg = '')
	{
		if(empty($infoMsg))
		{
			$infoMsg = $this -> getInfo();
		}
		$this -> templates -> displayInfo($infoMsg);
		return true;		
	}
}

?>