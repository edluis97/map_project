<?php

Class errorController
{
  
  public function error_404() {
    http_response_code(404);
    view('pages/404', array(

    ));
  }
  
}