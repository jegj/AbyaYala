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

		public static function generateUrl($model = null, $id = null, $type = null)
		{

			$controller = null;
			$action = null;

			if(isset($model) && isset($id)){
				if($model == 'News'){

					return array(
						'controller' => 'news',
						'action' => 'user_view',
						$id
					);

				}else if($model == 'Content' && $type != null){
					switch ($type) {
						case 'imagen':
							return array(
								'controller' => '',
								'action' => '',
								'ajax_'.$id,
							);
							break;

						case 'documento':
							return array(
								'controller' => 'contents',
								'action' => 'download',
								$id,
								false
							);
							break;

						case 'audio':
							return array(
								'controller' => '',
								'action' => '',
								'ajax_'.$id,
							);
							break;

						default:
							return array(
								'controller' => '',
								'action' => '',
								$id,
							);
							break;
					}

				}else if($model == 'Ethnicity'){
					
					$ethnicity = ClassRegistry::init('Ethnicity');
					$ethnicity->read(null, $id);

					$realId = $ethnicity->getEthnicityFather();
	

					return array(
						'controller' => 'ethnicities',
						'action' => 'user_preview',
						$realId,
					);
				}
			}
		}
	}