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

            $this->Ethnicity->set($this->request->data);

            if($this->Ethnicity->validates()){

        	    if ($this->Ethnicity->saveModel($this->request->data)) {
        	       $this->Session->setFlash('<strong>Exito!</strong> Se creo la etnia exitosamente.', 'default', array(), 'success');
                    return $this->redirect(array('action'=>'index'));
        	    }else{
    	           $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
                  return $this->redirect(array('action'=>'index'));
              }
          }
        }
	}

	public function delete($id)
	{
		      
        if ($this->request->is('get') || !isset($id)) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        if ($this->Ethnicity->deleteModel($id)) {
           $this->Session->setFlash('<strong>Exito!</strong> Se eliminó  la etnia exitosamente.', 'default', array(), 'success');
            return $this->redirect(array('action'=>'index'));
        }else{
        	$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

	}  

	public function edit($id = null) {
       if (!$id) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $ethnicity = $this->Ethnicity->findByEthnicityId($id);

        if (!$ethnicity) {
            $this->Session->setFlash('<strong>Error!</strong> No existe la etnia especificada.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        if ($this->request->is(array('post', 'put'))) {
            
            $this->Ethnicity->read(null, $id);
            $this->Ethnicity->set($this->request->data);
            if($this->Ethnicity->validates()){
                if ($this->Ethnicity->saveModel($this->request->data,false)) {
                    $this->Session->setFlash('<strong>Exito!</strong> Se actualizó la información de la etnia exitosamente.', 'default', array(), 'success');
                    return $this->redirect(array('action'=>'index'));
                }else{
                    $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
                    return $this->redirect(array('action'=>'index'));
                }
            }
        }

        if (!$this->request->data) {
            $this->request->data = $ethnicity;
        }

        $this->set('ethnicity', $ethnicity);
	}

	public function view($id)
	{

        if (!$id) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $ethnicity = $this->Ethnicity->getCompactInformation($id);

        if (!$ethnicity) {
            $this->Session->setFlash('<strong>Error!</strong> No existe la etnia especificada.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $this->set(compact('ethnicity'));
        
	}


}
