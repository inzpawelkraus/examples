<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

class Gallery {

    var $db;
    var $conf;
    var $error;
    var $tpl;
    var $table;
    var $limit_home;
    var $limit_page;
    var $limit_admin;
    var $limit_rss;
    var $kadruj;

    /* konstruktor */

    function Gallery(&$root, $table, $dir) {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;
        $this->table = DB_PREFIX . $table . '_photo';
        $this->dir = ROOT_PATH . '/upload/' . $dir;
        $this->url = BASE_URL . '/upload/' . $dir;
        $this->tableGalleries = DB_PREFIX . $table;
        $this->tableDescription = DB_PREFIX . $table . '_description';
        $this->tableConfig = DB_PREFIX . 'config';
        $this->limit_home = $this->conf->vars['limit_home'];
        $this->limit_page = $this->conf->vars['limit_page'];
        $this->limit_admin = $this->conf->vars['limit_admin'];
        $this->limit_rss = $this->conf->vars['limit_rss'];

        $this->getDefaultGalleryConfig();
    }

    /* todo
      -opis wartosci
      -domyslne wartosci
     */

    function getDefaultGalleryConfig() {
        $this->thumb_width = $this->conf->vars['thumb_width_default'];
        $this->thumb_height = $this->conf->vars['thumb_height_default'];
        $this->kadruj = 0;
        $this->watermark = 0;
    }

    function getGalleryConfig($id) {
        $q = "SELECT width, height, kadruj, watermark, watermark_file, watermark_x, watermark_y, watermark_position FROM " . $this->tableGalleries . " WHERE id='" . $id . "'";
        $this->db->query($q);
        $row = $this->db->fetch_assoc();
        return $row;
    }

    /* funkcja zwraca adres URL dla podanego zdjecia */

    function getUrl($name, $id = false) {
        return file_exists($this->dir . '/' . $id . "/" . $name) ? $this->url . '/' . $id . "/" . $name : false;
    }

    /* funkcja zwraca adres URL dla tagu SRC (miniaturka) dla podanego zdjecia */

    function getSrc($name, $id = false) {
        $name = nameThumb($name, "_s");
        return file_exists($this->dir . "/" . $id . "/" . $name) ? $this->url . "/" . $id . "/" . $name : false;
    }

    /* funkcja wczytuje galerie zdjec */

    function Load($gallery_id = 0, $page_keywords = '') {
        $anchor = explode(',', $page_keywords);
        $liczba = count($anchor);
        $this->db->query("SELECT * FROM " . $this->table . " WHERE gallery_id='" . $gallery_id . "' ORDER BY `order` ");
        $items = array();
        while ($row = $this->db->fetch_assoc()) {
            if ($liczba > 0) {
                $row['anchor'] = trim($anchor[rand(0, $liczba - 1)]);
            } else {
                $row['anchor'] = '';
            }
            if ($url = $this->getUrl($row['name'], $gallery_id)) {
                $row['url'] = $url;
            }
            if ($src = $this->getSrc($row['name'], $gallery_id)) {
                $row['src'] = $src;
            }
            $items[] = $row;
        }
        return $items;
    }

    function LoadGallery($title_url, $id = 0) {
        $q = "SELECT g.*, d.title, d.title_url, d.content_short, d.content FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' ";
        if ($id > 0)
            $q.= "AND g.id='" . $id . "'";
        else
            $q.= "AND d.title_url='" . $title_url . "'";
        $this->db->query($q);

        if ($row = $this->db->fetch_assoc()) {
            $row['title'] = stripslashes($row['title']);
            $row['content'] = stripslashes($row['content']);
            $row['content_short'] = stripslashes($row['content_short']);
            $row['page_title'] = stripslashes($row['page_title']);
            $row['page_keywords'] = stripslashes($row['page_keywords']);
            $row['page_description'] = stripslashes($row['page_description']);

            if ($row['op_page_title'] == '1')
                $row['page_title'] = TITLE;
            elseif ($row['op_page_title'] == '2')
                $row['page_title'] = $row['title'];
            elseif ($row['op_page_title'] == '3')
                $row['page_title'] = $row['title'] . ' - ' . TITLE;
            elseif ($row['op_page_title'] == '4')
                $row['page_title'] = $row['page_title'];
            elseif ($row['op_page_title'] == '5')
                $row['page_title'] = $row['page_title'] . ' - ' . TITLE;
            if ($row['op_page_keywords'] == '1')
                $row['page_keywords'] = KEYWORDS;
            elseif ($row['op_page_keywords'] == '2')
                $row['page_keywords'] = $row['title'];
            elseif ($row['op_page_keywords'] == '3')
                $row['page_keywords'] = $row['title'] . ', ' . KEYWORDS;
            elseif ($row['op_page_keywords'] == '4')
                $row['page_keywords'] = $row['page_keywords'];
            elseif ($row['op_page_keywords'] == '5')
                $row['page_keywords'] = $row['page_keywords'] . ', ' . KEYWORDS;
            if ($row['op_page_description'] == '1')
                $row['page_description'] = DESCRIPTION;
            elseif ($row['op_page_description'] == '2')
                $row['page_description'] = $row['title'];
            elseif ($row['op_page_description'] == '3')
                $row['page_description'] = $row['title'] . ' - ' . DESCRIPTION;
            elseif ($row['op_page_description'] == '4')
                $row['page_description'] = substr(strip_tags($row['content_short']), 0, 156);
            elseif ($row['op_page_description'] == '5')
                $row['page_description'] = substr(strip_tags($row['content_short']), 0, 156) . ' - ' . DESCRIPTION;
            elseif ($row['op_page_description'] == '6')
                $row['page_description'] = stripslashes($row['page_description']);
            elseif ($row['op_page_description'] == '7')
                $row['page_description'] = stripslashes($row['page_description']) . ' - ' . DESCRIPTION;
            if (!empty($row['tagi'])) {
                if (empty($id)) {
                    $row['tagi_url'] = explode('|', str_replace(' ', '-', $row['tagi']));
                    $row['tagi'] = explode('|', $row['tagi']);
                }
            }
            return mstripslashes($row);
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT_EXIST']);
            return false;
        }
    }

    function LoadGalleries($active = 0) {
        $q = "SELECT g.*, d.* FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' ";
        if ($active == 1)
            $q.= "AND g.active='" . (int) $active . "' ";
        $q.= "ORDER BY g.order ";
        $this->db->query($q);
        $rows = array();
        while ($row = $this->db->fetch_assoc()) {
            $rows[] = maddslashes($row);
        }
        
        for ($i = 0; $i < count($rows); $i++) {
            $rows[$i]['photo'] = $this->LoadRandPhoto($rows[$i]['id']);
            $rows[$i]['url'] = BASE_URL . '/galeria/' . $rows[$i]['title_url'] . '.html';
            $rows[$i]['content_short'] = strip_tags(stripslashes($rows[$i]['content_short']));
            $rows[$i]['title'] = strip_tags(stripslashes($rows[$i]['title']));
        }
        return $rows;
    }
    
    function LoadSlides($active = 0) {
        $q = "SELECT g.*, d.* FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' ";
        if ($active == 1)
            $q.= "AND g.active='" . (int) $active . "' ";
        $q.= "ORDER BY g.order ";
        $this->db->query($q);
        $rows = array();
        while ($row = $this->db->fetch_assoc()) {
            $rows[] = maddslashes($row);
        }
        
        for ($i = 0; $i < count($rows); $i++) {
            $rows[$i]['photo'] = $this->LoadRandPhoto($rows[$i]['id']);
            $rows[$i]['url'] = BASE_URL . '/galeria/' . $rows[$i]['title_url'] . '.html';
            $rows[$i]['content_short'] = strip_tags(stripslashes($rows[$i]['content_short']));
            $rows[$i]['title'] = strip_tags(stripslashes($rows[$i]['title']));
        }
        return $rows;
    }

    function LoadGalleriesNames() {
        $q = "SELECT g.id, d.title FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' AND g.show_page=1 ORDER BY d.title";
        $this->db->query($q);
//        dump($this->db->query($q));die;
        return $this->db->get_all_rows();
    }

    function LoadRandPhoto($gallery_id = 0) {
        $q = "SELECT * FROM " . $this->table . " ";
        if (!empty($gallery_id))
            $q.= "WHERE gallery_id='" . $gallery_id . "' ";
        $q.= "ORDER BY `order` ASC LIMIT 1";
        $this->db->query($q);
        if ($row = $this->db->fetch_assoc()) {
            if ($url = $this->getUrl($row['name'], $gallery_id))
                $row['url'] = $url;
            if ($src = $this->getSrc($row['name'], $gallery_id))
                $row['src'] = $src;
            return $row;
        }else {
            return false;
        }
    }

    function _countGall($id) {
        $q = "UPDATE " . $this->tableGalleries . " SET `count`=`count`+1 WHERE id='" . $id . "' ";
        $this->db->query($q);
    }

    /* funkcja przeszukuje tabele */

    function Search($keyword) {
        $keyword = strip_tags($keyword);
        $q = "SELECT g.*, d.* FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' AND g.active=1 AND ";
        $q.= "(title LIKE '%" . addslashes($keyword) . "%' OR d.content LIKE '%" . addslashes($keyword) . "%' OR d.content_short LIKE '%" . addslashes($keyword) . "%' OR d.tagi LIKE '%" . addslashes($keyword) . "%') ";
        $q.= " ORDER BY d.title ASC";

        $this->db->query($q);
        $found = 0;
        $result = array();
        while ($row = $this->db->fetch_assoc()) {
            $row['content_short'] = strip_tags(stripslashes($row['content_short']));
            $row['content_short'] = eregi_replace('(' . $keyword . ')', '<span>\\1</span>', $row['content_short']);
            $row['url'] = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/galeria/' . $row['title_url'] . '.html';
            $result[] = $row;
            $found++;
        }
        if ($found > 0) {
            return $result;
        } else {
            return false;
        }
    }

    /* funkcja generuje mape strony */

    function LoadMap() {
        $q = "SELECT g.id, d.title, d.title_url FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' AND g.active=1 ORDER BY d.title DESC";

        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $row['url'] = BASE_URL . '/galeria/' . $row['title_url'] . '.html';
            $articles[] = $row;
        }
        return $articles;
    }

    /* funkcja generuje RSS */

    function LoadRss() {
        $q = "SELECT g.*, d.* FROM " . $this->tableGalleries . " g LEFT JOIN " . $this->tableDescription . " d ON g.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' AND g.active=1 ";
        $q.= "ORDER BY g.date_add DESC ";
        $q.= "LIMIT " . $this->limit_rss;

        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $row['content_short'] = strip_tags($row['content_short']);
            $row['content_short'] = str_replace('&oacute;', 'ó', $row['content_short']);
            $row['content_short'] = str_replace('&Oacute', 'Ó', $row['content_short']);
            $row['content_short'] = preg_replace('/(&[a-z]+[;]?)/', '', $row['content_short']);
            $row['content_short'] = str_replace('&...', '...', $row['content_short']);
            $row['title'] = strip_tags($row['title']);
            $row['title'] = str_replace('&oacute;', 'ó', $row['title']);
            $row['title'] = str_replace('&Oacute', 'Ó', $row['title']);
            $row['title'] = preg_replace('/(&[a-z]+[;]?)/', '', $row['title']);
            $row['title'] = str_replace('&', 'and', $row['title']);
            $row['category_name'] = $GLOBALS['_PAGE_GALLERY'];
            $row['url'] = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/galeria/' . $row['title_url'] . '.html';
            $articles[] = $row;
        }
        return $articles;
    }

}

?>