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
	
	public function index()
  {
   
  }     

	public function registrar() 
  {
	  if ($this->request->is('post')) {
   		$this->Admin->set($this->data);
   		if($this->Admin->validates()){
   			if ($this->Admin->saveAll($this->request->data)) {
         	$this->Session->setFlash('El administrador fue registrado con exito');
         	$this->redirect(array('action' => 'index'));
        }else{
					$this->Session->setFlash('Error');
					$this->redirect(array('action' => 'index'));
        }
   		}else{
   			$errors=$this->Admin->validationErrors;
   			$this->set('errores',$errors);
   		}
   }
	}
  

	}