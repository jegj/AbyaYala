<?php
App::uses('AppModel', 'Model');
/**
 * Search Model
 *
 */
class Search extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'AbyaYala';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'search';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	/*public $validate = array(
		'name' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'author' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);*/
	
	public $actsAs = array(
		'Search.Searchable'
	);

	public $filterArgs = array(
		'name' => array(
			'type' => 'like',
		),
		'description' => array(
			'type' => 'like',
		),
		'type' => array(
			'type' => 'query',
			'method' => 'findType'
		),
		'author' => array(
			'type' => 'like'
		),

		'date' => array(
			'type' => 'query',
			'method' => 'findDate'
		)
	);

	public function findType($data = array())
	{
		$type = $data['type'];
		if($type == 'cualquiera')
			return array();
		else{
			$condition = array(
				'AND' => array(
						$this->alias . '.type LIKE' => '%' . $type . '%',
				)
			);

			return $condition;
		}
	}

	public function findDate($data = array())
	{
		$date = $data['date'];
		$condition = array(
			'AND' => array(
					"DATE(".$this->alias . '.date'.")" => $date,
			)
		);

		return $condition;
	}
}