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
			'q' => '',
			'maxResults' => $maxResults,
			'channelId' => Configure::read('channel_id'),
			// 'fields'=> 'items(id,snippet(title, description, publishedAt))'
		);

		if($params){

			if(array_key_exists('name', $params)){
				if(strlen($apiParams['q'])){
					$apiParams['q'].= ('+'.$params['name']);
				}else{
					$apiParams['q'] = $params['name'];
				}
			}

			if(array_key_exists('description', $params)){
				if(strlen($apiParams['q'])){
					$apiParams['q'].=('+'.$params['description']);
				}else{
					$apiParams['q'] = $params['description'];
				}
			}

		}

		return $apiParams;
	}

	/**
	 * Metodo que busca en el canal de You Tube
	 * @param  integer $page   Pagina de la Busqueda
	 * @param  array() $params Parametros de busqueda
	 * @return array()         Arreglo de resultados
	 */
	public function search($page = 1, $params = null)
	{

		$apiParams = self::prepareParams($params, 5);
		$videos = array();

		try{
			$results = $this->_youtube_client->search->listSearch('id,snippet', $apiParams);

		}catch (Google_ServiceException $e) {
	    /*$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
	      htmlspecialchars($e->getMessage()));*/
			die($e->getMessage());
			$results = array();
	  }catch (Google_Exception $e) {
	   /* $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
	      htmlspecialchars($e->getMessage()));*/
			die($e->getMessage());
			$results = array();
	  }

	  foreach ($results['items'] as $searchResult) {
	  	if($searchResult['id']['kind'] == 'youtube#video'){
  		  $video = array();
      	$video['id'] = $searchResult['id']['videoId'];
      	$video['title'] = $searchResult['snippet']['title'];
      	$video['description'] = $searchResult['snippet']['description'];
      	$video['date'] = $searchResult['snippet']['publishedAt'];
      	array_push($videos, $video);
	  	}
    }
    //die(print_r($results->getPageInfo()->getTotalResults()));
		return array(
			'videos' => $videos,
			'total_results' => $results->getPageInfo()->getTotalResults()
		);
	}

	public static function prueba()
	{
		$client = new Google_Client();
	  $client->setDeveloperKey(Configure::read('google_developer_key'));
  	$youtube = new Google_Service_YouTube($client);
  	$htmlBody ='';

  	try {
    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet,player', array(
      'q' => 'example+sape',
      'maxResults' => 5,
      'channelId' => 'UCLH_bLD2ELRO_3EHph6_drQ'
      // 'pageToken' => 'CAUQAA1'
    ));

   // $token = $searchResponse->getNextPageToken();

    /*$searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => 'indigena catapulta ',
      'maxResults' => 50,
      'pageToken' => null
    ));*/

    // return print_r($searchResponse->getPageInfo());
    // return print_r($searchResponse->getNextPageToken());	
		// return print_r($searchResponse);

    $videos = '';
    $channels = '';
    $playlists = '';

    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
          $videos .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['videoId']);
          break;
        case 'youtube#channel':
          $channels .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['channelId']);
          break;
        case 'youtube#playlist':
          $playlists .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
          break;
      }
    }
    $htmlBody .=  <<<END
    <h3>Videos</h3>
    <ul>$videos</ul>
    <h3>Channels</h3>
    <ul>$channels</ul>
    <h3>Playlists</h3>
    <ul>$playlists</ul>
END;

		}catch (Google_ServiceException $e) {
	    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
	      htmlspecialchars($e->getMessage()));
	  } catch (Google_Exception $e) {
	    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
	      htmlspecialchars($e->getMessage()));
	  }

	   return $htmlBody;
	}
}