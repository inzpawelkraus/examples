<?php
//phpinfo();die;
$page_start = microtime();

define('DEBUG_MODE', 0); // krotka statystyka
define('SCRIPT_CHECK', 1); // dostep do innych plików php
define('SMARTY_CACHE', 0); // wlanczanie cachowania w smartach
//echo dirname(getcwd());		// wynkcja sprawdza i wyswietla sciezka do katalogu na serwerze
// zmienne php
setlocale(LC_TIME, 'pl_PL', 'pl_PL.utf-8', 'pl_PL.utf-8', 'pol_pol', 'polish', 'plk_plk', 'poland');
ini_set('url_rewriter.tags', '');
ini_set('arg_separator.output', '&amp;');  // separator zmiennych w adresie (zgodnosc z xhtml 1.0)
ini_set('memory_limit', '64M');
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid', 0);
ini_set('session.bug_compat_42', 0);
ini_set('session.bug_compat_warn', 0);

session_start();
header("Cache-control: private"); //IE 6 Fix
header("Content-type: text/html; charset=utf-8");

require_once 'config.inc.php';
require_once ROOT_PATH . '/includes/root.class.php';
require_once ROOT_PATH . '/includes/functions.inc.php';
require_once ROOT_PATH . '/includes/menu.class.php';

// ustawiamy domyslne wartosci dla zmiennych 
//	$_SERVER['PHP_SELF'] = $_SERVER['REQUEST_URI'];
$_SERVER['PHP_SELF'] = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : BASE_URL;

// inicjujemy glowna klase
$root = new Root();
$tpl = &$root->tpl;  // robimy "link" do szablonow
// ladujemy podstawowa konfiguracje
$CONF = $root->conf->Load();
$CONF['base_url'] = BASE_URL;
define('TITLE', $CONF['page_title']);
define('KEYWORDS', $CONF['page_keywords']);
define('DESCRIPTION', $CONF['page_description']);
define('ADMIN_EMAIL', $CONF['admin_email']);
define('BIURO_EMAIL', $CONF['biuro_email']);
define('FIRM_NAME', $CONF['firm_name']);

// ladujemy dostepne jezyki
$JEZYK = $root->conf->LoadLang();
$tpl->assign_by_ref('JEZYK', $JEZYK);

$ip = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
define('CLIENT_IP', $ip);

// ustawiamy wersje jezykowa strony, najpierw ustawienie metoda get
require_once ROOT_PATH . '/includes/slownik.class.php';
$oSlownik = new Slownik($root);

if (!empty($_GET['lang'])) {
    $_id = $root->conf->LoadLangAktywny($_GET['lang']);
    setcookie('lang', $_GET['lang'], time() + 24 * 3600); // aktywna wersja jezykowa na 1 dzien
    setcookie('_id', $_id, time() + 24 * 3600);
    $_SESSION['lang'] = $_GET['lang']; // aktywna wersja jezykowa w danej sesji
    $_SESSION['_id'] = $_id;
    $oSlownik->Load($_GET['lang'], $GLOBALS); // ladujemy zawartosc slownika z bazy
    define('_ID', $_id);
    define('LANG_DIR', $_GET['lang']);
} else {
    if (!empty($_SESSION['lang'])) {   // jesli nie ma cookies ladujemy lang z session
        $oSlownik->Load($_SESSION['lang'], $GLOBALS); // ladujemy zawartosc slownika z bazy
        define('_ID', $_SESSION['_id']);
        define('LANG_DIR', $_SESSION['lang']);
    } elseif (!empty($_COOKIE['lang'])) {   // ladujemy lang z cookies
        $oSlownik->Load($_COOKIE['lang'], $GLOBALS); // ladujemy zawartosc slownika z bazy
        define('_ID', $_COOKIE['_id']);
        define('LANG_DIR', $_COOKIE['lang']);
    } else {   // domyslnie wersja Polska
        $oSlownik->Load('pl', $GLOBALS); // ladujemy zawartosc slownika z bazy
        define('_ID', '1');
        define('LANG_DIR', 'pl');
    }
}

//	if($_GET['lang'] == 'pl')
//            redirect301(BASE_URL.'/');
//            nie ma pewności że działa! zapobiega powielaniu adresów dla seo w polskim
if (isset($_GET['lang']) && $_GET['lang'] == 'pl') {
    $host = $_SERVER['HTTP_HOST'];
    $self = $_SERVER['PHP_SELF'];
    redirect301("http://" . $host . $self);
}

// obsluga szablonow 
$tplName = '';

// priorytet ma szablon pobrany metoda get
if (!empty($_GET['tpl']) and file_exists(ROOT_PATH . '/templates/' . $_GET['tpl'])) {
    $tplName = $_GET['tpl'];
}

$tplName = empty($tplName) ? $CONF['default_template'] : $tplName; // wybieramy szablon zapisany w konfiguracji CMS
$tpl->setTemplatePath($tplName);            // ladujemy standardowy 
// zapisujemy konfiguracje do szablonow
$tpl->assign_by_ref('CONF', $CONF);
$tpl->assign_by_ref('LANG', $GLOBALS);
$tpl->assign('BASE_URL', $CONF['base_url']);
$tpl->assign('TPL_URL', $CONF['base_url'] . '/templates/' . $tplName);
if (LANG_DIR)
    $tpl->assign('LANG_DIR', $CONF['base_url'] . '/templates/' . $tplName . '/img/' . LANG_DIR);
define('TPL_URL', $CONF['base_url'] . '/templates/' . $tplName);
define('AKTUALIZACJA', $CONF['aktualizacja']);
if ($CONF['check_google'] == 1)
    define('DOMENA', preg_replace('/http:\/\//', '', $CONF['server_addr']));

// operacja na module
// pobieramy nazwe modulu
$module = get_module_name();

if ($module == 'rss.inc.php') {
    header("Content-type: text/xml; charset=utf-8");
} else {
    header("Content-type: text/html; charset=utf-8");
}

// wybieramy userspace
$userlevel = preg_match('/^admin(.*)?$/i', $module) ? 'admin' : 'user';
if ($userlevel == 'admin') {
// jestesmy administratorem
    require_once ROOT_PATH . '/includes/admin.inc.php';
} else {
// jestesmy uzytkownikiem
    require_once ROOT_PATH . '/includes/user.inc.php';
}

// ladujemy modul	
if (file_exists(ROOT_PATH . '/modules/' . $module)) {
    require_once './modules/' . $module;
} else {
    $root->displayError('Strona o podanej nazwie nie istnieje!');
}

// konczymy prace strony
$root->db->close();

if (DEBUG_MODE == 1) {
// krotka statystyka
//	echo "\n".'<!--'."\n";
    echo 'Ilość zapytań MySQL: ' . $root->db->count_queries() . "\n";
    echo 'Czas wykonywania zapytań: ' . $root->db->get_execution_time() . "\n";

    echo 'Czas generowania strony: ' . substr(get_micro_time($page_start), 0, 5) . ' sek.' . "\n";
//	echo '-->';
}
?>