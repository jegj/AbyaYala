<?php
	class MiscLib{

		public static function dateFormat($myDate)
		{
			return date( 'd-m-Y H:i:s A', strtotime($myDate));
		}
	}