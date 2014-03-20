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
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'El nombre no puede ser vacío'
			),
			'length' => array(
				'rule'=> array('between', 3, 45),
				'message' => 'El nombre debe estar entre 3 y 45 caracteres'
			),
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'EL apellido no puede ser vacío',
			),
			'length' => array(
				'rule'=> array('between', 3, 45),
				'message' => 'El apellido debe estar entre 3 y 45 caracteres'
			),
		),
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
				'rule' => array('between', 3, 45),
				'message' => 'El email debe estar entre 3 y 45 caracteres'
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'EL email no puede ser vacío'
			)
		),
		'type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La contraseña no puede ser vacía'
			),
			'length' => array(
				'rule' => array('between', 5, 45),
				'message' => 'La contraseña debe estar entre 5 y 45 caracteres'
			)
		),
		'passwd_confirm' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'La Confirmación de la Contraseña no puede ser vacía'
			),
			'length' => array(
				'rule' => array('between', 5, 45),
				'message' => 'La Confirmación de la Contraseña debe estar entre 5 y 45 caracteres'
			),
			'match' => array(
				'rule' => 'validatePasswdConfirm',
				'message' => 'Las Contraseña y su Confirmación deben coincidir'
			),
		)
	);

	public function validatePasswdConfirm($data)
  {
    if ($this->data['Admin']['password'] !== $data['passwd_confirm']) 
      return false;
  
    return true;
  }

  public function changePassword($old, $new, $confNew)
  {
	 	$result = array();
    try{

    	if($this->data['Admin']['password'] != md5($old)){
    		$result['error'] = '<strong>Error!</strong> La Contraseña Antigua no es correcta.';
    	}else{
    		if($new != $confNew){
    			$result['error'] = '<strong>Error!</strong> La Contraseña Nueva y su confirmación no son iguales.';
    		}else{
    			if($this->saveField('password', $new)){
            $result['success'] = '<strong>Exito!</strong> Ha cambiado su contraseña exitosamente.';
        	}else{
        		$result['error'] = '<strong>Error!</strong> No se puedo guardar la contraseña Nueva.';
        	}
    		}
    	}
    }catch (Exception $e){
      CakeLog::write('exception', $e->getMessage('Error'));       
    }
    return $result;
  }

  public function recoverPassword($email, $admin)
  {
  	$fullName = $admin['Admin']['name'].' '.$admin['Admin']['last_name'];

   	$Email = new CakeEmail();
    $Email->config('smtp');
    $Email->from(array('abyayala.arte@gmail.com' => 'AbyaYala'))
    ->template('forgot', 'default')
    ->viewVars(array('name' => $fullName))
    ->emailFormat('html')
    ->to($email)
    ->subject('AbyaYala, Recuperación de Contraseña de Administrador')
    ->send();
  }


  function beforesave($options = array()) {
   	if (isset($this->data['Admin']['password'])) {
    	 $this->data['Admin']['password'] = md5($this->data['Admin']['password']);
  	}

  	$this->data[$this->name]['create_date'] = date('Y-m-d H:i:s');

    return parent::beforeSave();
  }



}
