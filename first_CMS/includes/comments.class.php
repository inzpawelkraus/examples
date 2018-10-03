<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');
require_once 'mailer.class.php';

class Comments {

    var $db;
    var $conf;
    var $messages;
    var $tpl;
    var $table;
    var $group;
    var $limit;

    function Comments($root, $group, $table = 'comments') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;

        $this->table = DB_PREFIX . $table;
        $this->group = $group;
        $this->limit = 20;
    }

    function Load($parent_id) {
        if ($_GET['c_page'] < 1)
            $_GET['c_page'] = 1;
        $start = ($_GET['c_page'] - 1) * $this->limit;

        $q = "SELECT * FROM " . $this->table . " WHERE `group`='" . $this->group . "' AND parent_id='" . (int) $parent_id . "'";
        $q .= " ORDER BY date_add ASC LIMIT " . $start . "," . $this->limit;

        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $items[] = mstripslashes($row);
        }
//		return mstripslashes($this -> db -> get_all_rows());
        return $items;
    }

    function getPages($parent_id) {
        $q = "SELECT COUNT(id) FROM " . $this->table . " WHERE ";
        $q .= " `group`='" . $this->group . "' AND parent_id='" . (int) $parent_id . "' ";

        $this->db->query($q);
        $rows = $this->db->get_result();
        if ($rows < 1)
            $rows = 1;
        return ceil($rows / $this->limit);
    }

    function Add(&$comment) {
        
        if ($this->checkToken($comment['tokenid'], $comment['token'])) {
            if (empty($comment['author'])) {
                $this->messages->setInfo("Uzupełnij Imię i Nazwisko");
                return false;
            } else if (empty($comment['email'])) {
                $this->messages->setInfo("Uzupełnij E-mail");
                return false;
            } else if (empty($comment['state'])) {
                $this->messages->setInfo("Uzupełnij Wojewodztwo");
                return false;
            } else if (empty($comment['age'])) {
                $this->messages->setInfo("Uzupełnij Wiek");
                return false;
            } else if (empty($comment['male']) && empty($comment['female'])) {
                $this->messages->setInfo("Uzupełnij Płeć");
                return false;
            } else if ($comment['male'] == 'on' && $comment['female'] == 'on') {
                $this->messages->setInfo("Zadeklaruj tylko jedną Płeć");
                return false;
            } else {
                $comment = maddslashes(mstrip_tags($comment));
                if (!LOGGED)
                    $comment['author'] = $comment['author'];
                $q = "INSERT INTO " . $this->table . " SET parent_id='" . (int) $comment['parent_id'] . "', email='" . $comment['email'] . "', male='" . $comment['male'] . "', female='" . $comment['female'] . "', state='" . $comment['state'] . "', age='" . $comment['age'] . "', title='" . $comment['title'] . "', ";
                $q .= "content='" . $comment['content'] . "', author='" . $comment['author'] . "', `group`='" . $this->group . "', ";
                $q .= "date_add=NOW()";
                
//                $this->db->query($q);
//                dump($this->db->query($q));die;

                if ($this->db->query($q)) {

                    $this->mail = new Mailer($root);

                    $data = $comment;
                    $temat = "Potwierdzenie złozenia petycji";

                    $tresc .= "Witaj " . $data['author'] . '!<br />';
                    $tresc .= "Dziękujemy za Twoje zangażowanie w sprawy naszego kraju, prosimy potwierdź́ swojego e-maila: " . $data['email'] . "</br>";
                    $tresc .= "Poniżej przesyłamy ci link potwierdzający twój głos, skopiuj go i wklej w przeglądarke.<br />";
                    $tresc .= "<a href='".$_SERVER['SERVER_NAME']."/activateEmail.php/?email=".base64_encode ('email='.$data['email'])."'>".$_SERVER['SERVER_NAME']."/activateEmail.php/?email=".base64_encode ('email='.$data['email'])."</a>";
                    $this->mail->setSubject($temat);
                    $this->mail->setBody($tresc);

                    if ($this->mail->sendHTML($data['email'], BIURO_EMAIL)) {
                        $this->messages->setInfo($GLOBALS['_VOTE_ADD']);
                        return true;
                    }
                }



                $this->messages->setInfo($GLOBALS['_VOTE_ADD']);

                return true;
            }
        } else {
            $this->messages->setInfo($GLOBALS['_PAGE_CHECK_TOKEN']);
            return false;
        }
    }

    function Edit(&$comment) {
        $comment = & maddslashes(mstrip_tags($comment));

        $q = "UPDATE " . $this->table . " SET title='" . $comment['title'] . "', ";
        $q .= "content='" . $comment['content'] . "', author='" . $comment['author'] . "' ";
        $q .= " WHERE id='" . $comment['id'] . "'";

        $this->db->query($q);
        $this->messages->setInfo($GLOBALS['_PAGE_CHANGE_COMMENT']);
        return true;
    }

    function Delete($id) {
        $q = "DELETE FROM " . $this->table . " WHERE id='" . (int) $id . "'";
        $this->db->query($q);
        $this->messages->setInfo($GLOBALS['_PAGE_DEL_COMMENT']);
        return true;
    }

    function LoadAll($group) {
        if ($_GET['page'] < 1)
            $_GET['page'] = 1;
        $start = ($_GET['page'] - 1) * $this->limit;

        $q = "SELECT * FROM " . $this->table . " WHERE `group`='" . $group . "' ";
        $q .= " ORDER BY parent_id ASC, date_add ASC LIMIT " . $start . "," . $this->limit;

        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $items[] = mstripslashes($row);
        }
        return $items;
    }

    function getPagesAll($group) {
        $q = "SELECT COUNT(id) FROM " . $this->table . " WHERE ";
        $q .= " `group`='" . $group . "' ";

        $this->db->query($q);
        $rows = $this->db->get_result();
        if ($rows < 1)
            $rows = 1;
        return ceil($rows / $this->limit);
    }

    /* funkcja sprawdza poprownosc tokena */

    function checkToken($tokenid, $token) {
        $tokens = file(ROOT_PATH . '/js/token/tokens.txt');
        $tok = $tokens[$tokenid];

        if (trim($tok) == trim($token) and ! empty($token) and ! empty($tokenid)) {
            return true;
        } else {
            return false;
        }
    }

}

?>