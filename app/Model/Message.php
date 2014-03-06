<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 */
class Message extends AppModel {

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
	public $primaryKey = 'messages_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'subject';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'messages_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'subject' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo Obligatorio',
				'required' => true,
			),
			'between' => array(
	      'rule'    => array('between', 3, 150),
	      'message' => 'El campo solo pemite entre 3 y 150 caracteres'
      ),
		),

		'body' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo Obligatorio',
			),
		),

		'author' => array(
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
		
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),
		),
		'read' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);



	function beforeSave($options = array())
	{
	  if ( empty($this->messages_id) and empty($this->data[$this->name]['messages_id']) )
	    $this->data[$this->name]['create_date'] = date('Y-m-d H:i:s');

	  return parent::beforeSave();
	} 
}
