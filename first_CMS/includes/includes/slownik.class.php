<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

class Slownik {

    var $db;
    var $conf;
    var $messages;
    var $tpl;
    var $table;
    var $limit_admin;

    function Slownik(&$root) {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;
        $this->table = DB_PREFIX . "slownik";
        $this->limit_admin = $this->conf->vars['limit_admin'];
    }

    function Load($lang, &$tab) {
        if (!$lang)
            $lang = "pl";
        $q = "SELECT label, $lang as lang FROM " . $this->table;
        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $row['lang'] = str_replace('BASE_URL', BASE_URL, $row['lang']);
            $row['lang'] = str_replace('ADMIN_EMAIL', ADMIN_EMAIL, $row['lang']);
            if (isset($_SESSION['user']['login'])) {
                $row['lang'] = str_replace('USER_LOGIN', $_SESSION['user']['login'], $row['lang']);
            }
            $tab[$row['label']] = $row['lang'];
        }
    }

}

?>