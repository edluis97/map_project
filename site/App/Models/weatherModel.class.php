<?php 

class weatherModel
{
  
  public function getData($lat, $lon, $days, $lang) {
    
    global $apiKeys;
    
    $apiKey = $apiKeys['weatherapi.com'];
    $coord = $lat.','.$lon;
    
    $weatherAPIAddress = 'http://api.weatherapi.com/v1/forecast.json?key='.$apiKey.'&q='.$coord.'&days='.$days.'&lang='.$lang;
    $weatherRequest = file_get_contents($weatherAPIAddress);
    $weatherRequest = json_decode($weatherRequest, true);    
    
    $response = array(
      'location' => array(
        'name'  => $weatherRequest['location']['name'],
        'region'  => $weatherRequest['location']['region'],
      ),
      'current' => array(
        'temperature' => array(
          'celsius' => $weatherRequest['current']['temp_c'],
        ),
        'condition' => $weatherRequest['current']['condition']['text'],
        'humidity'  => $weatherRequest['current']['humidity'],
      ),
    );    
    
    return $response;
  }
  
}
