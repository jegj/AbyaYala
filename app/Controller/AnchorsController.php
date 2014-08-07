<?php
App::uses('AppController', 'Controller');

class AnchorsController extends AppController
{

	var $helpers=array('Html','Form', 'Js', 'Session');
	public $components = array('Paginator', 'Session', 'RequestHandler');
	var $layout='Administrador';
	

	public function view($id = null, $ethnicityId=null)
	{
		if (!$this->Anchor->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe la ancla especificada.', 'default', array(), 'error');
    		return $this->redirect(array('action'=>'index'));
		}
		$options = array('conditions' => array('Anchor.' . $this->Anchor->primaryKey => $id));
		$this->set('anchor', $this->Anchor->find('first', $options));
		$this->set('ethnicityId', $ethnicityId);
	}

	public function add($ethnicityId = null ,$ethnicityName = null)
	{
		
		if ($this->request->is('post')) {
			if ($this->Anchor->save($this->request->data)) {
				$data = $this->request->data;
				$this->Session->setFlash('<strong>Exito!</strong> Se creo la ancla exitosamente.', 'default', array(), 'success');
				
				$admin = $this->Session->read('Admin');
      			CakeLog::write('activity', sprintf("El administrador %s %s creó el ancla %s de la etnia %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $data['Anchor']['name'], $ethnicityName));
				
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view', $ethnicityId));
				
			} else {	
				$this->Session->setFlash('<strong>Error!</strong> Hubo problemas para crear el Ancla.', 'default', array(), 'error');
			}
		}
		

		$this->set(compact('ethnicityId', 'ethnicityName'));
	}

	public function edit($id = null,$ethnicityId=null)
	{

		if (!$this->Anchor->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe la ancla especificada.', 'default', array(), 'error');
			return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
		}

		$anchor = $this->Anchor->findByAnchorId($id);
		$name = $anchor['Anchor']['name'];

		if ($this->request->is(array('post', 'put'))) {
			$this->Anchor->read(null, $id);
			if ($this->Anchor->save($this->request->data)){
				$this->Session->setFlash('<strong>Exito!</strong> Se actualizó la ancla exitosamente', 'default', array(), 'success');
				
				$admin = $this->Session->read('Admin');
      			CakeLog::write('activity', sprintf("El administrador %s %s modifico el ancla %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $name));
      			
				return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
			} else {
				$this->Session->setFlash('<strong>Error!</strong> Hubo problemas para modifica el Ancla..', 'default', array(), 'error');
			}
			
		} 
		
		$options = array('conditions' => array('Anchor.' . $this->Anchor->primaryKey => $id));
		$this->request->data = $this->Anchor->find('first', $options);
		
		$this->set(compact('ethnicityId', 'name'));
	}

	public function delete($id = null,$ethnicityId=null)
	{
		
		if (!$this->Anchor->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No existe el ancla especificada.', 'default', array(), 'error');
			return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
		}
		$this->Anchor->read(null,$id);

		$this->request->onlyAllow('post', 'delete');

		if ($this->Anchor->delete()) {
			$this->Session->setFlash('<strong>Exito!</strong> Se eliminó el ancla exitosamente.', 'default', array(), 'success');
			$admin = $this->Session->read('Admin');
      		CakeLog::write('activity', sprintf("El administrador %s %s eliminó el ancla %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $this->Anchor->data['Anchor']['name']));
		} else {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
		}

		return $this->redirect(array('controller'=>'ethnicities','action' => 'view',$ethnicityId));
	}
}