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
          'message' => 'El campo debe tener entre 3 y 45 caracteres'
      ),
      'unique' => array(
        'rule' => 'isUnique',
        'message' => 'El nombre de la Etnia se encuentra repetido'
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

  public function getEthnicityFather()
  {
    $fatherId = $this->data['Ethnicity']['ethnicity_father_id'];

    $id = isset($fatherId)?$fatherId:$this->data['Ethnicity']['ethnicity_id'];
    
    return $id;
  }

}
