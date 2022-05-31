<?php


class Captcha 
{
	public function __construct(){
		
	}
	
	public function generate($length){
		$random = md5(random_bytes(64));
		$captcha_code = substr($random, 0, $length);
		return $captcha_code;
	}
	
	public function createImage($captcha_code)
    {
        $img = imagecreatetruecolor(72, 28);
        $captcha_background = imagecolorallocate($img, 204, 204, 204);
        imagefill($img,0,0,$captcha_background);
        $captcha_text_color = imagecolorallocate($img, 0, 0, 0);
        imagestring($img, 5, 10, 5, $captcha_code, $captcha_text_color);
        $this->render($img);
    }
	
	public function render($imageData)
    {
        header("Content-type: image/jpeg");
        imagejpeg($imageData);
    }
	
	public function getSession($key) {
        $value = "";
        if(!empty($key) && !empty($_SESSION[$key]))
        {            
            $value = $_SESSION[$key];
        }
        return $value;
    }
	
	public function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }
	
	public function validate($session_name, $formData) {
        $isValid = false;
        $capchaSessionData = $this->getSession($session_name);
        
        if($capchaSessionData == $formData) 
        {
            $isValid = true;
        }
        return $isValid;
    }
}