<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

	var $helpers=array('Html','Form', 'Js', 'Session');
	
	public $components = array('Session');

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

	public function audio($id=null)
	{
		if ($this->request->is('get')) {
			$content = $this->Content->findByContentId($id);

			$this->set('content', $content);
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
			   	$this->Session->setFlash('No existe el archivo seleccioando');
			  	return $this->redirect(array('action' => 'index'));
			   }
	    }else{
	    	$this->Session->setFlash('No se pudo descargar el archivo');
		  	return $this->redirect(array('action' => 'index'));
	    }
	  }else{
	  	$this->Session->setFlash('No se pudo descargar el archivo');
		  return $this->redirect(array('action' => 'index'));
	  }
	}

	public function delete($id)
	{
		
		if ($this->request->is('get')&& !isset($id)) {
    	$this->Session->setFlash(
          __('No se pudo eliminar archivo')
      );
      return $this->redirect(array('action' => 'index'));
    }
    $content=$this->Content->findByContentId($id);
    $contentPath = $content['Content']['path'];
    if($contentPath){
	    if ($this->Content->deleteModel($id)) {
	    		if(unlink($contentPath)){
		        $this->Session->setFlash(
		            __('Se elimino correctamente el archivo: <b>'.$content['Content']['name'].'</b>')
		        );
		        return $this->redirect(array('action' => 'index'));
	      	}else{
	      		$this->Session->setFlash(
		            __('No se pudo eliminar archivo')
		        );
		        return $this->redirect(array('action' => 'index'));
	      	}
	    }else{
				$this->Session->setFlash(
	          __('No se pudo eliminar archivo')
	      );
	      return $this->redirect(array('action' => 'index'));
	    }
	  }else{
	  	$this->Session->setFlash('No se pudo eliminar archivo');
      return $this->redirect(array('action' => 'index'));
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
		////Validar que el contenido exista y se pase un id por GET
		if (!$id) {
    	throw new NotFoundException(__('Etnia invalida'));
    }
    $content = $this->Content->findByContentId($id);

    if(!$content)
    	 throw new NotFoundException(__('Contenido Invalido'));

  	if ($this->request->is(array('post', 'put'))) {
          $this->Content->read(null, $id);
        	$file=$this->request->data['Content']['file'];
        	if($this->Content->saveFile($content, $file)){
	          if ($this->Content->saveModel($this->request->data,false)) {
	              $this->Session->setFlash(__('Se modifico el contenido'));
	              return $this->redirect(array('action' => 'index'));
	          }
	        }

          $this->Session->setFlash(__('no se pudo modificar el contenido'));
    }

    $this->set('content', $content);
    if (!$this->request->data) {
            $this->request->data = $content;
    }
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
