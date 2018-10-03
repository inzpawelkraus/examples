<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'aktualnosci.class.php';
require_once 'rejestrZmian.class.php';

class AktualnosciAdmin extends Aktualnosci {

    var $db;
    var $conf;
    var $messages;
    var $tpl;
    var $table;
    var $tableDescription;
    var $dir;
    var $url;
    var $limit_home;
    var $limit_page;
    var $limit_admin;
    var $limit_rss;
    var $small_width;
    var $small_height;
    var $rejestr;
    var $art_id;

    function AktualnosciAdmin(&$root, $modul = 'petycje') {
        $this->Aktualnosci($root, $modul);
        $this->rejestr = new Rejestr($root, 'rejestr');
    }

    function GetThumbConfig($type) {
        $thumb = array();

        switch ($type) {
            case 'small':
                $thumb['width'] = $this->small_width;
                $thumb['height'] = $this->small_height;
                break;
        }

        return $thumb;
    }

    // funkcja dodaje nowy artykul
    function Add(&$post, &$files) {
        if ($post['op_page_title'] == '1' or $post['op_page_title'] == '2' or $post['op_page_title'] == '3')
            $post['page_title'] = '';
        if ($post['op_page_keywords'] == '1')
            $post['page_keywords'] = '';
        if ($post['op_page_description'] == '1')
            $post['page_description'] = '';

        $post['page_title'] = addslashes(str_replace('"', '&quot;', $post['page_title']));
        $post['page_keywords'] = addslashes(str_replace('"', '&quot;', $post['page_keywords']));
        $post['page_description'] = addslashes(str_replace('"', '&quot;', $post['page_description']));

        $q = "INSERT INTO " . $this->table . " SET date_add='" . date("Y-m-d") . "', op_page_title='" . $post['op_page_title'] . "', ";
        $q .= "front='" . $post['front'] . "', page_title='" . $post['page_title'] . "', op_page_keywords='" . $post['op_page_keywords'] . "', page_keywords='" . $post['page_keywords'] . "', ";
        $q .= "op_page_description='" . $post['op_page_description'] . "', page_description='" . $post['page_description'] . "', auth='" . $post['auth'] . "', slider='" . $post['slider'] . "', progres='" . $post['progres'] . "', done='" . $post['done'] . "', fbshare='" . $post['fbshare'] . "',";
        $q .= "gallery_id='" . (int) $post['gallery_id'] . "', show_title='" . $post['show_title'] . "', active='" . $post['active'] . "', comments='" . $post['comments'] . "' ";
        if ($this->db->query($q)) {
            $this->art_id = $this->db->insert_id();

            for ($i = 1; $i <= count($post['title']); $i++) {
                $post['title'][$i] = trim(strip_tags(stripslashes($post['title'][$i])));
                $post['title'][$i] = addslashes(str_replace('"', '&quot;', $post['title'][$i]));
                $post['content'][$i] = addslashes($post['content'][$i]);
                $post['content_short'][$i] = addslashes($post['content_short'][$i]);
                if (empty($post['content_short'][$i]))
                    $post['content_short'][$i] = addslashes(substr(strip_tags($post['content'][$i]), 0, 250));

                if ($i == 4) {
                    $post['title_url'][$i] = $post['title_url'][1] . "-ru";
                } else {
                    $post['title_url'][$i] = $this->conf->make_unique_url(make_url($post['title'][$i]), $this->tableDescription, "title_url", $i);
                }

                $q = "INSERT INTO " . $this->tableDescription . " SET parent_id='" . $this->art_id . "', language_id='" . $i . "', ";
                $q .= "title='" . $post['title'][$i] . "', title_url='" . $post['title_url'][$i] . "', content='" . $post['content'][$i] . "', ";
                $q .= "content_short='" . $post['content_short'][$i] . "', tagi='" . $post['tagi'][$i] . "' ";
                $this->db->query($q);

                $url = '/' . $this->modul . '/' . $post['title_url'][$i] . '.html';
                $this->rejestr->addWpis($post['title'][$i], $url, 'dodano', $this->modul);
            }

            if (!empty($files['photo']['name'])) {
                $filename = changeFilename($post['title_url'][1], '', $files['photo']['name']);
                $oImgUploader = new ImageUploader($this->dir);
                $oImgUploader->AddFile($files['photo']);
                if (!$oImgUploader->Upload($filename)) {
                    $this->messages->setError($oImgUploader->ErrorMsg());
                    return false;
                }
                $oImgUploader->Thumb($this->small_width, $this->small_height, '_s', 1);
                $q = "UPDATE " . $this->table . " SET photo='" . $filename . "' WHERE id='" . $this->art_id . "'";
                $this->db->query($q);
            }

            $this->messages->setInfo($GLOBALS['_PAGE_ADD']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NO_ADD']);
            return false;
        }
    }

    // funkcja zapisuje zmiany w artykule
    function Edit(&$post, &$files) {
        if ($post['op_page_title'] == '1' or $post['op_page_title'] == '2' or $post['op_page_title'] == '3')
            $post['page_title'] = '';
        if ($post['op_page_keywords'] == '1')
            $post['page_keywords'] = '';
        if ($post['op_page_description'] == '1')
            $post['page_description'] = '';

        $post['page_title'] = addslashes(str_replace('"', '&quot;', $post['page_title']));
        $post['page_keywords'] = addslashes(str_replace('"', '&quot;', $post['page_keywords']));
        $post['page_description'] = addslashes(str_replace('"', '&quot;', $post['page_description']));

        // aktualizujemy artykul
        $q = "UPDATE " . $this->table . " SET date_add='" . $post['date_add'] . "', op_page_title='" . $post['op_page_title'] . "', ";
        $q .= "page_title='" . $post['page_title'] . "', front='0', op_page_keywords='" . $post['op_page_keywords'] . "', page_keywords='" . $post['page_keywords'] . "', ";
        $q .= "op_page_description='" . $post['op_page_description'] . "', page_description='" . $post['page_description'] . "', auth='" . $post['auth'] . "', done='" . $post['done'] . "', progres='" . $post['progres'] . "', slider='" . $post['slider'] . "', fbshare='" . $post['fbshare'] . "',";
        $q .= "gallery_id='" . (int) $post['gallery_id'] . "', show_title='" . $post['show_title'] . "', active='" . $post['active'] . "', comments='" . $post['comments'] . "', cssclass='" . $post['cssclass'] . "', ";
        $q .= "`signed`='" . (int) $post['signed'] . "', `limit`='" . (int) $post['limit'] . "' ";
        $q .= "WHERE id='" . $post['id'] . "'";
        if ($this->db->query($q)) {

            for ($i = 1; $i <= count($post['title']); $i++) {
                $post['title'][$i] = trim(strip_tags(stripslashes($post['title'][$i])));
                $post['title'][$i] = addslashes(str_replace('"', '&quot;', $post['title'][$i]));
                $post['content'][$i] = addslashes(strip_tags($post['content'][$i]));
                $post['content_short'][$i] = addslashes(strip_tags($post['content_short'][$i]));

                if ($i == 4) {
                    $post['title_url'][$i] = $post['title_url'][1] . "-ru";
                } else {
                    $post['title_url'][$i] = $this->conf->make_unique_url(make_url($post['title'][$i]), $this->tableDescription, "title_url", $i, $post['id']);
                }

                $q = "UPDATE " . $this->tableDescription . " SET title='" . $post['title'][$i] . "', title_url='" . $post['title_url'][$i] . "', content='" . $post['content'][$i] . "', ";
                $q .= "content_short='" . $post['content_short'][$i] . "', tagi='" . $post['tagi'][$i] . "' WHERE parent_id='" . $post['id'] . "' AND language_id='" . $i . "' ";
                $this->db->query($q);

                $url = '/' . $this->modul . '/' . $post['title_url'][$i] . '.html';
                $this->rejestr->addWpis($post['title'][$i], $url, 'zmieniono', $this->modul);
            }

            if (!empty($files['photo']['name'])) {
                $this->DeletePhoto($post['id']);
                $filename = changeFilename($post['title_url'][1], '', $files['photo']['name']);
                $oImgUploader = new ImageUploader($this->dir);
                $oImgUploader->AddFile($files['photo']);
                if (!$oImgUploader->Upload($filename)) {
                    $this->messages->setError($oImgUploader->ErrorMsg());
                    return false;
                }
                $oImgUploader->Thumb($this->small_width, $this->small_height, '_s', 1);
                $q = "UPDATE " . $this->table . " SET photo='" . $filename . "' WHERE id='" . $post['id'] . "'";
                $this->db->query($q);
            }

            $this->messages->setInfo($GLOBALS['_PAGE_CHANGE_SEVE']);

            return true;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NO_EDIT']);
            return false;
        }
    }

    // funckcja kasuje artykul z bazy
    function Delete($id) {
        $this->DeletePhoto($id);
        $q = "DELETE FROM " . $this->table . " WHERE id='" . $id . "'";
        $this->db->query("SELECT title FROM " . $this->table . "_description WHERE parent_id='" . $id . "' AND language_id='1'");
        if ($row = $this->db->fetch_assoc()) {
            $title = $row['title'];
        }
//        $this->rejestr->addWpis("sss", $title, 'usunięto', $this->modul);
        if ($this->db->query($q)) {
            $q = "DELETE FROM " . $this->tableDescription . " WHERE parent_id='" . $id . "'";
            $this->db->query($q);
            $this->messages->setInfo($GLOBALS['_PAGE_DELETE']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NO_DEL']);
            return false;
        }
    }

    // funckcja kasuje zdjecie do artykulu
    function DeletePhoto($id) {
        $q = "SELECT photo FROM " . $this->table . " WHERE id='" . $id . "'";
        $this->db->query($q);
        $filename = $this->db->get_result();
        $filename_s = nameThumb($filename, '_s');
        if (file_exists($this->dir . '/' . $filename) and ! empty($filename))
            unlink($this->dir . '/' . $filename);
        if (file_exists($this->dir . '/' . $filename_s) and ! empty($filename_s))
            unlink($this->dir . '/' . $filename_s);
        $q = "UPDATE " . $this->table . " SET photo='' WHERE id='" . $id . "'";
        $this->db->query($q);
        $this->messages->setInfo($GLOBALS['_PAGE_FOTO_DEL']);
        return true;
    }

    function EditMiniatura($post) {
        $article = $this->LoadArticleById($post['id']);
        switch ($post['type']) {
            case 'small':
                if ($post['new_foto']) {
                    $filename = nameThumb($article['photo']['name'], '_s');
                    if (file_exists($this->dir . '/' . $filename) and ! empty($filename))
                        unlink($this->dir . '/' . $filename);
                    $kadr_x = $post['foto_kadr_x'];
                    $kadr_y = $post['foto_kadr_y'];
                    $this->conf->ZrobMiniatura($article['photo']['name'], $this->small_height, $this->small_width, "_s", 1, $this->dir, "", $kadr_x, $kadr_y);
                }
                break;
        }

        return true;
    }

    // funkcja laduje artykul o podanym tytule
    function LoadArticleById($id) {
        $q = "SELECT * FROM " . $this->table . " WHERE id='" . (int) $id . "'";

        $this->db->query($q);
        if ($row = $this->db->fetch_assoc()) {
            $row['photo'] = $this->getPhotoUrl($row['photo']);
            return $row;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT_EXIST']);
            return false;
        }
    }

    // funkcja wczytuje opis do artykulu o podanym id
    function LoadOpisById($id) {
        $q = "SELECT * FROM " . $this->tableDescription . " ";
        $q .= "WHERE parent_id='" . (int) $id . "' ";
        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $opis[] = $row;
        }
        return $opis;
    }

    // funkcja laduje wszystkie artykuly w panelu admina
    function LoadArticlesAdmin() {
        if ((int) $_GET['page'] < 1)
            $_GET['page'] = 1;
        $start = ($_GET['page'] - 1) * $this->limit_admin;

        $q = "SELECT a.*, d.title, d.title_url, d.content_short FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' ORDER BY a.date_add DESC, a.id DESC ";
        $q .= "LIMIT " . $start . "," . $this->limit_admin;

        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $row['content_short'] = strip_tags($row['content_short']);
            $row['title_url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $articles[] = $row;
        }
        return $articles;
    }

    // funkcja zwraca liczbe podstron w panelu admin
    function getArticlesAdmin() {
        $q = "SELECT COUNT(id) FROM " . $this->table . " ";
        $this->db->query($q);
        $count = $this->db->get_result();
        if ($count < 1)
            $count = 1;
        return ceil($count / $this->limit_admin);
    }

    // funkcja sprawdza czy strona o podanym title_url istnieje
    function _titleUrlExists($title_url) {
        $this->db->query("SELECT COUNT(parent_id) FROM " . $this->tableDescription . " WHERE language_id='1' AND title_url='" . $title_url . "'");
        return ($this->db->get_result() > 0) ? true : false;
    }

    /* funkcja laduje statystyki odwiedzin */

    function LoadOdwiedziny() {
        if (empty($_GET['page']))
            $_GET['page'] = 1;

        $q = "SELECT a.id, a.count, a.date_add, d.title, d.title_url FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' ORDER BY a.count DESC LIMIT 10";
//        dump($q);die;
        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $result = mysql_query("SELECT count(id) as votes FROM comments WHERE parent_id='" . $row["id"] . "' ");
            $row2 = mysql_fetch_array($result);
            $row['votes'] = $row2['votes'];
//            $qw = "SELECT count(id) FROM comments WHERE parent_id='" . $row["id"] . "' ";
//            $row["votes"] = $this->db->fetch_assoc();
//            dump($row['votes']);
//            die;
            $row['title'] = stripslashes($row['title']);
            $row['title_url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $articles[] = $row;
        }
        return $articles;
    }

    // funkcja zwraca liczbe podstron statystyk
    function GetPagesOdwiedziny() {
        $this->db->query("SELECT COUNT(id) FROM " . $this->table);
        $count = (int) $this->db->get_result();
        $pages = ceil($count / $this->limit_admin);
        if ($pages < 1)
            $pages = 1;
        return $pages;
    }

}

?>