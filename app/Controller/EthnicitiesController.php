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

           
            if ($this->Ethnicity->save ()){
        	    $this->Session->setFlash($message, 'default', array(), 'success');

                return $this->redirect(
                        array('action'=>'index'));

        	    }else{
    	           $this->Session->setFlash('<strong>Error!</strong> Hubo problemas al crear la Etnia.', 'default', array(), 'error');
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

        if (!$this->Ethnicity->exists($id)) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(array('action'=>'index'));
        }

        $ethnicity = $this->Ethnicity->findByEthnicityId($id);

        $this->Ethnicity->read(null, $id);

        if ($this->request->is(array('post', 'put'))) {

            if ($this->Ethnicity->save($this->request->data)){
                $this->Session->setFlash('<strong>Exito!</strong> Se actualizó la información de la etnia exitosamente.', 'default', array(), 'success');
                return $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash('<strong>Error!</strong> Hubo problemas para modificar la Etnia.', 'default', array(), 'error');
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
        $this->canAccess();

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

    public function user_preview($id)
    {
        $this->layout = 'Usuario';
        
        if (!$id) {
            $this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
            return $this->redirect(
                array(
                    'controller' => 'users',
                    'action'=>'index'
                )
            );
        }

        $ethnicity = $this->Ethnicity->findByEthnicityId($id);

        if (!$ethnicity) {
            $this->Session->setFlash('<strong>Error!</strong> No existe la etnia especificada.', 'default', array(), 'error');
            return $this->redirect(
                array(
                    'controller' => 'users',
                    'action'=>'index'
                )
            );
        }

        if(!$ethnicity['Ethnicity']['active']){
            $this->Session->setFlash('<strong>Error!</strong> El contenido de la etnia se encuentra en mantenimiento.', 'default', array(), 'error');
            return $this->redirect(
                array(
                    'controller' => 'users',
                    'action'=>'index'
                )
            );
        }

        $this->set(compact('ethnicity'));   
    }

    public function notes()
    {
        if ($this->request->is('post')) {

            $id=$this->data['Ethnicity']['id'];
            $ethnicity=$this->Ethnicity->findByEthnicityId($id);
            if($ethnicity)
                $this->set('ethnicity',$ethnicity);     
            else{
                $error=true;
                $this->set('error',$error);
            }
        }   
    }


    public function change_status()
    {
        $id = (int)$this->data['id'];
        $estadoNuevo = (int)$this->data['estado']== 0?1:0;

        $this->response->type('json');
        $this->autoRender=false;

        if($id){
            if (!$this->Ethnicity->exists($id)) {
                $json = json_encode(array('exito'=>false, 'msg' => 'La Etnia especificada no existe.'));
            }else{
                $data = $this->Ethnicity->read(null, $id);
                if($this->Ethnicity->saveField('active', $estadoNuevo) && $this->Ethnicity->updateSearch($estadoNuevo, $data)){
                    $json = json_encode(array('exito'=>true, 'msg' => 'Se cambio el estado de la Etnia correctamente.'));
                    
                    $admin = $this->Session->read('Admin');
      			 	CakeLog::write('activity', sprintf("El administrador %s %s cambio el estado de la etnia %s a %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $data['Ethnicity']['name'], $estadoNuevo==1?'Activa':'Desactivada'));
                }else{
                    $json = json_encode(array('exito'=>false, 'msg' => 'Hubo problemas para completar la operación.'));
                }
            }
        }else{
            $json = json_encode(array('exito'=>false, 'msg' => 'La Etnia especificada no existe.'));
        }
        $this->response->body($json);        
    }

}