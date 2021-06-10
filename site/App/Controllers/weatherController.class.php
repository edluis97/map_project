<?php

Class weatherController
{
  
  public function api() {
    
    if (isset($_GET['lat']) && isset($_GET['lon'])) {
      $model = new weatherModel();
      $info = $model->getData($_GET['lat'], $_GET['lon'], 5, 'en');
      json_return(200, $info);
    } else {
      json_return(400, 'Bad Request');
    }
    
  }
  
}