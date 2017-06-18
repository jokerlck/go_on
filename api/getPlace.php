<?php
	$result['success'] = false;
	header('Content-Type: application/json; charset=utf-8');

	$botToken = "AIzaSyD9BBloaNe4XsPOU6OCC4RtjpxeX8Bh-YU";
	function url_get_contents($Url){
		if(!function_exists('curl_init')){
			die('CURL is not installed!');
		}	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}  

	$lat = 22.286654;
	$lng = 114.152005;
	if (isset($_GET['lat']) && isset($_GET['lng'])){
		$lat = $_GET['lat'];
		$lng = $_GET['lng'];
	}

	$str = json_decode(url_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?type=bus_station&location={$lat},{$lng}&radius=100&key={$botToken}"), TRUE);
	$place_list = array();
	$lat = array();
	$lng = array();
	$name = array();
	$photo_link = array();

	foreach ($str["results"] as $i => $place_raw) {
		$place['name'] = $place_raw["name"];
		$place['lat']  = $place_raw["geometry"]["location"]["lat"];
		$place['lng']  = $place_raw["geometry"]["location"]["lng"];
		if (isset($place_raw["photos"][0]["photo_reference"])){
			$place['photo'] = $place_raw["photos"][0]["photo_reference"];
			//$place['photo_url'] = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={$place['photo']}$key={$botToken}";
		}

		array_push($place_list,$place);
	}

	$result['success'] = true;
	$result['place'] = $place_list;

	echo json_encode($result);

	/*
	for($i = 0; $i < count($str["results"]); $i++){
		
	}
	*/