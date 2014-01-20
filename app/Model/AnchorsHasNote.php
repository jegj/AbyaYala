<?php
App::uses('AppModel', 'Model');
/**
 * AnchorsHasNote Model
 *
 * @property Anchor $Anchor
 * @property Note $Note
 */
class AnchorsHasNote extends AppModel {

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
		'Anchor' => array(
			'className' => 'Anchor',
			'foreignKey' => 'anchor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Note' => array(
			'className' => 'Note',
			'foreignKey' => 'note_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
