<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 */
class Content extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'AbyaYala';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'content_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';



	public function saveModel($data=null, $newRecord=true)
	{
		$success=false;
		try{
			if($newRecord)
				$this->create();
			if($this->save($data))
				$success=true;
		}catch(Exception $e){
			CakeLog::write('development', $e->message);
		}

		return $success;
	}

	public function checkContent($name,$extension,$path)
	{
		return $this->find('first', array(
  		'conditions' => array('name' => $name,
  		'extesion_document' => $extension,
  		'path' => $path)
  		));
	}


	public function saveFile($file, $data, $document=false)
	{
		$maxFileSize=10;
		if($document)
			$allowed = array('pdf');
		else
			$allowed = array('png', 'jpg', 'gif', 'ogg');

		ini_set('post_max_size', '10M');
		ini_set('upload_max_filesize', '10M');
		ini_set('max_execution_time', 300);
		ini_set('max_input_time', 300);

		$result=array();
		if(isset($file) && $file['error'] == 0){
			$name=$file['name'];
			$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
			$size=number_format($file['size']/1000000, 2);
			if($size > $maxFileSize){
				$result['complete']=array('result'=>false,'message'=>'Archivo muy grande, maximo hasta 10MB');
				return $result;
			}else{
				if(!in_array(strtolower($extension), $allowed)){
					$result['complete']=array('result'=>false,'message'=>'Extension no permitida');
					return $result;
				}else{
					if($extension=='png' ||$extension=='jpg' || $extension=='gif'){
						$folder=WWW_ROOT.'media/imagenes/';
						$pathDB=$this->webroot.'media/imagenes/';
						$type='imagen';
					}
					else if($extension=='ogg'){
						$folder=WWW_ROOT.'media/audio/';
						$pathDB=$this->webroot.'media/audio/';
						$type='audio';
					}else{
						$folder=WWW_ROOT.'media/docs/';
						$pathDB=$this->webroot.'media/docs/';
						$type='documento';
					}
					$path=$folder.$file['name'];
					if($document){
						$year = $data['Content']['year'];
						$description = $data['Content']['description'];
						$author = $data['Content']['author'];
						$type_document= $data['Content']['type_document'];
						$data = array(
	              'Content' => array(
	                'name' => $name,
	                'path' => $path,
	                'type' => $type,
	                'filesize' => $size,
	                'extesion_document' => $extension,
	                'access_path' => $pathDB.$file['name'],
	                'year' => $year,
	                'description' =>$description,
	                'author' => $author,
	                'type_document' => $type_document==0?'Trab.Inves/Articulo':'Ley',
	              )
	        		);
					}else{
						$data = array(
	              'Content' => array(
	                'name' => $name,
	                'path' => $path,
	                'type' => $type,
	                'filesize' => $size,
	                'extesion_document' => $extension,
	                'access_path' => $pathDB.$_FILES['upl']['name'],
	              )
	        		);
					}
					if(!$this->checkContent($name,$extension, $path)){
						if(move_uploaded_file($file['tmp_name'], $path)){
							if ($this->saveModel($data)){
								$result['complete']=array('result'=>true,'message'=>'Se agrego el archivo correctamente');
								return $result;	
							}else{
								$result['complete']=array('result'=>false,'message'=>'Hubo problemas para agregar el registor del archivo en Base de datos');
								return $result;	
							}
						}else{
							$result['complete']=array('result'=>false,'message'=>'No se pudo guardar el archivo en la ruta especificada');
							return $result;	
						}
					}else{
						$result['complete']=array('result'=>false,'message'=>'Archivo repetido');
						return $result;	
					}
				}
			}
		}else{
			$result['complete']=array('result'=>false,'message'=>'Problemas al subir el archivo');
			return $result;
		}
	}


	public function deleteModel($id)
	{
		$success=false;
		try{
			if ($this->delete($id))
				$success=true;
		}catch(Exception $e){
			CakeLog::write('development', $e->message);
		}
		return $success;
	}

}
