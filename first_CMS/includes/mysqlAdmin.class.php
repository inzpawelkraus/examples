<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
class MysqlAdmin
{
	var $db;
	var $conf;
	var $messages;
	var $tpl;
	var $dir;
	var $url;
	
	function MysqlAdmin(&$root)
	{
		$this -> db		= &$root -> db;		
		$this -> conf	= &$root -> conf;
		$this -> messages	= &$root -> messages;
		$this -> tpl		= &$root -> tpl;
		$this -> dir = ROOT_PATH.'/';
		$this -> url = BASE_URL.'/';
	}
	
	function sprawdzKatalog()
	{
		$dir = $this -> dir.$this -> conf -> vars['katalog_baza'];
		if(strlen($this -> conf -> vars['katalog_baza']) < 30 || !file_exists($dir))
		{
			$katalog = 'baza-'.md5(time() + rand());
			if(mkdir(ROOT_PATH.'/'.$katalog))
			{
				copy(ROOT_PATH.'/upload/index.php', ROOT_PATH.'/'.$katalog.'/index.php');
				$q = "UPDATE ".DB_PREFIX."config SET value='".addslashes($katalog)."' WHERE name='katalog_baza'";
				$this -> db -> query($q);
				return $katalog;
			}
			return true;
		}
	}
	
	function _mysqlExportZip($katalog = '')
	{
		if(empty($katalog))
		{
			$dir = $this -> dir.$this -> conf -> vars['katalog_baza'];
			$katalog = $this -> conf -> vars['katalog_baza'];
		}
		else 
		{
			$dir = $this -> dir.$katalog;
		}
	
		if($this->_mysqlExport($katalog))
		{
			$zip = new ZipArchive();
			$plik_arch = $katalog.'/'.date('Y-m-d').'.zip';
			if ($zip->open($plik_arch, ZIPARCHIVE::CREATE) !==TRUE) 
			{
				$this -> messages -> setError('Nie mogę zrobić pliku archiwum!');
			}

			$zip->addFile($katalog."/".date('Y-m-d').'.sql', date('Y-m-d').'.sql');
			
		
			if($zip->close())
			{
				unlink($dir.'/'.date('Y-m-d').'.sql');
			
				$this -> messages -> setInfo('Wszytkie dane zostały exportowane do pliku .zip');
			}
			else
			{
			
			}
		}
		else
		{
			return false;
		}
	}
	
	function _mysqlExport($katalog = '')
	{
		if(empty($katalog)) $dir = $this -> dir.'/'.$this -> conf -> vars['katalog_baza'];
		else $dir = $this -> dir.'/'.$katalog;
		
		
		if(strlen($this -> conf -> vars['katalog_baza']) > 30 and file_exists($dir))
		{
		
			$mysql = "--		autor: 		PKDevelop
--		data:		".date("m.d.Y")."
--		system:		".$this -> conf -> vars['ver']."
--
-- Baza danych: `".base64_decode(DB_NAME)."`
--\n\n";

			if($mysql.= $this -> mysqldump())
			{
				$baza=fopen($dir.'/'.date('Y-m-d').'.sql', 'w');
				fwrite($baza, $mysql);
				fclose($baza);
			
				$this -> messages -> setInfo('Wszytkie dane zostały exportowane do pliku!');
				return true;
			}else
			{
				$this -> messages -> setError('Wystąpił błąd podczas pobierania danych!');
				return false;
			}
		}
	}

	function mysqldump()
	{
		$sql="show tables;";
		$result= mysql_query($sql);
		if( $result)
		{
			while( $row= mysql_fetch_row($result))
			{
				$mysql2.= $this -> mysqldump_table_structure($row[0]);
				$mysql2.= $this -> mysqldump_table_data($row[0]);
			}
		}
		else
		{
			$mysql2.= "-- No tables in `".base64_decode(DB_NAME)."` \n";
		}
		
		mysql_free_result($result);
		return $mysql2 ;
	}

	function mysqldump_table_structure($table)
	{
		$mysql3.= "-- Struktura tabeli dla `$table` \n\n";

			$mysql3.= "DROP TABLE IF EXISTS `$table`;\n";
		
			$sql="SHOW CREATE TABLE `$table`; ";
			$result=mysql_query($sql);
			if( $result)
			{
				if($row= mysql_fetch_assoc($result))
				{
					$row['Create Table'] = preg_replace('/^CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $row['Create Table']);
					$mysql3.= $row['Create Table'].";\n\n";
				}
			}
			mysql_free_result($result);
			return $mysql3;
	}

	function mysqldump_table_data($table)
	{
		
		$sql="select * from `$table`;";
		$result=mysql_query($sql);
		if( $result)
		{
			$num_rows= mysql_num_rows($result);
			$num_fields= mysql_num_fields($result);
			
			if( $num_rows > 0)
			{
				$mysql4.= "-- Zrzut danych tabeli `$table` \n\n";
				
				$field_type=array();
				$i=0;
				while( $i < $num_fields)
				{
					$meta= mysql_fetch_field($result, $i);
					array_push($field_type, $meta->type);
					$i++;
				}
				
				//print_r( $field_type);
				$index=0;
				while( $row= mysql_fetch_row($result))
				{
					$mysql4.= "INSERT INTO `$table` VALUES (";
					for( $i=0; $i < $num_fields; $i++)
					{
						if( is_null( $row[$i]))
							$mysql4.= "null";
						else
						{
							switch( $field_type[$i])
							{
								case 'int':
									$mysql4.= $row[$i];
									break;
								case 'string':
								case 'blob' :
								default:
									$mysql4.= "'".mysql_real_escape_string($row[$i])."'";
									
							}
						}
						if( $i < $num_fields-1)
						$mysql4.= ",";
				}
				$mysql4.= ");\n";
				
				$index++;
				}
			}
		}
		mysql_free_result($result);
		$mysql4.= "\n";
		return $mysql4;
	}
	
	/* funkcja laduje linki */
	function LoadPliki($katalog = '')
	{
		if(empty($katalog))
		{
			$dir = $this -> dir.'/'.$this -> conf -> vars['katalog_baza'];
			$dir_tmp = $this -> conf -> vars['katalog_baza'];
		}
		else
		{
			$dir = $this -> dir.'/'.$katalog;
			$dir_tmp = $katalog;
		}
		
		if(strlen($dir_tmp) > 30 and file_exists($dir))
		{
			foreach(glob($dir.'/*', GLOB_BRACE) as $file2){
				if($file2 != '.' && $file2 != '..')
					$file3 = substr(strrchr($file2, "/"), 1);
					$file['name'] = $file3;
					$file['size'] = round(filesize($file2) / 1024, 3);
					if($file['name']!='index.php') $items[] = $file;
				}	
				if($items) array_reverse($items);
			return $items;
		}
	}

	function _mysqlImport($file)
	{
		$dir = $this -> dir.$this -> conf -> vars['katalog_baza'];
		if(strlen($this -> conf -> vars['katalog_baza']) > 30 and file_exists($dir))
		{
			if(file_exists($dir.'/'.$file))
			{
			
				if(substr($file, (strlen($file)-3), 3)=="zip")
				{
					$zip = new ZipArchive;
					$plik_arch = $dir.'/'.$file;
					if ($zip->open($plik_arch) !== TRUE) {

						$this -> messages -> setError('Wystąpił błąd podczas próby dostępu do archiwum');
					} 
					else 
					{

						$zip->extractTo($dir);
						$zip->close();
					}
					
					$file = substr($file, 0, (strlen($file)-4)).".sql";
				}
				
				if(!file_exists($dir.'/'.$file)||filesize($dir.'/'.$file)==0)
				{
					$this -> messages -> setError('Niepoprawny plik');
					unlink($dir.'/'.$file);
					return false;
				}

				
				$sql = explode(";\n", file_get_contents ($dir.'/'.$file));

				for ($i=0; $i<count($sql)-1; $i++)
				{
					if(!empty($sql[$i]))
					{
						if(!mysql_query($sql[$i]))
						{
							$this -> messages -> setError('MySQL zwrócił błąd w zapytaniu #'.$i.':');
							die;  
						}
					}
				}
			
				unlink($dir.'/'.$file);
				$this -> messages -> setInfo('Wszytkie dane zostały importowane do bazy!');
				return true;
			}else
			{
				$this -> messages -> setError('Wystąpił błąd podczas zapisywania danych!');
				return false;
			}
		}
	}
	
}
?>