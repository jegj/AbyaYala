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

		$cliente = FeedLib::getInstance();
		$videos = $cliente->search();

		$this->set(compact('news', 'images', 'papers', 'videos'));
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
		$cliente = FeedLib::getInstance();
		$videos = $cliente->search(1, null, 13);

		$this->set(compact('videos'));
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
		$independientes = $this->Ethnicity->find('all', 
			array(
				'conditions' => array(
					'AND' => array(
						'Ethnicity.type' => 'Independiente',
						'Ethnicity.active' => 1,
					)
				),
				'contain' => false
			)
		);

		$karibe = $this->Ethnicity->find('all', 
			array(
				'conditions' => array(
					'AND' => array(
						'Ethnicity.type' => 'Karibe',
						'Ethnicity.active' => 1,
					)
				),
				'contain' => false
			)
		);

		$arawak = $this->Ethnicity->find('all', 
			array(
				'conditions' => array(
					'AND' => array(
						'Ethnicity.type' => 'Arawak',
						'Ethnicity.active' => 1,
					)
				),
				'contain' => false
			)
		);

		$chibcha = $this->Ethnicity->find('all', 
			array(
				'conditions' => array(
					'AND' => array(
						'Ethnicity.type' => 'Chibcha',
						'Ethnicity.active' => 1,
					)
				),
				'contain' => false
			)
		);

		$tupi = $this->Ethnicity->find('all', 
			array(
				'conditions' => array(
					'AND' => array(
						'Ethnicity.type' => 'Tupí Guaraní',
						'Ethnicity.active' => 1,
					)
				),
				'contain' => false
			)
		);

		$guajibo = $this->Ethnicity->find('all', 
			array(
				'conditions' => array(
					'AND' => array(
						'Ethnicity.type' => 'Guajibo',
						'Ethnicity.active' => 1,
					),
				),
				'contain' => false
			)
		);

		$this->set(compact('independientes', 'karibe', 'arawak', 'chibcha', 'tupi', 'guajibo'));
	}


	public function draw()
	{
		$this->response->type('json');
    $this->autoRender=false;

    $etnias = $this->Ethnicity->find('all',
    	array(
	    	'conditions' => array(
					'AND' => array(
						'Ethnicity.active' => 1,
					),
				),
				'contain' => 'Map'
	    )
    );

    foreach ($etnias as $key => $etnia) {
    	$etnia['Ethnicity']['url'] = Router::url(array('controller' => 'ethnicities', 'action' => 'user_preview', $etnia['Ethnicity']['ethnicity_id']));
    	$etnias[$key] = $etnia;
    }

    $json = json_encode($etnias);
    $this->response->body($json); 
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


		if(count($this->Prg->parsedParams()) > 1){
			$this->set('term', 'Búsqueda Compuesta');			
		}else
			$this->set('term', $this->Prg->parsedParams()['name']);

		try{
       $results = $this->Paginator->paginate();
    }catch (NotFoundException $e) {
       $results = array();
    }


		$this->set('results', $results);

	}

	public function advanced_search()
	{

	}

}