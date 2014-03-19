<?php
App::uses('AppController', 'Controller');
App::uses('MiscLib', 'Lib');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class NewsController extends AppController {

	var $helpers=array('Html','Form', 'Js', 'Session');
	
	public $components = array('Session', 'RequestHandler', 'Paginator');

  var $layout='Administrador';	

  var $uses = array('News','Content');

 	public function images()
 	{
 		if ($this->request->is('post')) {
 			$page=$this->data['News']['page'];
			$size=$this->data['News']['size'];

			$totalRecords=$this->Content->find('count',	array('conditions'=>
						array('Content.type' => 'imagen')
					));
			$content=$this->Content->find('all',	
					array(
						'conditions'=>
							array('Content.type' => 'imagen'),
						'limit'=>$size,
						'page'=>$page
					)
			);

			if($content && $totalRecords)
				$this->set(compact('totalRecords', 'content', 'size', 'page'));
			else
				$this->set('error',true);	
		}
 	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paginator->settings = array(
      'limit' => 5,
      'paamType'=>'querystring',     
    );

		try{
      $news = $this->Paginator->paginate('News');
    }catch (NotFoundException $e) {
      return $this->redirect(array('action'=>'index'));
    }
    
		$this->set('news', $news);
	}

/**
 * resultsIndex method
 *
 * @return void
 */
	public function resultsIndex()
	{
		if(isset($this->request->query['term']))
			$term=$this->request->query['term'];
		else
			$term=false;

		if($term)
			$this->Paginator->settings = array(
	        'limit' => 5,
	        'paramType'=>'querystring',
	        'conditions' => array('News.title LIKE' => "%$term%")   	
	    );
		try{
       $news = $this->Paginator->paginate('News');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'index'));
    }

    $this->set(compact('news'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->News->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe la noticia especificada.', 'default', array(), 'error');
    	return $this->redirect(array('action'=>'index'));
		}

		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->News->create();
			$this->request->data['current_date']=date('Y-m-d H:i:s');
			
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash('<strong>Exito!</strong> Se creo la noticia exitosamente.', 'default', array(), 'success');
        return $this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('<strong>Error!</strong> Hubo problemas para agregar la Noticia.', 'default', array(), 'error');
			}
		}
		$contents= $this->Content->find('list', array('conditions'=>array('Content.type'=>'imagen')));
		$this->set(compact('contents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->News->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
      return $this->redirect(array('action'=>'index'));
		}

		if ($this->request->is(array('post', 'put'))) {

			$this->News->read(null, $id);

			if ($this->News->save($this->request->data)) 
			{

				$this->Session->setFlash('<strong>Exito!</strong> Se actualizó modificó la noticia exitosamente.', 'default', array(), 'success');
				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('<strong>Error!</strong> Hubo problemas para modificar la noticia.', 'default', array(), 'error');
			}
		
			
		} 
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			
			$contents= $this->Content->find('list', array('conditions'=>array('Content.type'=>'imagen')));
			$this->request->data = $this->News->find('first', $options);
			
			$this->set(compact('contents'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
      return $this->redirect(array('action'=>'index'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->News->delete()) {
			$this->Session->setFlash('<strong>Exito!</strong> Se eliminó  la noticia exitosamente.', 'default', array(), 'success');
		} else {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
