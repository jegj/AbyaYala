
<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class News extends AppModel {

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
	public $primaryKey = 'new_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	public $belongsTo = array(
		 'Content' => array(
            'className' => 'Content',
            'foreignKey' => 'content_id'
      )
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'new_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'El campo debe ser un número entero',
			),
		),

		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo Obligatorio',
				'required' => true,
			),
			'between' => array(
	      'rule'    => array('between', 3, 150),
	      'message' => 'El campo debe tener entre 3 y 150 caracteres'
      ),
		),

		'description' => array(
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
	      'message' => 'El campo debe tener entre 3 y 45 caracteres'
      ),
		),

	);

	function beforeSave($options = array())
	{
	  if ( empty($this->new_id) and empty($this->data[$this->name]['new_id']) )
	    $this->data[$this->name]['current_date'] = date('Y-m-d H:i:s');
	  else
	  	$this->data[$this->name]['modified_date'] = date('Y-m-d H:i:s');

	  return parent::beforeSave();
	} 
}
