<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');

class dbStatement {

    private $messages;
    private $link;
    private $result;
    private $result_index;
    private $result_meta;
    private $stmt;
    private $query;
    private $types;
    private $params;
    private $stop;
    private $success;
    private $affected_rows;
    private $num_rows;
    private $prepared;

    const INTEGER = 'i';
    const DOUBLE = 'd';
    const STRING = 's';
    const BLOB = 'b';

    function __construct($query, $params, &$link, &$messages, $stop) {
        $this->messages = $messages;
        $this->link = $link;
        $this->result = false;
        $this->result_index = 0;
        $this->stmt = null;
        $this->query = $query;
        $this->stop = $stop;
        $this->success = false;
        $this->prepared = false;
        $this->affected_rows = 0;
        if (is_array($params)) {
            $this->types = '';
            $this->params = array();
            foreach ($params as $param) {
                $this->types .= $param[0];
                $this->params[] = $param[1];
            }
        } else {
            $this->types = false;
            $this->params = false;
        }
    }

    function refValues($arr) {
        if (strnatcmp(phpversion(), '5.3') >= 0) { //Reference is required for PHP 5.3+
            $refs = array();
            foreach ($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }

    function createResult() {
        $result = array();
        $row = array();
        $params = array();
        $this->result_meta = $this->stmt->result_metadata();
        if ($this->result_meta) {
            while ($field = $this->result_meta->fetch_field()) {
                $params[] = &$row[$field->name];
            }

            call_user_func_array(array($this->stmt, 'bind_result'), $params);

            while ($this->stmt->fetch()) {
                foreach ($row as $key => $val) {
                    $c[$key] = $val;
                }
                $result[] = $c;
            }
        }
        return $result;
    }

    function execute() {
        if ($this->params) {
            $this->stmt = $this->link->prepare($this->query);
            if ($this->stmt) {
                call_user_func_array(array(&$this->stmt, 'bind_param'), $this->refValues(array_merge(array($this->types), $this->params)));
                $this->success = $this->stmt->execute();
                $this->affected_rows = $this->stmt->affected_rows;
                if ($this->stop) {
                    var_dump($this->stmt);
                }
                if (!$this->success) {
                    $error = 'Wystąpił błąd podczas wykonywania zapytania SQL!<br />';
                    $error .= '<b>' . $this->query . '<b><hr />';
                    $error .= '<small><b>Odpowiedź MySQL:</b> Błąd numer ' . $this->stmt->errno . ': ' . $this->stmt->error . '</small>';
                    $this->messages->setError($error, true);
                    die();
                }
                $this->prepared = true;
                $this->stmt->store_result();
                $this->result = $this->createResult();
            } else {
                $error = 'Wystąpił błąd podczas wykonywania zapytania SQL!<br />';
                $error .= '<b>' . $this->query . '<b><hr />';
                $error .= '<small><b>Odpowiedź MySQL:</b> Błąd numer ' . $this->link->errno . ': ' . $this->link->error . '</small>';
                $this->messages->setError($error, true);
                die();
            }
        } else {
            $this->result = $this->link->query($this->query);
            $this->affected_rows = $this->link->affected_rows;
            if (!$this->result) {
                $error = 'Wystąpił błąd podczas wykonywania zapytania SQL!<br />';
                $error .= '<b>' . $this->query . '<b><hr />';
                $error .= '<small><b>Odpowiedź MySQL:</b> Błąd numer ' . $this->link->errno . ': ' . $this->link->error . '</small>';
                $this->messages->setError($error, true);
                die();
            } else {
                $this->success = true;
            }
        }

        return $this;
    }

    function is_success() {
        return $this->success;
    }

    function fetch_assoc() {
        if ($this->prepared) {
            if (isset($this->result[$this->result_index])) {
                $result = $this->result[$this->result_index];
                $this->result_index++;
                return $result;
            } else {
                return false;
            }
        } else {
            if ($this->result) {
                return $this->result->fetch_assoc();
            }
            return false;
        }
    }

    function fetch_row() {
        if ($this->prepared) {
            if (isset($this->result[$this->result_index])) {
                $this->result_index++;
                $fields = $this->result[$this->result_index];
                $i = 0;
                $row = array();
                foreach ($fields as $field) {
                    $row[$i] = $field;
                    $i++;
                }
                return $row;
            } else {
                return false;
            }
        } else {
            if ($this->result) {
                return $this->result->fetch_row();
            }
            return false;
        }
    }

    function get_all_rows() {
        if ($this->prepared) {
            if (count($this->result) > 0) {
                $items = array();
                while ($row = $this->fetch_assoc()) {
                    $items[] = $row;
                }
                return $items;
            }
            return false;
        } else {
            if ($this->result) {
                $items = array();
                while ($row = $this->result->fetch_assoc()) {
                    $items[] = $row;
                }
                return $items;
            }
            return false;
        }
    }

    function get_result($r = 0, $c = 0) {
        if ($this->prepared) {
            if (count($this->result) > 0 && $r < count($this->result)) {
                $row = $this->result[$r];
                $value = false;
                $i = 0;
                foreach ($row as $field) {
                    if ($i == $c) {
                        $value = $field;
                    }
                    $i++;
                }
                return $value;
            }
            return false;
        } else {
            if ($this->result) {
                if ($this->result->num_rows == 0) {
                    return false;
                }
                $this->result->data_seek($r);
                $row = $this->result->fetch_array();
                $value = false;
                if (isset($row[$c])) {
                    $value = $row[$c];
                }
                return $value;
            }
            return false;
        }
    }

    function insert_id() {
        return $this->link->insert_id;
    }

    function affected_rows() {
        return $this->affected_rows;
    }

    function num_rows() {
        if ($this->prepared) {
            return count($this->result);
        } else {
            return $this->result->num_rows;
        }
    }

    function num_fields() {
        return $this->link->field_count;
    }

    function fetch_field($number) {
        if ($this->prepared) {
            return $this->result_meta->fetch_field_direct($number);
        } else {
            return $this->result->fetch_field_direct($number);
        }
    }

}

?>