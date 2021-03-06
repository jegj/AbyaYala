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


	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El nombre no puede ser vacío'
			),
			'length' => array(
				'rule'=> array('between', 3, 45),
				'message' => 'El nombre debe estar entre 3 y 45 caracteres'
			),
		)
	);

	
	public $hasOne = array(
		 'News' => array(
            'className' => 'News',
            'foreignKey' => 'content_id'
      )
	);

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


	public function saveFile($file, $pathWeb)
	{

		ini_set('post_max_size', '10M');
		ini_set('upload_max_filesize', '10M');
		ini_set('max_execution_time', 60*10);
		ini_set('max_input_time', 60*10);

		$maxFileSize=10;

		$allowed = array('png', 'jpg', 'gif', 'ogg', 'pdf');

		$result=array();
		if(isset($file) && $file['error'] == 0){
			$name=$file['name'];
			$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
			$size=number_format($file['size']/1000000, 2);
			if($size > $maxFileSize){
				$result['complete']=array('result'=>'error','message'=>'Archivo muy grande, maximo hasta 10MB');
				return $result;
			}else{
				if(!in_array(strtolower($extension), $allowed)){
					$result['complete']=array('result'=>'error','message'=>'Extension no permitida');
					return $result;
				}else{
					if($extension=='png' ||$extension=='jpg' || $extension=='gif'){
						$folder=WWW_ROOT.'media/imagenes/';
						$pathDB=$pathWeb.'media/imagenes/';
						$type='imagen';
					}
					else if($extension=='ogg'){
						$folder=WWW_ROOT.'media/audio/';
						$pathDB=$pathWeb.'media/audio/';
						$type='audio';
					}else{
						$folder=WWW_ROOT.'media/docs/';
						$pathDB=$pathWeb.'media/docs/';
						$type='documento';
					}

					$path=$folder.$file['name'];
					$realName=explode('.', $name);
					if($realName)
						$realName=$realName[0];
					else
						$realName='contenido';

					if(!$this->checkContent($realName,$extension, $path)){
						if(move_uploaded_file(utf8_encode($file['tmp_name']), $path)){
								$data = array(
		              'Content' => array(
		                'name' => $realName,
		                'path' => $path,
		                'type' => $type,
		                'filesize' => $size,
		                'extesion_document' => $extension,
		                'access_path' => utf8_encode($pathDB.$file['name']),
		                'description' => $realName
		              )
	        			);
							if ($this->saveModel($data)){
								$result['complete']=array('result'=>'success','message'=>'Se agrego el archivo correctamente');
								
								
      			 				
								return $result;	
							}else{
								$result['complete']=array('result'=>'error','message'=>'Hubo problemas para agregar el registro del archivo en Base de datos');
								return $result;	
							}
						}else{
							$result['complete']=array('result'=>'error','message'=>'No se pudo guardar el archivo en la ruta especificada');
							return $result;	
						}
					}else{
						$result['complete']=array('result'=>'repeat','message'=>'Archivo repetido');
						return $result;	
					}
				}
			}
		}else{
			$result['complete']=array('result'=>'error','message'=>'Problemas al subir el archivo');
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

	function beforeSave($options = array())
	{
	  if ( empty($this->content_id) and empty($this->data[$this->name]['content_id']) )
	    $this->data[$this->name]['create_date'] = date('Y-m-d H:i:s');
	  else
	  	$this->data[$this->name]['modified_date'] = date('Y-m-d H:i:s');

	  return parent::beforeSave();
	} 

	function afterSave(	$created, $options = array())
	{

		$this->Search = ClassRegistry::init('Search');

		if($created){
			$data = array(
        'Search' => array(
          'name' => $this->data['Content']['name'],
          'description' => $this->data['Content']['description'],
          'date' => $this->data['Content']['create_date'],
          'author' => isset($this->data['Content']['author'])?$this->data['Content']['author']:null,
          'model' => 'Content',
          'type' => $this->data['Content']['type'],
          'model_pk' => $this->data['Content']['content_id'],
        )
			);
			$this->Search->save($data);
		}else{
			$search = $this->Search->find('first', 
				array(
					'conditions' => array(
						'Search.model_pk' => $this->data['Content']['content_id'],
						'model' => 'Content'
					),
				)
			);
			$this->Search->read(null, $search['Search']['id']);
			$data = array(
        'Search' => array(
          'name' => $this->data['Content']['name'],
          'description' => $this->data['Content']['description'],
          'date' => $this->data['Content']['create_date'],
          'author' => isset($this->data['Content']['author'])?$this->data['Content']['author']:null,
          'model' => 'Content',
          'type' => $this->data['Content']['type'],
          'model_pk' => $this->data['Content']['content_id'],
        )
			);
			$this->Search->save($data);
		}
		return true;
	}

	function beforeDelete($cascade = true) 
	{
    $this->Search = ClassRegistry::init('Search');

    $this->Search->deleteAll(
    	array(
    		'Search.model' => 'Content',
    		'Search.model_pk' => $this->id
    	), 
    	false);

    return true;	
	}

}