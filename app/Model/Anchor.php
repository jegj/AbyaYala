<?php
App::uses('AppModel', 'Model');
/**
 * Anchor Model
 *
 */
class Anchor extends AppModel {

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
	public $primaryKey = 'anchor_id';

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

}
