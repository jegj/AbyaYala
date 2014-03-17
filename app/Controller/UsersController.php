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

	var $uses = array('ImageContent', 'Content', 'Ethnicity', 'EthnicityNoteForm', 'News');

	public function index()
	{	
		$news = $this->News->find('all', 
			array('limit'=>5)
		);

		$this->set(compact('news'));
	}

	public function abyayala()
	{

	}

	public function address()
	{

	}

}