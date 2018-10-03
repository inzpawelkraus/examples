<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

class db
{
	var $messages;	// obsluga bledow systemowych	
	
	var $connectId;
	var $query;
	var $result;
	var $queries = 0;
	var $timer = 0;
	var $tablePrefix;

/* konstruktor - laczenie sie z baza */	
	function db(&$messages, $charset='utf8', $prefix='')
	{
		$this -> messages =& $messages;
		
		$this -> tablePrefix = empty($prefix) ? DB_PREFIX : $prefix;
		$this -> connectId = @mysql_connect(base64_decode(DB_HOST), base64_decode(DB_USER), base64_decode(DB_PASS));
		if($this -> connectId)
		{
			$dbSelect = @mysql_select_db(base64_decode(DB_NAME), $this -> connectId);
			if(!$dbSelect)
			{
				$this -> _error('dbselect');
				mysql_close($this -> connectId);
				return false;
			}else{
				$this -> setCharset($charset);
				return true;
			}
		}else{
			$this -> _error('connect');
			return false;
		}

	}

/* odpowiedniki funkcji z mysql */
	function query($query)
	{
      $this -> result = '';
      $start = $this -> _get_time();
      $this -> result = @mysql_query($query, $this -> connectId);
      if(!$this -> result)
      {
        if(DEBUG_MODE == 1) echo '<p>'.$query.'</p>';
				$this -> _error('query'); 
        return false;
      }else{
        $this -> queries++;
        $this -> timer += $this -> _get_time() - $start;
        return true;
      }
	}
   
	function fetch_assoc($result = '')
	{
      $result = (empty($result)) ? $this -> result : $result;
      $array = mysql_fetch_assoc($result);
      if(!$array)
      {
         return false;
      }
      else
      {
         return $array;
      }
	}

	function get_all_rows($result = '')
	{
		while($row =& $this -> fetch_assoc($result))
		{
			$items[] = mstripslashes($row);
		}
		return $items;
	}

	function fetch_row($result = '')
	{
      $result = (empty($result)) ? $this -> result : $result;
      $array = mysql_fetch_row($result);
      if(!$array)
      {
         return false;
      }
      else
      {
         return $array;
      }
	}

	function get_result($result = '', $r = 0, $c = 0)
	{
      $result = (empty($result)) ? $this -> result : $result;
      if($this -> num_rows($result) > 0)
      {
      	$res = mysql_result($result, $r, $c);
	      if(!$res)
	      {
	         return false;
	      }
	      else
	      {
	         return $res;
	      }
		}else
		{
			return false;
		}
	}

	function num_rows($result = '')
	{
      $result = (empty($result)) ? $this -> result : $result;
      $numrows = mysql_num_rows($result);
      if(!isset($numrows))
      {
         return false;
      }else{
         return $numrows;
      }
	}

	function affected_rows()
	{
      return mysql_affected_rows($this -> connectId);
	}

	function insert_id()
	{
      return mysql_insert_id($this -> connectId);
	}

	function free_result($result = '')
	{
      $result = empty($result) ? $this -> result : $result;
      mysql_free_result($result);
	}

/* zamykanie polaczenia */	
	function close()
	{
      $dbClose = @mysql_close($this -> connectId);
      if(!$dbClose)
      {
         $this -> _error('dbclose');
         return false;
      }
      else
      {
         return true;
      }
	}

/* funkcje statystyczne */	
	function count_queries()
	{
      return $this -> queries;
	}

	function get_execution_time()
	{
      return round($this -> timer, 5);
	}

	function _get_time()
	{
      $time = explode(' ', microtime());
      return $time[0] + $time[1];
	} 

/* obsluga bledow */	
	function _error($type)
	{
		$text = '';
      switch($type)
      {
         case 'connect':
            $text .= 'Wystąpił błąd podczas łączenia się z serwerem baz danych';
            break;

         case 'dbselect':
            $text .= 'Wystąpił błąd podczas wybierania bazy danych';
            break;

         case 'query':
            $text .= 'Wystąpił błąd podczas wykonywania zapytania SQL';
            break;

         case 'dbclose':
            $text .= 'Wystąpił błąd podczas zamykania sesji bazy danych';
            break;

         default:
            $text .= 'Ogólny błąd serwera';
      }
      if($this -> connectId)
      $text .= '!<hr /><small><b>Odpowiedź MySQL:</b> ' . mysql_error($this -> connectId) . '</small>';
      $this -> messages -> setError($text, true);
	}
	
	function setCharset($charset)
	{
		$this -> query("SET NAMES '".$charset."'");
	}
	
	function getCharset()
	{
		return mysql_client_encoding($this -> connectId);
	}
}
?>