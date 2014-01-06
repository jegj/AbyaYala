<?php
App::uses('AppController', 'Controller');
/**
 * Ethnicities Controller
 *
 * @property Ethnicity $Ethnicity
 * @property PaginatorComponent $Paginator
 */
class EthnicitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $helpers=array('Html','Form', 'Js', 'Session');
	public $components = array('Session');
    var $layout='Administrador';
	var $name ='Ethnicity';

	public function index()
	{
		$ethnicity=$this->Ethnicity->find('all');
		$this->set('ethnicity',$ethnicity);
	}

	public function add()
	{
		if ($this->request->is('post')) {
    	    if ($this->Ethnicity->saveModel($this->request->data)) {
    	        $this->Session->setFlash(__('Se creo la Etnia exitosamente'));
    	        return $this->redirect(array('action' => 'index'));
    	    }
	       $this->Session->setFlash(__('No se pudo agregar la Etnia'));
        }
	}

	public function delete($id)
	{
		if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Ethnicity->deleteModel($id)) {
        	 $this->Session->setFlash(
    	            __('Se elimino la etnia correctamente ')
    	        );
    	        return $this->redirect(array('action' => 'index'));
        }else{
        	 $this->Session->setFlash(__('No se pudo eliminar la Etnia'));
        	  return $this->redirect(array('action' => 'index'));
        }

	}

	public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Etnia invalida'));
        }

        $ethnicity = $this->Ethnicity->findByEthnicityId($id);

        if (!$ethnicity) {
            throw new NotFoundException(__('Etnia invalida'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Ethnicity->read(null, $id);
            if ($this->Ethnicity->saveModel($this->request->data,false)) {
                $this->Session->setFlash(__('Se modifico la etnia'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('no se pudo modificar la etnia'));
        }

        if (!$this->request->data) {
            $this->request->data = $ethnicity;
        }
	}

	public function view($id)
	{

        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $ethnicity = $this->Ethnicity->getCompactInformation($id);
        if (!$ethnicity) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set(compact('ethnicity'));
        
	}

	public function anchors($id)
	{
		if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

	}

}
