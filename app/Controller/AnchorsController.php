<?php
App::uses('AppController', 'Controller');
/**
 * Anchors Controller
 *
 * @property Anchor $Anchor
 * @property PaginatorComponent $Paginator
 */
class AnchorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $helpers=array('Html','Form', 'Js', 'Session');
	public $components = array('Paginator', 'Session');
	var $layout='Administrador';
	var $uses = array('EthnicitiesHasAnchor','Anchor');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Anchor->recursive = 0;
		$this->set('anchors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $ethnicityId=null) {
		if (!$this->Anchor->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe la ancla especificada.', 'default', array(), 'success');
    	return $this->redirect(array('action'=>'index'));
		}
		$options = array('conditions' => array('Anchor.' . $this->Anchor->primaryKey => $id));
		$this->set('anchor', $this->Anchor->find('first', $options));
		$this->set('ethnicityId', $ethnicityId);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ethnicityId,$ethnicityName) {
		if ($this->request->is('post')) {
			if ($this->Anchor->saveModel($this->request->data)) {
			
				$ethnicityId=$this->data['Anchor']['ethnicitiesId'];
				$anchorId=$this->Anchor->id;

				$data = array(
					'EthnicitiesHasAnchor' => array(
						'anchor_id' => $anchorId,
						'ethnicity_id' => $ethnicityId
					)
				);
				
				if($this->EthnicitiesHasAnchor->saveModel($data)){
					$this->Session->setFlash('Se creó la ancla exitosamente', 'default', array(), 'success');
					return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
				}else{
					 $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
					return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
				}
			} else {	
				 $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
			}
		}

		$this->set(compact('ethnicityId', 'ethnicityName'));
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$ethnicityId=null) {

		if (!$this->Anchor->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe la ancla especificada.', 'default', array(), 'error');
			return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
		}

		$name=$this->Anchor->findByAnchorId($id)['Anchor']['name'];

		if ($this->request->is(array('post', 'put'))) {
			$this->Anchor->read(null, $id);
			if ($this->Anchor->saveModel($this->request->data,false)) {
				$this->Session->setFlash('Se actualizó la ancla exitosamente', 'default', array(), 'success');
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
			} else {
				$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
			}
		} else {
			$options = array('conditions' => array('Anchor.' . $this->Anchor->primaryKey => $id));
			$this->request->data = $this->Anchor->find('first', $options);
		}
		$this->set(compact('ethnicityId', 'name'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null,$ethnicityId=null) {
		$this->Anchor->read(null,$id);
		if (!$this->Anchor->exists()) {
			$this->Session->setFlash('<strong>Error!</strong> No existe la ancla especificada.', 'default', array(), 'error');
			return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Anchor->deleteModel($id)) {
			$this->Session->setFlash('Se eliminó la ancla exitosamente.', 'default', array(), 'success');
		} else {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
		}

		return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
	}
}
