<?

	$tokens=file('tokens.txt');
	$token=$tokens[$_GET["n"]];
	$text = trim($token);
	$font = './tahoma.ttf';
	$width = 87;
	$height = 22;
	
	$i=imagecreate($width,$height);  // szerokosc, wysokosc wygenerowanego obrazka
	$white=imagecolorallocate($i,255,255,255);
	$black=imagecolorallocate($i,51,51,51);
	$gray=imagecolorallocate($i,255,255,255);
	imagefill($i,1,1,$white);
	
	for($c=0;$c<600;$c++ ) {
		$los1=rand(0,$width);
		$los2=rand(0,$height);
		imageline($i,$los1,$los2,$los1,$los2,$gray);
	}
	
	imagettftext($i, 15, -5, 10, 15, $gray, $font, $text);
	imagettftext($i, 15, 8, 15, 22, $black, $font, $text);
	header("Content-type: image/gif");
	imagegif($i);
?>