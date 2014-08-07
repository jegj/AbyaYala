<?php
App::uses('AppController', 'Controller');
/**
 * Notes Controller
 *
 * @property Note $Note
 * @property PaginatorComponent $Paginator
 */
class NotesController extends AppController {

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
		$this->layout = 'ckeditor';
		$notes= $this->Note->find('all');
		$this->set('notes', $notes);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $ethId=null) {
		if (!$this->Note->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
			return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethId));
		}

		$options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));

		$note=$this->Note->find('first', $options);

		$this->set(compact('note', 'ethId'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ethId=null, $ethName=null)
	{
		if ($this->request->is('post')) {

			if($this->Note->save($this->request->data)) {
				$data = $this->request->data;
				$this->Session->setFlash('<strong>Exito!</strong> Se creo la nota exitosamente.', 'default', array(), 'success');
				
				$admin = $this->Session->read('Admin');
      			CakeLog::write('activity', sprintf("El administrador %s %s creó la nota %s a la etnia %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $data['Note']['name'], $ethName));
      			
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethId));
			}else {
				$this->Session->setFlash('<strong>Error!</strong> Hubo problemas para crear la Nota.', 'default', array(), 'error');
			}
		}

		$this->set(compact('ethId', 'ethName'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $ethId=null, $ethName=null) {
		if (!$this->Note->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
      return $this->redirect(array(
        	'controller' => 'ethnicities',
        	'action'=>'index')
      );
		}

		if ($this->request->is(array('post', 'put'))) {

			$this->Note->read(null, $id);
			$nombre = $this->Note->data['Note']['name'];

			if ($this->Note->save($this->request->data)) {
				$this->Session->setFlash('<strong>Exito!</strong> Se modificó la nota exitosamente.', 'default', array(), 'success');
				
				$admin = $this->Session->read('Admin');
      			CakeLog::write('activity', sprintf("El administrador %s %s modifico la nota %s de la etnia %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $nombre, $ethName));
      			
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethId));
			} else {
				$this->Session->setFlash('<strong>Error!</strong> Hubo problema para modificar la Nota.', 'default', array(), 'error');
			}
		} 
		$options = array('conditions' => array('Note.' . $this->Note->primaryKey => $id));
		$this->request->data = $this->Note->find('first', $options);
		$this->set(compact('ethName', 'ethId'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $ethId=null ) {
		
		
		
		if (!$this->Note->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
		      return $this->redirect(array(
		        	'controller' => 'ethnicities',
		        	'action'=>'index')
		      );
		}
		
		$this->Note->read(null, $id);
		$nombre = $this->Note->data['Note']['name'];
		
		$this->Note->id = $id;
		
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->Note->delete()) {
			$admin = $this->Session->read('Admin');
      		CakeLog::write('activity', sprintf("El administrador %s %s eliminó la nota %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $nombre));
      			
			$this->Session->setFlash('<strong>Exito!</strong> Se eliminó  la nota exitosamente.', 'default', array(), 'success');
		} else {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
		}
		return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethId));
	}
}