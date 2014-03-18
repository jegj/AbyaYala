<?php
/*
* Controlador que contiene la funcionalidades   principales de los Administradores
*
*/

class AdminsController extends AppController
{
	var $name ='Admin';
	var $helpers=array('Html','Form', 'Js');
  var $layout='Administrador';

  public $components = array('Session', 'RequestHandler', 'Paginator');

	
	public function index()
  {
    $this->canAccess();


  }     

  public function login ()
  {
  	$this->layout = 'Usuario';
	  if ($this->request->is('post')){
      $email = $this->request->data['Admin']['email'];
      $password = $this->request->data['Admin']['password'];

      $admin = $this->Admin->find('first', 
        array('conditions' => array(
            'email'=> $email ,
            'password'=> md5($password),
          )
        )
      );
      if($admin){
        $this->Session->write('Admin',$admin);
        return $this->redirect(
          array('action'=>'index')
        );
      }else{
        $this->Session->setFlash('<strong>Ups!</strong> Usuario o Contraseña invalido. Por favor intente de nuevo.', 'default', array(), 'error');
        return $this->redirect(
          array('action'=>'login')
        );
      }
    }
  }

  public function changePassword()
  {
    $this->canAccess();

    $obtenerID= $this->Session->read('Admin')['Admin']['admin_id'];  

    $this->Admin->read(null, $obtenerID);

    if ($this->request->is('post')) {

      $oldPassword = $this->request->data['Admin']['oldPassword'];
      $newPassword = $this->request->data['Admin']['newPassword'];
      $confNewPassword = $this->request->data['Admin']['confNewPassword'];

      $rpta = $this->Admin->changePassword( 
        $oldPassword, $newPassword, 
        $confNewPassword);

      if($rpta['error']){      
        $this->Session->setFlash($rpta['error'], 'default', array(), 'error');
        return $this->redirect(
          array('action'=>'changePassword')
        );
      }else if ($rpta['success']){
        $this->Session->setFlash($rpta['success'], 'default', array(), 'success');
        return $this->redirect(
          array('action'=>'index')
        );
      }
    }
  }

  public function closeSession(){
    $this->Session->destroy();
    $this->redirect(array(
      'action' => 'login')
    );  
  }

}