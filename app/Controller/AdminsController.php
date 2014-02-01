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
  	App::import('Vendor', 'zend_include');
		App::import('Vendor', 'Zend_Gdata_YouTube', true, false, 'Zend/Gdata/YouTube.php');
		$zend = new Zend_Gdata_Youtube();
		$videoEntry = $zend->getVideoEntry('the0KZLEacs');
		$this->set('video', $videoEntry);

  }     
  

}