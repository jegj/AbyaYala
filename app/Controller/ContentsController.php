<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

	var $helpers=array('Html','Form', 'Js', 'Session');
	
	public $components = array('Session', 'RequestHandler');

  var $layout='Administrador';

	var $name ='Content';


	public function index()
	{
		$content= $this->Content->find('all');
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
			   	$this->Session->setFlash('<strong>Error!</strong> No existe el contenido especificado', 'default', array(), 'error');
		  		return $this->redirect(array('action' => 'index'));
			   }
	    }else{
	    	$this->Session->setFlash('<strong>Error!</strong> No se pudo descargar el contenido especificado', 'default', array(), 'error');
		  	return $this->redirect(array('action' => 'index'));
	    }
	  }else{
	  	$this->Session->setFlash('<strong>Error!</strong> No se pudo descargar el contenido especificado', 'default', array(), 'error');
		  return $this->redirect(array('action' => 'index'));
	  }
	}

	public function delete($id)
	{
		
		if ($this->request->is('get')&& !isset($id)) {
    	$this->Session->setFlash('<strong>Error!</strong> No se puede elimiar el contenido especificado', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
    }
    $content=$this->Content->findByContentId($id);
    $contentPath = $content['Content']['path'];
    if($contentPath){
	    if ($this->Content->deleteModel($id)) {
	    		if(unlink($contentPath)){
		        $this->Session->setFlash('<strong>Exito!</strong> Se elimino el contenido exitosamente', 'default', array(), 'success');
	  				return $this->redirect(array('action'=>'index'));
	      	}else{
	      		$this->Session->setFlash('<strong>Error!</strong> No se puede elimiar el contenido especificado', 'default', array(), 'error');
	  				return $this->redirect(array('action'=>'index'));
	      	}
	    }else{
				$this->Session->setFlash('<strong>Error!</strong> No se puede elimiar el contenido especificado', 'default', array(), 'error');
	  		return $this->redirect(array('action'=>'index'));
	    }
	  }else{
	  	$this->Session->setFlash('<strong>Error!</strong> No se puede elimiar el contenido especificado', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
	  }
	}

	public function browse()
	{
			$this->layout = 'ckeditor';
			$langCode=$this->request->query['langCode'];	
   		$ckeditor=$this->request->query['CKEditor'];	
   		$funcnum=$this->request->query['CKEditorFuncNum'];
   		$ckeditor= array('langCod' => $langCode,'ckeditor'=>$ckeditor, 'funcnum'=> $funcnum );	
			$content= $this->Content->find('all',
				array('conditions'=>
					array('type'=>'imagen')
				)
			);
			$this->set(compact('ckeditor', 'content'));
	}

	public function edit($id=null)
	{
		if (!$id) {
    	$this->Session->setFlash('<strong>Error!</strong> No se puede actualizar el contenido especificado', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
    }
    $content = $this->Content->findByContentId($id);

    if(!$content){
    	$this->Session->setFlash('<strong>Error!</strong> No existe el contenido especificado', 'default', array(), 'error');
	  	return $this->redirect(array('action'=>'index'));
	  }

  	if ($this->request->is(array('post', 'put'))) {
	    $this->Content->read(null, $id);

	    /*
	  	$file=$this->request->data['Content']['file'];

	  	if($file)
	  		$resultado=$this->Content->replaceFile(
	  			$content, $file, $this->webroot);
			*/

	  
	  	if($this->Content->saveModel($this->request->data, false)){
	  		$this->Session->setFlash('<strong>Exito!</strong> Se actualizó la información del contenido correctamente', 'default', array(), 'success');
	  		return $this->redirect(array('action'=>'index'));
	  	}else{
	  		  $this->Session->setFlash('<strong>Error!</strong> No se pudo actualizar el contenido especificado', 'default', array(), 'error');
	  		  return $this->redirect(array('action'=>'index'));
	  	}
		 
    }

		$this->set('content', $content);

		if (!$this->request->data)
			$this->request->data = $content;
	}

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
