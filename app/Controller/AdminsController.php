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

    // $ObtenerTipoAdmin= $this->Session->read('Admin.type');   

    $this->Admin->id = $obtenerID;

    if ($this->request->is('post')) {
      $change= $this->request->data['Admin']['password'];
      if ($this->Admin->guardarEdit($change)==true) {
          if ($ObtenerTipoAdmin==0) {
              $this->Session->setFlash('ha modificado su contraseña');
               $this->redirect(array('action' => 'adminGlobal'));
          }else{
              $this->Session->setFlash('ha modificado su contraseña');
              $this->redirect(array('action' => 'adminContenido'));
         }
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