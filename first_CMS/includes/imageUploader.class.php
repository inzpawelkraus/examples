<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'image.class.php';

class ImageUploader {

    var $upload_dir;
    var $name;
    var $tmp_name;
    var $new_name;
    var $type;
    var $error;
    var $size;
    var $resizer;

    function ImageUploader($path) {
        $this->upload_dir = $path;
        $this->resizer = new Image();
    }

    /* funkcja kasuje zmienne, na ktorych operuje klasa */

    function clearVars() {
        unset($this->name);
        unset($this->tmp_name);
        unset($this->new_name);
        unset($this->type);
        unset($this->error);
        unset($this->size);
        return true;
    }

    function AddWatermark($src, $znak) {

        $this->resizer->AddWatermark($src, $znak);
        //$this-> resizer->AddWatermark($this -> new_name, $this -> upload_dir."/znak_wodny.png");
    }

    /* dodajemy plik, na ktorym bedziemy operowac */

    function AddFile(&$userfile) {
        $this->clearVars();

        $this->name = $userfile['name'];
        $this->tmp_name = $userfile['tmp_name'];
        $type = getimagesize($this->tmp_name);
        $this->szerokosc = $type[0];
        $this->wysokosc = $type[1];
        switch ($type[2]) {
            case 1 : $this->type = 'image/gif';
                break;
            case 2 : $this->type = 'image/jpeg';
                break;
            case 3 : $this->type = 'image/png';
                break;
            default: $this->type = 'unkown';
        }
        $this->error = $userfile['error'];
        $this->size = $userfile['size'];
        return $this->wysokosc;
    }

    /* funkcja przenosi plik w odpowiednie miejsce na serwerze */

    function Upload($name = '', $thumbnail = 0, $thumbnail_max_height = 0, $append = '_s', $kadrowanie = 0) {
        $name = empty($name) ? substr(md5($this->tmp_name . time()), 0, 250) : $name;
        // sprawdzamy czy plik jest obrazkiem

        if ($this->_fileIsValidImage() === true) {
            // generujemy identyfikator dla pliku
            $this->new_name = $this->upload_dir . '/' . $name;
            if (file_exists($this->new_name)) {
                if (!unlink($this->new_name)) {
                    $this->_setError(7);
                    return false;
                }
            }
            // przenosimy plik do katalogu z plikami uploadowanymi

            if (move_uploaded_file($this->tmp_name, $this->new_name)) {
                chmod($this->new_name, 0644);
                // tworzymy miniaturke	
                if ((int) $thumbnail > 0) {
                    $this->resizer->addImage($this->new_name, $append);
                    $this->resizer->createThumb($thumbnail, false, $thumbnail_max_height, $kadrowanie); // zmieniamy rozmiar obrazka
                }
                return true;
            } else {
                $this->_setError(8);
                return false;
            }
        } else {
            return false;
        }
    }

    /* funkcja tworzy miniaturke */

    function Thumb($width = 0, $height = 0, $append = '_s', $kadrowanie = 0) {
        if ((int) $width > 0) {
            if ($this->resizer->addImage($this->new_name, $append)) {
                $this->resizer->createThumb($width, false, $height, $kadrowanie); // zmieniamy rozmiar obrazka
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    /* funkcja zwraca prawdziwa nazwe uploadowanego pliku */

    function GetRealName() {
        return str_replace($this->upload_dir . '/', '', $this->new_name);
    }

    /* funkcja zwraca typ obrazka */

    function getImageType() {
        switch ($this->type) {
            case 'image/gif' : return 'gif';
                break;
            case 'image/jpeg' : return 'jpg';
                break;
            case 'image/png' : return 'png';
                break;
            default : return false;
        }
    }

    /* funkcja tlumaczy kod bledu */

    function ErrorMsg() {
        switch ($this->error) {
            // kody bledow ktore generuje php
            case 0 :
                $msg = 'Plik <b>' . $this->name . '</b> został poprawnie wysłany!';
                break;
            case 1 :
                $msg = 'Plik <b>' . $this->name . '</b> przekracza maksymalny dopuszczalny rozmiar podany w php.ini!';
                break;
            case 2 :
                $msg = 'Plik <b>' . $this->name . '</b> przekracza maksymalny dopuszczalny rozmiar podany w formularzu!';
                break;
            case 3 :
                $msg = 'Plik <b>' . $this->name . '</b> został tylko częściowo wysłany!';
                break;
            case 4 :
                $msg = 'Plik <b>' . $this->name . '</b> nie został wysłany przez formularz!';
                break;
            // kody bledow ktore generuje skrypt
            case 5 :
                $msg = 'Plik <b>' . $this->name . '</b> nie jest obrazkiem! Obsługiwane formaty plików to GIF, JPEG, PNG.';
                break;
            case 6 :
                $msg = 'Plik <b>' . $this->name . '</b> nie został wysłany poprzez formularz!';
                break;
            case 7 :
                $msg = 'Identyfikator wygenerowany dla pliku <b>' . $this->name . '</b> już jest zajęty! ';
                $msg.= 'Spróbuj wysłać plik ponownie, żeby wygenerować nowy identyfikator.';
                break;
            case 8 :
                $msg = 'Plik <b>' . $this->name . '</b> nie może zostać skopiowany na serwer! ';
                $msg.= 'Sprawdź uprawnienia do zapisu w katalogu do uploadu (' . $this->new_name . ').';
                break;
            default :
                $msg = 'Nieoczekiwany błąd!';
        }
        return $msg;
    }

    /* funkcja ustawia kod bledu i kasuje plik tymczasowy */

    function _setError($errorCode) {
        $this->error = $errorCode;
        if (file_exists($this->tmp_name)) {
            unlink($this->tmp_name);
        }
        return true;
    }

    /* funkcja sprawdza czy plik jest obrazkiem */

    function _fileIsValidImage() {
        // sprawdzamy czy plik zostal uploadowany bez bledow
        if ($this->error == 0) {
            // sprawdzamy czy podany plik pochodzi z formularza
            if (is_uploaded_file($this->tmp_name)) {
                // sprawdzamy czy plik jest obrazkiem PNG, GIF lub JPEG
                if ($this->type == 'image/jpeg' OR $this->type == 'image/png' OR $this->type == 'image/gif') {
                    return true;
                } else {
                    $this->_setError(5);
                    return false;
                }
            } else {
                $this->_setError(6);
                return false;
            }
        } else {
            return false;
        }
    }

}

?>