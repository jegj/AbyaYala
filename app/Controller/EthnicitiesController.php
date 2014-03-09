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
    
    public $components = array('Session', 'RequestHandler', 'Paginator');

    var $layout='Administrador';
	var $name ='Ethnicity';

	public function index()
	{
        $this->Paginator->settings = array(
            'limit' => 5,
            'paamType'=>'querystring',     
            'conditions' => array('Ethnicity.ethnicity_father_id is null'),
        );

        try{
            $content = $this->Paginator->paginate('Ethnicity');
        }catch (NotFoundException $e) {
            return $this->redirect(array('action'=>'index'));
        }

		$this->set('ethnicity',$content);
	}

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
            'conditions' => array('Ethnicity.name LIKE' => "%$term%",
                'Ethnicity.ethnicity_father_id is null'
                )     
        );
        try{
       $content = $this->Paginator->paginate('Ethnicity');
        }catch (NotFoundException $e) {
            return $this->redirect(array('action'=>'index'));
        }

        $this->set('ethnicity',$content);

    }

    public function synonyms($id, $ethnicityName){
        if(isset($id) && isset($ethnicityName)){
            if ($this->Ethnicity->exists($id)) {
                $this->Paginator->settings = array(
                        'conditions' => array('Ethnicity.ethnicity_father_id ' => $id),
                        'limit' => 5,
                        'paramType'=>'querystring',
                    );
                try{
                   $ethnicity = $this->Paginator->paginate('Ethnicity');
                }catch (NotFoundException $e) {
                    return $this->redirect(array('action'=>'imagenes'));
                }   
                $this->set(compact('id', 'ethnicity', 'ethnicityName'));
            }else{
                $this->Session->setFlash('<strong>Error!</strong> No existe la Etnia especificada.', 'default', array(), 'error');
                return $this->redirect(array('action'=>'index'));
            }
        }else{
            $this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action' => 'index'));
        }
    }

	public function add($synonym=false, $ethnicityId=null, $ethnicityName=null)
	{
		if ($this->request->is('post')) {

            if(isset($ethnicityId)){
                $this->request->data['Ethnicity']['ethnicity_father_id'] = $ethnicityId;
                $message='<strong>Exito!</strong> Se creo el sinónimo exitosamente.';
            }else{
                $message='<strong>Exito!</strong> Se creo la etnia exitosamente.';
            }


            $this->Ethnicity->set($this->request->data);

            if($this->Ethnicity->validates()){
        	    if ($this->Ethnicity->save ()){
        	       $this->Session->setFlash($message, 'default', array(), 'success');
                    return $this->redirect(array('action'=>'index'));
        	    }else{
    	           $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
                  return $this->redirect(array('action'=>'index'));
                }
            }
        }

        $this->set(compact('synonym', 'ethnicityId', 'ethnicityName'));

	}

	public function delete($id, $synonym)
	{
		      
        if ($this->request->is('get') || !isset($id)) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $this->Ethnicity->id = $id;

        if (!$this->Ethnicity->exists()) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        //Borro los sinonimos
        if($this->Ethnicity->deleteAll(array('Ethnicity.ethnicity_father_id ' => $id), false)){

            /*OJO*/
            //Metodo para eliminar las anclas

            if ($this->Ethnicity->delete()) {
                if($synonym)
                    $message='el Sinónimo';
                else
                    $message='la Etnia';

               $this->Session->setFlash('<strong>Exito!</strong> Se eliminó '.$message.' exitosamente.', 'default', array(), 'success');
                return $this->redirect(array('action'=>'index'));
            }else{
            	$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
                return $this->redirect(array('action'=>'index'));
            }
        }else{
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

	}  

	public function edit($id = null, $synonym=null) {
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

        $this->set(compact('ethnicity', 'synonym'));
	}

	public function view($id)
	{

        if (!$id) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $ethnicity=$this->Ethnicity->findByEthnicityId($id);

        if (!$ethnicity) {
            $this->Session->setFlash('<strong>Error!</strong> No existe la etnia especificada.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $this->set(compact('ethnicity'));
        
	}

    public function preview($id)
    {

        if (!$id) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $ethnicity = $this->Ethnicity->findByEthnicityId($id);

        if (!$ethnicity) {
            $this->Session->setFlash('<strong>Error!</strong> No existe la etnia especificada.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $this->set(compact('ethnicity'));
    }


}
