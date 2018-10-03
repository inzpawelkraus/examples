<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'gallery.class.php';
require_once 'rejestrZmian.class.php';
require_once 'imageUploader.class.php';

class GalleryAdmin extends Gallery
{

    var $db;
    var $conf;
    var $messages;
    var $table;
    var $gallery;
    var $uploader;
    var $rejestr;
    var $dirname;
    var $url;
    var $art_id;

    function GalleryAdmin(&$root, $table, $dir)
    {
        $this->Gallery($root, $table, $dir);

        $this->uploader =  new ImageUploader($this->dir);
        $this->rejestr =  new Rejestr($root, 'rejestr');

        $this->large_width = 800;
        $this->large_height = 600;
    }

    function Add($gallery_id, $name_url, &$post)
    {

        $error = '';
        $order = 1;

        $GalleryConfig = $this->getGalleryConfig($gallery_id);


        $this->thumb_width = $GalleryConfig['width'];
        $this->thumb_height = $GalleryConfig['height'];
        $this->kadruj = $GalleryConfig['kadruj'];
        $this->watermark = $GalleryConfig['watermark'];
        $this->watermark_file = $GalleryConfig['watermark_file'];
        $this->watermark_x = $GalleryConfig['watermark_x'];
        $this->watermark_y = $GalleryConfig['watermark_y'];
        $this->watermark_position = $GalleryConfig['watermark_position'];

        $aPliki = $this->ListDir(false, $gallery_id); //mozliwy blad !!!!!
        //dump($post);

        if (is_array($post)) {
            foreach ($post as $key => $val) {
                if (strpos($key, "new_foto_") !== false) {
                    $nr = str_replace("new_foto_", "", $key);
                    if (!is_numeric($nr)) {
                        continue;
                    }

                    if (!$aPliki[$nr]) {
                        continue;
                    }

                    $kadr_x = $post['foto_kadr_x_' . $nr];
                    $kadr_y = $post['foto_kadr_y_' . $nr];

                    $this->conf->ZrobMiniatura($aPliki[$nr], $this->thumb_height, $this->thumb_width, "_s", $this->kadruj, $this->dir . "/" . $gallery_id, "", $kadr_x, $kadr_y);

                    if ($this->watermark) {
                        $this->AddWatermark($this->dir . "/" . $gallery_id . "/" . substr($aPliki[$nr], 0, strlen($aPliki[$nr]) - 4) . "_s" . "." . substr($aPliki[$nr], strlen($aPliki[$nr]) - 3, 3), $this->dir . "/watermark/" . $this->watermark_file, $this->watermark_x, $this->watermark_y, $this->watermark_position);
                    }

                    $order = $this->_getMaxOrder($gallery_id) + 1;
                    $q = "INSERT INTO " . $this->table . " SET gallery_id='" . $gallery_id . "', name='" . $aPliki[$nr] . "', orientation='', `order`='" . $order . "' ";
                    $this->db->query($q);
                }
            }
        }

        if (empty($error)) {
            return true;
        } else {
            $this->messages->setError($error);
            return false;
        }
    }

    function Delete($gallery_id, $filename)
    {
        $q = "SELECT `order` FROM " . $this->table . " WHERE gallery_id='" . $gallery_id . "' AND name='" . $filename . "'";
        $this->db->query($q);
        $order = $this->db->get_result();

        $q = "DELETE FROM " . $this->table . " WHERE gallery_id='" . $gallery_id . "' AND name='" . $filename . "'";
        $this->db->query($q);
        if ($this->db->affected_rows() > 0) {
            $min_name = nameThumb($filename, "_s");
            @unlink($this->dir . "/" . $gallery_id . "/" . $min_name);
            $q = "UPDATE " . $this->table . " SET `order`=`order`-1 WHERE `order`>'" . $order . "' AND gallery_id='" . $gallery_id . "'";
            $this->db->query($q);

            $this->messages->setInfo('Usunięto galerie zdjęć!');
            return true;
        } else {
            return false;
        }
    }

    /* funkcja kasuje wszystkie zdjecia z galerii */

    function DeleteAll($gallery_id)
    {
        $q = "SELECT name FROM " . $this->table . " WHERE gallery_id='" . $gallery_id . "'";
        $this->db->query($q);
        while ($row = & $this->db->fetch_assoc()) {
            $min_name = nameThumb($row['name'], "_s");
            @unlink($this->dir . "/" . $gallery_id . "/" . $min_name);
        }
        $this->db->query("DELETE FROM " . $this->table . " WHERE gallery_id='" . $gallery_id . "'");
        $this->messages->setInfo('Skasowano ' . $this->db->affected_rows() . ' zdjęć!');
        return true;
    }

    function DeleteGallery($id)
    {
        $this->DeleteAll($id);

        $q = "SELECT `order` FROM " . $this->tableGalleries . " WHERE id='" . $id . "'";
        $this->db->query($q);
        $order = $this->db->get_result();

        $q = "DELETE FROM " . $this->tableGalleries . " WHERE id='" . $id . "'";
        $this->db->query($q);
        $q = "DELETE FROM " . $this->tableDescription . " WHERE parent_id='" . $id . "'";
        $this->db->query($q);

        $q = "UPDATE " . $this->tableGalleries . " SET `order`=`order`-1 WHERE `order`>'" . $order . "' ";
        $this->db->query($q);
        return true;
    }

    /* funkcja dodaje nowa galerie zdjec */

    function AddGallery(&$post)
    {
        if ($post['op_page_title'] == '1' or $post['op_page_title'] == '2' or $post['op_page_title'] == '3')
            $post['page_title'] = '';
        if ($post['op_page_keywords'] == '1')
            $post['page_keywords'] = '';
        if ($post['op_page_description'] == '1')
            $post['page_description'] = '';
        $title_url = make_url($post['title'][1]);
        $post['page_title'] = addslashes(str_replace('"', '&quot;', $post['page_title']));
        $post['page_keywords'] = addslashes(str_replace('"', '&quot;', $post['page_keywords']));
        $post['page_description'] = addslashes(str_replace('"', '&quot;', $post['page_description']));
        $order = $this->_getMaxOrderGal() + 1;

        if (!$this->_titleUrlExists($title_url)) {
            $q = "INSERT INTO " . $this->tableGalleries . " SET date_add=NOW(), op_page_title='" . $post['op_page_title'] . "', ";
            $q.= "page_title='" . $post['page_title'] . "', op_page_keywords='" . $post['op_page_keywords'] . "', page_keywords='" . $post['page_keywords'] . "', ";
            $q.= "op_page_description='" . $post['op_page_description'] . "', page_description='" . $post['page_description'] . "', auth='" . $post['auth'] . "', ";
            $q.= "show_title='" . $post['show_title'] . "', show_page='" . $post['show_page'] . "', active='" . $post['active'] . "', comments='" . $post['comments'] . "', width='" . $post['width'] . "', height='" . $post['height'] . "', kadruj='" . $post['kadruj'] . "', `order`='" . $order . "', ";
            $q.= "watermark='" . $post['watermark'] . "', watermark_file='" . $post['watermark_file'] . "', watermark_x='" . $post['watermark_x'] . "', watermark_y='" . $post['watermark_y'] . "', watermark_position='" . $post['watermark_position'] . "' ";

            $this->db->query($q);
            $this->art_id = $this->db->insert_id();

            $old_umask = umask(0);
            mkdir($this->dir . "/" . $this->art_id, 0777);
            umask($old_umask);

            for ($i = 1; $i <= count($post['title']); $i++) {
                $post['title'][$i] = trim(strip_tags(stripslashes($post['title'][$i])));
                $post['title'][$i] = addslashes(str_replace('"', '&quot;', $post['title'][$i]));
                $post['content'][$i] = addslashes($post['content'][$i]);
                $post['content_short'][$i] = addslashes($post['content_short'][$i]);

                if ($i == 4) {
                    $post['title_url'][$i] = $post['title_url'][1] . "-ru";
                } else {
                    $post['title_url'][$i] = make_url($post['title'][$i]);
                }

                $q = "INSERT INTO " . $this->tableDescription . " SET parent_id='" . $this->art_id . "', language_id='" . $i . "', ";
                $q.= "title='" . $post['title'][$i] . "', title_url='" . $post['title_url'][$i] . "', content='" . $post['content'][$i] . "', ";
                $q.= "content_short='" . $post['content_short'][$i] . "', tagi='" . $post['tagi'][$i] . "' ";
                $this->db->query($q);

                $url = '/galeria/' . $post['title_url'][$i] . '.html';
                $this->rejestr->addWpis($post['title'][$i], $url, 'dodano', 'gallery');
            }

            $this->messages->setInfo($GLOBALS['_PAGE_ADD']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_EXIST']);
            return false;
        }
    }

    /* funkcja zapisuje zmiany w galerii zdjec */

    function EditGallery(&$post)
    {
        if ($post['op_page_title'] == '1' or $post['op_page_title'] == '2' or $post['op_page_title'] == '3')
            $post['page_title'] = '';
        if ($post['op_page_keywords'] == '1')
            $post['page_keywords'] = '';
        if ($post['op_page_description'] == '1')
            $post['page_description'] = '';
        $post['page_title'] = addslashes(str_replace('"', '&quot;', $post['page_title']));
        $post['page_keywords'] = addslashes(str_replace('"', '&quot;', $post['page_keywords']));
        $post['page_description'] = addslashes(str_replace('"', '&quot;', $post['page_description']));

        $title_url = make_url($post['title'][1]);

        if (!$this->_titleUrlExists($title_url) or ($title_url == $post['old_title_url'][1])) {
            // aktualizujemy artykul
            $q = "UPDATE " . $this->tableGalleries . " SET op_page_title='" . $post['op_page_title'] . "', ";
            $q.= "page_title='" . $post['page_title'] . "', op_page_keywords='" . $post['op_page_keywords'] . "', page_keywords='" . $post['page_keywords'] . "', ";
            $q.= "op_page_description='" . $post['op_page_description'] . "', page_description='" . $post['page_description'] . "', auth='" . $post['auth'] . "', ";
            $q.= "show_title='" . $post['show_title'] . "', show_page='" . $post['show_page'] . "', active='" . $post['active'] . "', comments='" . $post['comments'] . "', width='" . $post['width'] . "', height='" . $post['height'] . "', kadruj='" . $post['kadruj'] . "', `order`='" . $order . "', ";
            $q.= "watermark='" . $post['watermark'] . "', watermark_file='" . $post['watermark_file'] . "', watermark_x='" . $post['watermark_x'] . "', watermark_y='" . $post['watermark_y'] . "', watermark_position='" . $post['watermark_position'] . "' ";
            $q.= "WHERE id='" . $post['id'] . "'";

            $this->db->query($q);

            for ($i = 1; $i <= count($post['title']); $i++) {
                $post['title'][$i] = trim(strip_tags(stripslashes($post['title'][$i])));
                $post['title'][$i] = addslashes(str_replace('"', '&quot;', $post['title'][$i]));
                $post['content'][$i] = addslashes($post['content'][$i]);
                $post['content_short'][$i] = addslashes($post['content_short'][$i]);

                if ($i == 4) {
                    $post['title_url'][$i] = $post['title_url'][1] . "-ru";
                } else {
                    $post['title_url'][$i] = make_url($post['title'][$i]);
                }

                $q = "UPDATE " . $this->tableDescription . " SET title='" . $post['title'][$i] . "', title_url='" . $post['title_url'][$i] . "', content='" . $post['content'][$i] . "', ";
                $q.= "content_short='" . $post['content_short'][$i] . "', tagi='" . $post['tagi'][$i] . "' WHERE parent_id='" . $post['id'] . "' AND language_id='" . $i . "' ";
                $this->db->query($q);

                $url = '/galeria/' . $post['title_url'][$i] . '.html';
                $this->rejestr->addWpis($post['title'][$i], $url, 'zmieniono', 'gallery');
            }

            $this->messages->setInfo($GLOBALS['_PAGE_CHANGE_SEVE']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_EXIST']);
            return false;
        }
    }

    function _titleUrlExists($title_url)
    {
        $q = "SELECT COUNT(parent_id) FROM " . $this->tableDescription . " WHERE language_id='1' AND title_url='" . $title_url . "'";
        $this->db->query($q);
        return ($this->db->get_result() > 0) ? true : false;
    }

    // fotki
    function _getMaxOrder($gallery_id)
    {
        $q = "SELECT MAX(`order`) FROM " . $this->table . " WHERE gallery_id='" . $gallery_id . "' ";
        $this->db->query($q);
        return $this->db->get_result();
    }

    // pobiera nastepny id w bazie
    function _getMaxPhoto()
    {
        $q = "SELECT MAX(`id`) FROM " . $this->table . " ";
        $this->db->query($q);
        return $this->db->get_result();
    }

    // galerie
    function _getMaxOrderGal()
    {
        $q = "SELECT MAX(`order`) FROM " . $this->tableGalleries . " ";
        $this->db->query($q);
        return $this->db->get_result();
    }

    /* funkcja wczytuje opis do artykulu o podanym id */

    function LoadOpisById($id)
    {
        $q = "SELECT * FROM " . $this->tableDescription . " ";
        $q.= "WHERE parent_id='" . (int) $id . "' ";
        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $row = & mstripslashes($row);
            $opis[] = $row;
        }
        return $opis;
    }

    function MoveUp($id)
    {
        if ($item = $this->LoadItem($id)) {
            if ($item['order'] > 1) {
                $q = "UPDATE " . $this->table . " SET `order`=`order`+1 WHERE ";
                $q.= "gallery_id='" . $item['gallery_id'] . "' AND ";
                $q.= "`order`='" . ($item['order'] - 1) . "'";
                if ($this->db->query($q)) {
                    if ($this->db->query("UPDATE " . $this->table . " SET `order`=`order`-1 WHERE id='" . $id . "'")) {
                        $this->messages->setInfo('Element przeniesiony o jeden poziom w górę!');
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function MoveDown($id)
    {
        if ($item = $this->LoadItem($id)) {
            if ($item['order'] < $this->_getMaxOrder($item['gallery_id'])) {
                $q = "UPDATE " . $this->table . " SET `order`=`order`-1 WHERE ";
                $q.= "gallery_id='" . $item['gallery_id'] . "' AND ";
                $q.= "`order`='" . ($item['order'] + 1) . "'";
                if ($this->db->query($q)) {
                    if ($this->db->query("UPDATE " . $this->table . " SET `order`=`order`+1 WHERE id='" . $id . "'")) {
                        $this->messages->setInfo('Element przeniesiony o jeden poziom w dół!');
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function LoadItem($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id='" . $id . "' ");
        return $this->db->fetch_assoc();
    }

    function MoveUpGal($id)
    {
        if ($item = $this->LoadItemGal($id)) {
            if ($item['order'] > 1) {
                $q = "UPDATE " . $this->tableGalleries . " SET `order`=`order`+1 WHERE ";
                $q.= "`order`='" . ($item['order'] - 1) . "'";
                if ($this->db->query($q)) {
                    if ($this->db->query("UPDATE " . $this->tableGalleries . " SET `order`=`order`-1 WHERE id='" . $id . "'")) {
                        $this->messages->setInfo('Element przeniesiony o jeden poziom w górę!');
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function MoveDownGal($id)
    {
        if ($item = $this->LoadItemGal($id)) {
            $q = "UPDATE " . $this->tableGalleries . " SET `order`=`order`-1 WHERE ";
            $q.= "`order`='" . ($item['order'] + 1) . "'";
            if ($this->db->query($q)) {
                if ($this->db->query("UPDATE " . $this->tableGalleries . " SET `order`=`order`+1 WHERE id='" . $id . "'")) {
                    $this->messages->setInfo('Element przeniesiony o jeden poziom w dół!');
                    return true;
                }
            }
        }
        return false;
    }

    function LoadItemGal($id)
    {
        $this->db->query("SELECT * FROM " . $this->tableGalleries . " WHERE id='" . $id . "' ");
        return $this->db->fetch_assoc();
    }

    /* funkcja laduje wszystkie strony */

    function LoadOdwiedziny($limit = 50)
    {
        if (empty($_GET['page']))
            $_GET['page'] = 1;
        $q = "SELECT * FROM " . $this->tableGalleries . " ORDER BY count DESC LIMIT " . ((int) $_GET['page'] - 1) * $limit . "," . $limit;
        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $row['title'] = stripslashes($row['name']);
            $row['title_url'] = BASE_URL . '/galeria/' . $row['name_url'] . '/' . $row['id'] . '.html';
            $articles[] = $row;
            $return = true;
        }

        if ($return === true) {
            return $articles;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT']);
            return false;
        }
    }

    /* funkcja zlicza ilosc stron loga */

    function GetPagesOdwiedziny($limit = 50)
    {
        $this->db->query("SELECT COUNT(id) FROM " . $this->tableGalleries);
        $count = (int) $this->db->get_result();
        $pages = ceil($count / $limit);
        if ($pages < 1)
            $pages = 1;
        return $pages;
    }

    function DeleteServPhoto($plik, $gallery_id)
    {
        $q = "SELECT count(*) as ile FROM " . $this->table . " WHERE name='" . $plik . "' AND gallery_id='" . $gallery_id . "' ";
        $this->db->query($q);
        $row = $this->db->fetch_assoc();
        if ($row['ile'] > 0) {
            $this->messages->setError("Zdjęcie jest przypisane do galerii i nie można go usunąć");
            return false;
        }

        @unlink($this->dir . '/' . $gallery_id . "/" . $plik);
        return true;
    }

    function ListDir($dir=false, $ignore_gallery=false)//zwraca tablice plikow w katalogu
    {
        //ignore_gallery = galeria z ktorej zdjecia NIE MAJA pojawic sie na liscie

        if (!$dir) {
            $dir = $this->dir . "/" . $ignore_gallery;
        }

        $aGalPliki = array();
        if ($ignore_gallery) {
            $q = "SELECT * FROM " . $this->table . " WHERE gallery_id='" . $ignore_gallery . "'";
            $this->db->query($q);
            while ($row = $this->db->fetch_assoc()) {
                $aGalPliki[] = $row['name'];
                $aGalPliki[] = nameThumb($row['name'], "_s");
            }
        }

        $lista = array();
        $katalog = opendir($dir);
        while ($plik = readdir($katalog)) {
            if (($plik <> ".") && ($plik <> "..")) {
                if (!is_dir($dir . "/" . $plik)) {
                    if (!in_array($plik, $aGalPliki)) {
                        $lista[] = $plik;
                    }
                }
            }
        }
        closedir($katalog);
        sort($lista);

        $this->PrzeskalujZdjecia($lista, $this->dir, $ignore_gallery);

        return $lista;
    }

    function PrzeskalujZdjecia($aFiles, $dir, $gallery_id)//funkcja nadpisuje zdjecia w glownym katalogu aby zmniejszyc ich rozmiar
    {
        $licznik = 0;
        for ($i = 0; $i < count($aFiles); $i++) {
            $sizes = getimagesize($dir . "/" . $gallery_id . "/" . $aFiles[$i]);
            if ($sizes[0] > $sizes[1]) {//poziome
                if ($sizes[0] <= $this->large_width) {
                    continue;
                }
            } else {
                if ($sizes[1] <= $this->large_height) {
                    continue;
                }
            }

            //$this->conf->ZrobMiniatura($aPliki[$nr], $this -> thumb_height, $this -> thumb_width, "_s", $this -> kadruj, $this->dir."/".$gallery_id, "", $kadr_x, $kadr_y);

            $this->conf->ZrobMiniatura($aFiles[$i], $this->large_height, $this->large_width, "", 0, $dir . "/" . $gallery_id);


            $licznik++;

            if ($licznik > 5) {
                break;
            }
        }
    }

    function ZmienOpis($dane)
    {
        //dump($dane);
        if (!$dane['foto_id'])
            return false;

        $q = "update " . $this->table . " SET title_1='" . $dane['title_1'] . "', title_2='" . $dane['title_2'] . "', title_3='" . $dane['title_3'] . "', title_4='" . $dane['title_4'] . "' WHERE id='" . $dane['foto_id'] . "' LIMIT 1";
        $this->db->query($q);
        return true;
    }

    function AddWatermark($sourcefile, $watermarkfile, $start_x=0, $start_y=0, $pozycja=1)
    {
        /*
          pozycja
         * 1-lg
         * 2-pg
         * 3-ld
         * 4-pd
         */


        #
        # $sourcefile = Filename of the picture to be watermarked.
        # $watermarkfile = Filename of the 24-bit PNG watermark file.
        #

            //Get the resource ids of the pictures
        $watermarkfile_id = imagecreatefrompng($watermarkfile);

        imageAlphaBlending($watermarkfile_id, false);
        imageSaveAlpha($watermarkfile_id, true);

        $fileType = strtolower(substr($sourcefile, strlen($sourcefile) - 3));

        switch ($fileType) {
            case('gif'):
                $sourcefile_id = imagecreatefromgif($sourcefile);
                break;

            case('png'):
                $sourcefile_id = imagecreatefrompng($sourcefile);
                break;

            default:
                $sourcefile_id = imagecreatefromjpeg($sourcefile);
        }

        //Get the sizes of both pix
        $sourcefile_width = imageSX($sourcefile_id);
        $sourcefile_height = imageSY($sourcefile_id);
        $watermarkfile_width = imageSX($watermarkfile_id);
        $watermarkfile_height = imageSY($watermarkfile_id);


        if ($pozycja == 1) {
            $dest_x = $start_x;
            $dest_y = $start_y;
        } elseif ($pozycja == 2) {
            $dest_x = $sourcefile_width - $watermarkfile_width - $start_x;
            $dest_y = $start_y;
        } elseif ($pozycja == 3) {
            $dest_x = $start_x;
            $dest_y = $sourcefile_height - $watermarkfile_height - $start_y;
        } elseif ($pozycja == 4) {
            $dest_x = $sourcefile_width - $watermarkfile_width - $start_x;
            $dest_y = $sourcefile_height - $watermarkfile_height - $start_y;
        }



        // if a gif, we have to upsample it to a truecolor image
        if ($fileType == 'gif') {
            // create an empty truecolor container
            $tempimage = imagecreatetruecolor($sourcefile_width, $sourcefile_height);

            // copy the 8-bit gif into the truecolor image
            imagecopy($tempimage, $sourcefile_id, 0, 0, 0, 0, $sourcefile_width, $sourcefile_height);

            // copy the source_id int
            $sourcefile_id = $tempimage;
        }

        imagecopy($sourcefile_id, $watermarkfile_id, $dest_x, $dest_y, 0, 0, $watermarkfile_width, $watermarkfile_height);

        //Create a jpeg out of the modified picture

        switch ($fileType) {

            // remember we don't need gif any more, so we use only png or jpeg.
            // See the upsaple code immediately above to see how we handle gifs
            case('png'):
                imagepng($sourcefile_id, $sourcefile);
                break;

            default:
                imagejpeg($sourcefile_id, $sourcefile, 100);
        }


        imagedestroy($sourcefile_id);
        imagedestroy($watermarkfile_id);
    }

}

?>