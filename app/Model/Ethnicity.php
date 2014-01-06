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
			'alphaNumeric' => array(
        'rule'     => 'alphaNumeric',
        'required' => true,
        'message'  => 'Solo letras y números'
      ),
      'between' => array(
          'rule'    => array('between', 5, 45),
          'message' => 'Entre 5 y 45 caracteres'
      )
		),
		'type'=>array(
			'alphaNumeric' => array(
        'rule'     => 'alphaNumeric',
        'required' => true,
        'message'  => 'Solo letras y números'
      ),
      'between' => array(
          'rule'    => array('between', 5, 45),
          'message' => 'Entre 5 y 45 caracteres'
      )
		),
	);

  public $hasMany = array(
        'HasAnchors' => array(
            'className' => 'EthnicitiesHasAnchors',
            'foreignKey' => 'ethnicity_id', 
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

  public function getCompactInformation($id)
  {
    $ethnicity=$this->findByEthnicityId($id);
    $staticAnchor = ClassRegistry::init('Anchor');
    $anchors=array();
    
    foreach ($ethnicity['HasAnchors'] as $anchor) {   
      array_push($anchors, $staticAnchor->find('first',
        array(
          'conditions' => array('anchor_id' =>$anchor['anchor_id'] ),
          'fields' => array('anchor_id', 'name'),
        )
      ));
    }
    
    return compact('anchors','ethnicity');
  }

}
