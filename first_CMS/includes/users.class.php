<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once 'mailer.class.php';

class Users {

    var $db;
    var $conf;
    var $messages;
    var $table;
    var $mail;
    var $config;
    var $limit_admin_page;

    function Users(&$root, $table = 'users') {
        $this->db = &$root->db;
        $this->conf = &$root->conf;
        $this->messages = &$root->messages;
        $this->tpl = &$root->tpl;
        $this->mail = new Mailer($root);

        $this->table = DB_PREFIX . $table;
        $this->tableUsers = DB_PREFIX . $table;
        $this->tableGroups = DB_PREFIX . 'groups';
        $this->tablePrivileges = DB_PREFIX . 'privilege';
        $this->tableLog = DB_PREFIX . 'users_log';
        $this->tableZalogowani = DB_PREFIX . 'users_zalogowani';

        $this->limit_admin_page = $this->conf->vars['limit_admin'];
    }

    /* funkcja laduje dane uzytkownika wg id */

    function Load($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id='" . (int) $id . "' AND `admin`!=1");
        if ($row = $this->db->fetch_assoc()) {
            $row = mstripslashes($row);
            return $row;
        } else {
            $this->messages->setError($GLOBALS['_USER_NO_USER']);
            return false;
        }
    }

    /* funkcja dodaje uzytkownika do bazy */

    function Add(&$user) {
        $search = array('-', ' ', '/', '(', ')');
        $replace = array('', '', '', '', '');

        $user['login'] = strtolower($user['login']);
        $user['nip'] = str_replace($search, $replace, $user['nip']);
        $user['phone'] = str_replace($search, $replace, $user['phone']);
        $user = & maddslashes($user);

        foreach ($user as $k => $v) {
            $user[$k] = addslashes(strip_tags($v));
        }

        if (!$this->checkLogin($user['login'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_BAD_LOGIN']);
            return false;
        } elseif ($this->userExists($user['login'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_REGISTER']);
            return false;
        } elseif ($user['pass1'] != $user['pass2']) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_BAD_BOTH_PASS']);
            return false;
        } elseif (strlen($user['pass1']) < 5) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_SHORT_PASS']);
            return false;
        } elseif ($user['business'] == 1 and empty($user['firm_name'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_FIRM_NAME']);
            return false;
        } elseif ($user['business'] == 1 and !$this->checkNIP($user['nip'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_NIP']);
            return false;
        } elseif (empty($user['first_name'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_NAME']);
            return false;
        } elseif (empty($user['last_name'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_LASTNAME']);
            return false;
        } elseif (empty($user['street'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_STREET']);
            return false;
        } elseif (empty($user['nr_bud'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_NR_BUD']);
            return false;
        } elseif (!$this->checkPostCode($user['post_code'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_POSTCODE']);
            return false;
        } elseif (empty($user['city'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_CITY']);
            return false;
        } elseif ($user['email1'] != $user['email2']) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_BOTH_EMAIL']);
            return false;
        } elseif (!checkEmail($user['email1'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_BAD_EMAIL']);
            return false;
        } elseif ($this->emailExists($user['email1'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMAIL_REGISTER']);
            return false;
        } else {

            $q = "INSERT INTO " . $this->table . " SET login='" . $user['login'] . "', password='" . md5($user['pass1']) . "', ";
            $q.= "business='" . $user['business'] . "', firm_name='" . $user['firm_name'] . "', first_name='";
            $q.= $user['first_name'] . "', last_name='" . $user['last_name'] . "', street='" . $user['street'] . "', ";
            $q.= "nr_bud='" . $user['nr_bud'] . "', nr_lok='" . $user['nr_lok'] . "', ";
            $q.= "city='" . $user['city'] . "', post_code='" . $user['post_code'] . "', nip='" . $user['nip'] . "', ";
            $q.= "email='" . $user['email1'] . "', phone='" . $user['phone'] . "'";

            if ($this->db->query($q)) {
                $user['id'] = $this->db->insert_id();

                $q_mailing = "INSERT INTO " . DB_PREFIX . "newsletter SET first_name='" . $user['first_name'] . "', ";
                $q_mailing.= "last_name='" . $user['last_name'] . "', email='" . $user['email1'] . "', active='1'";

                $this->db->query($q_mailing);


                $this->sendConfirmAdd($user);

                $msg = $GLOBALS['_USER_MAKE_ACCOUNT'];

                $this->messages->setInfo($msg);
                return true;
            } else {
                $this->messages->setError($GLOBALS['_USER_BAD_ACCOUNT']);
                return false;
            }
        }// end - weryfikacja danych
    }

// end Add();	

    /* funkcja edytuje uzytkownika */

    function Edit(&$user) {
        $search = array('-', ' ', '/', '(', ')');
        $replace = array('', '', '', '', '');

        $user['nip'] = str_replace($search, $replace, $user['nip']);
        $user['phone'] = str_replace($search, $replace, $user['phone']);
        $user = & maddslashes($user);

        foreach ($user as $k => $v) {
            $user[$k] = addslashes(strip_tags($v));
        }

        if ($user['business'] == 1 and empty($user['firm_name'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_FIRM_NAME']);
            return false;
        } elseif ($user['business'] == 1 and !$this->checkNIP($user['nip'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_NIP']);
            return false;
        } elseif (empty($user['first_name'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_NAME']);
            return false;
        } elseif (empty($user['last_name'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_LASTNAME']);
            return false;
        } elseif (empty($user['street'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_STREET']);
            return false;
        } elseif (empty($user['nr_bud'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_NR_BUD']);
            return false;
        } elseif (!$this->checkPostCode($user['post_code'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_POSTCODE']);
            return false;
        } elseif (empty($user['city'])) {
            $this->messages->setMessage('register_error', $GLOBALS['_USER_EMPTY_CITY']);
            return false;
        } else {

            $q = "UPDATE " . $this->table . " SET ";
            $q.= "business='" . $user['business'] . "', firm_name='" . $user['firm_name'] . "', first_name='";
            $q.= $user['first_name'] . "', last_name='" . $user['last_name'] . "', street='" . $user['street'] . "', ";
            $q.= "nr_bud='" . $user['nr_bud'] . "', nr_lok='" . $user['nr_lok'] . "', ";
            $q.= "city='" . $user['city'] . "', post_code='" . $user['post_code'] . "', nip='" . $user['nip'] . "', ";
            $q.= "phone='" . $user['phone'] . "' WHERE id='" . $_SESSION['user']['id'] . "'";

            if ($this->db->query($q)) {
                $this->messages->setInfo($GLOBALS['_USER_CHANGE_SAVE']);
                return true;
            }
        }// end - weryfikacja danych
    }

// end Edit();	

    /* funkcja zmienia hasło użytkownika */

    function ChangePass(&$pass) {
        if (empty($pass['old']) or empty($pass['new1']) or empty($pass['new2'])) {
            $this->messages->setMessage('pass_error', $GLOBALS['_USER_EMPTY']);
            return false;
        } elseif ($pass['new1'] != $pass['new2']) {
            $this->messages->setMessage('pass_error', $GLOBALS['_USER_BAD_BOTH_PASS']);
            return false;
        } elseif (strlen($pass['new1']) < 5) {
            $this->messages->setMessage('pass_error', $GLOBALS['_USER_SHORT_PASS']);
            return false;
        } else {
            $q = "UPDATE " . $this->table . " SET password='" . md5(addslashes($pass['new1'])) . "' WHERE ";
//            $q.= "id='" . $_SESSION['user']['id'] . "' AND password='" . md5(addslashes($pass['old'])) . "' AND `admin`!=1";
            $q.= "id='" . $_SESSION['user']['id'] . "' AND password='" . md5(addslashes($pass['old'])) . "'";
            $this->db->query($q);
            if ($this->db->affected_rows()) {
                $this->messages->setInfo($GLOBALS['_USER_CHANGE_PASS']);

                $user['login'] = & $_SESSION['user']['login'];
                $user['pass'] = & $pass['new1'];

                $this->logIn($user); // przelogowujemy usera
                return true;
            } else {
                $this->messages->setMessage('pass_error', $GLOBALS['_USER_BAD_OLD_PASS']);
                return false;
            }
        }
    }

// end changePass();

    /* funkcja sprawdza poprawnosc loginu */

    function checkLogin($login) {
        return preg_match('/[a-z0-9_]{3,}/', $login);
    }

    /* funkcja sprawdza poprawnosc numeru NIP */

    function checkNIP($nip) {
        if (eregi('[0-9]{10}', $nip)) {
            $check = array(6, 5, 7, 2, 3, 4, 5, 6, 7); // wagi kontrolne dla numeru nip
            for ($i = 0; $i < count($check); $i++) {
                $sum+= $check[$i] * $nip[$i];
            }

            $crc = $sum % 11; // powinna wyjsc ostatnia cyfra
            $crc = $crc % 10; // to na wypadek gdyby wynik byl rowny 10

            if ($nip[9] == $crc) {
                return true;
            }
        }
        return false;
    }

// end check_nip

    /* funkcja sprawdza poprawnosc kodu pocztowego */

    function checkPostCode($code) {
        return eregi('[0-9]{2}-[0-9]{3}', $code);
    }

    /* funkcja sprawdza czy uzytkownik o podanym loginie istnieje */

    function userExists($login) {
        $login = addslashes($login);
        $this->db->query("SELECT COUNT(id) FROM " . $this->table . " WHERE login='" . $login . "'");
        return $this->db->get_result() > 0 ? true : false;
    }

    /* funkcja sprawdza czy uzytkownik o podanym e-mailu istnieje */

    function emailExists($email) {
        $email = addslashes($email);
        $this->db->query("SELECT COUNT(id) FROM " . $this->table . " WHERE email='" . $email . "'");
        return $this->db->get_result() > 0 ? true : false;
    }

    /* funkcja zwraca unikalny ID dla uzytkownika */

    function make_uid($login, $email) {
        return md5(strtolower($login) . $email);
    }

    function sendConfirmAdd(&$user) {
        $uid = $this->make_uid($user['login'], $user['email1']);

        $confirmUrl = '<a href="http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/konto/rejestracja.html?action=activate&id=';
        $confirmUrl.= '' . $uid . '">' . $GLOBALS['_USER_CONFIRMATION'] . '</a>';
        $removeUrl = '<a href="http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/konto/rejestracja.html?action=remove&id=';
        $removeUrl.= '' . $uid . '">' . $GLOBALS['_USER_RESIGNATION'] . '</a>';

        $subject = $GLOBALS['_USER_ACTIVE_PAGE'] . ' ' . $_SERVER['HTTP_HOST'];

        $content = $this->conf->LoadOptionExtra('mail_add_user');

        $search = array('#LOGIN#', '#HASLO#', '#IMIE#', '#NAZWISKO#', '#NAZWA_FIRMY#', '#NIP#', '#TYP_KONTA#',
            '#EMAIL#', '#STREET#', '#NRBUD#', '#NRLOK#', '#KOD_POCZTOWY#', '#MIEJSCOWOSC#', '#TELEFON#',
            '#CONFIRM_URL#', '#DELETE_URL#');
        $replace = array($user['login'], $user['pass1'], $user['first_name'], $user['last_name'], $user['firm_name'],
            $user['nip'], ($user['business'] == 1) ? 'firma' : 'osoba fizyczna', $user['email1'],
            $user['street'], $user['nr_bud'], $user['nr_lok'], $user['post_code'], $user['city'], $user['phone'],
            $confirmUrl, $removeUrl);
        $content = & str_replace($search, $replace, $content);

        $admin_subject = 'Nowy użytkownik w systemie!';
        $admin_content = 'Dnia ' . date('Y-m-d, H:i', time()) . ' został zarejestrowany użytkownik <b>' . $user['login'];
        $admin_content.= '</b>. Możesz przejrzeć jego dane w panelu administracyjnym używając opcji: ';
        $admin_content.= '<a href="http://' . $_SERVER['HTTP_HOST'] . BASE_URL . '/admin/uzytkownicy.php?';
        $admin_content.= 'action=edit_user&id=' . $user['id'] . '">edycja użytkownika</a>';

        $this->mail->setSubject($admin_subject);
        $this->mail->setBody($admin_content);
        $this->mail->sendHTML(ADMIN_EMAIL);

        unset($this->mail->to);

        $this->mail->setSubject($subject);
        $this->mail->setBody($content);
        return $this->mail->sendHTML($user['email1']);
    }

// end sendConfirmAdd


    /* funkcja aktywuje konto uzytkownika */

    function setActive($uid) {
        $uid = addslashes($uid);
        $this->db->query("UPDATE " . $this->table . " SET active='1' WHERE MD5(CONCAT(login,email))='" . $uid . "' AND `admin`!=1");
        if ($this->db->affected_rows() > 0) {
            $this->messages->setInfo($GLOBALS['_USER_ACTIVE']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_USER_BAD_ID_ACTIVE']);
            return false;
        }
    }

// end setActive

    /* funkcja usuwa nieaktywne konto uzytkownika */

    function Delete($uid) {
        $uid = addslashes($uid);
        $this->db->query("DELETE FROM " . $this->table . " WHERE MD5(CONCAT(login,email))='" . $uid . "' AND `admin`!=1");
        if ($this->db->affected_rows() > 0) {
            $this->messages->setInfo($GLOBALS['_USER_DELETE']);
            return true;
        } else {
            $this->messages->setError($GLOBALS['_USER_BAD_ID_DEL']);
            return false;
        }
    }

// end Delete


    /* funkcja loguje uzytkownika */

    function logIn(&$user, $admin = false) {
        $login = $user['login'];
        $pass = $user['pass'];

        $user['login'] = addslashes(strtolower($user['login']));
        $user['pass'] = md5(addslashes($user['pass']));

        if (empty($user['login']) or empty($user['pass'])) {
            $this->messages->setMessage('user_error', $GLOBALS['_USER_LOGIN']);
            return false;
        } else {
            $q = "SELECT u.*,g.name as group_name ";
            $q.= "FROM " . $this->table . " u LEFT JOIN " . $this->tableGroups . " g ON g.id=u.group_id ";
            $q.= "WHERE LOWER(login)='" . $user['login'] . "' AND password='" . $user['pass'] . "'";

            $this->db->query($q);
            $res = $this->db->result;
            if ($this->db->num_rows() < 1) {
                if (!$this->userExists($user['login'])) {
                    $msg = $GLOBALS['_USER_NOT_REGISTER'];
                    $this->Log($login, $pass, $GLOBALS['_USER_NO_USER']);
                } else {
                    $msg = $GLOBALS['_USER_BOTH_PASS'];
                    $this->Log($login, $pass, $GLOBALS['_USER_BAD_PASS']);
                }

                $this->messages->setMessage('user_error', $msg);
                return false;
            } else {
                $u = $this->db->fetch_assoc($res);
                if ($u['active'] != 1) {
                    $this->messages->setMessage('user_error', $GLOBALS['_USER_NOT_ACTIVE']);
                    $this->Log($login, $pass, $GLOBALS['_USER_NO_ACTIVE']);

                    return false;
                } elseif (($admin == true) and ($u['admin_login'] != 1)) {
                    $this->messages->setMessage('user_error', $GLOBALS['_USER_NOT_PRIVILAGE']);
                    $this->Log($login, $pass, $GLOBALS['_USER_NOT_PRIVILAGE']);
                    return false;
                } else {
                    $u['privileges'] = $this->LoadUserPrivileges($u['id']);
                    // logujemy uzytkownika
                    $_SESSION['userid'] = md5($u['id'] . $u['login'] . $u['password']);
                    $_SESSION['user'] = $u;
                    $_SESSION['privileges_hash'] = md5(serialize($u['privileges']));

                    // statystyka logowań
                    $this->Zalogowani($u['login'], $u['first_name'], $u['last_name'], $u['id'], $u['group_id']);

                    $this->messages->setError('');
                    return true;
                }
            }// end num_rows()
        }
    }

    /* funkcja sprawdza czy uzytkownik jest zalogowany */

    function isLogged() {
        // sprawdzamy userid-hash 
        if (isset($_SESSION['userid'])) {
            $userid = $_SESSION['userid'];

            $q = "SELECT id FROM " . $this->table . " WHERE MD5(CONCAT(id,login,password))='" . $userid . "'";
            $this->db->query($q);
            if ($this->db->num_rows() > 0) {
                // sprawdzamy privileges-hash 
                $id = $this->db->get_result();
                $privileges = $this->LoadUserPrivileges($id);

                if ($_SESSION['privileges_hash'] == md5(serialize($privileges))) {
                    // userid-hash OK
                    // privileges-hash OK 
                    return true;
                }
            }
        }

        $this->messages->setError($GLOBALS['_USER_NO_LOGIN']);
        return false;
    }

    /* funkcja sprawdza czy uzytkownik moze wejsc do panelu admina */

    function logAdmin() {
        if ($_SESSION['user']['admin_login'] == 1) {
            return true;
        } else {
            $this->messages->setMessage('user_error', $GLOBALS['_USER_NO_LOGIN_ADMIN']);
            return false;
        }
    }

    /* funkcja wylogowuje uzytkownika */

    function logOut() {
        if ($this->isLogged()) {
            unset($_SESSION['userid']);
            unset($_SESSION['user']);
            unset($_SESSION['privileges_hash']);
            return true;
        } else {
            return false;
        }
    }

// end logOut();	

    /* funkcja przeladowuje uprawnienia uzytkownika */

    function ReloadPrivileges() {
        $privileges = $this->LoadUserPrivileges($_SESSION['user']['id']);
        $_SESSION['privileges_hash'] = md5(serialize($privileges));
        $_SESSION['user']['privileges'] = $privileges;
        return true;
    }

    /* funkcja wczytuje uprawnienia uzytkownika */

    function LoadUserPrivileges($id) {
        $q = "SELECT g.privileges FROM " . $this->tableGroups . " g, " . $this->tableUsers . " u ";
        $q.= "WHERE u.group_id=g.id AND u.id='" . (int) $id . "'";
        $this->db->query($q);

        $privileges = $this->db->get_result();

        $p = explode('|', $privileges);

        $w = "";
        for ($i = 0; $i < count($p); $i++) {
            if (!empty($p[$i])) {
                if ($i > 0)
                    $w.= " OR ";
                $w.= " id='" . $p[$i] . "' ";
            }
        }
        unset($privileges);
        if (!empty($w)) {
            $q = "SELECT name FROM " . $this->tablePrivileges . " WHERE " . $w;

            $this->db->query($q);
            while ($row = $this->db->fetch_assoc()) {
                $privileges[$row['name']] = 1;
            }
            return $privileges;
        } else {
            return array();
        }
    }

    /* funkcja sprawdza uprawnienia danego uzytkownika */

    function CheckPrivileges($name, $exit = 1) {
        if ($_SESSION['user']['privileges'][$name] == 1) {
            return true;
        } else {
            if ($exit == 1) {
                $this->messages->setError($GLOBALS['_USER_NO_SEE_PAGE']);
                $this->tpl->display('index.tpl');
                die;
            }
        }
    }

    /* funkcja zapisuje nieudana probe logowania do bazy */

    function Log($login, $pass, $reason) {
        $login = addslashes($login);
        $pass = addslashes($pass);
        $reason = addslashes($reason);
        $hostname = gethostbyaddr(CLIENT_IP) . ' IP:' . CLIENT_IP;

        $q = "INSERT INTO " . $this->tableLog . " SET login='" . $login . "', pass='" . $pass . "', reason='" . $reason . "', ";
        $q.= "date_add=NOW(), host='" . $hostname . "'";
        $this->db->query($q);
        return true;
    }

    /* funkcja zapisuje logowania do bazy */

    function Zalogowani($login, $first_name, $last_name, $user_id, $group_id) {
        $login = addslashes($login);
        $hostname = gethostbyaddr(CLIENT_IP) . ' IP:' . CLIENT_IP;

        $q = "INSERT INTO " . $this->tableZalogowani . " SET login='" . $login . "', first_name='" . $first_name . "', last_name='" . $last_name . "', user_id='" . $user_id . "', group_id='" . $group_id . "', ";
        $q.= "date_add=NOW(), host='" . $hostname . "'";
        $this->db->query($q);
        return true;
    }

    /* funkcja ustawia hasło tymczasowe dla użytkownika */

    function remindPass(&$login) {
        $q = "SELECT login, password, email FROM " . $this->table . " WHERE login='" . addslashes($login) . "'";
        $this->db->query($q);
        if ($row = & $this->db->fetch_assoc()) {
            $new_pass = substr($row['password'], 0, 5);

            $q = "UPDATE " . $this->table . " SET password='" . md5($new_pass) . "' WHERE login='" . addslashes($login) . "'";
            $this->db->query($q);

            $subject = $GLOBALS['_USER_REMINDER_PASS'];
            $content = $GLOBALS['_USER_NEW_PASS'];
            $content.= ' ' . $new_pass . '<br>';
            $content.= $GLOBALS['_USER_CHANGE_NEW_PASS'];

            $this->mail->setSubject($subject);
            $this->mail->setBody($content);

            if ($this->mail->sendHTML($row['email'])) {
                $this->messages->setInfo($GLOBALS['_USER_GEN_NEW_PASS'] . $row['email']);
                return true;
            } else {
                $this->messages->setMessage('pass_error', $GLOBALS['_USER_BAD_GEN_PASS']);
                return false;
            }
        } else {
            $this->messages->setMessage('pass_error', $GLOBALS['_USER_NO_USER']);
            return false;
        }
    }

}

?>