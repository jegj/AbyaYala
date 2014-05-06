<?php
App::uses('MiscLib', 'Lib');
/*
* Controlador que contiene la funcionalidades   principales de los usuarios
*
*/

class UsersController extends AppController
{
	var $helpers=array('Html','Form', 'Js');
	var $name ='User';
	var $layout = 'Usuario';
	public $components = array('Session', 'RequestHandler', 'Paginator');

	var $uses = array('ImageContent', 'Content', 'Ethnicity', 'EthnicityNoteForm', 'News');

	public function index()
	{	
		$news = $this->News->find('all', 
			array(
				'limit'=>5,
				'order' => array('News.current_date DESC')
			)
		);

		$images = $this->Content->find('all',	
			array(
				'conditions'=> array('Content.type' => 'imagen'),
				'limit' => 4,
				'order' => array('Content.create_date DESC')
			)
		);

		$papers = $this->Content->find('all',
			array(
				'conditions'=> array('Content.type' => 'documento'),
				'limit' => 4,
				'order' => array('Content.create_date')	
			)
		);

		$this->set(compact('news', 'images', 'papers'));
	}

	public function images()
	{

		$this->Paginator->settings = array(
        'conditions' => array('Content.type =' => 'imagen'),
        'limit' => 12,
        'paramType'=>'querystring',
        'order' => array(
        	'Content.create_date' => 'desc'
        )
    );

		try{
       $content = $this->Paginator->paginate('Content');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'imagenes'));
    }

    $this->set('content', $content);
    	
	}

	public function abyayala()
	{
	}

	public function address()
	{
	}

	public function team()
	{
	}

	public function map()
	{
	}



}