<?php

class Router
{
  
  public $routes = array();
  
  public function index() {
    
  $path = Request::getPath();
  $pathShort = $path['shortPath'];
  
  //Finding which is the approriate route, via regex
  foreach ($this->routes[Request::method()] as $route => $controller) {
    
    $route_regex = preg_replace('/\{(.*?)\}/', '(.*)', $route);
    $route_regex = str_replace('/', '\/', $route_regex);
    
    //Dollar sign ending ($ matches end of pattern)
    //Route can´t be just the beginning of the path, must be whole path
    if (preg_match('/'.$route_regex.'$/iD', $pathShort) && ($route_regex != '' || $route_regex == $pathShort)) {
      //Match was found
      //var_dump($route);
      $this->UrlWildcardReplacement($route);
      //dd($this->routes);
      
      if(array_key_exists(Request::getPath()['shortPath'], $this->routes[Request::method()])){
        return $this->callController($this->routes[Request::method()][Request::getPath()['shortPath']]);
      }
      
    }     
    
  }
  
  /* 404 Error */
  $controller = new errorController();
  $controller->error_404();
  
}

public function callController($controller){
  
  $controller = explode("@", $controller);
  
  $class = $controller[0];
  $method = $controller[1];
  
  $controller = new $class;
  $controller->$method();
  
}

public function UrlWildcardReplacement($route){
  
  $path = Request::getPath();
  $path = $path['parsedShortPath'];
  
  $controller = $this->routes[Request::method()][$route];
  $newRoute = '';
  $routes = explode("/", $route);
  
  foreach($routes as $index => $param){
    
    if(preg_match('/\{(.*?)\}/', $param)){
      
      if(isset($path[$index])){
        
        $param = str_replace('{', '', $param);
          $param = str_replace('}', '', $param);
          
          $_REQUEST[$param] = $path[$index];
          $newRoute .= $path[$index] . "/";
          
        }
        
      } else {
        $newRoute .= $param . "/";
      }
      
    }
    
    $newRoute = substr($newRoute, 0, -1);
    $newRoutes[Request::method()][$newRoute] = $controller;  
    
    $this->clear();
    $this->routes[Request::method()] = $newRoutes[Request::method()];
    
  }
  
  public function get($path, $controller){
    $this->routes['GET'][$path] = $controller;
  }
  
  public function post($path, $controller){
    $this->routes['POST'][$path] = $controller;
  }
  
  public function clear(){
    unset($this->routes[Request::method()]);
  }
  
  
}
