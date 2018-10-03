<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/image.class.php';
require_once ROOT_PATH . '/includes/zmieniarka.class.php';
require_once ROOT_PATH . '/includes/rejestrZmian.class.php';

class ZmieniarkaAdmin extends Zmieniarka {

    var $db;
    var $conf;
    var $messages;
    var $table;
    var $tablePhotos;
    var $tableConfig;
    var $tablePrzypisanie;
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
    var $rejestr;
    var $art_id;

    function __construct(&$root, $table) {
        parent::__construct($root, $table);
        $this->rejestr = new Rejestr($root, 'rejestr');
    }

    function getThumbSize($id) {
        $thumb = array();

        $config = $this->getZmieniarkaConfig($id);
        $thumb['width'] = $config['width'];
        $thumb['height'] = $config['height'];

        return $thumb;
    }

    function getScaleSize() {
        $size = array();

        $size['width'] = $this->scale_width;
        $size['height'] = $this->scale_height;

        return $size;
    }

    function LoadZmieniarkiAdmin($active = 0) {
        $q = "SELECT * FROM " . $this->table . " ";
        $params = array();
        if ($active == 1) {
            $q.= " WHERE active=? ";
            $params[] = array(dbStatement::INTEGER, $active);
        }
        $statement = $this->db->query($q, $params);
        $rows = array();
        while ($row = $statement->fetch_assoc()) {
            $rows[] = $row;
        }

        for ($i = 0; $i < count($rows); $i++) {
            $rows[$i]['photo'] = $this->LoadRandomPhoto($rows[$i]['id']);
        }
        return $rows;
    }

    function LoadRandomPhoto($zmieniarka_id = 0) {
        $q = "SELECT * FROM " . $this->tablePhotos . " ";
        $params = array();
        if ($zmieniarka_id > 0) {
            $q.= "WHERE zmieniarka_id=? ";
            $params[] = array(dbStatement::INTEGER, $zmieniarka_id);
        }
        $q.= "ORDER BY `order` ASC LIMIT 1";
        $statement = $this->db->query($q, $params);
        if ($row = $statement->fetch_assoc()) {
            $row['src'] = $this->getPhotoUrl($row['name'], $zmieniarka_id);
            return $row;
        } else {
            return false;
        }
    }

    function LoadPhotosAdmin($zmieniarka_id = 0, $page_keywords = '') {
        if (!empty($page_keywords)) {
            $anchor = explode(',', $page_keywords);
            $liczba = count($anchor);
        }

        $q = "SELECT * FROM " . $this->tablePhotos . " ";
        $q .= "WHERE zmieniarka_id=? ";
        $q .= "ORDER BY `order` ";
        $params = array(
            array(dbStatement::INTEGER, $zmieniarka_id)
        );
        $statement = $this->db->query($q, $params);
        $items = array();
        while ($row = $statement->fetch_assoc()) {
            if (!empty($page_keywords)) {
                $row['anchor'] = trim($anchor[rand(0, $liczba - 1)]);
            }
            $row['src'] = $this->getPhotoUrl($row['name'], $zmieniarka_id);
            $items[] = $row;
        }
        return $items;
    }

    function LoadZmieniarka($id = 0) {
        $q = "SELECT * FROM " . $this->table . " ";
        $q.= "WHERE id=? ";
        $params = array(
            array(dbStatement::INTEGER, $id)
        );
        $statement = $this->db->query($q, $params);

        if ($row = $statement->fetch_assoc()) {
            return $row;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NOT_EXIST']);
            return false;
        }
    }

    function AddPhotos($zmieniarka_id, $post) {
        $error = '';
        $order = 1;

        $GalleryConfig = $this->getZmieniarkaConfig($zmieniarka_id);
        $this->thumb_width = $GalleryConfig['width'];
        $this->thumb_height = $GalleryConfig['height'];
        $this->watermark = $GalleryConfig['watermark'];
        $this->watermark_file = $GalleryConfig['watermark_file'];
        $this->watermark_x = $GalleryConfig['watermark_x'];
        $this->watermark_y = $GalleryConfig['watermark_y'];
        $this->watermark_position = $GalleryConfig['watermark_position'];

        $aPliki = $this->ListDir(false, $zmieniarka_id); //mozliwy blad !!!!!

        foreach ($post['new_foto'] as $nr => $value) {
            if (!is_numeric($nr)) {
                continue;
            }

            if (!$aPliki[$nr]) {
                continue;
            }

            $oImage = new Image($this->dir . DIRECTORY_SEPARATOR . $zmieniarka_id);
            $oImage->SetFile($aPliki[$nr]);
            $oImage->ScaleImage($this->scale_width, $this->scale_height);
            $oImage->ThumbFromCenter($this->thumb_width, $this->thumb_height, '_s');


            if ($this->watermark) {
                $filename_s = nameThumb($aPliki[$nr], '_s');
                $source = $this->dir . DIRECTORY_SEPARATOR . $zmieniarka_id . DIRECTORY_SEPARATOR . $filename_s;
                $this->AddWatermark($source, $this->dir . DIRECTORY_SEPARATOR . 'watermark' . DIRECTORY_SEPARATOR . $this->watermark_file, $this->watermark_x, $this->watermark_y, $this->watermark_position);
            }

            $order = $this->_getMaxOrder($zmieniarka_id) + 1;
            $q = "INSERT INTO " . $this->tablePhotos . " SET ";
            $q .= "zmieniarka_id=?, ";
            $q .= "name=?, ";
            $q .= "`order`=? ";
            $params = array(
                array(dbStatement::INTEGER, $zmieniarka_id),
                array(dbStatement::STRING, $aPliki[$nr]),
                array(dbStatement::INTEGER, $order)
            );
            $statement = $this->db->query($q, $params);
            if ($statement->is_success()) {
                $this->art_id = $statement->insert_id();
                $langs = $this->conf->LoadLang();
                foreach ($langs as $lang) {
                    $q = "INSERT INTO " . $this->tablePhotosDescription . " SET ";
                    $q .= "parent_id=?, ";
                    $q .= "language_id=? ";

                    $params = array(
                        array(dbStatement::INTEGER, $this->art_id),
                        array(dbStatement::INTEGER, $lang['id'])
                    );
                    $this->db->query($q, $params);
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

    function DeleteServer($zmieniarka_id, $post) {
        foreach ($post['new_foto'] as $nr => $value) {
            $name = $post['name'][$nr];
            $q = "SELECT count(*) as ile FROM " . $this->tablePhotos . " ";
            $q .= "WHERE name=? ";
            $q .= "AND zmieniarka_id=? ";
            $params = array(
                array(dbStatement::STRING, $name),
                array(dbStatement::INTEGER, $zmieniarka_id)
            );
            $statement = $this->db->query($q, $params);
            $row = $statement->fetch_assoc();
            if ($row['ile'] > 0) {
                $this->messages->setError($GLOBALS['_ADMIN_PHOTO_ATTACHED']);
                return false;
            }

            @unlink($this->dir . DIRECTORY_SEPARATOR . $zmieniarka_id . DIRECTORY_SEPARATOR . $name);
        }
    }

    function DeleteSelected($zmieniarka_id, $ids) {
        if (is_array($ids)) {
            $success = false;
            foreach ($ids as $id) {
                $q = "SELECT name, `order` FROM " . $this->tablePhotos . " WHERE id=?";
                $params = array(
                    array(dbStatement::INTEGER, $id)
                );
                $statement = $this->db->query($q, $params);
                if ($row = $statement->fetch_assoc()) {
                    $q = "DELETE FROM " . $this->tablePhotos . " WHERE id=? ";
                    $params = array(
                        array(dbStatement::INTEGER, $id)
                    );
                    $statement = $this->db->query($q, $params);
                    if ($statement->affected_rows() > 0) {
                        $q = "DELETE FROM " . $this->tablePhotosDescription . " WHERE parent_id=? ";
                        $params = array(
                            array(dbStatement::INTEGER, $id)
                        );
                        $this->db->query($q, $params);
                        $min_name = nameThumb($row['name'], "_s");
                        @unlink($this->dir . DIRECTORY_SEPARATOR . $zmieniarka_id . DIRECTORY_SEPARATOR . $min_name);
                        $q = "UPDATE " . $this->tablePhotos . " SET `order`=`order`-1 WHERE `order`>? AND zmieniarka_id=? ";
                        $params = array(
                            array(dbStatement::INTEGER, $row['order']),
                            array(dbStatement::INTEGER, $zmieniarka_id)
                        );
                        $this->db->query($q, $params);
                        $success = true;
                    } else {
                        $success = false;
                    }
                }
            }
            if ($success) {
                $this->messages->setInfo($GLOBALS['_ADMIN_PHOTOS_DETACHED']);
                return true;
            }
        } else {
            return false;
        }
    }

    /* funkcja kasuje wszystkie zdjecia z galerii */

    function DeletePhotosAll($zmieniarka_id) {
        $q = "SELECT id, name FROM " . $this->tablePhotos . " WHERE zmieniarka_id=? ";
        $params = array(
            array(dbStatement::INTEGER, $zmieniarka_id)
        );
        $statement = $this->db->query($q, $params);
        while ($row = $statement->fetch_assoc()) {
            $min_name = nameThumb($row['name'], "_s");
            @unlink($this->dir . DIRECTORY_SEPARATOR . $zmieniarka_id . DIRECTORY_SEPARATOR . $min_name);
            $q = "DELETE FROM " . $this->tablePhotosDescription . " WHERE parent_id='" . $row['id'] . "'";
            $this->db->query($q);
        }
        $q = "DELETE FROM " . $this->tablePhotos . " WHERE zmieniarka_id=? ";
        $params = array(
            array(dbStatement::INTEGER, $zmieniarka_id)
        );
        $statement = $this->db->query($q, $params);
        $info = $GLOBALS['_ADMIN_PHOTOS_DELETE'];
        $info = str_replace('#PHOTOS', $statement->affected_rows(), $info);
        $this->messages->setInfo($info);
        return true;
    }

    function DeleteZmieniarka($id) {
        $this->DeletePhotosAll($id);

        $q = "DELETE FROM " . $this->table . " WHERE id=? ";
        $params = array(
            array(dbStatement::INTEGER, $id)
        );
        $this->db->query($q, $params);

        deleteDir($this->dir . DIRECTORY_SEPARATOR . $id);

        $this->messages->setInfo($GLOBALS['_ADMIN_DELETE_SUCCESS']);
        return true;
    }

    /* funkcja dodaje nowa galerie zdjec */

    function AddZmieniarka($post) {
        $post['label'] = trim($post['label']);

        $active = isset($post['active']) ? $post['active'] : 0;
        $watermark = isset($post['watermark']) ? $post['watermark'] : 0;

        $q = "INSERT INTO " . $this->table . " SET ";
        $q .= "label=?, ";
        $q .= "active=?, ";
        $q .= "width=?, ";
        $q .= "height=?, ";
        $q .= "watermark=?, ";
        $q .= "watermark_file=?, ";
        $q .= "watermark_x=?, ";
        $q .= "watermark_y=?, ";
        $q .= "watermark_position=? ";

        $params = array(
            array(dbStatement::STRING, $post['label']),
            array(dbStatement::INTEGER, $active),
            array(dbStatement::INTEGER, $post['width']),
            array(dbStatement::INTEGER, $post['height']),
            array(dbStatement::INTEGER, $watermark),
            array(dbStatement::STRING, $post['watermark_file']),
            array(dbStatement::INTEGER, $post['watermark_x']),
            array(dbStatement::INTEGER, $post['watermark_y']),
            array(dbStatement::INTEGER, $post['watermark_position'])
        );
        $statement = $this->db->query($q, $params);
        $this->art_id = $statement->insert_id();

        if (!is_dir($this->dir)) {
            $old_umask = umask(0);
            mkdir($this->dir, 0777);
            umask($old_umask);
        }

        if (!is_dir($this->dir . DIRECTORY_SEPARATOR . $this->art_id)) {
            $old_umask = umask(0);
            mkdir($this->dir . DIRECTORY_SEPARATOR . $this->art_id, 0777);
            umask($old_umask);
        }

        $this->rejestr->addWpis($post['label'], '', 'dodano', 'zmieniarka');

        $this->messages->setInfo($GLOBALS['_ADMIN_CREATE_SUCCESS']);
        return true;
    }

    /* funkcja zapisuje zmiany w galerii zdjec */

    function EditZmieniarka($post) {
        $post['label'] = trim($post['label']);

        $active = isset($post['active']) ? $post['active'] : 0;
        $watermark = isset($post['watermark']) ? $post['watermark'] : 0;

        // aktualizujemy artykul
        $q = "UPDATE " . $this->table . " SET ";
        $q .= "label=?, ";
        $q .= "active=?, ";
        $q .= "width=?, ";
        $q .= "height=?, ";
        $q .= "watermark=?, ";
        $q .= "watermark_file=?, ";
        $q .= "watermark_x=?, ";
        $q .= "watermark_y=?, ";
        $q .= "watermark_position=? ";
        $q .= "WHERE id=? ";

        $params = array(
            array(dbStatement::STRING, $post['label']),
            array(dbStatement::INTEGER, $active),
            array(dbStatement::INTEGER, $post['width']),
            array(dbStatement::INTEGER, $post['height']),
            array(dbStatement::INTEGER, $watermark),
            array(dbStatement::STRING, $post['watermark_file']),
            array(dbStatement::INTEGER, $post['watermark_x']),
            array(dbStatement::INTEGER, $post['watermark_y']),
            array(dbStatement::INTEGER, $post['watermark_position']),
            array(dbStatement::INTEGER, $post['id'])
        );
        $this->db->query($q, $params);

        $this->rejestr->addWpis($post['label'], '', 'zmieniono', 'zmieniarka');

        $this->messages->setInfo($GLOBALS['_ADMIN_UPDATE_SUCCESS']);
        return true;
    }

    // fotki
    function _getMaxOrder($zmieniarka_id) {
        $q = "SELECT MAX(`order`) FROM " . $this->tablePhotos . " WHERE zmieniarka_id=? ";
        $params = array(
            array(dbStatement::INTEGER, $zmieniarka_id)
        );
        $statement = $this->db->query($q, $params);
        return $statement->get_result();
    }

    function _getMaxPhoto() {
        $q = "SELECT MAX(`id`) FROM " . $this->tablePhotos . " ";
        $statement = $this->db->query($q);
        return $statement->get_result();
    }

    function MoveUp($id) {
        if ($item = $this->LoadItem($id)) {
            if ($item['order'] > 1) {
                $q = "UPDATE " . $this->tablePhotos . " SET ";
                $q .= "`order`=`order`+1 ";
                $q .= "WHERE `order`=? ";
                $q .= "AND zmieniarka_id=? ";
                $params = array(
                    array(dbStatement::INTEGER, ($item['order'] - 1)),
                    array(dbStatement::INTEGER, $item['zmieniarka_id'])
                );
                $statement = $this->db->query($q, $params);
                if ($statement->is_success()) {
                    $q = "UPDATE " . $this->tablePhotos . " SET ";
                    $q .= "`order`=`order`-1 ";
                    $q .= "WHERE id=? ";
                    $params = array(
                        array(dbStatement::INTEGER, $id)
                    );
                    $statement = $this->db->query($q, $params);
                    if ($statement->is_success()) {
                        $this->messages->setInfo($GLOBALS['_ADMIN_MOVE_UP']);
                        return true;
                    }
                }
            }
        }
        return false;
    }

    function MoveDown($id) {
        if ($item = $this->LoadItem($id)) {
            $q = "UPDATE " . $this->tablePhotos . " SET ";
            $q .= "`order`=`order`-1 ";
            $q .= "WHERE `order`=? ";
            $q .= "AND zmieniarka_id=? ";
            $params = array(
                array(dbStatement::INTEGER, ($item['order'] + 1)),
                array(dbStatement::INTEGER, $item['zmieniarka_id'])
            );
            $statement = $this->db->query($q, $params);
            if ($statement->is_success()) {
                $q = "UPDATE " . $this->tablePhotos . " SET ";
                $q .= "`order`=`order`+1 ";
                $q .= "WHERE id=? ";
                $params = array(
                    array(dbStatement::INTEGER, $id)
                );
                $statement = $this->db->query($q, $params);
                if ($statement->is_success()) {
                    $this->messages->setInfo($GLOBALS['_ADMIN_MOVE_DOWN']);
                    return true;
                }
            }
        }
        return false;
    }

    function Move($id, $order_new) {
        $item = $this->LoadItem($id);
        $info = '';
        if ($item) {
            if ($item['order'] < $order_new) {
                $q = "UPDATE " . $this->tablePhotos . " SET `order`=`order`-1 ";
                $q .= "WHERE zmieniarka_id=? ";
                $q .= "AND `order`>? ";
                $q .= "AND `order`<=? ";
                $params = array(
                    array(dbStatement::INTEGER, $item['zmieniarka_id']),
                    array(dbStatement::INTEGER, $item['order']),
                    array(dbStatement::INTEGER, $order_new)
                );
                $this->db->query($q, $params);
                $info .= $GLOBALS['_ADMIN_MOVE_DOWN_MANY'];
            } else {
                $q = "UPDATE " . $this->tablePhotos . " SET `order`=`order`+1 ";
                $q .= "WHERE zmieniarka_id=? ";
                $q .= "AND `order`>=? ";
                $q .= "AND `order`<? ";
                $params = array(
                    array(dbStatement::INTEGER, $item['zmieniarka_id']),
                    array(dbStatement::INTEGER, $order_new),
                    array(dbStatement::INTEGER, $item['order'])
                );
                $this->db->query($q, $params);
                $info .= $GLOBALS['_ADMIN_MOVE_UP_MANY'];
            }
            $q = "UPDATE " . $this->tablePhotos . " SET `order`=? WHERE id=? ";
            $params = array(
                array(dbStatement::INTEGER, $order_new),
                array(dbStatement::INTEGER, $id)
            );
            $statement = $this->db->query($q, $params);
            if ($statement->is_success()) {
                $this->messages->setInfo($info);
                return true;
            }
        }
        return false;
    }

    function ZmienOpis($post) {
        if (!$post['foto_id'])
            return false;

        foreach ($post['title'] as $i => $title) {
            $post['title'][$i] = trim($title);
            $post['content'][$i] = prepareString($post['content'][$i]);
            $post['alt'][$i] = trim($post['alt'][$i]);

            $q = "SELECT * FROM " . $this->tablePhotosDescription . " ";
            $q.= "WHERE parent_id=? AND language_id=? ";
            $params = array(
                array(dbStatement::INTEGER, $post['foto_id']),
                array(dbStatement::INTEGER, $i)
            );
            $statement = $this->db->query($q, $params);
            if ($row = $statement->fetch_assoc()) {
                $q = "UPDATE " . $this->tablePhotosDescription . " SET ";
                $q .= "title=?, ";
                $q .= "content=?, ";
                $q .= "alt=? ";
                $q .= "WHERE parent_id=? ";
                $q .= "AND language_id=? ";
                $params = array(
                    array(dbStatement::STRING, $post['title'][$i]),
                    array(dbStatement::STRING, $post['content'][$i]),
                    array(dbStatement::STRING, $post['alt'][$i]),
                    array(dbStatement::INTEGER, $post['foto_id']),
                    array(dbStatement::INTEGER, $i)
                );
                $this->db->query($q, $params);
            } else {
                $q = "INSERT INTO " . $this->tablePhotosDescription . " SET ";
                $q .= "title=?, ";
                $q .= "content=?, ";
                $q .= "alt=? ";
                $q .= "parent_id=?, ";
                $q .= "language_id=? ";
                $params = array(
                    array(dbStatement::STRING, $post['title'][$i]),
                    array(dbStatement::STRING, $post['content'][$i]),
                    array(dbStatement::STRING, $post['alt'][$i]),
                    array(dbStatement::INTEGER, $post['foto_id']),
                    array(dbStatement::INTEGER, $i)
                );
                $this->db->query($q, $params);
                $this->db->query($q);
            }
        }
        return true;
    }

    function SaveThumb($post) {
        if (!$post['foto_id'])
            return false;

        $photo = $this->LoadItem($post['foto_id']);
        $config = $this->getZmieniarkaConfig($post['zmieniarka_id']);
        $oImage = new Image($this->dir . DIRECTORY_SEPARATOR . $post['zmieniarka_id']);
        $oImage->SetFile($photo['name']);
        $oImage->Thumb($post['x'], $post['y'], $post['x2'], $post['y2'], $config['width'], $config['height'], '_s');

        return true;
    }

    function LoadItem($id) {
        $q = "SELECT * FROM " . $this->tablePhotos . " WHERE id=? ";
        $params = array(
            array(dbStatement::INTEGER, $id)
        );
        $statement = $this->db->query($q, $params);
        if ($row = $statement->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }

    function LoadPhotoForEdit($id) {
        $q = "SELECT * FROM " . $this->tablePhotos . " WHERE id=? ";
        $params = array(
            array(dbStatement::INTEGER, $id)
        );
        $statement = $this->db->query($q, $params);

        if ($row = $statement->fetch_assoc()) {
            if (file_exists($this->dir . DIRECTORY_SEPARATOR . $row['zmieniarka_id'] . DIRECTORY_SEPARATOR . $row['name'])) {
                $row['photo']['src'] = $this->url . '/' . $row['zmieniarka_id'] . '/' . $row['name'];
                $temp = getimagesize($this->dir . DIRECTORY_SEPARATOR . $row['zmieniarka_id'] . DIRECTORY_SEPARATOR . $row['name']);
                $row['photo']['size']['width'] = $temp[0];
                $row['photo']['size']['height'] = $temp[1];
                $row['photo']['name'] = $row['name'];
            }

            $filename = nameThumb($row['name'], "_s");
            if (file_exists($this->dir . DIRECTORY_SEPARATOR . $row['zmieniarka_id'] . DIRECTORY_SEPARATOR . $filename)) {
                $row['small']['src'] = $this->url . '/' . $row['zmieniarka_id'] . '/' . $filename;
                $temp = getimagesize($this->dir . DIRECTORY_SEPARATOR . $row['zmieniarka_id'] . DIRECTORY_SEPARATOR . $filename);
                $row['small']['size']['width'] = $temp[0];
                $row['small']['size']['height'] = $temp[1];
            }

            return $row;
        }

        return false;
    }

    function LoadPhotoOpisForEdit($id) {
        $q = "SELECT * FROM " . $this->tablePhotosDescription . " ";
        $q.= "WHERE parent_id=? ";
        $params = array(
            array(dbStatement::INTEGER, $id)
        );
        $statement = $this->db->query($q, $params);
        $opis = array();
        while ($row = $statement->fetch_assoc()) {
            $opis[$row['language_id']] = $row;
        }
        return $opis;
    }

    function ListDir($dir = false, $ignore_id = false) {//zwraca tablice plikow w katalogu
        //ignore_gallery = galeria z ktorej zdjecia NIE MAJA pojawic sie na liscie
        if (!$dir) {
            $dir = $this->dir . DIRECTORY_SEPARATOR . $ignore_id;
        }

        if (!is_dir($dir)) {
            @mkdir($dir);
        }

        $aGalPliki = array();
        if ($ignore_id) {
            $q = "SELECT * FROM " . $this->tablePhotos . " WHERE zmieniarka_id=? ";
            $params = array(
                array(dbStatement::INTEGER, $ignore_id)
            );
            $statement = $this->db->query($q, $params);
            while ($row = $statement->fetch_assoc()) {
                $aGalPliki[] = $row['name'];
                $aGalPliki[] = nameThumb($row['name'], "_s");
            }
        }

        $lista = array();
        $katalog = opendir($dir);
        while ($plik = readdir($katalog)) {
            if (($plik <> ".") && ($plik <> "..")) {
                if (!is_dir($dir . DIRECTORY_SEPARATOR . $plik)) {
                    if (!in_array($plik, $aGalPliki)) {
                        $lista[] = $plik;
                    }
                }
            }
        }
        closedir($katalog);
        sort($lista);

        return $lista;
    }

    function AddWatermark($sourcefile, $watermarkfile, $start_x = 0, $start_y = 0, $pozycja = 1) {
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