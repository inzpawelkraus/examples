<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'files.class.php';
require_once( 'upload/uploadException.class.php' );
require_once( 'upload/uploadManager.class.php' );
require_once( 'upload/uploadedFile.class.php' );

class FilesAdmin extends Files {

    var $db;
    var $conf;
    var $messages;
    var $tpl;
    var $table;
    var $tableDescription;
    var $dir;
    var $subdir;
    var $url;

    function FilesAdmin(&$root, $modul = 'files') {
        $this->Files($root, $modul);
    }

    function LoadFilesAdmin($parent_id, $parent_type, $modul) {
        $q = "SELECT * FROM " . $this->table . " WHERE parent_id='" . $parent_id . "' AND module_name='" . $modul . "' AND parent_type='" . $parent_type . "' ";

        $this->db->query($q);
        $files = array();
        while ($row = $this->db->fetch_assoc()) {
            $row['url'] = $this->url . '/' . $this->subdir[$row['parent_type']] . '/' . $row['parent_id'] . '/' . $row['filename'];
            $files[] = $row;
        }
        foreach ($files as $key => $file) {
            $files[$key]['opis'] = $this->LoadOpisById($file['id']);
        }
        return $files;
    }

    // funkcja wczytuje opis do artykulu o podanym id
    function LoadOpisById($id) {
        $q = "SELECT * FROM " . $this->tableDescription . " ";
        $q.= "WHERE parent_id='" . (int) $id . "' ";
        $this->db->query($q);
        $opis = array();
        while ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            $opis[$row['language_id']] = $row;
        }
        return $opis;
    }

    // funkcja dodaje plik
    function Add(&$post, &$files, $modul) {
        $dir = $this->dir . DIRECTORY_SEPARATOR . $this->subdir[$post['parent_type']] . DIRECTORY_SEPARATOR . $post['parent_id'];
        if (!is_dir($this->dir)) {
            $old_umask = umask(0);
            mkdir($this->dir, 0777);
            umask($old_umask);
        }
        if (!is_dir($this->dir . DIRECTORY_SEPARATOR . $this->subdir[$post['parent_type']])) {
            $old_umask = umask(0);
            mkdir($this->dir . DIRECTORY_SEPARATOR . $this->subdir[$post['parent_type']], 0777);
            umask($old_umask);
        }
        if (!is_dir($dir)) {
            $old_umask = umask(0);
            mkdir($dir, 0777);
            umask($old_umask);
        }

        if (!empty($files['plik']['name'])) {
            $oFile = uploadManager::get('plik');

            if (!$oFile->isOk())
                throw new uploadException($oFile->getErrorAsString());

            if (!$oFile->isValidExt('pdf', 'doc', 'txt', 'rtf', 'mpg', 'avi', 'zip', 'swf', 'jpg')) {
                $this->messages->setError("Niepoprawne rozszerzenie pliku");
                return false;
            }

            if (!$oFile->isValidSize("20000 KB")) {
                $this->messages->setError("Plik jest za duży");
                return false;
            }

            $q = "INSERT INTO " . $this->table . " SET ";
            $q .= "parent_id='" . $post['parent_id'] . "', ";
            $q .= "module_name='" . $modul . "', ";
            $q .= "parent_type='" . $post['parent_type'] . "' ";
            if ($this->db->query($q)) {
                $this->art_id = $this->db->insert_id();

                $filename = changeFilename($post['name'][0], '', $files['plik']['name']);
                move_uploaded_file($files['plik']['tmp_name'], $dir . DIRECTORY_SEPARATOR . $filename);
                $q = "UPDATE " . $this->table . " SET filename='" . $filename . "' WHERE id='" . $this->art_id . "'";
                $this->db->query($q);

                foreach ($post['name'] as $i => $name) {
                    $post['name'][$i] = trim(strip_tags(stripslashes($post['name'][$i])));

                    $q = "INSERT INTO " . $this->tableDescription . " SET ";
                    $q .= "parent_id='" . $this->art_id . "', ";
                    $q .= "language_id='" . $i . "', ";
                    $q .= "name='" . $post['name'][$i] . "' ";
                    $this->db->query($q);
                }
            }

            $this->messages->setInfo($GLOBALS['_FILE_ADD']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_FILE_NO_ADD']);
            return false;
        }
    }

    // funkcja zapisuje zmiany dla pliku
    function Edit(&$post, &$files) {
        $dir = $this->dir . DIRECTORY_SEPARATOR . $this->subdir[$post['parent_type']] . DIRECTORY_SEPARATOR . $post['parent_id'];
        if (!is_dir($this->dir)) {
            $old_umask = umask(0);
            mkdir($this->dir, 0777);
            umask($old_umask);
        }
        if (!is_dir($this->dir . DIRECTORY_SEPARATOR . $this->subdir[$post['parent_type']])) {
            $old_umask = umask(0);
            mkdir($this->dir . DIRECTORY_SEPARATOR . $this->subdir[$post['parent_type']], 0777);
            umask($old_umask);
        }
        if (!is_dir($dir)) {
            $old_umask = umask(0);
            mkdir($dir, 0777);
            umask($old_umask);
        }

        if (!empty($files['plik']['name'])) {
            $oFile = uploadManager::get('plik');

            if (!$oFile->isOk())
                throw new uploadException($oFile->getErrorAsString());

            if (!$oFile->isValidExt('pdf', 'doc', 'txt', 'rtf', 'mpg', 'avi', 'zip', 'swf', 'jpg')) {
                $this->messages->setError("Niepoprawne rozszerzenie pliku");
                return false;
            }

            if (!$oFile->isValidSize("20000 KB")) {
                $this->messages->setError("Plik jest za duży");
                return false;
            }

            $this->DeletePlik($post['id']);
            $filename = changeFilename($post['name'][1], '', $files['plik']['name']);
            move_uploaded_file($files['plik']['tmp_name'], $dir . DIRECTORY_SEPARATOR . $filename);
            $q = "UPDATE " . $this->table . " SET filename='" . $filename . "' WHERE id='" . $post['id'] . "'";
            $this->db->query($q);
        }
        
        foreach ($post['name'] as $i => $name) {
            $post['name'][$i] = trim(strip_tags(stripslashes($name)));

            $q = "UPDATE " . $this->tableDescription . " SET ";
            $q .= "name='" . $post['name'][$i] . "' ";
            $q .= "WHERE parent_id='" . $post['id'] . "' ";
            $q .= "AND language_id='" . $i . "' ";
            $this->db->query($q);
        }

        return true;
    }

    // funckcja kasuje plik
    function DeletePlik($id) {
        $q = "SELECT * FROM " . $this->table . " WHERE id='" . $id . "'";
        $this->db->query($q);
        if ($plik = $this->db->fetch_assoc()) {
            $dir = $this->dir . DIRECTORY_SEPARATOR . $this->subdir[$plik['parent_type']] . DIRECTORY_SEPARATOR . $plik['parent_id'];
            if (!empty($plik['filename'])) {
                if (file_exists($dir . DIRECTORY_SEPARATOR . $plik['filename']))
                    unlink($dir . DIRECTORY_SEPARATOR . $plik['filename']);
                $q = "UPDATE " . $this->table . " SET filename='' WHERE id='" . $id . "'";
                $this->db->query($q);
            }
            $this->messages->setInfo($GLOBALS['_PAGE_FOTO_DEL']);
        }
        return true;
    }

    // funckcja kasuje plik
    function Delete($id) {
        $this->DeletePlik($id);
        $q = "DELETE FROM " . $this->table . " WHERE id='" . $id . "'";
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

    // funckcja kasuje wszytkie pliki dla konkretnego obiektu
    function DeleteAll($parent_id, $parent_type) {
        $q = "SELECT id FROM " . $this->table . " ";
        $q .= "WHERE parent_id='" . $parent_id . "' ";
        $q .= "AND parent_type='" . $parent_type . "' ";

        $this->db->query($q);

        $ids = array();
        while ($row = $this->db->fetch_assoc()) {
            $ids[] = $row['id'];
        }

        foreach ($ids as $id) {
            $this->Delete($id);
        }

        return true;
    }

}
?>