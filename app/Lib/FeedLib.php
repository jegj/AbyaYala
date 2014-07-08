<?php
/**
 * Clase para el consumo de feed
 * @author jgalarza jegj57@gmail.com
 */

set_include_path("../../lib/Google/src" . PATH_SEPARATOR . get_include_path());
require_once 'Google/Client.php';
require_once 'Google/Service/YouTube.php';

class FeedLib 
{
	static private $instance = null;
	private $_youtube_client = null;

	/**
	 * Contructor de la clase
	 */
	function __construct()
	{
    $client = new Google_Client();
	  $client->setDeveloperKey(Configure::read('google_developer_key'));
  	$this->_youtube_client = new Google_Service_YouTube($client);
  }

  /**
   * Metodo que retorna la unica instancia de la clase
   * @return object
   */
	public static function getInstance() 
	{
		if(self::$instance == null){
    	self::$instance = new FeedLib();
		}
		return self::$instance;
	}

	/**
	 * Metodo que prepara los parametros para la funcion de la API
	 * @param  array()  $params    Arreglo de los parametros
	 * @param  integer $maxResults Cantidad maxima de resultados
	 */
	public static function prepareParams($params = null, $maxResults = 5)
	{
		$apiParams = array(
			'maxResults' => $maxResults,
			'channelId' => Configure::read('channel_id'),
		);
		return $apiParams;
	}

	/**
	 * Metodo que busca en el canal de You Tube
	 * @param  integer $page   Pagina de la Busqueda
	 * @param  array() $params Parametros de busqueda
	 * @return array()         Arreglo de resultados
	 */
	public function search($page = 1, $params = null, $maxResults = 5)
	{

		$apiParams = self::prepareParams($params, $maxResults);
		$videos = array();
		$exito = true;
		$msg = '';

		try{
			$results = $this->_youtube_client->search->listSearch('id,snippet', $apiParams);

		}catch (Google_ServiceException $e) {
			$msg = $e->getMessage();
			$exito = false;
			$results = array();
	  }catch (Google_Exception $e) {
	  	$msg = $e->getMessage();
	  	$exito = false;
			$results = array();
	  }
	  if($exito){
		  foreach ($results['items'] as $searchResult) {
		  	if($searchResult['id']['kind'] == 'youtube#video'){
	  		  $video = array();
	      	$video['id'] = $searchResult['id']['videoId'];
	      	$video['title'] = $searchResult['snippet']['title'];
	      	$video['description'] = $searchResult['snippet']['description'];
	      	$video['thumbail'] = $searchResult['snippet']['thumbnails']['medium']['url'];
	      	array_push($videos, $video);
		  	}
	    }
	  }

		return array(
			'exito' => $exito,
			'msg' => $msg,
			'videos' => $videos
		);
	}
}