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



	public function saveModel($data=null)
	{
		$success=false;
		try{
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
