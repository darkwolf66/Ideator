<?php
	function getIP() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
	    {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    } else {
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	if(empty($_COOKIE['lang'])){
		$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getIP());
		switch ($xml->geoplugin_countryCode) {
			case 'BR':
				$lang = "pt_br";
				setcookie("lang", $lang);
				break;
			case 'US':
				$lang = "en";
				setcookie("lang", $lang);
				break;
			default:
				$lang = "en";
				setcookie("lang", $lang);
				break;
		}
		
	}else{
		$lang = $_COOKIE['lang'];
	}
	$lang_file = "inc/languages/".$lang.".php";
	if(is_file($lang_file)){
		require($lang_file);
	}else{
		$lang = "en";
		require("inc/languages/".$lang.".php");
		setcookie("lang", $lang);
	}
?>