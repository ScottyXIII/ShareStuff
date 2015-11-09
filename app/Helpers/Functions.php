<?php namespace App;

class Functions 
{	
	/**
	 * Returns a value to set an html checkbox elemet to checked. 
	 *	
	 * @param int|bool
	 * @return string
	 */
	public static function isChecked($value)
	{
		if (isset($value) && $value) {
			return "checked";
		}
	}

	/**
	 * Limits the number of words. Uses Reg Exp. 
	 *
	 * @param string $str
	 * @param int $limit
	 * @param string $endChar
	 * @return string
	 */
	public static function WordLimiter ($str, $limit = 100, $endChar = '&#8230;')
	{
		if (trim($str) == '') {
			return $str;
		}
		preg_match('/^\s*+(?:\S++\s*+){1,' . (int)$limit .'}/', $str, $matches);
		
		if (strlen($str) == strlen($matches[0])) {
			$endChar = '';
		}
		return rtrim($matches[0]) . $endChar;
	}

	public static function GetTimeSince($date)
	{
		
	}
}

?>