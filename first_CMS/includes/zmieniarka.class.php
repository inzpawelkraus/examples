<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

class Zmieniarka {

    var $db;
    var $conf;
    var $error;
    var $tpl;
    var $table;
    var $tablePhotos;
    var $tablePhotosDescription;
    var $tableConfig;
    var $dir;
    var $url;
    var $limit_home;
    var $limit_page;
    var $limit_admin;
    var $limit_rss;
    var $thumb_width;
    var $thumb_height;
    var $scale_width;
    var $scale_height;
    var $modul;

    /* konstruktor */

    function __construct(&$root, $table = 'zmieniarka') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;
        $this->table = DB_PREFIX . $table;
        $this->tablePhotos = DB_PREFIX . $table . '_photo';
        $this->tablePhotosDescription = DB_PREFIX . $table . '_photo_description';
        $this->tableConfig = DB_PREFIX . 'config';
        $this->dir = ROOT_PATH . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $table;
        $this->url = BASE_URL . '/upload/' . $table;
        $this->limit_home = $this->conf->vars['limit_home'];
        $this->limit_page = $this->conf->vars['limit_page'];
        $this->limit_admin = $this->conf->vars['limit_admin'];
        $this->limit_rss = $this->conf->vars['limit_rss'];
        $this->scale_width = 2048;
        $this->scale_height = 1536;
        $this->modul = $table;

        $this->getDefaultZmieniarkaConfig();
    }

    function getDefaultZmieniarkaConfig() {
        $this->thumb_width = $this->conf->vars['thumb_width_default'];
        $this->thumb_height = $this->conf->vars['thumb_height_default'];
        $this->watermark = 0;
    }

    function getZmieniarkaConfig($id) {
        $q = "SELECT ";
        $q .= "width, ";
        $q .= "height, ";
        $q .= "watermark, ";
        $q .= "watermark_file, ";
        $q .= "watermark_x, ";
        $q .= "watermark_y, ";
        $q .= "watermark_position ";
        $q .= "FROM " . $this->table . " ";
        $q .= "WHERE id=? ";
        $params = array(
            array(dbStatement::INTEGER, $id)
        );
        $statement = $this->db->query($q, $params);
        $row = $statement->fetch_assoc();
        return $row;
    }

    function getPhotoUrl($filename, $id = false) {
        if (!empty($filename)) {
            $filename_s = nameThumb($filename, '_s');
            $row = array();
            $row['name'] = $filename;
            $row['photo'] = URL_PREFIX . $this->url . '/' . $id . '/' . $filename;
            $row['small'] = URL_PREFIX . $this->url . '/' . $id . '/' . $filename_s;
            return $row;
        } else {
            return false;
        }
    }

    /* funkcja wczytuje galerie zdjec */

    function LoadPhotos($zmieniarka_id = 0, $page_keywords = '') {
        if (!empty($page_keywords)) {
            $anchor = explode(',', $page_keywords);
            $liczba = count($anchor);
        }

        $q = "SELECT p.*, d.title, d.content, d.alt FROM " . $this->tablePhotos . " p ";
        $q .= "LEFT JOIN " . $this->tablePhotosDescription . " d ON p.id=d.parent_id ";
        $q .= "WHERE zmieniarka_id=? AND d.language_id=? ";
        $q .= "ORDER BY p.`order` ";
        $params = array(
            array('i', $zmieniarka_id),
            array('i', _ID)
        );
        $statement = $this->db->query($q, $params);
        $items = array();
        while ($row = $statement->fetch_assoc()) {
            if (!empty($page_keywords)) {
                $row['anchor'] = trim($anchor[rand(0, $liczba - 1)]);
            }
            $row['src'] = $this->getPhotoUrl($row['name'], $zmieniarka_id);
            if ($row['src']) {
                $items[] = $row;
            }
        }
        return $items;
    }

    function LoadZmieniarki() {
        $q = "SELECT * FROM " . $this->table . " ";
        $q.= "WHERE active=1 ";
        $statement = $this->db->query($q);

        $zmieniarki = array();
        while ($row = $statement->fetch_assoc()) {
            $row['photos'] = $this->LoadPhotos($row['id']);
            $zmieniarki[$row['label']] = $row;
        }
        return $zmieniarki;
    }

}

?>