<?php
	class MiscLib{

		public static function dateFormat($myDate)
		{
			return date( 'd-m-Y H:i:s A', strtotime($myDate));
		}

		public static function truncate($text, $chars = 25) {
	    $text = $text." ";
	    $text = substr($text,0,$chars);
	    $text = substr($text,0,strrpos($text,' '));
	    $text = $text."...";
	    return $text;
		}
	}