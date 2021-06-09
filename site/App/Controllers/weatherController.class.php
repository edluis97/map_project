<?php

Class weatherController
{
  
  public function api() {
    
    
    $model = new weatherModel();
    
    $info = $model->getData($_GET['lat'], $_GET['lon'], $_GET['days'], 'en');
        
    if (!empty($info)) {
      json_return(200, $info);
    } else {
      json_return(400, 'Bad Request');
    }
    
  }
  
}