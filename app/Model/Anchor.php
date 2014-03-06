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


	public $validate = array(
		
		'name'=>array(      
      'between' => array(
          'rule'    => array('between', 3, 45),
          'message' => 'Entre 3 y 45 caracteres'
      )
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo Obligatorio',
			),
		),
	);


	public $hasMany = array(
        'HasAnchors' => array(
            'className' => 'EthnicitiesHasAnchors',
            'foreignKey' => 'anchor_id', 
            'dependent'  =>  true, 
        )
  );

  public $hasAndBelongsToMany = array(
    'Ethnicity' =>
        array(
          'className' => 'Ethnicity',
          'joinTable' => 'ethnicities_has_anchors',
          'associationForeignKey' => 'ethnicity_id',
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

	public function deleteModel($id)
	{
		$success=false;
    try{
    	if ($this->delete($id,true))
        $success=true;
    }catch(Exception $e){
      CakeLog::write('development', $e->message);
    }
    return $success;
	}

}
