<?php
define('SCRIPT_CHECK', 1);	// dostep do innych plików php
    
require_once 'config.inc.php';
require_once ROOT_PATH.'/includes/root.class.php';

// ustawiamy domyslne wartosci dla zmiennych 
//	$_SERVER['PHP_SELF'] = $_SERVER['REQUEST_URI'];
	$_SERVER['PHP_SELF'] = $_SERVER['REDIRECT_URL'];

// inicjujemy glowna klase
	$root = new Root();

// ladujemy podstawowa konfiguracje
	$CONF = $root -> conf -> Load();
	$CONF['base_url'] = BASE_URL;
	if(empty($_SERVER['HTTP_HOST'])) $_SERVER['HTTP_HOST'] = 'localhost/cms_lang'; // bez http://
	
	define('NEWSLETTER', 1); // 

// sprawdzarka
	require_once ROOT_PATH.'/includes/_aktualizacjaSerwisu.inc.php';
	
// konczymy prace strony
	$root -> db -> close();
?>