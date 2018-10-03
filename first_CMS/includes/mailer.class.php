<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

require_once ROOT_PATH . '/includes/phpmailer/class.phpmailer.php';

// define('DEBUG', 1);

class Mailer extends PHPMailer {

    var $tpl;
    var $messages;
    var $db;
    var $conf;

    function Mailer(&$root) {
        $this->tpl = & $root->tpl;
        $this->messages = & $root->messages;
        $this->db = & $root->db;
        $this->conf = & $root->conf;

        $this->CharSet = 'utf-8';
//		$this -> SetLanguage($root -> lang -> getCurrentLang(), ROOT_PATH.'/includes/phpmailer/language/');
        $this->SetLanguage('pl', ROOT_PATH . '/includes/phpmailer/language/');
        $this->isMail(true); // wysylamy przez funkcje mail();
    }

    /* funkcja wysyła e-mail w formacie html */

    function SendHTML($rcptTo = '', $replyTo = '') {
        $this->isHTML(true);
        $this->AltBody = $GLOBALS['_PAGE_EMAIL_HTML'];

        return $this->MySend($rcptTo, $replyTo);
    }

// end SendHTML()

    /* funkcja wysyla e-mail jako zwykly tekst */

    function SendPlain($rcptTo = '', $replyTo = '') {
        $this->isHTML(false);
        unset($this->AltBody);

        return $this->MySend($rcptTo, $replyTo);
    }

// end SendPlain()

    /* funkcja wysyla maila za pomoca klasy PHP-Mailer */

    function MySend($rcptTo = '', $replyTo = '') {
        if (!empty($rcptTo))
            $this->AddAddress($rcptTo);
        if (!empty($replyTo)) {
            $this->From = $replyTo;
            $this->FromName = $replyTo;
            $this->AddReplyTo($replyTo);
        } else {
            $this->From = BIURO_EMAIL;
            $this->FromName = FIRM_NAME;
        }

        if ($this->Send()) {
            return true;
        } else {
            $this->messages->setError($this->getError());
            return false;
        }
    }

// end MySend()	

    /* funkcja ustawia nadawce listu */

    function setFrom($from = '', $fromName = '') {
        if (!empty($from)) {
            $this->From = $from;
            if (!empty($fromName)) {
                $this->FromName = $fromName;
            } else {
                $this->FromName = $this->From;
            }
        }
        return true;
    }

// end setFrom	

    /* funkcja ustawia temat listu */

    function setSubject(&$subject) {
        $this->Subject = & $subject;
        return true;
    }

// end setSubject

    /* funkcja ustawia tresc listu (HTML lub plain/text) */

//	function setBody(&$body)
//	{
//            $this->Body = "
//                            <style>
//                            table, p, a
//                            {
//                            font-size:11px;
//                            margin:0px;
//                            padding:0px;
//                            font-family:Arial;
//                            color:#2a2a2a;
//                            }
//                            table
//                            {
//                            border-collapse:collapse;
//                            }
//                            hr
//                            {
//                            border:0px;
//                            border-bottom:1px solid #e5e5e5;
//                            }
//                            a
//                            {
//                            color:#ff402d;
//                            }
//                            </style>
//                            ";
//
//            $this->Body .= "<table border='0' width='100%' height='182' align='left' style='margin: 0px; padding: 0px; border-collapse: collapse; font-family: Arial; font-size: 11px'>
//                    <tbody>
//                            <tr>
//                                    <td style='height: 2px; line-height: 1px; background-color: #2e5700'>&nbsp;</td>
//                            </tr>
//                            <tr>
//                                    <td style='background-color: #afad24; line-height: 1px; height: 14px'>&nbsp;</td>
//                            </tr>
//                            <tr>
//                                    <td style='padding: 10px 40px; background-color: #f1f1f1; height: 45px'><strong>".$this -> Subject."</strong><br />
//                                    </td>
//                            </tr>
//                            <tr>
//                                    <td style='padding: 10px 40px; color: #2a2a2a'>
//                                    ";
//
//		$this -> Body .= $body;
//
//                $this -> Body .= "
//                                                </td>
//                                        </tr>
//                                </tbody>
//                        </table>";
//
//                //dump($this->Body);
//		return true;
//	}// end setBody


    function setBody(&$body) {


        $this->Body = $body;



        //dump($this->Body);
        return true;
    }

// end setBody

    function getError() {
        return $this->ErrorInfo;
    }

// end getError
}

?>