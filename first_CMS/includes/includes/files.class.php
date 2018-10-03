<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

// w nowym module zmianiamy jedynie nazwe klasy
class Files {

    var $db;
    var $conf;
    var $messages;
    var $tpl;
    var $table;
    var $tableDescription;
    var $dir;
    var $subdir;
    var $url;

    const PAGES = 0;
    const NEWS = 1;
    const OFFER = 2;
    const PACKET = 3;

    function Files(&$root, $modul = 'files') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->tpl = &$root->tpl;
        $this->messages = &$root->messages;
        $this->modul = $modul;
        $this->table = DB_PREFIX . $modul;
        $this->tableDescription = DB_PREFIX . $modul . '_description';
        $this->dir = ROOT_PATH . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $modul;
        $this->url = BASE_URL . '/upload/' . $modul;
        $this->subdir = array('strony', 'aktualnosci', 'oferty', 'pakiety');
    }

    // funkcja laduje pliki
    function LoadFiles($parent_id, $parent_type) {
        $q = "SELECT a.*, d.name FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND a.parent_id='" . $parent_id . "' AND a.parent_type='" . $parent_type . "' ";

        $this->db->query($q);
        $files = array();
        while ($row = $this->db->fetch_assoc()) {
            $file_array = explode(".", strtolower(strtolower($row['filename'])));
            $row['ext'] = end($file_array);
            $row['url'] = $this->url . '/' . $this->subdir[$row['parent_type']] . '/' . $row['parent_id'] . '/' . $row['filename'];
            $files[] = $row;
        }
        return $files;
    }

}

?>