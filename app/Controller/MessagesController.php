<?php
App::uses('AppController', 'Controller');
App::uses('MiscLib', 'Lib');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $helpers=array('Html','Form', 'Js', 'Session');

	public $components = array('Session', 'RequestHandler', 'Paginator');

	var $layout='Administrador';	

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Paginator->settings = array(
            'limit' => 5,
            'paamType'=>'querystring',
             'order' => array(
            		'Message.read' => 'asc'
        		)   
    );

    try{
      $messages = $this->Paginator->paginate('Message');

      $unreadMessages = $this->Message->find('count', 
      	array('conditions'=>array('Message.read'=>0)));

    }catch (NotFoundException $e) {
      return $this->redirect(array('action'=>'index'));
    }
		
		$this->set(compact('messages', 'unreadMessages'));
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
	        'order' => array(
            		'Message.read' => 'asc'
        		), 
	        'conditions' => array('Message.subject LIKE' => "%$term%")   	
	    );

		try{
       $messages = $this->Paginator->paginate('Message');
      $unreadMessages = $this->Message->find('count', 
      	array('conditions'=>array('Message.read'=>0)));

    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'index'));
    }

    $this->set(compact('messages', 'unreadMessages'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Message->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe el mensaje especificado.', 'default', array(), 'error');
    	return $this->redirect(array('action'=>'index'));
		}

		$this->Message->read(null, $id);

		$messageRead=$this->Message->saveField('read', '1', true);

		if($messageRead){
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->set('message', $this->Message->find('first', $options));
		}else{
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
    	return $this->redirect(array('action'=>'index'));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash('<strong>Exito!</strong> Se envio el mensaje exitosamente.', 'default', array(), 'success');
				return $this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
			}

		}
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Message->id = $id;

		if (!$this->Message->exists()) {
				$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ($this->Message->delete()) {
			$this->Session->setFlash('<strong>Exito!</strong> Se eliminó  el mensaje exitosamente.', 'default', array(), 'success');
		} else {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
