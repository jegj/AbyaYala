<?php
App::uses('AppModel', 'Model');
/**
 * Note Model
 *
 */
class Note extends AppModel {

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
	public $primaryKey = 'note_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	public function saveModel($data=null,$newRecord=true)
  {
      $success=false;
    try{
      if($newRecord)
        $this->create();

      $this->save($data);
      $success=true;
    }catch(Exception $e){
      CakeLog::write('development', $e->message);
    }

    return $success;
  }

}
