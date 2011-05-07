<?php

class Weather {
	
	var $cache = 1000;
    private static $_apiurl = 'http://api.yr.no/weatherapi/locationforecast/1.8/?';

    function __construct() {

    }

    function request($lat, $lon, $force_new=0) {
        $uri = self::$_apiurl.'lat='.$lat.';lon='.$lon;
        $result = self::_request($uri,$force_new);
		$weather = new stdClass();
		$weather->temperature = '';
		$weather->type = '';
		if($xml = @simplexml_load_string($result)){
			foreach($xml->product->time as $item){
				if($item->location->temperature['unit'] == 'celcius'){
					$weather->temperature = (float)$item->location->temperature['value'];
					break;
				}
			}
			foreach($xml->product->time as $item){
				if($item->location->humidity['unit'] == 'percent'){
					$weather->humidity = (float)$item->location->humidity['value'];
					break;
				}
			}
			foreach($xml->product->time as $item){
				if($type = $item->location->symbol['id']){
					$weather->type = (string)$type;
					break;
				}
			}
		}
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon."&sensor=false&language=sv",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_TIMEOUT => 10
		);
		curl_setopt_array($ch, $options);
		$data = curl_exec($ch);
		$weather->location = json_decode($data);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		return $weather;
	}

	private function _request($url,$force_new=0) {
		$cachefile = '/tmp/weather_'.md5($url);
		$filemtime = @filemtime($cachefile); 
		if (!$filemtime || (time() - $filemtime >= $this->cache || $force_new)){	
			$ch = curl_init();
			$options = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CONNECTTIMEOUT => 10,
				CURLOPT_TIMEOUT => 10
			);
			curl_setopt_array($ch, $options);
			$data = curl_exec($ch);
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			if ($http_code == 200){
				@file_put_contents($cachefile, $data);
				return $data;
			} else {
				$result = @file_get_contents($cachefile);
				return $result;
			}
			return false;
		}else{
			$result = @file_get_contents($cachefile);
			return $result;
		}
	}

}

$Weather = new Weather;
$weather_struct = $Weather->request($_REQUEST['lat'], $_REQUEST['long']);
echo json_encode($weather_struct);