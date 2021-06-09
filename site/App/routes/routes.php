<?php 
// pathTo/
$router->get('','mapController@index');
// pathTo/map
$router->get('map', 'mapController@index');

$router->get('api/weather', 'weatherController@api');
?>