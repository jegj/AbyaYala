<?php
App::uses('AppController', 'Controller');
App::uses('MiscLib', 'Lib');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

	var $helpers=array('Html','Form', 'Js', 'Session');
	
	public $components = array('Session', 'RequestHandler', 'Paginator');

    var $layout='Administrador';

	var $name ='Content';

	var $uses = array('ImageContent', 'Content', 'Ethnicity', 'EthnicityNoteForm');


	public function index()
	{
		
		$this->canAccess();
		
		$this->Paginator->settings = array(
        'limit' => 5,
        'paramType'=>'querystring',   
        'order' => array('Content.create_date' => 'DESC')   
    );

		try{
       $content = $this->Paginator->paginate('Content');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'index'));
    }

    $this->set(compact('content', 'global'));
	}

	public function resultsIndex()
	{
		$this->canAccess();

		if(isset($this->request->query['term']))
			$term=$this->request->query['term'];
		else
			$term=false;

		if($term)
			$this->Paginator->settings = array(
	        'limit' => 5,
	        'paramType'=>'querystring',
	        'conditions' => array('Content.name LIKE' => "%$term%")   	
	    );
		try{
       $content = $this->Paginator->paginate('Content');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'index'));
    }

    $this->set(compact('content'));

	}

	public function uploadContent()
	{

	}

	public function audio()
	{
		// $this->canAccess();

		if ($this->request->is('post')) {

			$id = $this->data['Content']['id'];
			$content=$this->Content->findByContentId($id);
			if($content)
				$this->set('content',$content);		
			else{
				$error=true;
				$this->set('error',$error);		
			}
    }
	}


	public function image()
	{
		// $this->canAccess();

		if ($this->request->is('post')) {

			$id=$this->data['Content']['id'];
			$content=$this->Content->findByContentId($id);
			if($content)
				$this->set('content',$content);		
			else{
				$error=true;
				$this->set('error',$error);		
			}
    }
	}


	public function download($id, $viewOnline=false)
	{


		if(isset($id)){
			if ($this->request->is('get')) {
				$content = $this->Content->findByContentId($id);
				if($content){
			   		$this->response->file($content['Content']['path'], array('download' => $viewOnline));
			   		return $this->response;
			   }else{
			   		$this->Session->setFlash('<strong>Error!</strong> No existe el contenido especificado.', 'default', array(), 'error');
		  			return $this->redirect(array('action' => 'index'));
			   }
	    }else{
	    	$this->Session->setFlash('<strong>Error!</strong> No se pudo descargar el contenido especificado.', 'default', array(), 'error');
		  	return $this->redirect(array('action' => 'index'));
	    }
	  }else{
	  	$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
		  return $this->redirect(array('action' => 'index'));
	  }
	}

	public function delete($id)
	{
		$this->canAccess();

		if ($this->request->is('get') || !isset($id)) {
    	$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
    }

    $content=$this->Content->findByContentId($id);

    if(!$content){
    	$this->Session->setFlash('<strong>Error!</strong> No existe el contenido especificado.', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
    }


    $contentPath = $content['Content']['path'];
    
    if($contentPath){
	    if ($this->Content->deleteModel($id)) {
	    		if(unlink($contentPath)){
		         $this->Session->setFlash('<strong>Exito!</strong> Se elimino  contenido exitosamente', 'default', array(), 'success');
		         
		         $admin = $this->Session->read('Admin');
      			 CakeLog::write('activity', sprintf("El administrador %s %s eliminó el contenido %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $content['Content']['name']));
      			 
            	 return $this->redirect(array('action'=>'index'));
	      	}else{
	      		$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  				return $this->redirect(array('action'=>'index'));
	      	}
	    }else{
				$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  		return $this->redirect(array('action'=>'index'));
	    }
	  }else{
	  	$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
	  }
	}

	public function browse()
	{
		$this->canAccess();

		$this->layout = 'ckeditor';

		$langCode=$this->request->query['langCode'];	
 		$funcnum=$this->request->query['CKEditor'];	
 		$ckeditor=$this->request->query['CKEditorFuncNum'];
		
		$this->set(compact('ckeditor'));
	}

	public function imagenes()
	{
		$this->canAccess();

		$this->layout = 'ckeditor';	

		$ckeditor=$this->request->query['ckeditor'];	
		
		$ckeditor = str_replace('/','', $ckeditor);

		$this->Paginator->settings = array(
        'conditions' => array('Content.type =' => 'imagen'),
        'limit' => 8,
        'paramType'=>'querystring',
    );

		try{
       $content = $this->Paginator->paginate('Content');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'imagenes'));
    }
    

		$this->set(compact('content', 'ckeditor'));
	}

	public function audios()
	{
		$this->canAccess();

		$this->layout = 'ckeditor';
		$ckeditor=$this->request->query['ckeditor'];
		
		$ckeditor = str_replace('/','', $ckeditor);

		$this->Paginator->settings = array(
        'conditions' => array('Content.type =' => 'audio'),
        'limit' => 5,
        'paramType'=>'querystring',
    );

		try{
			$content = $this->Paginator->paginate('Content');
		}catch(NotFoundException $e) {
        return $this->redirect(array('action'=>'audios'));
    }

		$this->set(compact('content', 'ckeditor'));	
	}

	public function documentos()
	{
		$this->canAccess();

		$this->layout = 'ckeditor';
		$ckeditor=$this->request->query['ckeditor'];

		$ckeditor = str_replace('/','', $ckeditor);
		
		
		$this->Paginator->settings = array(
        'conditions' => array('Content.type =' => 'documento'),
        'limit' => 5,
        'paramType'=>'querystring',
    );

		try{
			$content = $this->Paginator->paginate('Content');
		}catch(NotFoundException $e) {
        return $this->redirect(array('action'=>'documentos'));
    }

		$this->set(compact('content', 'ckeditor'));	
	}

	public function search()
	{
		$this->canAccess();

		$this->layout = 'ckeditor';
		$ckeditor = $this->request->query['ckeditor'];
		$term = $this->request->query['term'];
		
		$ckeditor = str_replace('/','', $ckeditor);


		$this->Paginator->settings = array(
        'conditions' => 
        				array('OR'=> 
        						array(
        							array('Content.name LIKE' => "%$term%"),
        							array('Content.description LIKE' => "%$term%")
        						)
        				),
        'limit' => 2,
        'paramType'=>'querystring',
    );

		try{
    	$content = $this->Paginator->paginate('Content');
    }catch(NotFoundException $e) {
        return $this->redirect(array('action'=>'documentos'));
    }

		$this->set(compact('ckeditor', 'content'));	
		
	}

	public function notes()
	{
		$this->canAccess();

		$this->layout = 'ckeditor';

		$ethnicity= $this->Ethnicity->find('list', 
			array('conditions' => array('Ethnicity.ethnicity_father_id IS NULL'))
		);

		$ckeditor=$this->request->query['ckeditor'];

		$this->set(compact('ckeditor', 'ethnicity'));	
	}

	public function edit($id=null)
	{
		$this->canAccess();

		if (!$this->Content->exists($id)) {
			$this->Session->setFlash('<strong>Error!</strong> No se pudo completar la operación.', 'default', array(), 'error');
      return $this->redirect(array('action'=>'index'));
		}

    $content = $this->Content->findByContentId($id);

  	if ($this->request->is(array('post', 'put'))) {
	    $this->Content->read(null, $id);
	  
	  	if($this->Content->save($this->request->data)){

	  		$this->Session->setFlash('<strong>Exito!</strong> Se actualizó la información del contenido exitosamente.', 'default', array(), 'success');
	  		
			$admin = $this->Session->read('Admin');
      		CakeLog::write('activity', sprintf("El administrador %s %s modifico el contenido %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $content['Content']['name']));
      
	  		return $this->redirect(
	  			array('action'=>'index')
	  		);

	  	}else{
	  		$this->Session->setFlash('<strong>Error!</strong> Hubo problemas al modificar el contenido.', 'default', array(), 'error');
	  		/*return $this->redirect(
	  			array('action'=>'index')
	  		);*/
	  	}
    }

		$this->set('content', $content);

		if (!$this->request->data)
			$this->request->data = $content;
	}

	public function upload()
	{
		$this->canAccess();
		
		$this->autoRender=false;
		
		$file = $_FILES['upl'];
		$result=$this->Content->saveFile($file, $this->webroot);
		
		$admin = $this->Session->read('Admin');
      	CakeLog::write('activity', sprintf("El administrador %s %s subio el contenido %s", $admin['Admin']['name'], $admin['Admin']['last_name'], $file['name']));	
	
		$this->response->type('json');
		$json = json_encode(array('status'=>$result['complete']['result']));
		$this->response->body($json);
	}

}
