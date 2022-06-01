<?php 

namespace App\Http\Classes;

/**
 * Helper
 */
class Helper
{
	static function str2hex($str)
	{
		$code = dechex(crc32($str));
		$code = substr($code, 0, 6);
		return "#{$code}";
	}

	static function brDate($date)
	{
		$d = explode(' ', $date);
		$r = '';
		if($d[0]==date('Y-m-d')){ $r .= "Hoje, "; }
		if(strstr($d[0], '-')){ $r .= date('d/m/Y',strtotime($d[0])); }
		if(isset($d[1]) && strstr($d[1], ':')){ $r .=  date(' \à\s H:i',strtotime($d[1])); }
		return $r;
	}

}