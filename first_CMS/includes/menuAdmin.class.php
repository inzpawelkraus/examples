<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'menu.class.php';

class MenuAdmin extends Menu {

    var $db;
    var $conf;
    var $error;
    var $tpl;
    var $table;

    /* konstruktor */

    function MenuAdmin(&$root, $table = 'menu') {
        $this->Menu($root, $table);
    }

    function Add(&$item) {
        $item = $this->_prepareItem($item);
        $item['order'] = $this->_getMaxOrder($item['pid'], $item['group']) + 1;

        $target = isset($item['target']) ? $item['target'] : 0;

        $q = "INSERT INTO " . $this->table . " SET ";
        $q .= "parent_id='" . $item['pid'] . "', ";
        $q .= "type='" . $item['type'] . "', ";
        $q .= "group_name='" . $item['group'] . "', ";
        $q .= "target='" . $target . "', ";
        $q .= "`order`='" . $item['order'] . "'";
        if ($this->db->query($q)) {
            $this->art_id = $this->db->insert_id();

            for ($i = 1; $i <= count($item['name']); $i++) {
                if ($item['type'] == 'url')
                    $url = addslashes($item['url_addr'][$i]);
                elseif ($item['type'] == 'page')
                    $url = addslashes($item['url_page_' . $i]);
                elseif ($item['type'] == 'module')
                    $url = addslashes($item['url_module']);

                $q = "INSERT INTO " . $this->tableDescription . " SET parent_id='" . $this->art_id . "', language_id='" . $i . "', ";
                $q.= "name='" . addslashes(str_replace('"', '&quot;', $item['name'][$i])) . "', url='" . $url . "' ";
                $this->db->query($q);
            }

            $this->_updatePagesTable($this->art_id);
            $this->messages->setInfo('Element został dodany do menu.');
            return true;
        }else {
            $this->messages->setError('Wystąpił błąd podczas dodawania menu! Operacja nie powiodła się.');
            return false;
        }
    }

    function Edit(&$item) {
        if ($item['type'] != 'url') {
            $target = 0;
        } else {
            $target = isset($item['target']) ? $item['target'] : 0;
        }
        $item = $this->_prepareItem($item);
        $q = "UPDATE " . $this->table . " SET ";
        $q .= "type='" . $item['type'] . "', ";
        $q .= "target='" . $target . "' ";
        $q .= "WHERE id='" . $item['id'] . "'";

        if ($this->db->query($q)) {
            for ($i = 1; $i <= count($item['name']); $i++) {
                if ($item['type'] == 'url')
                    $url = addslashes($item['url_addr'][$i]);
                elseif ($item['type'] == 'page')
                    $url = addslashes($item['url_page_' . $i]);
                elseif ($item['type'] == 'module')
                    $url = addslashes($item['url_module']);
                elseif ($item['type'] == 'pokoj')
                    $url = addslashes($item['url_pokoj_' . $i]);

                $q = "UPDATE " . $this->tableDescription . " SET name='" . addslashes(str_replace('"', '&quot;', $item['name'][$i])) . "', url='" . $url . "' ";
                $q.= "WHERE parent_id='" . $item['id'] . "' AND language_id='" . $i . "' ";
                $this->db->query($q);
            }

            $this->_updatePagesTable($item['id']);
            $this->messages->setInfo($GLOBALS['_USER_CHANGE_SAVE']);
            return true;
        }else {
            $this->messages->setError('Wystąpił błąd podczas edycji menu!');
            return false;
        }
    }

    function Delete($id) {
        $item = $this->LoadItem($id, 'm.order, m.parent_id, m.group_name');
        $this->_updatePagesTable($id, true);

        if ($this->db->query("DELETE FROM " . $this->table . " WHERE id='" . $id . "'")) {
            $this->db->query("DELETE FROM " . $this->tableDescription . " WHERE parent_id='" . $id . "'");
            $q = "UPDATE " . $this->table . " SET `order`=`order`-1 WHERE `order`>'" . $item['order'] . "' AND ";
            $q.= "group_name='" . $item['group_name'] . "' AND parent_id='" . $item['parent_id'] . "'";
            $this->db->query($q);
            if ($this->db->query("DELETE FROM " . $this->table . " WHERE parent_id='" . $id . "'")) {
                $this->messages->setInfo('Element został usunięty z menu!');
                return true;
            }
        }
        $this->messages->setError('Wystąpił błąd podczas usuwania menu!');
        return false;
    }

    function MoveUp($id) {
        if ($item = $this->LoadItem($id, 'm.parent_id, m.order, m.group_name')) {
            $q = "UPDATE " . $this->table . " SET `order`=`order`+1 WHERE ";
            $q.= "group_name='" . $item['group_name'] . "' AND parent_id='" . $item['parent_id'] . "' AND ";
            $q.= "`order`='" . ($item['order'] - 1) . "'";
            if ($this->db->query($q)) {
                if ($this->db->query("UPDATE " . $this->table . " SET `order`=`order`-1 WHERE id='" . $id . "'")) {
                    $this->messages->setInfo('Element przeniesiony o jeden poziom w górę!');
                    return true;
                }
            }
        }
        return false;
    }

    function MoveDown($id) {
        if ($item = $this->LoadItem($id, 'm.parent_id, m.order, m.group_name')) {
            if ($item['order'] < $this->_getMaxOrder($item['parent_id'], $item['group_name'])) {
                $q = "UPDATE " . $this->table . " SET `order`=`order`-1 WHERE ";
                $q.= "group_name='" . $item['group_name'] . "' AND parent_id='" . $item['parent_id'] . "' AND ";
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

    function _prepareItem(&$item) {
        if (!isset($item['parent_id']))
            $item['parent_id'] = 0;
        if (isset($item['group_name'])) {
            $item['group_name'] = addslashes($item['group_name']);
        }
        $item['group'] = addslashes($item['group']);
        $item['type'] = empty($item['type']) ? 'url' : $item['type'];
        return $item;
    }

    function _getMaxOrder($parent, $group) {
        $q = "SELECT MAX(`order`) FROM " . $this->table . " WHERE group_name='" . $group . "' AND ";
        $q.= "parent_id='" . $parent . "'";
        $this->db->query($q);
        return $this->db->get_result();
    }

    function Load($id = 0, $group = 'left', $submenu = NULL) {
        $group = addslashes($group);

        $q = "SELECT m.id, m.parent_id, d.name, d.url, m.type, m.group_name, m.target FROM " . $this->table . " m LEFT JOIN " . $this->tableDescription . " d ON m.id=d.parent_id ";
        $q.= "WHERE d.language_id='" . _ID . "' AND m.parent_id='" . $id . "' AND m.group_name LIKE '" . $group . "' ORDER BY m.order ASC, d.name ASC ";
        $this->db->query($q);
        $i = 0;
        while ($row = $this->db->fetch_assoc()) {
            $menu[$i] = $this->_clearItem($row);
            if ($row['type'] == 'page' or $row['type'] == 'module') {
                if ($menu[$i]['url'] == 'aktualnosci')
                    $menu[$i]['typ'] = 'aktualnosci';
                if ($menu[$i]['url'] == 'galeria')
                    $menu[$i]['typ'] = 'galeria';
                $menu[$i]['select'] = $menu[$i]['url'];
                $menu[$i]['url'] = BASE_URL . '/' . $menu[$i]['url'] . '.html';
            }
            $i++;
        }
        if ($i != 0)
            return $menu;
        else
            return false;
    }

    /* funkcja wczytuje kategorie o podanym id */

    function LoadId($parent_id) {
        $q = "SELECT parent_id as id, language_id, name, url FROM " . $this->tableDescription . " ";
        $q.= "WHERE parent_id='" . (int) $parent_id . "' ";
        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $row['name'] = stripslashes($row['name']);
            $opis[] = $row;
        }
        return $opis;
    }

    /* funkcja aktualizuje link pomiedzy tabelami menu <-> pages */

    function _updatePagesTable($menu_id, $unset = false) {
        $this->db->query("SELECT url FROM " . $this->tableDescription . " WHERE parent_id='" . $menu_id . "'");
        $page_url = $this->db->get_result();

        if ($unset === true) {
            $menu_id = -1;
        }
    }

    function LoadUpperPID($id) {
        return $this->_getPIDbyID($id);
    }

    /* funkcja wczutyje moduly dostepne na stronie */

    function LoadModules() {
        $dirname = ROOT_PATH . '/modules';
        if ($dp = opendir($dirname)) {
            while ($item = readdir($dp)) {
                if ($item != '..' and $item != '.' and !is_dir($dirname . '/' . $item) and preg_match('/inc.php$/i', $item)) {
                    $items[] = str_replace('.inc.php', '', $item);
                }
            }
            closedir($dp);
            sort($items, SORT_STRING);
            return $items;
        } else {
            $this->messages->setError('Nie można otworzyć katalogu z modułami!', true);
            return false;
        }
    }

    // funkcja laduje menu w celu powiazania z nowym artykulem
    function LoadPowiazania($id, $group) {
        $q = "SELECT id, name FROM " . $this->table . " WHERE parent_id='" . $id . "' AND group_name LIKE '" . $group . "' ORDER BY `order` ASC, name ASC";
        $this->db->query($q);

        while ($row = $this->db->fetch_assoc()) {
            $items[] = $row;
        }

        for ($j = 0; $j < count($items); $j++) {
            $q = "SELECT id, name FROM " . $this->table . " WHERE parent_id='" . $items[$j]['id'] . "' AND group_name LIKE '" . $group . "' ORDER BY `order` ASC, name ASC";
            $this->db->query($q);

            while ($row = $this->db->fetch_assoc()) {
                $items[$j]['sub'][] = $row;
            }
        }
        return $items;
    }

}

?>