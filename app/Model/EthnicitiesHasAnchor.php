<?php
App::uses('AppModel', 'Model');
/**
* EthnicitiesHasAnchor Model
*
* @property Ethnicity $Ethnicity
* @property Anchor $Anchor
*/
class EthnicitiesHasAnchor extends AppModel
{

/**
* Use database config
*
* @var string
*/
public $useDbConfig = 'AbyaYala';


//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	* belongsTo associations
	*
	* @var array
	*/
	public $belongsTo = array(
		'Ethnicity' => array(
			'className' => 'Ethnicity',
			'foreignKey' => 'ethnicity_id',
			'dependent' => true,
		),
		'Anchor' => array(
			'className' => 'Anchor',
			'foreignKey' => 'anchor_id',
			'dependent' => true,
		)
	);

}



