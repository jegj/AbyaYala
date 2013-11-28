<?php
App::uses('AppModel', 'Model');
/**
 * Modelo Administrador
 *
 */
class Admin extends AppModel {

/**
 * Primary key field
 * @var string
 */
	public $primaryKey = 'admin_id';

/**
 * Display field
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 * @var array
 */
	public $validate = array(
		/*Validaciones para el id del Admin*/
		'admin_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		/*Validaciones para el nombre del Admin*/
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El nombre no puede ser vacío'
			),
			'onlyLetters' => array(
				'rule' => array('custom', '|^[a-zA-Z ]*$|'),
				'message' => 'El nombre debe contener solo letras'
			),
			'length' => array(
				'rule'=> array('between', 5, 45),
				'message' => 'El nombre debe estar entre 3 y 45 caracteres'
			),
		),
		/*Validaciones para el apellido del Admin*/
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'EL apellido no puede ser vacío',
			),
			'onlyLetters' => array(
				'rule' => array('custom', '|^[a-zA-Z ]*$|'),
				'message' => 'El apellido debe contener solo letras'
			),
			'length' => array(
				'rule'=> array('between', 5, 45),
				'message' => 'El apellido debe estar entre 3 y 45 caracteres'
			),
		),
		/* Validaciones para el email del Admin*/
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Formato de correo electronico invalido'
			),
			'emailUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'El email ya esta siendo utilizado por otro usuario'
			),
			'length' => array(
				'rule' => array('between', 12, 45),
				'message' => 'El email debe estar entre 3 y 45 caracteres'
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'EL email no puede ser vacío'
			)
		),
		/*Validaciones para el tipo de Admin*/
		'type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		/*Validaciones para la contraseña del Admin*/
		'password' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La contraseña no puede ser vacía'
			),
			'length' => array(
				'rule' => array('between', 8, 45),
				'message' => 'La contraseña debe estar entre 8 y 45 caracteres'
			)
		),
		'passwordConfirm' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La confirmación de la contraseña no puede ser vacía'
			),
			'length' => array(
				'rule' => array('between', 8, 45),
				'message' => 'La confirmación de la contraseña debe estar entre 8 y 45 caracteres'
			),
			'match' => array(
				'rule' => 'validatePasswdConfirm',
				'message' => 'Las contraseñas no coinciden'

			)
		)
	);

	function validatePasswdConfirm($data)
  {
    if ($this->data['Admin']['password'] !== $data['passwd_confirm']) 
      return false;
  
    return true;
  }

  function beforesave($options = array()) {
   	if (isset($this->data['Admin']['password'])) {
    	 $this->data['Admin']['password'] = md5($this->data['Admin']['password']);
   		return $data;
  	}	
    return $data;
  }

}
