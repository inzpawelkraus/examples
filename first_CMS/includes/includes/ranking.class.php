<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
class Ranking
{
	var $db;
	var $conf;
	var $messages;
	var $tpl;
	var $table;
	
	function Ranking(&$root, $table='ranking')
	{
		$this -> db		= &$root -> db;		
		$this -> conf	= &$root -> conf;
		$this -> messages	= &$root -> messages;
		$this -> tpl		= &$root -> tpl;
		$this -> table	= DB_PREFIX.$table;
		$this -> tablePozycja	= DB_PREFIX.$table.'_pozycja';
		
		$this -> dc = 'www.google.pl';
	}
	
	// funkcja wczytuje wszytkie anchory
	function LoadAnchor()
	{
		$q = "SELECT * FROM ".$this -> table." ORDER BY anchor";

		$this -> db -> query($q);
			while($row =& $this -> db -> fetch_assoc())
			{
				$row =& mstripslashes($row);
				$items[]= $row;
			}

			for($i=0;$i<count($items);$i++)
			{
				$q = "SELECT * FROM ".$this -> tablePozycja." WHERE parent_id='".$items[$i]['id']."' ORDER BY date_add DESC LIMIT 1";
				$this -> db -> query($q);
				$row = $this -> db -> fetch_assoc();
				$items[$i]['pozycja'] = $row['pozycja'];
				$articles[$i]= $items[$i];
			}
		
		return $articles;
	}
	
	// funkcja wczytuje wszytkie anchory
	function LoadName($id)
	{
		$q = "SELECT anchor FROM ".$this -> table." WHERE id='".$id."'";

		$this -> db -> query($q);
		$row =& $this -> db -> fetch_assoc();
		return $row['anchor'];
	}
	
	// sprawdzanie pozycji w googlech
	function checkPozycje()
	{
		$q = "SELECT * FROM ".$this -> table." ";

		$this -> db -> query($q);
		while ($row =& $this -> db -> fetch_assoc())
		{
		unset($srednia);
		$w1 = $this -> checkGoogle($this -> dc, DOMENA, $row['anchor']);
		$w2 = $this -> checkGoogle2($this -> dc, DOMENA, $row['anchor']);
			if($w1!=0 || $w2!=0) $srednia = floor(($w1+$w2)/2);
			if($w1==0) $srednia = $w2;
			if($w2==0) $srednia = $w1;
				$row['w1'] =$w1;
				$row['w2'] =$w2;
				$row['srednia'] =$srednia;
				$wynik[] = $row;
		}
	
		for($i=0;$i<count($wynik);$i++)
		{
			if(!empty($wynik[$i]['srednia']))
			{
				$q = "INSERT INTO ".$this -> tablePozycja." SET parent_id='".$wynik[$i]['id']."', pozycja='".$wynik[$i]['srednia']."', date_add=NOW()";
				$this -> db -> query($q);
			}
		}
	}
	
	function countAnchor()
	{
		$q = "SELECT COUNT(id) FROM ".$this -> table." ";
		$this -> db -> query($q);
		return $this -> db -> get_result();
	}
	
	function checkGoogle($dc, $url, $q)
	{
		$q = str_replace(' ','+',$q);
		preg_match_all('|href=(.*)>|U', file_get_contents('http://'.$dc.'/ie?hl=pl&q='.$q.'&num=100&lr='), $table, PREG_PATTERN_ORDER);

		$zm = '123456789000qwerty';
		$zm1 = '000987654321ytewq';
		$twice = 0;
		
			for($n=0; $n<100; $n++)
			 {
				 if(substr($zm, 11, 5) == substr($zm1, 11, 5))
				 $twice++; // zmienna odpowiadajaca za powtarzanie sie wyników
				 $zm1 = $table[1][$n];
				 if(ereg($url, $zm1))
				 break;
				 $zm = $table[1][$n-1];
			 }
			 
			$wynik = $n-$twice;

		if($n==100)	return false;
		else	return $wynik;
	}

	function checkGoogle2($dc, $sSite, $sQ)
	{
		$sLinkRegExp = '/<li class=g><h3 class=r><a href="([^"]+)"/';  
		$sURLTpl = 'http://'.$dc.'/search?hl=pl&q=%s&num=100&lr=';
			
		$rC = curl_init();  
		curl_setopt($rC, CURLOPT_HEADER, 0);  
		curl_setopt($rC, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($rC, CURLOPT_VERBOSE, 1);  
		curl_setopt($rC, CURLOPT_REFERER, 'www.google.pl');  
		curl_setopt($rC, CURLOPT_URL, sprintf($sURLTpl, urlencode($sQ)));     
		$sData = curl_exec($rC);  
		curl_close($rC);  
		
		preg_match_all($sLinkRegExp, $sData, $aResults);  
		$aResults = array_pop($aResults);  
			
		$iPosition = '';  
		
		foreach($aResults as $iKey => $sRow)
		{  
			if(strstr(strip_tags($sRow), 'http://'.$sSite) !== false)
			{  
				$iPosition = $iKey + 1;  
			}  
		}  
		
		return $iPosition;  
	}

}
?>