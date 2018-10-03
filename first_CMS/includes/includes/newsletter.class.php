<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'mailer.class.php';

class Newsletter {

    var $db;
    var $conf;
    var $error;
    var $table;
    var $art_id;

    function Newsletter(&$root, $table = 'newsletter') {
        $this->root = & $root;
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->error = &$root->error; // for compatibility only!!
        $this->messages = & $root->messages;
        $this->tpl = &$root->tpl;
        $this->table = DB_PREFIX . $table;
        $this->tableTemplate = DB_PREFIX . $table . '_template';
        $this->tableDoWyslania = DB_PREFIX . $table . '_do_wyslania';
    }

    function AddByAdmin($dane) {
        $aEmails = explode("\n", $dane['add_email_values']);
        $dodano = 0;
        if (is_array($aEmails)) {
            foreach ($aEmails as $val) {
                $val = trim($val);
                $error = "";
                if (empty($val)) {
                    $error = "adres " . $val . " jest nieprawidłowy";
                } elseif (!checkEmail($val)) {
                    $error = "adres " . $val . " jest nieprawidłowy";
                } elseif ($this->UserExists($val)) {
                    $error = "adres " . $val . " jest już zarejestrowany";
                }

                if (!empty($error)) {
                    echo $error . "<br/>";
                } else {
                    $q = "INSERT INTO " . $this->table . " SET ";
                    $q .= "email='" . addslashes(strip_tags($val)) . "', active='1'";
                    if ($this->db->query($q)) {
                        $dodano++;
                    } else {
                        
                    }
                }
            }

            $this->messages->setInfo("Dodano " . $dodano . " adresów");
        }
    }

    /* funkcja wczytuje regulamin */

    function LoadRules() {
        return $this->conf->LoadOptionExtra('newsletter_rules');
    }

    /* funkcja uaktualnia regulamin */

    function UpdateRules(&$rules) {
        return $this->conf->UpdateExtra('newsletter_rules', $rules);
    }

    /* funkcja wczytuje regulamin */

    function LoadInfo() {
        return $this->conf->LoadOptionExtra('newsletter_info');
    }

    /* funkcja uaktualnia informacje o biuletynie */

    function UpdateInfo(&$info) {
        return $this->conf->UpdateExtra('newsletter_info', $info);
    }

    /* funkcja wczytuje szablon */

    function LoadTemplate($id) {
        $q = "SELECT * FROM " . $this->tableTemplate . " ";
        $q .= "WHERE id=" . (int) $id . " ";
        $this->db->query($q);

        $row = $this->db->fetch_assoc();
        $row['value'] = str_replace('{$NEWSLETTER_PATH}', 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/newsletter', $row['value']);
        $row['value_org'] = $row['value'];
        $row['value'] = htmlspecialchars($row['value']);
        return $row;
    }

    /* funkcja zapisuje szablon */

    function UpdateTemplate(&$item) {
        $q = "UPDATE " . $this->tableTemplate . " SET name='" . $item['name'] . "', description='" . $item['description'] . "', value='" . $item['value'] . "' ";
        $q .= "WHERE id='" . (int) $item['id'] . "' ";

        if ($this->db->query($q)) {
            $this->messages->setInfo($GLOBALS['_USER_CHANGE_SAVE']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NO_EDIT']);
            return false;
        }
    }

    /* funkcja dodaje nowy szablon */

    function AddTemplate(&$item) {
        $q = "INSERT INTO " . $this->tableTemplate . " SET date_add=NOW(), name='" . $item['name'] . "', description='" . $item['description'] . "' ";

        if ($this->db->query($q)) {
            $this->art_id = $this->db->insert_id();
            $this->messages->setInfo($GLOBALS['_PAGE_NO_EDIT']);
            return $this->art_id;
        } else {
            $this->messages->setError($GLOBALS['_PAGE_NO_EDIT']);
            return false;
        }
    }

    /* funkcja wczytuje szablony do menu */

    function LoadTemplateAll() {
        $q = "SELECT * FROM " . $this->tableTemplate . " ";

        $this->db->query($q);
        while ($row = & $this->db->fetch_assoc()) {
            $row = & mstripslashes($row);
            $items[] = $row;
        }
        return $items;
    }

    /* funkcja zapisuje szablon */

    function _countSend($id, $count) {
        $q = "UPDATE " . $this->tableTemplate . " SET `send`=`send`+'" . $count . "' ";
        $q .= "WHERE id='" . (int) $id . "' ";

        if ($this->db->query($q)) {
            return true;
        } else {
            return false;
        }
    }

    /* funkcja zlicza odebrane emaile */

    function _countOdebrano($uid) {
        $uid = addslashes($uid);
        $q = "UPDATE " . $this->tableTemplate . " SET `odebrano`=`odebrano`+1 ";
        $q .= "WHERE MD5(CONCAT(id,date_add))='" . $uid . "'";

        $this->db->query($q);
    }

    /* funkcja zlicza kliki w biuletynie */

    function _countClik($id) {
        $q = "UPDATE " . $this->tableTemplate . " SET `clik`=`clik`+1 ";
        $q .= "WHERE id='" . (int) $id . "'";
        $this->db->query($q);
    }

    /* funkcja dodaje email do bazy */

    function AddUser(&$user) {

        if (empty($user['email1']) or empty($user['email2'])) {
            $error = $GLOBALS['_USER_BAD_EMAIL'];
        } elseif ($user['email1'] != $user['email2']) {
            $error = $GLOBALS['_USER_BOTH_EMAIL'];
        } elseif (!checkEmail($user['email1'])) {
            $error = $GLOBALS['_USER_BAD_EMAIL'];
        } elseif ($user['rules'] != 1) {
            $error = $GLOBALS['_NEWSLETTER_RULES'];
        } elseif ($this->UserExists($user['email1'])) {
            $error = $GLOBALS['_USER_EMAIL_REGISTER'];
        }

        if (!empty($error)) {
            $this->messages->setError($error);
            return false;
        } else {
            $q = "INSERT INTO " . $this->table . " SET first_name='" . addslashes(strip_tags($user['first_name'])) . "', last_name='" . addslashes(strip_tags($user['last_name'])) . "', ";
            $q .= "email='" . addslashes(strip_tags($user['email1'])) . "'";
            if ($this->db->query($q)) {
                return $this->sendConfirmAdd($user);
            } else {
                $this->message->setError($GLOBALS['_USER_NOT_SEVE']);
                return false;
            }
        }
    }

// end  AddUser()

    /* funkcja sprawdza czy email jest zarejestrowany */

    function UserExists($email) {
        $this->db->query("SELECT COUNT(id) FROM " . $this->table . " WHERE email='" . addslashes(strip_tags($email)) . "'");
        return ($this->db->get_result() > 0) ? true : false;
    }

    /* funkcja wysyla informacje o rezygnacji z biuletynu */

    function sendConfirmAdd(&$user) {
        $confirmUrl = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/newsletter.html?action=activate&id=' . md5($user['email1']);
        $removeUrl = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/newsletter.html?action=remove&id=' . md5($user['email1']);

        $subject = $GLOBALS['_NEWSLETTER_SUBMIT'] . $_SERVER['HTTP_HOST'];

        $content = $GLOBALS['_NEWSLETTER'];
        $content .= '<b>' . $GLOBALS['_PAGE_NAME'] . '</b> ' . $user['first_name'] . '<br>';
        $content .= '<b>' . $GLOBALS['_PAGE_LASTNAME'] . '</b> ' . $user['last_name'] . '<br>';
        $content .= '<b>' . $GLOBALS['_PAGE_EMAIL'] . '</b> ' . $user['email1'] . '<br><br>';
        $content .= '<br />' . $GLOBALS['_NEWSLETTER_CONFIRM'] . '<br />';
        $content .= '<a href="' . $confirmUrl . '"><b>' . $GLOBALS['_USER_CONFIRMATION'] . '</b></a><br>';
        $content .= '<br>' . $GLOBALS['_PAGE_NEWSLETTER_DEL'] . '<br />';
        $content .= '<a href="' . $removeUrl . '"><b>' . $GLOBALS['_USER_RESIGNATION'] . '</b></a>';

        if ($this->_sendmail($user['email1'], $subject, $content)) {
            $this->messages->setInfo($GLOBALS['_NEWSLETTER_ACTIVE']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_NEWSLETTER_NO_ACTIVE']);
            return false;
        }
    }

    /* funkcja wysyla prosbe o potwierdzenie rezygnacji z biuletynu */

    function sendConfirmRemove(&$email) {
        if ($this->userExists($email)) {
            $removeUrl = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/newsletter.html?action=remove&id=' . md5($email);

            $subject = $GLOBALS['_NEWSLETTER_SUBMIT2'] . $_SERVER['HTTP_HOST'];

            $content = $GLOBALS['_NEWSLETTER_RESIGNATION'];
            $content .= '<a href="' . $removeUrl . '"><b>' . $GLOBALS['_USER_RESIGNATION'] . '</b></a>';

            return $this->_sendmail($email, $subject, $content);
        } else {
            $this->messages->setError($GLOBALS['_NEWSLETTER_NO_EMAIL']);
            return false;
        }
    }

// end sendConfirmRemove

    function activateUser($md5email) {
        return $this->db->query("UPDATE " . $this->table . " SET active='1' WHERE MD5(email)='" . $md5email . "'");
    }

    /* funkcja usuwa uzytkownika o podanym e-mailu */

    function RemoveUser($md5email) {
        return $this->db->query("DELETE FROM " . $this->table . " WHERE MD5(email)='" . $md5email . "'");
    }

// end removeUser

    /* funkcja pobiera statystyki */

    function getStats() {
        $this->db->query("SELECT COUNT(id) as 'all', SUM(active) as 'active' FROM " . $this->table . "");
        return $this->db->fetch_assoc();
    }

    /* funkcja wysyla biuletyn do wszystkich zarejestrowanych uzytkownikow */

    function sendNewsletter(&$mailing) {
        $subject = & $mailing['mailing_subject'];
        $content .= $mailing['mailing_content'];
        $uid = $this->make_uid($mailing['id'], $mailing['date_add']);

        $removeUrl = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/newsletter.html?action=remove&id=#md5email#';
        $content .= '<br><img width="1" height="1" src="http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/mailing/' . $uid . '.php" /><br>--<br>';
        $content .= $GLOBALS['_NEWSLETTER_NO_SEND'] . '<a href="' . $removeUrl . '"><b>' . $GLOBALS['_USER_RESIGNATION'] . '</b></a>';

        $content = stripslashes($content);
        // img bug fix
        $content = str_replace('src="/', 'src="http://' . $_SERVER['HTTP_HOST'] . '/', $content);
        $content = str_replace('href="/', 'href="http://' . $_SERVER['HTTP_HOST'] . '/', $content);

        $i = 0;

        if ($mailing['send'] == 'all') {
            $q = "SELECT first_name, last_name, email FROM " . $this->table . " WHERE active='1' ";

            $this->db->query($q);
            while ($row = $this->db->fetch_assoc()) {
                $rows[] = $row;
            }

            for ($i = 0; $i < count($rows); $i++) {
                //sprawdza czy adresat jest juz na liscie do wyslania.
                $q = "SELECT email FROM " . $this->tableDoWyslania . " WHERE email='" . $rows[$i]['email'] . "'";

                $this->db->query($q);
                if (!is_array($this->db->fetch_row())) {
                    $q = "INSERT INTO " . $this->tableDoWyslania . " SET first_name='" . addslashes($rows[$i]['first_name']) . "', last_name='" . addslashes($rows[$i]['last_name']) . "', ";
                    $q .= "email='" . addslashes($rows[$i]['email']) . "', szablon_id='" . $mailing['id'] . "' ";


                    $this->db->query($q);
                }
            }
        } elseif ($mailing['send'] == 'one') {
            $personalContent = $content;

            $personalContent = str_replace('#IMIE#', '', $personalContent);
            $personalContent = str_replace('#NAZWISKO#', '', $personalContent);
            $personalContent = str_replace('#md5email#', md5($mailing['email']), $personalContent);

            $this->_sendMail(stripslashes($mailing['email']), $subject, $personalContent);
            $i++;
        }

        return $i;
    }

    /* funkcja wysyła e-mail o podanej treści */

    function _sendmail($email, $subject, &$content) {
        $oMailer = new Mailer($this->root);
        $oMailer->SetSubject($subject);
        $oMailer->SetBody($content);
        //dump($oMailer->Body);
        return $oMailer->SendHTML($email);
    }

    /* funkcja zwraca unikalny ID dla newsletera */

    function make_uid($id, $date_add) {
        return md5($id . $date_add);
    }

// ublsuga uzytkownikow

    /* funkcja zwraca ilosc stron z wynikami */
    function getPages(&$filter, $limit = 50) {
        $where = $this->getUsersFilter($filter);
        $this->db->query("SELECT COUNT(id) FROM " . $this->table . " WHERE " . $where);
        return ceil($this->db->get_result() / $limit);
    }

    /* funkcja wczytuje wszystkich uzytkownikow */

    function LoadUsers(&$filter, $page = 0, $limit = 50) {
        $where = $this->getUsersFilter($filter);
        $order = $this->getUsersOrder($filter);

        $q = "SELECT * ";
        $q .= "FROM " . $this->table . " ";
        $q .= "WHERE " . $where;
        $q .= " ORDER BY " . $order;

        $this->db->query($q);
        while ($row = $this->db->fetch_assoc()) {
            $users[] = mstripslashes($row);
        }

        return $users;
    }

    /* funkcja zwraca klauzule WHERE dla zapytania SQL na podstawie filtru */

    function getUsersFilter(&$filter) {
        $where = ' 1=1 ';
        if (!empty($filter['first_name']))
            $where .= " AND LOWER(first_name) LIKE '" . strtolower($filter['first_name']) . "' ";
        if (!empty($filter['last_name']))
            $where .= " AND LOWER(last_name) LIKE '" . strtolower($filter['last_name']) . "' ";
        if (!empty($filter['email']))
            $where .= " AND LOWER(email) LIKE '" . strtolower($filter['email']) . "' ";
        if (isset($filter['active']))
            $where .= " AND active LIKE '" . $filter['active'] . "' ";

        return $where;
    }

    /* funkcja zwraca klauzule ORDER dla zapytania SQL na podstawie filtru */

    function getUsersOrder(&$filter) {
        if (empty($filter['order_type']))
            $filter['order_type'] = 'ASC';
        if (empty($filter['order_field']))
            $filter['order_field'] = 'last_name, firm_name';
        return $filter['order_field'] . ' ' . $filter['order_type'];
    }

    /* funkcja wczytuje uzytkownika wg ID */

    function LoadUserById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id='" . (int) $id . "'");
        if ($row = $this->db->fetch_assoc()) {
            return mstripslashes($row);
        } else {
            $this->messages->setError($GLOBALS['_USER_NO_USER']);
            return false;
        }
    }

    /* funkcja zapisuje zmiana uzytkownika do bazy */

    function Edit(&$user) {
        foreach ($user as $k => $v) {
            $user[$k] = addslashes(strip_tags($v));
        }

        if (!$this->checkEmail($user['email'])) {
            $this->messages->setError($GLOBALS['_USER_BAD_EMAIL']);
            return false;
        } else {

            $q = "UPDATE " . $this->table . " SET ";
            $q .= "first_name='" . $user['first_name'] . "', last_name='" . $user['last_name'] . "', email='" . $user['email'] . "', active='" . $user['active'] . "' ";
            $q .= "WHERE id='" . $user['id'] . "'";

            if ($this->db->query($q)) {
                $this->messages->setInfo($GLOBALS['_USER_CHANGE_SAVE']);
                return true;
            }
        }// end - weryfikacja danych
    }

// end Edit();

    /* funkcja usuwa uzytkownika o podanym ID */

    function Delete($id) {
        if ($this->db->query("DELETE FROM " . $this->table . " WHERE id='" . $id . "'")) {
            $this->messages->setInfo($GLOBALS['_USER_DELETE']);
            return true;
        }
    }

    /* funkcja sprawdza czy podany e-mail jest prawidlowy (wrapper) */

    function checkEmail($email) {
        return eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]{1,})*\.([a-z]{2,}){1}$', $email);
    }

    // funkcja sprawdza czy sa adresy do wyslania
    function sprawdzAutomat() {
        $this->db->query("SELECT COUNT(id) FROM " . $this->tableDoWyslania . " ");
        return ($this->db->get_result() > 0) ? true : false;
    }

    // funkcja sprawdza czy sa adresy do wyslania
    function sprawdzAutomat2() {
        $this->db->query("SELECT COUNT(newsletter_do_wyslania.id) as count, newsletter_template.name as name" .
                " FROM newsletter_do_wyslania" .
                " LEFT JOIN newsletter_template ON newsletter_do_wyslania.szablon_id = newsletter_template.id" .
                " ORDER BY newsletter_template.name");
        return $this->db->fetch_assoc();
    }

    // funkcja wysyla paczke newslettera
    function wysliAutomat($limit) {
        $this->db->query("SELECT * FROM " . $this->tableDoWyslania . " LIMIT " . $limit);
        while ($row = $this->db->fetch_assoc()) {
            $rows[] = $row;
        }

        for ($i = 0; $i < count($rows); $i++) {
            $template = $this->LoadTemplate($rows[$i]['szablon_id']);
            $content = $template['value'];
            $subject = $template['name'];
            $uid = $this->make_uid($template['id'], $template['date_add']);

            //$content = stripslashes( '<html><head><title>'.$template['name'].'</title></head><body>'.$content.'</body></html>');

            $removeUrl = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/newsletter.html?action=remove&id=#md5email#';
            $content .= '<br><img width="1" height="1" src="http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/mailing/' . $uid . '.php" /><br>--<br>';
            $content .= 'Jeśli nie chcesz otrzymywać biuletynu, użyj opcji: <a href="' . $removeUrl . '"><b>rezygnacja z konta</b></a>';

            $content = htmlspecialchars_decode($content);

            $content = stripslashes($content);

            $content = str_replace('src="/', 'src="http://' . $_SERVER['HTTP_HOST'] . '/', $content);
            $content = str_replace('href="/', 'href="http://' . $_SERVER['HTTP_HOST'] . '/', $content);
            $personalContent = $content;
            $personalContent = str_replace('#IMIE#', $rows[$i]['first_name'], $personalContent);
            $personalContent = str_replace('#NAZWISKO#', $rows[$i]['last_name'], $personalContent);
            $personalContent = str_replace('#md5email#', md5($rows[$i]['email']), $personalContent);
            $this->_sendMail(stripslashes($rows[$i]['email']), $template['name'], $personalContent);

//                    $this -> _countSend($template['id'], 1);
            if ($i > 0)
                $where .= "OR ";
            $where .= "id='" . $rows[$i]['id'] . "' ";
        }

        if ($i > 0) {
            $q = "DELETE FROM " . $this->tableDoWyslania . " WHERE " . $where;
            $this->db->query($q);
        }

        return true;
    }

}

?>