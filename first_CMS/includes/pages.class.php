<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'mailer.class.php';

class Pages {

    var $db;
    var $conf;
    var $messages;
    var $tpl;
    var $table;
    var $tableMenu;
    var $tablePages;
    var $tableNews;
    var $tableGallery;
    var $tableSearch;
    var $dir;
    var $url;
    var $limit_home;
    var $limit_page;
    var $limit_admin;
    var $limit_rss;

    function Pages(&$root, $table = 'pages') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;
        $this->table = DB_PREFIX . $table;
        $this->tableMenu = DB_PREFIX . 'menu';
        $this->tablePages = DB_PREFIX . 'pages';
        $this->tableAktualnosci = DB_PREFIX . 'aktualnosci';
        $this->tableGallery = DB_PREFIX . 'gallery';
        $this->tableSearch = DB_PREFIX . 'search';
        $this->tableDescription = DB_PREFIX . $table . '_description';
        $this->tableMenuDescription = DB_PREFIX . 'menu_description';
        $this->dir = ROOT_PATH . '/upload/pages';
        $this->url = BASE_URL . '/upload/pages';
        $this->limit_home = $this->conf->vars['limit_home'];
        $this->limit_page = $this->conf->vars['limit_page'];
        $this->limit_admin = $this->conf->vars['limit_admin'];
        $this->limit_rss = $this->conf->vars['limit_rss'];

        $this->dirSiteMap = ROOT_PATH;
        $this->mail = new Mailer($root);
    }

    function Load($strTitleUrl) {
        if ($article = $this->LoadArticle($strTitleUrl))
            return $article;
        elseif ($id = $this->LoadIdByName($strTitleUrl)) {
            if ($article = $this->LoadArticleById($id))
                redirect301(BASE_URL . '/' . $article['title_url'] . '.html');
            else
                return false;
        } else
            return false;
    }

    /* funkcja laduje artykul o podanym tytule */

    function LoadArticle($strTitleUrl) {
        $q = "SELECT s.*, d.* FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND d.title_url='" . addslashes($strTitleUrl) . "'";

        $this->db->query($q);
        if ($row = $this->db->fetch_assoc()) {
            $row['title'] = stripslashes($row['title']);
            $row['content'] = stripslashes($row['content']);
            $row['content'] = str_replace('class="fancybox"', 'class="fancybox" rel="fancybox"', $row['content']);

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
                $row['page_description'] = $row['page_description'];
            elseif ($row['op_page_description'] == '7')
                $row['page_description'] = $row['page_description'] . ' - ' . DESCRIPTION;
            if (!empty($row['tagi'])) {
                $row['tagi_url'] = explode('|', str_replace(' ', '-', $row['tagi']));
                $row['tagi'] = explode('|', $row['tagi']);
            }
            $row['url'] = BASE_URL . '/' . $row['title_url'] . '.html';
            return $row;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT_EXIST']);
            return false;
        }
    }

    // funkcja laduje artykul odpowiedniego typu
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

    function LoadUrlByTyp($typ) {
        $q = "SELECT d.title_url FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND s.typ='" . $typ . "'";

        $this->db->query($q);
        if ($row = $this->db->fetch_assoc()) {
            return BASE_URL . '/' . $row['title_url'] . '.html';
        } else {
            return;
        }
    }

    // funkcja laduje artykul odpowiedniego typu
    function LoadType($typ) {
        $q = "SELECT s.*, d.* FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND s.typ='" . $typ . "'";

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

    /* funkcja laduje tytuly strony do manu w PA */

    function LoadTitles($lang) {
        $this->db->query("SELECT s.id, d.title, d.title_url FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id WHERE d.language_id='" . $lang . "' ORDER BY title ASC");
        $i = 0;
        while ($row = $this->db->fetch_assoc()) {
            $row['title'] = stripslashes($row['title']);
            $pages[$i++] = $row;
        }
        return $pages;
    }

    /* funkcja przeszukuje tabele */

    function Search($keyword) {
        $keyword = strip_tags($keyword);
        $q = "SELECT s.*, d.* FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' AND s.active=1 AND ";
        $q .= "(d.title LIKE '%" . addslashes($keyword) . "%' OR d.content LIKE '%" . addslashes($keyword) . "%' OR d.content_short LIKE '%" . addslashes($keyword) . "%' OR d.tagi LIKE '%" . addslashes($keyword) . "%') ";
        $q .= "ORDER BY d.title ASC";

        $this->db->query($q);
        $found = 0;
        while ($row = $this->db->fetch_assoc()) {
            $row['content_short'] = strip_tags(stripslashes($row['content_short']));
            $row['content_short'] = preg_replace('/(' . $keyword . ')/i', '<span>\\1</span>', $row['content_short']);
            $row['url'] = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/' . $row['title_url'] . '.html';
            $result[] = $row;
            $found++;
        }
        if ($found > 0) {
            return $result;
        } else {
            return false;
        }
    }

    function getTop($id) {
        $filename = 'top-' . $id . '.jpg';
        if (file_exists($this->dir . '/' . $filename)) {
            return $this->url . '/' . $filename;
        } else {
            return false;
        }
    }

    /* funkcja uaktualnia statystyke odswiezen */

    function _countPage($id) {
        $q = "UPDATE " . $this->table . " SET `count`=`count`+1 WHERE id='" . $id . "' ";
        $this->db->query($q);
    }

    function _countSearch($keyword, $ilosc) {
        $q = "UPDATE " . $this->tableSearch . " SET `count`=`count`+1, `ilosc`='" . $ilosc . "' WHERE keyword='" . $keyword . "' ";
        $this->db->query($q);

        if (!$this->db->affected_rows()) {
            $q = "INSERT INTO `" . $this->tableSearch . "` VALUES ('', '" . $keyword . "', '" . $ilosc . "', '1')";
            $this->db->query($q);
        }
    }

    /* funkcja generuje RSS */

    function LoadRss() {
        $q = "SELECT s.*, d.* FROM " . $this->table . " s LEFT JOIN " . $this->tableDescription . " d ON s.id=d.parent_id ";
        $q .= "WHERE d.language_id='" . _ID . "' ORDER BY s.date_add DESC ";
        $q .= "LIMIT " . $this->limit_rss;

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
            $row['category_name'] = $GLOBALS['_PAGE_PAGES'];
            $row['url'] = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/' . $row['title_url'] . '.html';
            $articles[] = $row;
        }
        return $articles;
    }

    /* funkcja emial kontaktowy */

    function sendKontakt($data) {
        require_once ROOT_PATH . '/includes/aktualnosciAdmin.class.php';
        require_once ROOT_PATH . '/includes/gallery.class.php';
        require_once ROOT_PATH . '/includes/filesAdmin.class.php';

        $modul = 'petycje'; // nazwa modulu, tabela w bazie, link w adresie
        $oFiles = new FilesAdmin($root);
        $oAktualnosci = new AktualnosciAdmin($root, $modul);
        $oGallery = new Gallery($root, 'gallery', 'gallery');
        $config = &$root->conf;
        $files_type = Files::NEWS;
        if (checkToken($data['tokenid'], $data['token'])) {
            if (empty($data['imie'])) {
                $this->messages->setMessage('error_contact', "Wpisz Imię i Nazwisko wnioskodawcy");
                return false;
            } elseif (empty($data['email'])) {
                $this->messages->setMessage('error_contact', "Wpisz email wnioskodawcy");
                return false;
            } elseif (empty($data['tresc'])) {
                $this->messages->setMessage('error_contact', "Wpisz treść petycji");
                return false;
            } elseif (empty($data['age'])) {
                $this->messages->setMessage('error_contact', "Wpisz wiek wnioskodawcy");
                return false;
            } elseif (empty($data['agree'])) {
                $this->messages->setMessage('error_contact', "Zaakceptuj zgodę");
                return false;
            } elseif (!checkEmail($data['email'])) {
                $this->messages->setMessage('error_contact', $GLOBALS['_USER_BAD_EMAIL']);
                return false;
            } else {
                $_POST['front'] = 1;
                $oAktualnosci->Add($_POST, $_FILES);
                $this->modul = 'petycje';
                $this->table = 'petycje';
                $this->tableDescription = 'petycje_description';


                
//                --------------
//                ------------------
//                dump($_POST);die;
//                $this->modul = 'petycje';
//                $this->table = 'petycje';
//                $this->tableDescription = 'petycje_description';
//
//                
//                $q = "INSERT INTO " . $this->table . " SET "
//                        . "date_add='" . date("Y-m-d") . "', "
//                        . "op_page_title='', "
//                        . "page_title='', "
//                        . "op_page_keywords='', "
//                        . "page_keywords='', "
//                        . "op_page_description='', "
//                        . "page_description='', "
//                        . "auth='', "
//                        . "slider='', "
//                        . "progres='', "
//                        . "done='', "
//                        . "fbshare='', "
//                        . "gallery_id='1', "
//                        . "show_title='0', "
//                        . "active='0', "
//                        . "front='1', "
//                        . "section='1', "
//                        . "comments='0' ";
//                if ($this->db->query($q)) {
//                    $this->art_id = $this->db->insert_id();
//                        $q = "INSERT INTO " . $this->tableDescription . " SET "
//                                . "parent_id='".$this->art_id."', "
//                                . "language_id='1', "
//                                . "title='" . $_POST['tytul'] . "', "
//                                . "title_url='sample', "
//                                . "content='" . $_POST['tresc'] . "', "
//                                . "content_short='', "
//                                . "tagi='' ";
//                        $this->db->query($q);
//                        $url = '/' . $this->modul . '.html';
//                    $this->messages->setInfo($GLOBALS['_PETITION_ADD']);
//                    return true;
//                } else {
//                    $this->messages->setError($GLOBALS['_PETITION_NO_ADD']);
//                    return false;
//                }
//                -----------------------------
//                $data = & mstrip_tags($data);
//                $temat = "Wiadomość z formularza kontaktowego";
//
//                if ($data['temat'] == 1) {
//                    $tresc = "Temat: Rezerwacja pokoju<br />";
//                } elseif ($data['temat'] == 2) {
//                    $tresc = "Temat: Organizacja konferencji<br />";
//                } elseif ($data['temat'] == 3) {
//                    $tresc = "Temat: Pozostałe<br />";
//                }
//
//                $tresc .= "Imię i nazwisko: " . $data['imie'] . '<br />';
//                $tresc .= "Telefon: " . $data['tel'] . "</br>";
//                $tresc .= "Email: " . $data['email'] . '<br /><br />';
//                $tresc .= $data['tresc'];
//                $this->mail->setSubject($temat);
//                $this->mail->setBody($tresc);
//
//
//                if ($this->mail->sendHTML(BIURO_EMAIL, $data['email'])) {
//                    $this->messages->setInfo($GLOBALS['_PAGE_SEND']);
//                    return true;
//                } else {
//                    $this->messages->setMessage('error_contact', $GLOBALS['_PAGE_NO_SEND']);
//                    return false;
//                }
            }
        } else {
            $this->messages->setMessage('error_contact', $GLOBALS['_PAGE_CHECK_TOKEN']);
            return false;
        }
    }

// funkcja sprawdza czy jest wykonana aktualizacja
    function sprawdzAktualizacje($od, $do) {
        $h = date('H');
        if ($od <= $h && $h <= $do) {
            $data = AKTUALIZACJA;
            if ($data >= date('Y-m-d'))
                return true;
            return false;
        }
        return true;
    }

    // --------------------------- sitemap.xml
// funkcja generuje mape strony w XML
    function sitemapXML() {
        $xmltext = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
';

        $xmltext .= $this->LoadGlownaXML();
        $xmltext .= $this->LoadMenuXML();
        $xmltext .= $this->LoadXML($this->tablePages, '', '0.8');
        $xmltext .= $this->LoadXML($this->tableAktualnosci, 'aktualnosci/', '0.8');
        $xmltext .= $this->LoadGalleryXML();

        $xmltext .= '
</urlset>';

        $file3 = fopen($this->dirSiteMap . '/sitemap.xml', 'w');
        fwrite($file3, $xmltext);
        fclose($file3);

        return true;
    }

    /* funkcja laduje artykuly */

    function LoadGlownaXML() {
        $lastmod = date('Y-m-d') . 'T' . date('H:i:s') . '+00:00';
        $changefreq = 'daily';

        $article = '
<url>
	<loc>http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/</loc>
	<lastmod>' . $lastmod . '</lastmod>
	<changefreq>' . $changefreq . '</changefreq>
	<priority>1.0</priority>
</url>';

        return $article;
    }

    /* funkcja laduje artykuly */

    function LoadMenuXML() {
        $lastmod = date('Y-m-d') . 'T' . date('H:i:s') . '+00:00';
        $changefreq = 'daily';
        $q = "SELECT d.url, m.type FROM " . $this->tableMenu . " m LEFT JOIN " . $this->tableMenu . "_description d ON m.id=d.parent_id WHERE d.language_id='1' AND m.type='module' ORDER BY d.name ASC";
        $this->db->query($q);
        $urls = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $url = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/' . $row['url'] . '.html';
            if (!in_array($url, $urls)) {
                if ($row['url'] != 'main') {
                    $urls[] = $url;
                }
            }
        }
        $article = '';
        foreach ($urls as $url) {
            $article .= '
<url>
	<loc>' . $url . '</loc>
	<lastmod>' . $lastmod . '</lastmod>
	<changefreq>' . $changefreq . '</changefreq>
	<priority>0.9</priority>
</url>';
        }
        return $article;
    }

    /* funkcja laduje artykuly */

    function LoadXML($table, $link, $pri) {
        $lastmod = date('Y-m-d') . 'T' . date('H:i:s') . '+00:00';
        $changefreq = 'daily';

        $q = "SELECT d.title_url, d.tagi FROM " . $table . " a LEFT JOIN " . $table . "_description d ON a.id=d.parent_id WHERE d.language_id='1' AND a.active=1 ORDER BY d.title ASC";

        $this->db->query($q);
        $article = '';
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $t = explode('|', str_replace(' ', '-', $row['tagi']));

            $article .= '
<url>
	<loc>http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/' . $link . $row['title_url'] . '.html</loc>
	<lastmod>' . $lastmod . '</lastmod>
	<changefreq>' . $changefreq . '</changefreq>
	<priority>' . $pri . '</priority>
</url>';
            if (count($t) > 1) {
                foreach ($t as $d) {
                    $article .= '
<url>
	<loc>http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/szukaj/' . $d . '</loc>
	<priority>0.6</priority>
	<lastmod>' . $lastmod . '</lastmod>
	<changefreq>' . $changefreq . '</changefreq>
</url>';
                }
            }
        }
        return $article;
    }

    /* funkcja laduje galerie */

    function LoadGalleryXML() {
        $lastmod = date('Y-m-d') . 'T' . date('H:i:s') . '+00:00';
        $changefreq = 'daily';

        $q = "SELECT g.id, d.title_url FROM " . $this->tableGallery . " g LEFT JOIN " . $this->tableGallery . "_description d ON g.id=d.parent_id WHERE d.language_id='1' AND g.active=1 ORDER BY d.title ASC";

        $this->db->query($q);
        $article = '';
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);

            $article .= '
<url>
	<loc>http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/galeria/' . $row['title_url'] . '.html</loc>
	<lastmod>' . $lastmod . '</lastmod>
	<changefreq>' . $changefreq . '</changefreq>
	<priority>0.7</priority>
</url>';
        }
        return $article;
    }

}

?>