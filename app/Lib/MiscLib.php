<?php
	class MiscLib{

		public static function dateFormat($myDate)
		{
			return date( 'd-m-Y H:i:s A', strtotime($myDate));
		}

		public static function dateFormat2($myDate)
		{
			return date( 'd-m-Y', strtotime($myDate));
		}

		public static function truncate($text, $chars = 25) {
	    $text = $text." ";
	    $text = substr($text,0,$chars);
	    $text = substr($text,0,strrpos($text,' '));
	    $text = $text."...";
	    return $text;
		}

		public static function generateUrl($model = null, $id = null)
		{
			$controller = null;
			$action = null;
			if(isset($model) && isset($id)){
				if($model == 'News'){
					$controller = 'news';
					$action = 'user_view';
				}else if($model == 'Content'){
					$controller = 'news';
					$action = 'user_view';
				}else if($model == 'Ethnicity'){
					$controller = 'ethnicities';
					$action = 'user_view';
				}
			}

			return array(
				'controller' => $controller,
				'action' => $action,
				$id
			);
		}
	}