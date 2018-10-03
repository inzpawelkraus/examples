<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 
class Image
{
	var $filename;
	var $newFilename;
	var $newW;		// width
	var $newH;		// height
	
	var $_content;
	var $_newContent;
	var $_type;	
	var $_w;	// width
	var $_h;	// height

	var $_error;

	function Image() {}
	
	/* funkcja usuwa zmienne, na ktorych operuje */
	function clearVars()
	{
		$this -> imgDestroy();
		unset($this -> filename);
		unset($this -> newFilename);
		unset($this -> newW);
		unset($this -> newH);
		unset($this -> _content);
		unset($this -> _newContent);
		unset($this -> _type);
		unset($this -> _w);	
		unset($this -> _h);	
		unset($this -> _error);
		return true;
	}
	
	/* funkcja dodaje obrazek na ktorym klasa bedzie operowac */
	function addImage($filename='', $append='_s')
	{
		$this -> clearVars();
		$lastDot = strrpos($filename, '.');
		$ext = substr($filename, $lastDot, strlen($filename));
		$filename = str_replace($ext, '', $filename);
		
		if(empty($filename))
		{
			$this -> _error = 1;
			return false;
		}else{
			$this -> filename = $filename.$ext;
			$this -> newFilename.= $filename.$append.$ext;
			return true;
		}
	}

	/* funkcja odczytuje informacje o obrazku */
	function readImageInfo()
	{
		if($imageInfo = getimagesize($this -> filename))
		{
			$this -> _w = $imageInfo[0];
			$this -> _h = $imageInfo[1];
			$this -> _type = $imageInfo[2];

			return true;
		}else{
			$this -> _error = 2;
			return false;
		}
	}

	/* funkcja wczytuje obrazek do pamieci */	
	function readImageContent()
	{
		switch($this -> _type)
		{
			case '1' :	// GIF 
				$img = ImageCreateFromGif($this -> filename);
				break;
			case '2' : 	// JPG
				$img = imagecreatefromjpeg($this -> filename);
				break;
			case '3' : // PNG
				$img = ImageCreateFromPng($this -> filename);
				break;
			default : 
				$this -> _error = 3;
				return false;
		}
		
		if(!$img)
		{
			$this -> _error = 2;
			return false;
		}else{
			$this -> _content = $img;
			return true;			
		}
	}
	
	/* funkcja tworzy nowy obrazek o zmienionych rozmiarach na podstawie starego */
	function imageResample($max_h = 0, $kadrowanie=0)
	{
		$width = $this -> newW;
		$height = $this -> newH;

		if($this -> newW > $this -> _w)
		{
			$width = $this -> _w;
			$height = $this -> _h;
		}




		if(($max_h > 0) and ($height>$max_h)) // gdy mamy podany rozmiar to skalujemy podwojnie...
		{

			// najpierw skalujemy do normalnej wysokosci
			ImageCopyResampled($this -> _newContent, $this -> _content, 0, 0, 0, 0, $width,$height, $this -> _w, $this -> _h);
			$this -> _content = $this -> _newContent;

			$this -> _newContent = ImageCreateTrueColor($width, $max_h);
//			ImageAntiAlias($this -> _newContent, true);

			// a teraz przeskalowujemy do odpowiedniej wysokosci
			return ImageCopyResampled($this -> _newContent, $this -> _content, 0, 0, 0, floor(($height-$max_h)/2), $width,$max_h,$width,$max_h);
		}
		else
		{

			if($kadrowanie)
			{

				$ratio_x = $width / $this -> _w;
				$ratio_y = $height / $this -> _h;



				if($ratio_y > $ratio_x)
				{
					$new_w = $this -> _w*$ratio_y;
					$new_h = $height;

					$start_x = ceil($new_w - $width);
					$start_y = 0;

				}
				else
				{
					$new_h = $this -> _h*$ratio_x;
					$new_w = $width;
					$start_x = 0;
					$start_y = ceil($new_h - $height);
				}



				$temp = ImageCreateTrueColor($new_w, $new_h);
//				ImageAntiAlias($temp, true);
				//$start_x, $start_y,
				return ImageCopyResampled($this -> _newContent, $this -> _content, 0, 0, $start_x, $start_y, $new_w,$new_h, $this -> _w, $this -> _h);



				//return ImageCopyResampled($this -> _newContent, $temp, 0, 0, $start_x, $start_y, $width,$height, $new_w, $new_h);

				//return ImageCopyResampled($this -> _newContent, $this -> _content, 0, 0, 0, 0, $width,$height, $this -> _w, $this -> _h);
			}
			else
			{
				return ImageCopyResampled($this -> _newContent, $this -> _content, 0, 0, 0, 0, $width,$height, $this -> _w, $this -> _h);
			}

		}
	}
	
	/* funkcja tworzy miniaturke zdjecia */
	function createThumb($width=0, $display = false, $height = 0, $kadrowanie=0)
	{
			
		if($this -> readImageInfo() AND $this ->readImageContent())
		{

			
		
			//
			if($width==0)
			{
				if($this->_h > $height)
				{
					$this->newH = $height;
					$ratio = $this->newH / $this->_h;
					$this->newW = $this->_w * $ratio;
				}
				else
				{
						$this->newH = $this->_h;
						$this->newW = $this->_w;
				}
			}
			elseif($height==0)
			{
				if($this->_w > $width)
				{
					$this->newW = $width;
					$ratio = $this->newW / $this->_w;
					$this->newH = $this->_h * $ratio;
				}
				else
				{
					$this->newH = $this->_h;
					$this->newW = $this->_w;
				}
			}
			else
			{
      		if($kadrowanie==0)
				{
					if($this->_w > $this->_h)
					{
						$this->newW = $width;
						$ratio = $this->newW / $this->_w;
						$this->newH = $this->_h * $ratio;
					}
					else
					{
						$this->newH = $height;
						$ratio = $this->newH / $this->_h;
						$this->newW = $this->_w * $ratio;
					}
				}
				else
				{

					$this->newW = $width;
					$this->newH = $height;
				}
			}
			
			

						
			$this -> _newContent = ImageCreateTrueColor($this -> newW, $this -> newH);
//			ImageAntiAlias($this -> _newContent, true);
			unset($imageInfo);
			
			$this -> imageResample(0, $kadrowanie);
			

			
			if($display === true)
			{
				// wyswietlamy plik
				switch($this -> _type)
				{
					case '1' : 	// GIF
						header('Content-type: image/gif');
						ImageGif($this -> _newContent);
						break;
					case '2' : // JPEG
						header('Content-type: image/jpeg');
						ImageJpeg($this -> _newContent, 100);
						break;
					case '3' : // GIF
						header('Content-type: image/png');				
						ImagePng($this -> _newContent);
					default : 
						$this -> _error = 3;
						return false;
				}			
			}else
			{
				// zapisujemy plik
				switch($this -> _type)
				{
						case '1' : 	// GIF
						ImageGif($this -> _newContent, $this -> newFilename);
						break;
					case '2' : // JPEG
							ImageJpeg($this -> _newContent, $this -> newFilename, 100);
						break;
					case '3' : // GIF
						ImagePng($this -> _newContent, $this -> newFilename);
					default : 
						$this -> _error = 3;
						return false;
				}
			}
		}
		
		$this -> imgDestroy();
		return true;
	}
	
	function getImageType()
	{
		switch($this -> _type)
		{
			case '1' :	// GIF 
				return 'gif';
			case '2' : 	// JPG
				return 'jpg';
				break;
			case '3' : // PNG
				return 'png';
				break;
			default : 
				return false;
		}
	}

	function setNewFilename($filename)
	{
		$this -> newFilename = $filename;
		return true;
	}
	
	function imgDestroy()
	{
		if(isset($this -> _content)) 		@ImageDestroy($this -> _content);
		if(isset($this -> _newContent)) @ImageDestroy($this -> _newContent);
		return true;
	}
	
	function ErrorMsg()
	{
		switch($this -> _error)
		{
			case 1 :
				$msg = 'Nie podano nazwy pliku, na którym klasa ma operować!';
				break;
			case 2 :
				$msg = 'Brak dostępu do pliku <b>'.$this -> filename.'</b> lub plik nie istnieje!';			
				break;
			case 3 :
				$msg = 'Nieobsługiwany format pliku! Skrypt odczytuje jedynie pliki GIF, JPEG, PNG.';	
				break;
		}
	}
	
	/*-----funkcja dodaje znak wodny-----*/

	function AddWatermark($sourcefile, $watermarkfile) 
	{
  
    #
    # $sourcefile = Filename of the picture to be watermarked.
    # $watermarkfile = Filename of the 24-bit PNG watermark file.
    #
    
    //Get the resource ids of the pictures
    $watermarkfile_id = imagecreatefrompng($watermarkfile);
    
    imageAlphaBlending($watermarkfile_id, false);
    imageSaveAlpha($watermarkfile_id, true);

    $fileType = strtolower(substr($sourcefile, strlen($sourcefile)-3));

    switch($fileType) {
        case('gif'):
            $sourcefile_id = imagecreatefromgif($sourcefile);
            break;
            
        case('png'):
            $sourcefile_id = imagecreatefrompng($sourcefile);
            break;
            
        default:
            $sourcefile_id = imagecreatefromjpeg($sourcefile);
    }

    //Get the sizes of both pix   
		$sourcefile_width=imageSX($sourcefile_id);
		$sourcefile_height=imageSY($sourcefile_id);
		$watermarkfile_width=imageSX($watermarkfile_id);
		$watermarkfile_height=imageSY($watermarkfile_id);

    //$dest_x = ( $sourcefile_width / 2 ) - ( $watermarkfile_width / 2 );
    //$dest_y = ( $sourcefile_height / 2 ) - ( $watermarkfile_height / 2 );
		
    //$dest_x = ( $sourcefile_width  ) - ( $watermarkfile_width  ) - 20;
    //$dest_y = ( $sourcefile_height ) - ( $watermarkfile_height ) - 20;
		
    $dest_x = 0;
    $dest_y = 0;
    
    // if a gif, we have to upsample it to a truecolor image
    if($fileType == 'gif') {
        // create an empty truecolor container
        $tempimage = imagecreatetruecolor($sourcefile_width,
                                                                            $sourcefile_height);
        
        // copy the 8-bit gif into the truecolor image
        imagecopy($tempimage, $sourcefile_id, 0, 0, 0, 0, 
                            $sourcefile_width, $sourcefile_height);
        
        // copy the source_id int
        $sourcefile_id = $tempimage;
    }

    imagecopy($sourcefile_id, $watermarkfile_id, $dest_x, $dest_y, 0, 0,
                        $watermarkfile_width, $watermarkfile_height);

    //Create a jpeg out of the modified picture
		
    switch($fileType) 
		{
    
        // remember we don't need gif any more, so we use only png or jpeg.
        // See the upsaple code immediately above to see how we handle gifs
        case('png'):
            imagepng ($sourcefile_id, $sourcefile);
            break;
            
        default:
            imagejpeg ($sourcefile_id, $sourcefile);
    }      
		
  
    imagedestroy($sourcefile_id);
    imagedestroy($watermarkfile_id);
	}
}
?>