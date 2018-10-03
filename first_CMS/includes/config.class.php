<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

/* klasa zarzadzajaca konfiguracja w bazie danych */
class Config
{
	var $db;			// sterownik mysql
	var $table;		// nazwa tabeli
	var $vars;			// zmienne konfiguracyjne
	
	function Config(&$db, $table='config')
	{
		$this -> db		=& $db;
		$this -> table	= DB_PREFIX.$table;
		$this -> tableLang = DB_PREFIX.'languages';
		return true;
	}
	
	function setTable($table = '')
	{
		if($table == '') $table = 'config';		
		$this -> table = DB_PREFIX.$table;
		return true;
	}
	
	function setDefaultTable()
	{
		$this -> setTable();
	}
	
	/* funkcja wczytuje konfiguracje z bazy */
	function Load()
	{		
		$this -> db -> query("SELECT name,value FROM ".$this -> table." ORDER BY name ASC");
		while($config = $this -> db -> fetch_assoc())
		{
			$this -> vars[$config['name']] = stripslashes($config['value']);
		}
		return $this -> vars;
	}
	
	/* funkcja wczytuje konfiguracje z bazy */
	function LoadLang()
	{		
		$this -> db -> query("SELECT id, name, code, directory FROM ".$this -> tableLang." ORDER BY `order` ASC");
		while($lang = $this -> db -> fetch_assoc())
		{
			$langs[] = $lang;
		}
		return $langs;
	}
	
	/* funkcja wczytuje konfiguracje z bazy */
	function LoadLangAktywny($code)
	{		
		$this -> db -> query("SELECT id FROM ".$this -> tableLang." WHERE code='".$code."'");
		return $this -> db -> get_result();
	}
	
	/* funkcja wczytuje wszystkie nazwy opcji wraz z opisami */
	function LoadAllDescription($name = '%', $table = '')
	{
		$table = empty($table) ? $table = $this -> table : $table;
		$this -> db -> query("SELECT name,description FROM ".$table." WHERE name LIKE '".$name."' ORDER BY name");
		while($row =& $this -> db -> fetch_assoc())
		{
			$row =& mstripslashes($row);
			$items[] = $row;
		}
		return $items;
		
	}	

	/* funkcja wczytuje opcje z dodatkowej konfiguracji */
	function LoadAllDescriptionExtra($name = '%')
	{
		$this -> setTable('config_extra');
		$descriptions =& $this -> LoadAllDescription($name);
		$this -> setDefaultTable();
		return $descriptions;
	}
	
	/* funkcja wczytuje wartosc podanej opcji */
	function LoadOption($name, $table='')
	{
		$table = empty($table) ? $table = $this -> table : $table;
		$this -> db -> query("SELECT value FROM ".$table." WHERE name='".$name."'");
		return stripslashes($this -> db -> get_result());
	}
	
	/* funkcja wczytuje opcje z dodatkowej konfiguracji */
	function LoadOptionExtra($name)
	{
		$this -> setTable('config_extra');
		$option = $this -> LoadOption($name);
		$this -> setDefaultTable();
		return $option;
	}
	
	/* funckja wczytuje wartosc kilku opcji */
	function LoadOptions($options, $table='')
	{
		$table = empty($table) ? $table = $this -> table : $table;
		$options = str_replace(', ', "' OR '", $options);
		$q = "SELECT name, value FROM ".$table." WHERE name LIKE '".$options."'";
		$this -> db -> query($q);
		while($rekord = $this -> db -> fetch_assoc())
		{
			$vars[$rekord['name']] = stripslashes($rekord['value']);	
		}
		return $vars;
	}

	/* funkcja wczytuje opcje z dodatkowej konfiguracji */
	function LoadOptionsExtra($options)
	{
		$this -> setTable('config_extra');
		$option = $this -> LoadOptions($options);
		$this -> setDefaultTable();
		return $option;
	}

	/* funkcja wczytuje wartosc podanej opcji */
	function LoadOptionWithDescription($name, $table='')
	{
		$table = empty($table) ? $table = $this -> table : $table;
		$this -> db -> query("SELECT description,value FROM ".$table." WHERE name='".$name."'");
		$row =& $this -> db -> fetch_assoc();
		return mstripslashes($row);
	}

	/* funkcja wczytuje opcje z dodatkowej konfiguracji */
	function LoadOptionWithDescriptionExtra($name)
	{
		$this -> setTable('config_extra');
		$option =& $this -> LoadOptionWithDescription($name);
		$this -> setDefaultTable();
		return $option;
	}

	
	/* funkcja wczytuje konfiguracje z bazy, ktora jest gotowa do edycji */
	function LoadToEdit()
	{
		$this -> db -> query('SELECT name,value,description FROM '.$this -> table.' WHERE admin_view = 1 ORDER BY name ASC');
		while($config = $this -> db -> fetch_assoc())
		{
			$c[] = mstripslashes($config);
		}
		return $c;
	}

	/* funkcja dodaje zmienna konfiguracyjna do bazy */
	function Insert($name, $value, $description)
	{
		$q = "INSERT INTO ".$this -> table." SET ";
		$q.= "name='".$name."', ";
		$q.= "value='".addslashes($value)."', ";
		$q.= "description='".$description."'";

		return $this -> db -> query($q);
	}
	
	/* funkcja uaktualnia zmienna konfiguracyjna */
	function Update($name, &$value, $table='')
	{
		$table = empty($table) ? $table = $this -> table : $table;	
		$q = "UPDATE ".$table." SET ";
		$q.= "value='".addslashes($value)."' ";
		$q.= "WHERE name='".$name."'";
		
		return $this -> db -> query($q);
	}
	
	/* funkcja uaktualnia opcje w dodatkowej konfiguracji */
	function UpdateExtra($name, &$value)
	{
		$this -> setTable('config_extra');
		$resp =$this -> Update($name, $value); 	
		$this -> setDefaultTable();
		return $resp;
	}
	
	/* funkcja uaktualnia cala konfiguracje */
	function UpdateAll($dane)
	{
		
		if(is_array($dane))
		{
			for($i=1; $i<=$dane['ile_all']; $i++)
			{
				$q = "UPDATE ".$this->table." SET value='".addslashes($dane['conf_value_'.$i])."' WHERE name='".$dane['conf_name_'.$i]."' LIMIT 1";
				//echo "<br>q:".$q;
				$this -> db -> query($q);
			}
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/* funkcja kasuje zmienna konfiguracyjna */
	function Delete($name)
	{
		$q = "DELETE FROM ".$this -> table." WHERE name='".$name."'";
		return $this -> db -> query($q);
	}

 	function make_unique_url($url, $table, $field, $language_id=1, $exclude="", $exclude_field="parent_id")
	{
            $q = "SELECT count(*) as ile FROM ".$table." WHERE ".$field." like '".$url."' AND language_id='".$language_id."'";
            if($exclude)
            {
                $q.= " AND ".$exclude_field."<>'".$exclude."'";
            }
            $this -> db -> query($q);

            $powtorka=0;//ok

            $row = $this -> db -> fetch_assoc();
            if($row['ile']>0)
            {
                    $powtorka = 1;

                    while($powtorka==1)
                    {
                            $url=$url."-";
                            $q = "SELECT count(*) as ile FROM ".$table." WHERE ".$field." like '".$url."' AND language_id='".$language_id."'";
                            if($exclude)
                            {
                                $q.= " AND ".$exclude_field."<>'".$exclude."'";
                            }
                            $this -> db -> query($q);
                            $row = $this -> db -> fetch_assoc();
                            if($row['ile']==0)
                            {
                                    return $url;
                            }
                    }

            }

            return $url;
	}
        
        function sharpen($sourcefile, $append="_s")
        {
            $ext = end(explode(".", strtolower(strtolower($sourcefile))));

            $sourcefile = str_replace(".".$ext, '', $sourcefile);
            $sourcefile = $sourcefile.$append.".".$ext;

            // create the image resource from a file
            switch($ext)
            {
                    case "png":
                        $i = imagecreatefrompng($sourcefile);
                        break;

                    case "jpeg":
                            $i = imagecreatefromjpeg($sourcefile);
                        break;

                    case "gif":
                        $i = imagecreatefromgif($sourcefile);
                        break;

                    default:
                            $i = imagecreatefromjpeg($sourcefile);
                        break;
            }

            $sharpen = array
            (
                array(-1.2, -1, -1.2),
                array(-1, 20, -1),
                array(-1.2, -1, -1.2)
            );

//$sharpen = array(-1,-1,-1,-1,16,-1,-1,-1,-1);

            // calculate the sharpen divisor
            $divisor = array_sum(array_map('array_sum', $sharpen));

            // apply the matrix
            imageconvolution($i, $sharpen, $divisor, 0);


            // output the image
            switch($ext)
            {
                    case "png":
                        imagepng($i, $sourcefile, 0);
                        break;

                    case "jpeg":
                            imagejpeg($i, $sourcefile, 100);
                        break;

                    case "gif":
                        imagegif($i, $sourcefile, 100);
                        break;

                    default:
                            imagejpeg($i, $sourcefile, 100);
                        break;
            }

            imagedestroy($i);
        }

	function ZrobMiniatura($nazwa, $wys, $szer, $koncowka, $kadrowanie=0, $dir="", $min_dir="", $kadr_x=0, $kadr_y=0)
	{



            list($width, $height) = getimagesize($dir."/".$nazwa);
            $ext = end(explode(".", strtolower(strtolower($nazwa))));
            if(strlen($ext)==4)
            {
                $nazwa_min = $dir."/".$min_dir.substr($nazwa, 0, strlen($nazwa)-5).$koncowka.".".end(explode(".", strtolower(strtolower($nazwa))));
            }
            else
            {
                $nazwa_min = $dir."/".$min_dir.substr($nazwa, 0, strlen($nazwa)-4).$koncowka.".".end(explode(".", strtolower(strtolower($nazwa))));
            }



            $start_x = 0;
            $start_y = 0;
            
            if(($width == $szer)&&($height==$wys))
            {
                copy($dir."/".$nazwa, $nazwa_min);
                return;
            }


            if($kadrowanie)
            {
                $ratio_x = $szer / $width;
                $ratio_y = $wys / $height;

                if($ratio_y > $ratio_x)
                {
                        $new_width = $width*$ratio_y;
                        $new_height = $wys;

                        //$start_x = ceil($new_width - $szer);
                        $start_x = ceil(($width/130)*$kadr_x);
                        $start_y = 0;
                }
                else
                {
                        $new_height = $height*$ratio_x;
                        $new_width = $szer;
                        $start_x = 0;
                        $start_y = ceil(($width/130)*$kadr_y);

                        if(($start_y + $wys)>$new_height)
                        {
                            $start_y--;
                        }

                }
            }
            elseif($wys==0)
            {
                $ratio = $szer/$width;
                $new_width=$szer;
                $new_height=$height*$ratio;
            }
            elseif($szer==0)
            {
                $ratio = $wys/$height;
                $new_height=$wys;
                $new_width=$width*$ratio;
            }
            else
            {
                $ratio_x = $szer / $width;
                $ratio_y = $wys / $height;


                if($ratio_y < $ratio_x)
                {
                        $new_width = $width*$ratio_y;
                        $new_height = $wys;
                }
                else
                {
                        $new_height = $height*$ratio_x;
                        $new_width = $szer;
                }
            }



            if($kadrowanie)
            {
                $image_p = imagecreatetruecolor($szer, $wys);
            }
            else
            {
                $image_p = imagecreatetruecolor($new_width, $new_height);
            }


            //switch(strtolower(substr($nazwa, strlen($nazwa)-3, 3)))
            switch(end(explode(".", strtolower(strtolower($nazwa)))))
            {
                    case "jpg":
                            $image = imagecreatefromjpeg($dir."/".$nazwa);
                            imagecopyresampled($image_p, $image, 0, 0, $start_x, $start_y, $new_width, $new_height, $width, $height);

                            imagejpeg($image_p, $nazwa_min, 100);
                            imagedestroy($image_p);
                    break;

                    case "gif":
                            $image = imagecreatefromgif($dir."/".$nazwa);

                            $transparencyIndex = imagecolortransparent($image);
                            $transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255);

                            if ($transparencyIndex >= 0) {
                                $transparencyColor    = imagecolorsforindex($image, $transparencyIndex);
                            }

                            $transparencyIndex    = imagecolorallocate($image_p, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']);
                            imagefill($image_p, 0, 0, $transparencyIndex);
                            imagecolortransparent($image_p, $transparencyIndex);
                            imagecopyresampled($image_p, $image, 0, 0, $start_x, $start_y, $new_width, $new_height, $width, $height);
                            imagegif($image_p, $nazwa_min, 100);
                            imagedestroy($image_p);
                    break;

                    case "jpeg":
                            $image = imagecreatefromjpeg($dir."/".$nazwa);
                            imagecopyresampled($image_p, $image, 0, 0, $start_x, $start_y, $new_width, $new_height, $width, $height);
                            imagejpeg($image_p, $nazwa_min, 100);
                            imagedestroy($image_p);
                    break;

                    case "png":
                            $image = imagecreatefrompng($dir."/".$nazwa);
                            imagealphablending($image_p, false); // setting alpha blending on
                            imagecopyresampled($image_p, $image, 0, 0, $start_x, $start_y, $new_width, $new_height, $width, $height);
                            imagesavealpha($image_p, 0,0,0,0); // save alphablending setting (important)
                            $black = imagecolorallocate($image_p, 0, 0, 0);
                            imagecolortransparent($image_p, $black);
                            imagepng($image_p, $nazwa_min, 0);
                            imagedestroy($image_p);
                    break;



            }
            
            if($koncowka)
            {
                $this->sharpen($nazwa_min, "");
            }

	}

}
?>