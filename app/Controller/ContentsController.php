<?php
App::uses('AppController', 'Controller');
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

	var $uses = array('ImageContent', 'Content');


	public function index()
	{
		
		$this->Paginator->settings = array(
        'limit' => 5,
        'paramType'=>'querystring',    	
    );


		try{
       $content = $this->Paginator->paginate('Content');
    }catch (NotFoundException $e) {
        return $this->redirect(array('action'=>'index'));
    }
		//$content= $this->Content->find('all');
		$this->set('content', $content);
	}

	public function uploadContent()
	{

	}

	public function audio()
	{
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
			$this->layout = 'ckeditor';

			$langCode=$this->request->query['langCode'];	
   		$funcnum=$this->request->query['CKEditor'];	
   		$ckeditor=$this->request->query['CKEditorFuncNum'];
   		
   		/*
   		$ckeditor= array('langCod' => $langCode,'ckeditor'=>$ckeditor, 'funcnum'=> $funcnum );	
   		*/
			
			$this->set(compact('ckeditor'));
	}

	public function imagenes()
	{
		$this->layout = 'ckeditor';	

		$ckeditor=$this->request->query['ckeditor'];	

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
		$this->layout = 'ckeditor';
		$ckeditor=$this->request->query['ckeditor'];

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
		$this->layout = 'ckeditor';
		$ckeditor=$this->request->query['ckeditor'];

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
		$this->layout = 'ckeditor';
		$ckeditor=$this->request->query['ckeditor'];
		$term=$this->request->query['term'];

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

	public function edit($id=null)
	{
		if (!$id) {
    	$this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
    }
    $content = $this->Content->findByContentId($id);

    if(!$content){
    	$this->Session->setFlash('<strong>Error!</strong> No existe el contenido especificado.', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
	  }

  	if ($this->request->is(array('post', 'put'))) {
	    $this->Content->read(null, $id);
	  
	  	if($this->Content->saveModel($this->request->data, false)){
	  		$this->Session->setFlash('<strong>Exito!</strong> Se actualizó la información del contenido exitosamente.', 'default', array(), 'success');
	  		return $this->redirect(array('action'=>'index'));
	  	}else{
	  		  $this->Session->setFlash('<strong>Error!</strong> No se puede completar la operación.', 'default', array(), 'error');
	  		  return $this->redirect(array('action'=>'index'));
	  	}
    }

		$this->set('content', $content);

		if (!$this->request->data)
			$this->request->data = $content;
	}


	/**
	* Funcion que permite subir contenido
	* al servidor.
	*/
	public function upload()
	{
		$this->autoRender=false;
		$file=$_FILES['upl'];
		$result=$this->Content->saveFile($file, $this->webroot);
		$this->response->type('json');
		$json = json_encode(array('status'=>$result['complete']['result']));
		$this->response->body($json);
	}

}
