<?php
App::uses('MiscLib', 'Lib');
App::uses('FeedLib', 'Lib');
/*
* Controlador que contiene la funcionalidades   principales de los usuarios
*
*/

class UsersController extends AppController
{
	var $helpers=array('Html','Form', 'Js');
	var $name ='User';
	var $layout = 'Usuario';
	public $components = array('Session', 'RequestHandler', 'Paginator', 'Search.Prg');

	var $uses = array('Search', 'News','ImageContent', 'Content', 'Ethnicity', 'EthnicityNoteForm');

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

	public function videos()
	{
		//Se uso XML feed en las vistas
	}

	public function audio()
	{
		$this->Paginator->settings = array(
        'conditions' => array('Content.type =' => 'audio'),
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

	public function research()
	{
		$this->Paginator->settings = array(
        'conditions' => array('Content.type =' => 'documento'),
        'limit' => 12,
        'paramType'=>'querystring',
        'order' => array(
        	'Content.create_date' => 'desc'
        )
    );

		try{
       $content = $this->Paginator->paginate('Content');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'research'));
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

	public function traces()
	{
		$this->Paginator->settings = array(
        'limit' => 8,
        'paramType'=>'querystring',
        'order' => array(
        	'News.current_date' => 'desc'
        )
    );

		try{
       $content = $this->Paginator->paginate('News');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'traces'));
    }

    $this->set('content', $content);
	}

	public function search()
	{
		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->Search->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['limit'] = 5;
		$this->set('results', $this->Paginator->paginate());

		//die(print_r($this->request->params['paging']['Search']['page']));

		if(count($this->Prg->parsedParams()) > 1)
			$this->set('term', 'Búsqueda Compuesta');
		else
			$this->set('term', $this->Prg->parsedParams()['name']);
	}

	public function advanced_search()
	{

	}
}
