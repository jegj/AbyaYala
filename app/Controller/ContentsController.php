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

	public function download($id)
	{
		if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    
		$content = $this->Content->findByContentId($id);
   	$this->response->file($content['Content']['path'], array('download' => true));
   	return $this->response;
	}

	public function delete($id)
	{
		if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    
    $contentPath = $this->Content->findByContentId($id)['Content']['path'];
    if ($this->Content->delete($id)) {
    		if(unlink($contentPath)){
	        $this->Session->setFlash(
	            __('Se elimino el archivo correctamente '.$contentPath)
	        );
	        return $this->redirect(array('action' => 'index'));
      	}else{
      		$this->Session->setFlash(
	            __('No se pudo eliminar archivo')
	        );
	        return $this->redirect(array('action' => 'index'));
      	}
    }
	}


	public function upload()
	{
		$this->autoRender=false;
		$maxFileSize=10;
		$folder='';
		$extension='';
		$name='';
		$path='';
		$size='';
		$type='';

		/*
		* Importante!!!
		* Poner esta configuracion en el php.ini
		*/
		ini_set('post_max_size', '10M');
		ini_set('upload_max_filesize', '10M');
		ini_set('max_execution_time', 300);
		ini_set('max_input_time', 300);

		$allowed = array('png', 'jpg', 'gif', 'pdf', 'mp3');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
			$name=$_FILES['upl']['name'];
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			$size=$_FILES['upl']['size'];
			$size=number_format($size / 1000000, 2);
			if($size <= $maxFileSize){
				$this->response->type('json');
				$json = json_encode(array('status'=>'error'));
				$this->response->body($json);
			}
			
			if(!in_array(strtolower($extension), $allowed)){
				$this->response->type('json');
				$json = json_encode(array('status'=>'error'));
				$this->response->body($json);
			}
			
			if($extension=='png' ||$extension=='jpg' || $extension=='gif'){
				$folder=WWW_ROOT.'media/imagenes/';
				$type='imagen';
			}
			else if($extension=='mp3'){
				$folder=WWW_ROOT.'media/audio/';
				$type='audio';
			}
			else if($extension=='pdf'){
				$folder=WWW_ROOT.'media/docs/';
				$type='documentos';
			}
			$path=$folder.$_FILES['upl']['name'];

			if(!$this->Content->checkContent($name,$extension, $path)){
				if(move_uploaded_file($_FILES['upl']['tmp_name'], $path=$folder.$_FILES['upl']['name'])){
					$data = array(
	              'Content' => array(
	                'name' => $name,
	                'path' => $path,
	                'type' => $type,
	                'filesize' => $size,
	                'extesion_document' => $extension,
	              )
	        );
					if ($this->Content->saveModel($data)){
						$this->response->type('json');
						$json = json_encode(array('status'=>'success'));
						$this->response->body($json);
					}else{
						$this->response->type('json');
						$json = json_encode(array('status'=>'success'));
						$this->response->body($json);
					}
				}
			}else{
				$this->response->type('json');
				$json = json_encode(array('status'=>'repeat'));
				$this->response->body($json);
			}

		}else{
			$this->response->type('json');
			$json = json_encode(array('status'=>'error'));
			$this->response->body($json);
		}
	}


}
