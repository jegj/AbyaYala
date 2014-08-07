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
	public static function foo()
	{	
		$client = new Google_Client();
		$client->setDeveloperKey(Configure::read('google_developer_key'));
		$_youtube_client = new Google_Service_YouTube($client);
		$videos = array();
		$exito = true;
		$msg = '';
		
		$params = array(
			'channelId' => Configure::read('channel_id'),
			'type' => 'video',
			'maxResults' => '50',
		);
		
		try{
			$results = $_youtube_client->search->listSearch('id,snippet', $params);
	
		}catch (Google_ServiceException $e) {
			$msg = $e->getMessage();
			$exito = false;
			$results = array();
	  	}catch (Google_Exception $e) {
	  		$msg = $e->getMessage();
	  		$exito = false;
			$results = array();
	  	}
	  	
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
		
		return array(
			'exito' => $exito,
			'msg' => $msg,
			'videos' => $videos,
			'nextToken' => null,
			'prevToken' => null
		);
		
	}
	
	
	public static function getVideos($token = null, $maxResults = 4)
	{
		$client = new Google_Client();
		$client->setDeveloperKey(Configure::read('google_developer_key'));
		$_youtube_client = new Google_Service_YouTube($client);
		$videos = array();
		$exito = true;
		$msg = '';
		
		
		try{
			$playlistItemsResponse = $_youtube_client->playlistItems->listPlaylistItems('id, snippet', array(
    	    	'playlistId' => 'PL50SYU_IKEYvqs5vrU1r-mU6QnI--23mb',
	        	'maxResults' => $maxResults,
	        	'pageToken' => $token
	    	));	
		}catch(Google_ServiceException $e){
			$msg = $e->getMessage();
			$exito = false;
			$results = array();
		}
		
		$nextToken = isset($playlistItemsResponse['nextPageToken'])?$playlistItemsResponse['nextPageToken']:null;
		$prevToken = isset($playlistItemsResponse['prevPageToken'])?$playlistItemsResponse['prevPageToken']:null;
		$total = $playlistItemsResponse['pageInfo']['totalResults'];
		
		
		foreach ($playlistItemsResponse['items'] as $playlistItem) {
			$video = array();
	      	$video['id'] = $playlistItem['snippet']['resourceId']['videoId'];
	      	$video['title'] = $playlistItem['snippet']['title'];
	      	$video['description'] = $playlistItem['snippet']['description'];
	      	$video['thumbail'] = $playlistItem['snippet']['thumbnails']['medium']['url'];
	      	array_push($videos, $video);
		}
		
		return array(
			'exito' => $exito,
			'msg' => $msg,
			'videos' => $videos,
			'nextToken' => $nextToken,
			'prevToken' => $prevToken,
			'total' => $total,
		);
	}
}


/*
class FeedLib 
{
	
	private $_youtube_client = null;


	function __construct()
	{
    	$client = new Google_Client();
	  	$client->setDeveloperKey(Configure::read('google_developer_key'));
  		$this->_youtube_client = new Google_Service_YouTube($client);
  	}


	public static function prepareParams($maxResults = 5, $token = null)
	{
		$apiParams = array(
			'maxResults' => $maxResults,
			'channelId' => Configure::read('channel_id'),
			'pageToken' => $token
		);
		return $apiParams;
	}


	public function search($maxResults = 5, $token = null)
	{

		$apiParams = self::prepareParams($maxResults, $token);
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
			
	  	  
	  	  $nextToken = isset($results['nextPageToken'])?$results['nextPageToken']:null;
	  	  $prevToken = isset($results['prevPageToken'])?$results['prevPageToken']:null;
	  	  
	  	  //var_dump($results);
	  	  
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
			'videos' => $videos,
			'nextToken' => $nextToken,
			'prevToken' => $prevToken
		);
	}
	
}*/