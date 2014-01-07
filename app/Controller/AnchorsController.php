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
			throw new NotFoundException(__('Invalid anchor'));
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
					$this->Session->setFlash(__('Se creo el ancla correctamente '.$anchorId));
					return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
				}else{
					$this->Session->setFlash(__('Hubo problemas al crear la ancla. Please, try again.'));
					return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
				}
			} else {	
				$this->Session->setFlash(__('Hubo problemas al crear la ancla. Please, try again.'));
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
			throw new NotFoundException(__('Invalid anchor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Anchor->saveModel($this->request->data,false)) {
				$this->Session->setFlash(__('Se modifico la ancla correctamente.'));
					return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la ancla correctamente'));
			}
		} else {
			$options = array('conditions' => array('Anchor.' . $this->Anchor->primaryKey => $id));
			$this->request->data = $this->Anchor->find('first', $options);
		}
		$this->set('ethnicityId',$ethnicityId);
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
			throw new NotFoundException(__('Invalid anchor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Anchor->deleteModel($id)) {
			$this->Session->setFlash(__('Se elimino la ancla correctamente'));
		} else {
			$this->Session->setFlash(__('No se pudo eliminar la ancla'));
		}
		return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
	}
}
