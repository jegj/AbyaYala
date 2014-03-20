<?php
/*
* Controlador que contiene la funcionalidades   principales de los Administradores
*
*/

App::uses('CakeEmail', 'Network/Email');
App::uses('MiscLib', 'Lib');

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

  public function allAdmins()
  {
    $this->canAccess();
    $this->onlyGlobalAdmin();

    $this->Paginator->settings = array(
      'limit' => 5,
      'paamType'=>'querystring',     
    );

    try{
      $admins = $this->Paginator->paginate('Admin');
    }catch (NotFoundException $e) {
      return $this->redirect(array('action'=>'index'));
    }

    $this->set('admins', $admins);

  }

  public function resultsIndex()
  {
    $this->canAccess();

    if(isset($this->request->query['term']))
      $term=$this->request->query['term'];
    else
      $term=false;

    if($term)
      $this->Paginator->settings = array(
          'limit' => 5,
          'paramType'=>'querystring',
          'conditions' => array('Admin.name LIKE' => "%$term%")     
      );
    try{
       $admins = $this->Paginator->paginate('Admin');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'index'));
    }

    $this->set(compact('admins'));
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

  public function add()
  {
    $this->canAccess();
    
    $this->onlyGlobalAdmin();
    if ($this->request->is('post')) {      
      if ($this->Admin->save($this->request->data)) {
        $this->Session->setFlash('<strong>Exito!</strong> Se creo el Administrador exitosamente.', 'default', array(), 'success');
        return $this->redirect(array('action' => 'index'));
      }else{
        $this->Session->setFlash('<strong>Error!</strong> Hubo problemas para crear el Administrador.', 'default', array(), 'error');
      }
    }
  }

  public function delete($id = null)
  {
    $this->canAccess();
    $this->onlyGlobalAdmin();

    $this->Admin->id =$id;

    if (!$this->Admin->exists($id)) {
      $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
      return $this->redirect(array('action'=>'index'));
    }

    $this->request->onlyAllow('post', 'delete');

    if ($this->Admin->delete()) {
      $this->Session->setFlash('<strong>Exito!</strong> Se eliminó  el Administrador exitosamente.', 'default', array(), 'success');
    } else {
      $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
    }
    return $this->redirect(array('action' => 'index'));

  }

  public function forgot()
  {
    $this->layout = 'Usuario';
    if ($this->request->is('post')){
      $email = $this->request->data['Admin']['email'];
      $admin  = $this->Admin->find('first',
        array('conditions' => array(
          'email' => $email)
        )
      );

      if(!$admin){
         $this->Session->setFlash('<strong>Error!</strong> El correo suministrado no se encuntra registrado en AbyaYala.', 'default', array(), 'error');
      }else{
        $this->Admin->recoverPassword($email, $admin);
        $this->Session->setFlash('<strong>Exito!</strong> Se envio una contraseña nueva al correo suministrado.', 'default', array(), 'success');
      }

      return $this->redirect(array('action' => 'forgot'));
    }
  }

  public function closeSession(){
    $this->Session->destroy();
    $this->redirect(array(
      'action' => 'login')
    );  
  }

}