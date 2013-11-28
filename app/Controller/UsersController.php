<?php
/*
* Controlador que contiene la funcionalidades   principales de los usuarios
*
*/

class UsersController extends AppController
{
	var $helpers=array('Html','Form', 'Js');
	var $name ='User';
	var $layout = 'Usuario';

	public function index()
	{	
		$this->set('prueba', 'esto es una prueba');
	}
}