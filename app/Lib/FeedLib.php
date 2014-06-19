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

	public static function prueba()
	{
		$client = new Google_Client();
	  $client->setDeveloperKey(Configure::read('google_developer_key'));
  	$youtube = new Google_Service_YouTube($client);

  	 try {
    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => 'indigena',
      'maxResults' => 25,
    ));

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