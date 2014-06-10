
<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class News extends AppModel {

/*	public $actsAs = array(
		'Search.Searchable'
	);*/

	/*public $filterArgs = array(
		'title' => array(
			'type' => 'like',
		),
	);*/

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

		'previous_text' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo Obligatorio',
				'required' => true,
			),
			'between' => array(
	      'rule'    => array('between', 3, 300),
	      'message' => 'El campo debe tener entre 3 y 300 caracteres'
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

	function afterSave(	$created, $options = array())
	{

		$this->Search = ClassRegistry::init('Search');

		if($created){
			$data = array(
        'Search' => array(
          'name' => $this->data['News']['title'],
          'description' => $this->data['News']['description'],
          'date' => $this->data['News']['current_date'],
          'author' => $this->data['News']['author'],
          'model' => 'News',
          'model_pk' => $this->data['News']['new_id'],
          'previous_text' => $this->data['News']['previous_text'],
        )
			);
			$this->Search->save($data);
		}else{
			$search = $this->Search->find('first', 
				array(
					'conditions' => array(
						'Search.model_pk' => $this->data['News']['new_id'],
						'model' => 'News'
					),
				)
			);
			$this->Search->read(null, $search['Search']['id']);
			$data = array(
        'Search' => array(
          'name' => $this->data['News']['title'],
          'description' => $this->data['News']['description'],
          'date' => $this->data['News']['current_date'],
          'author' => $this->data['News']['author'],
          'model' => 'News',
          'model_pk' => $this->data['News']['new_id'],
          'previous_text' => $this->data['News']['previous_text'],	
        )
			);
			$this->Search->save($data);
		}
		return true;
	}

	function beforeDelete($cascade = true) {
    $this->Search = ClassRegistry::init('Search');

    $this->Search->deleteAll(
    	array(
    		'Search.model' => 'News',
    		'Search.model_pk' => $this->id
    	), 
    	false);

    return true;	
	}
}
