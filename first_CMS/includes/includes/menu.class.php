<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

class Menu {

    var $db;
    var $conf;
    var $error;
    var $tpl;
    var $table;

    /* konstruktor */

    function Menu(&$root, $table = 'menu') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;
        $this->table = DB_PREFIX . $table;
        $this->tableDescription = DB_PREFIX . $table . '_description';
    }

    function Load($pid, $group = '%', $order = 'm.order') {
        return $this->_loadMenu($pid, $group, NULL, $order);
    }

    function LoadMap() {
        $map = $this->Load(0, '%', 'd.name');
        for ($j = 0; $j < count($map); $j++) {
            $map[$j]['submenu'] = $this->_loadMenu($map[$j]['id'], '%');
        }
        return $map;
    }

    function LoadMapAdmin(&$mm) {
        $maps = array();
        for ($i = 0; $i < count($mm); $i++) {
            $map = $this->Load(0, $mm[$i]['typ'], 'd.name');
            for ($j = 0; $j < count($map); $j++) {
                $map[$j]['submenu'] = $this->_loadMenu($map[$j]['id'], '%');
                $maps[$i] = $map;
            }
        }
        return $maps;
    }

    function LoadItem($id, $params = '*', $where = 'm.id') {
        $where = $where . "='" . $id . "'";
        $q = "SELECT " . $params . " FROM " . $this->table . " m LEFT JOIN " . $this->tableDescription . " d ON m.id=d.parent_id WHERE d.language_id='" . _ID . "' AND " . $where;
        $this->db->query($q);
        return $this->db->fetch_assoc();
    }

    function LoadPath($pID) {
        $path = '/';
        while ($pID != 0) {
            $res = $this->LoadItem($pID, 'm.parent_id, d.name');
            $path = '/' . stripslashes($res['name']) . $path;
            $pID = $res['parent_id'];
        }

        return $path;
    }

    function _parentExists($id) {
        if ($id != 0) {
            $res = $this->LoadItem($id, 'm.parent_id', 'm.id');
            return $res['parent_id'];
        }
        return false;
    }

    function _loadMenu($pid, $group, $submenu = NULL, $order = 'm.order') {
        $q = "SELECT m.*, d.name, d.url FROM " . $this->table . " m LEFT JOIN " . $this->tableDescription . " d ON m.id=d.parent_id WHERE d.language_id='" . _ID . "' AND m.parent_id='" . $pid . "' ";
        $q.= "AND m.group_name LIKE '" . addslashes($group) . "' GROUP BY d.name ORDER BY " . $order . " ASC, d.name ASC";

        $this->db->query($q);

        $i = 0;
        $menu = array();
        while ($row = $this->db->fetch_assoc()) {
            $menu[$i] = $this->_clearItem($row);
            if ($row['type'] == 'page' or $row['type'] == 'module') {
                if ($menu[$i]['url'] == 'aktualnosci')
                    $menu[$i]['typ'] = 'aktualnosci';
                if ($menu[$i]['url'] == 'galeria')
                    $menu[$i]['typ'] = 'galeria';
                if ($menu[$i]['url'] != 'main')
                    $menu[$i]['url'] = BASE_URL . '/' . $menu[$i]['url'] . '.html';
                else
                    $menu[$i]['url'] = BASE_URL . '/';
            }
            elseif ($row['type'] == 'pokoj') {
                $menu[$i]['url'] = BASE_URL . '/pokoje/' . $menu[$i]['url'] . '.html';
            }
            $i++;
        }

        if ($i > 0)
            return $menu;
        else
            return false;
    }

    function _getPIDbyID($id) {
        $this->db->query("SELECT parent_id FROM " . $this->table . " WHERE id='" . $id . "'");
        return $this->db->get_result();
    }

    function _getIDbyURL(&$url) {
        $url = addslashes($url);
        $this->db->query("SELECT id FROM " . $this->table . " WHERE url='" . $url . "'");
        return $this->db->get_result();
    }

    function _clearItem(&$menuItem) {
        $menuItem['name'] = stripslashes($menuItem['name']);
        $menuItem['url'] = stripslashes($menuItem['url']);
        $menuItem['group_name'] = stripslashes($menuItem['group_name']);
        return $menuItem;
    }

// funkcja laduje submenu dal wszytkich kategri glownych
    function loadSubmenu($menu_left, $group, $order = '`order`') {
        $submenu = array();
        for ($i = 0; $i < count($menu_left); $i++) {
            $q = "SELECT m.*, d.name, d.url FROM " . $this->table . " m LEFT JOIN " . $this->tableDescription . " d ON m.id=d.parent_id WHERE d.language_id='" . _ID . "' ";
            $q.= "AND m.parent_id='" . $menu_left[$i]['id'] . "' AND m.group_name LIKE '" . addslashes($group) . "' GROUP BY d.name ORDER BY " . $order . " ASC, d.name ASC";

            $this->db->query($q);
            $x = 0;
            while ($row = $this->db->fetch_assoc()) {
                $z = $menu_left[$i]['order'] - 1; // numer pozycji menu glownego
                $submenu[$z][$x] = $this->_clearItem($row);
                if ($row['type'] == 'page' or $row['type'] == 'module') {
                    $submenu[$z][$x]['url'] = BASE_URL . '/' . $submenu[$z][$x]['url'] . '.html';
                } elseif ($row['type'] == 'pokoj') {
                    $submenu[$z][$x]['url'] = BASE_URL . '/pokoje/' . $submenu[$z][$x]['url'] . '.html';
                }
                $x++;
            }
        }
        return $submenu;
    }

}

?>