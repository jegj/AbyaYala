<?php
App::uses('AppModel', 'Model');
/**
 * Ethnicity Model
 *
 */
class Ethnicity extends AppModel {

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
	public $primaryKey = 'ethnicity_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $validate = array(
		'name'=>array(
			'notEmpty' => array(
        'rule' => array('notEmpty'),
        'message' => 'Campo Obligatorio',
        'required' => true,
      ),
      'between' => array(
          'rule'    => array('between', 3, 45),
          'message' => 'El campo solo pemite entre 3 y 45 caracteres'
      ),
      'unique' => array(
        'rule' => 'isUnique',
        'message' => 'El nombre se encuentra repetido'
      ),
		),
	);

  public $hasMany = array(
        'HasAnchors' => array(
            'className' => 'EthnicitiesHasAnchors',
            'foreignKey' => 'ethnicity_id', 
            'dependent'  =>  true, 
        )
  );


  public $hasAndBelongsToMany = array(
    'Anchors' =>
      array(
        'className' => 'Anchor',
        'joinTable' => 'ethnicities_has_anchors',
        'associationForeignKey' => 'anchor_id',
      ),
    'Notes' =>
      array(
        'className' => 'Note',
        'joinTable' => 'ethnicities_has_notes',
        'associationForeignKey' => 'note_id',
      )
  );

  public function saveModel($data=null,$newRecord=true)
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

  public function deleteAnchors($id)
  {
    $ethnicity=$this->findByEthnicityId($id);
    $staticAnchor = ClassRegistry::init('Anchor');
    $success=true;
    foreach ($ethnicity['HasAnchors'] as $anchor){   
      $success &= $staticAnchor->deleteModel($anchor['anchor_id'],true);
    }
    return $success;
  }

  public function deleteModel($id)
  {
    $success=false;
    try{
      if($this->deleteAnchors($id))
        if ($this->delete($id,true))
          $success=true;
    }catch(Exception $e){
      CakeLog::write('development', $e->message);
    }
    return $success;
  }

  /*
  public function getCompactInformation($id)
  {
    $ethnicity=$this->findByEthnicityId($id);
    $staticAnchor = ClassRegistry::init('Anchor');
    $anchors=array();
    
    foreach ($ethnicity['HasAnchors'] as $anchor) {   
      array_push($anchors, $staticAnchor->find('first',
        array(
          'conditions' => array('anchor_id' =>$anchor['anchor_id'] ),
          'fields' => array('anchor_id', 'name', 'description'),
        )
      ));
    }
    
    return compact('anchors','ethnicity');
  }
  */
}
