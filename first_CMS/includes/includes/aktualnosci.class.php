<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'imageUploader.class.php';

class Aktualnosci {

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

    function Aktualnosci(&$root, $modul = 'petycje') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->tpl = &$root->tpl;
        $this->messages = &$root->messages;
        $this->modul = $modul;
        $this->table = DB_PREFIX . $modul;
        $this->tableDescription = DB_PREFIX . $modul . '_description';
        $this->dir = ROOT_PATH . '/upload/' . $modul;
        $this->url = BASE_URL . '/upload/' . $modul;
        $this->limit_home = $this->conf->vars['limit_home'];
        $this->limit_page = $this->conf->vars['limit_page'];
        $this->limit_admin = $this->conf->vars['limit_admin'];
        $this->limit_rss = $this->conf->vars['limit_rss'];
        $this->small_width = 580;
        $this->small_height = 250;
    }

    function LoadArticle($strTitleUrl) {
        if ($strTitleUrl) {
            $q = "SELECT a.*, d.*, COUNT(c.id) AS comm FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id LEFT JOIN comments c ON a.id=c.parent_id ";
            $q .= "WHERE d.language_id='" . _ID . "' AND d.title_url='" . addslashes($strTitleUrl) . "'";
        } else {
            $q = "SELECT a.*, d.*FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
            $q .= "WHERE d.language_id='" . _ID . "' AND d.title_url='" . addslashes($strTitleUrl) . "'";
        }
        $this->db->query($q);
        if ($row = $this->db->fetch_assoc()) {
            $row['title'] = stripslashes($row['title']);
            $row['content'] = stripslashes($row['content']);
            $row['content'] = str_replace('class="fancybox"', 'class="fancybox" rel="fancybox"', $row['content']);

            $row['page_title'] = stripslashes($row['page_title']);
            $row['page_keywords'] = stripslashes($row['page_keywords']);
            $row['page_description'] = stripslashes($row['page_description']);
            if ($strTitleUrl) {
                if (empty($row['progres'])) {
                    if ($row['comm'] < 1) {
                        $row['progress'] = 0;
                    } else {
                        $row['progress'] = round($row['comm'] * 100 / $row['limit'], 1);
                    }
                } else {
                    $row['progress'] = $row['progres'];
                }
            }
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
                $row['page_description'] = $row['page_description'];
            elseif ($row['op_page_description'] == '7')
                $row['page_description'] = $row['page_description'] . ' - ' . DESCRIPTION;
            if (!empty($row['tagi'])) {
                $row['tagi_url'] = explode('|', str_replace(' ', '-', $row['tagi']));
                $row['tagi'] = explode('|', $row['tagi']);
            }
            $row['photo'] = $this->getPhotoUrl($row['photo']);
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            return mstripslashes($row);
        } elseif ($id = $this->LoadIdByName($strTitleUrl)) {
            if ($article = $this->LoadArticleById($id))
                redirect301(BASE_URL . '/aktualnosci/' . $article['title_url'] . '.html');
            else
                return false;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT_EXIST']);
            return false;
        }
    }

    function LoadIdByName($name) {
        $q = "SELECT s.id FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.title_url='" . $name . "' ";
        $this->db->query($q);
        return $this->db->get_result();
    }

    function LoadArticleById($id) {
        $q = "SELECT s.*, d.* FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND s.id='" . $id . "'";

        $this->db->query($q);
        if ($row = $this->db->fetch_assoc()) {
            $row['title'] = stripslashes($row['title']);
            $row['content'] = stripslashes($row['content']);
            $row['content'] = str_replace('class="fancybox"', 'class="fancybox" rel="fancybox"', $row['content']);
            $row['url'] = BASE_URL . '/' . $row['title_url'] . '.html';
            return $row;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT_EXIST']);
            return false;
        }
    }

    function LoadArticles($pages = 0) {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 0;
        }
        if ((int) $_GET['page'] < 1 or $pages < $_GET['page']) {
            $_GET['page'] = $pages;
            $start = 0;
        } else {
            $start = ($pages - $_GET['page']) * $this->limit_page;
        }
        if ($_GET['realizacje'] && $_GET['realizacje'] == 1) {
            $q = "SELECT a.*, d.title, d.title_url, d.content_short, d.content FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
            $q .= "WHERE d.language_id='" . _ID . "' AND a.active=1 AND a.done =1 ";
            $q .= "ORDER BY a.date_add ASC, a.id ASC ";
            $q .= "LIMIT " . $start . "," . $this->limit_page;
        } else {
            $q = "SELECT a.*, d.title, d.title_url, d.content_short, d.content FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
            $q .= "WHERE d.language_id='" . _ID . "' AND a.active=1 ";
            $q .= "ORDER BY a.date_add ASC, a.id ASC ";
            $q .= "LIMIT " . $start . "," . $this->limit_page;
        }
        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);

            $result = mysql_query("SELECT count(id) as comm FROM comments WHERE parent_id = '" . $row['id'] . "'");
            $row2 = mysql_fetch_array($result);
            $row['comm'] = $row2['comm'];
            if ($row['comm'] == 0) {
                $row['progress'] = 0;
            } else {
                if (empty($row['progres'])) {
                    $row['progress'] = round($row['comm'] * 100 / $row['limit'], 1);
                } else {
                    $row['progress'] = $row['progres'];
                }
            }

            $row['content'] = $row['content'];
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $row['photo'] = $this->getPhotoUrl($row['photo']);
            $row['miesiac_nr'] = $GLOBALS['MIESIAC_' . date("n", strtotime($row['date_add']))];
            $articles[] = $row;
        }
        return $articles;
    }

    function LoadComments($pages = 0) {

        $q = "SELECT a.*, b.title FROM comments a ";
        $q .= "LEFT JOIN " . $this->tableDescription . " b ON a.parent_id=b.parent_id ";
        $q .= "ORDER BY a.date_add DESC LIMIT 7";
        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            switch ($row['state']) {
                case "dolnoslaskie":
                    $row['state'] = 'Dolnośląskie';
                    break;
                case "kujawskopomorskie":
                    $row['state'] = 'Kujawsko -Pomorskie';
                    break;
                case "lubelskie":
                    $row['state'] = 'Lubelskie';
                    break;
                case "lubuskie":
                    $row['state'] = 'Lubuskie';
                    break;
                case "lodzkie":
                    $row['state'] = 'Łódzkie';
                    break;
                case "malopolskie":
                    $row['state'] = 'Małopolskie';
                    break;
                case "mazowiecke":
                    $row['state'] = 'Mazowiedzkie';
                    break;
                case "opolskie":
                    $row['state'] = 'Opolskie';
                    break;
                case "podkarpackie":
                    $row['state'] = 'Podkarpackie';
                    break;
                case "podlaskie":
                    $row['state'] = 'Podlaskie';
                    break;
                case "pomorskie":
                    $row['state'] = 'Pomorskie';
                    break;
                case "slaskie":
                    $row['state'] = 'Śląskie';
                    break;
                case "swietokrzyskie":
                    $row['state'] = 'Świętokrzyskie';
                    break;
                case "warminskomazurskie":
                    $row['state'] = 'Warmińsko - Mazurskie';
                    break;
                case "wielkopolskie":
                    $row['state'] = 'Wielkopolskie';
                    break;
                default:
                    $row['state'] = 'Zachodnio-Pomorskie';
            }
            $result = mysql_query("SELECT title_url FROM " . $this->tableDescription . " WHERE parent_id = '" . $row['parent_id'] . "'");
            $row2 = mysql_fetch_array($result);
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row2['title_url'] . '.html';
            $date1 = date_create($row['date_add']);
            $date2 = date_create(date("Y-m-d H:i:s"));
            $dateTimeUp = date_diff($date1, $date2);
            if ($dateTimeUp->i < 1 && $dateTimeUp->h < 1) {
                $row['dateTimeUp'] = 'W tym momęcie';
            } else if ($dateTimeUp->i < 2 && $dateTimeUp->h < 1) {
                $row['dateTimeUp'] = 'ponad minutę temu';
            } else if ($dateTimeUp->h < 1 && $dateTimeUp->d < 1) {
                $row['dateTimeUp'] = 'mniej niz godzinę temu';
            } else if ($dateTimeUp->h < 2 && $dateTimeUp->d < 1) {
                $row['dateTimeUp'] = 'ponad godzinę temu';
            } else if ($dateTimeUp->d < 1 && $dateTimeUp->d < 1) {
                $row['dateTimeUp'] = 'mniej niz dobę temu';
            } else if ($dateTimeUp->d > 1) {
                $row['dateTimeUp'] = 'ponad dobę temu';
            }
            $articles[] = $row;
        }
        return $articles;
    }

    function LoadCommentsMap($pages = 0) {
        $q = "SELECT count(id) as count, state FROM comments ";
        $q .= "GROUP BY state";
        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            switch ($row['state']) {
                case "dolnoslaskie":
                    $row['state'] = 'Dolnośląskie';
                    $row['id'] = '1';
                    break;
                case "kujawskopomorskie":
                    $row['state'] = 'Kujawsko -Pomorskie';
                    $row['id'] = '2';
                    break;
                case "lubelskie":
                    $row['state'] = 'Lubelskie';
                    $row['id'] = '3';
                    break;
                case "lubuskie":
                    $row['state'] = 'Lubuskie';
                    $row['id'] = '4';
                    break;
                case "lodzkie":
                    $row['state'] = 'Łódzkie';
                    $row['id'] = '5';
                    break;
                case "malopolskie":
                    $row['state'] = 'Małopolskie';
                    $row['id'] = '6';
                    break;
                case "mazowiecke":
                    $row['state'] = 'Mazowiedzkie';
                    $row['id'] = '7';
                    break;
                case "opolskie":
                    $row['state'] = 'Opolskie';
                    $row['id'] = '8';
                    break;
                case "podkarpackie":
                    $row['state'] = 'Podkarpackie';
                    $row['id'] = '9';
                    break;
                case "podlaskie":
                    $row['state'] = 'Podlaskie';
                    $row['id'] = '10';
                    break;
                case "pomorskie":
                    $row['state'] = 'Pomorskie';
                    $row['id'] = '11';
                    break;
                case "slaskie":
                    $row['state'] = 'Śląskie';
                    $row['id'] = '12';
                    break;
                case "swietokrzyskie":
                    $row['state'] = 'Świętokrzyskie';
                    $row['id'] = '13';
                    break;
                case "warminskomazurskie":
                    $row['state'] = 'Warmińsko - Mazurskie';
                    $row['id'] = '14';
                    break;
                case "wielkopolskie":
                    $row['state'] = 'Wielkopolskie';
                    $row['id'] = '15';
                    break;
                default:
                    $row['state'] = 'Zachodnio-Pomorskie';
                    $row['id'] = '16';
            }
            $articles[] = $row;
        }
        $articles['count'] = 0;
        foreach ($articles as $art) {
            $articles['count'] = $articles['count'] + $art['count'];
        }
        return $articles;
    }

    function LoadArticlesGlowna($pages = 0) {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 0;
        }
        if ((int) $_GET['page'] < 1 or $pages < $_GET['page']) {
            $_GET['page'] = $pages;
            $start = 0;
        } else
            $start = ($pages - $_GET['page']) * $this->limit_page;

        $q = "SELECT a.*, d.title, d.title_url, d.content_short, d.content FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND a.active=1 ";
        $q .= "ORDER BY a.date_add ASC, a.id ASC LIMIT 4 ";

        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $result = mysql_query("SELECT count(id) as comm FROM comments WHERE parent_id = '" . $row['id'] . "'");
            $row2 = mysql_fetch_array($result);
            $row['comm'] = $row2['comm'];
            if ($row['comm'] == 0) {
                $row['progress'] = 0;
            } else {
                if (empty($row['progres'])) {
                    $row['progress'] = round($row['comm'] * 100 / $row['limit'], 1);
                } else {
                    $row['progress'] = $row['progres'];
                }
            }
            $row['content'] = $row['content'];
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $row['photo'] = $this->getPhotoUrl($row['photo']);
            $row['miesiac_nr'] = $GLOBALS['MIESIAC_' . date("n", strtotime($row['date_add']))];
            $articles[] = $row;
        }
        return $articles;
    }

    // funkcja laduje wszystkie sekcje
    function LoadSections($pages = 0) {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 0;
        }
        if ((int) $_GET['page'] < 1 or $pages < $_GET['page']) {
            $_GET['page'] = $pages;
            $start = 0;
        } else
            $start = ($pages - $_GET['page']) * $this->limit_page;

        $q = "SELECT section, sectioncssclass FROM " . $this->table . " GROUP BY section ORDER BY section ASC";
        $this->db->query($q);
        $sections = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $row['content'] = strip_tags($row['content']);
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $row['photo'] = $this->getPhotoUrl($row['photo']);
            $row['miesiac_nr'] = $GLOBALS['MIESIAC_' . date("n", strtotime($row['date_add']))];
            $sections[] = $row;
        }
        return $sections;
    }

    function getPages() {
        $q = "SELECT COUNT(id) FROM " . $this->table . " WHERE active=1 ";
        if ($_GET['realizacje'] && $_GET['realizacje'] == 1) {
            $q .= "AND done =1 ";
        }
        $this->db->query($q);
        $count = $this->db->get_result();
        if ($count < 1)
            $count = 1;
        return ceil($count / $this->limit_page);
    }

    function LoadFirstPage() {
        $q = "SELECT a.*, d.title, d.title_url, d.content_short, d.content FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND a.active=1 ";
        $q .= "ORDER BY a.date_add DESC, a.id DESC LIMIT " . $this->limit_home;

        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $row['content'] = strip_tags($row['content']);
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $row['photo'] = $this->getPhotoUrl($row['photo']);
            $articles[] = $row;
        }
        return $articles;
    }

    // funkcja generuje mape strony
    function LoadMap() {
        $q = "SELECT d.title, d.title_url FROM " . $this->table . " a LEFT JOIN " . $this->tableDescription . " d ON a.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND a.active=1 ORDER BY a.date_add DESC";

        $this->db->query($q);
        $articles = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $row['url'] = BASE_URL . '/' . $this->modul . '/' . $row['title_url'] . '.html';
            $articles[] = $row;
        }
        return $articles;
    }

    // funkcja zwraca linki do plikow graficznych
    function getPhotoUrl($filename) {
        $filename_s = nameThumb($filename, '_s');
        $row = array();
        if (file_exists($this->dir . '/' . $filename) and ! empty($filename))
            $row['photo'] = $this->url . '/' . $filename;
        if (file_exists($this->dir . '/' . $filename_s) and ! empty($filename_s))
            $row['small'] = $this->url . '/' . $filename_s;
        $row['name'] = $filename;
        return $row;
    }

    // funkcja uaktualnia statystyke odswiezen
    function _countAktualnosci($id) {
        $q = "UPDATE " . $this->table . " SET `count`=`count`+1 WHERE id='" . $id . "' ";
//        dump($q);die;
        $this->db->query($q);
    }

}

?>