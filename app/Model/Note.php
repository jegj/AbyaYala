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

  public $validate = array(
    'note_id' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        'message' => 'El campo debe ser un número entero',
      ),
    ),
    'name' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        'message' => 'Campo Obligatorio',
        'required' => true,
      ),
      'between' => array(
        'rule'    => array('between', 3, 45),
        'message' => 'El campo solo pemite entre 3 y 45 caracteres'
      ),
    ),
    'description' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        'message' => 'Campo Obligatorio',
        'required' => true,
      ),
    )
  );

  public $hasAndBelongsToMany = array(
    'Ethnicity' =>
      array(
        'className' => 'Ethnicity',
        'joinTable' => 'ethnicities_has_notes',
        'associationForeignKey' => 'ethnicity_id',
      )
  );

}
