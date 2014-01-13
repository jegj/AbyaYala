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
		//Validar que el contenido exista y que sea de Audio y se pase un $id por GET
		if ($this->request->is('get')) {
			$content = $this->Content->findByContentId($id);

			$this->set('content', $content);
    }
	}

	public function uploadDocuments()
	{
		if ($this->request->is('post')) {
			ini_set('post_max_size', '10M');
			ini_set('upload_max_filesize', '10M');
			ini_set('max_execution_time', 300);
			ini_set('max_input_time', 300);

			$file=$this->request->data['Content']['file'];
			$result=$this->Content->saveFile($file, $this->request->data, true);
			$this->Session->setFlash(
            __($result['complete']['message'])
        );
      return $this->redirect(array('action' => 'index'));
		}
	}

	public function download($id, $viewOnline=false)
	{
		//Validar que el contenido exista y se pase un $id por GET
		if ($this->request->is('get')) {
			$content = $this->Content->findByContentId($id);
	   	$this->response->file($content['Content']['path'], array('download' => $viewOnline));
	   	return $this->response;
    }
	}

	public function delete($id)
	{
		//Validar que el contenido exista y sea POST
		if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    
    $contentPath = $this->Content->findByContentId($id)['Content']['path'];
    if ($this->Content->deleteModel($id)) {
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
    }else{
			$this->Session->setFlash(
          __('No se pudo eliminar archivo')
      );
      return $this->redirect(array('action' => 'index'));
    }
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

		$allowed = array('png', 'jpg', 'gif', 'ogg');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
			$name=$_FILES['upl']['name'];
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			$size=$_FILES['upl']['size'];
			$size=number_format($size / 1000000, 2);

			if($size > $maxFileSize){
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
				$pathDB=$this->webroot.'media/imagenes/';
				$type='imagen';
			}
			else if($extension=='ogg'){
				$folder=WWW_ROOT.'media/audio/';
				$pathDB=$this->webroot.'media/audio/';
				$type='audio';
			}
			$path=$folder.$_FILES['upl']['name'];

			if(!$this->Content->checkContent($name,$extension, $path)){
				if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
					$data = array(
	              'Content' => array(
	                'name' => $name,
	                'path' => $path,
	                'type' => $type,
	                'filesize' => $size,
	                'extesion_document' => $extension,
	                'access_path' => $pathDB.$_FILES['upl']['name'],
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
