<?php

function view($page, $data) {
  if(session_status() !== PHP_SESSION_ACTIVE)  {
    session_start();
  }
  
  if(session_status() !== PHP_SESSION_ACTIVE)  {
    session_start();
  }
  
  global $siteRoot;
  global $siteURLprefix;
  
  global $siteInfo;
  
  if (!isset($_SESSION['shopCart'])) {
    $_SESSION['shopCart'] = array();
  }
  
  $site = array(
    "baseURL"       => $siteInfo['baseURL'],
  );
  
  if (is_array($data)) {
    extract($data);
  }
  
  require_once $siteInfo['root'].'/site/App/Views/_static/layout.view.php';
  
  if (isset($_SESSION['form_errors'])) {
    $_SESSION['form_errors'] = array();
  }
  
  if (isset($_SESSION['form_success'])) {
    unset($_SESSION['form_success']);
  }
  
}

function _view($page, $data) {
  
  if(session_status() !== PHP_SESSION_ACTIVE)  {
    session_start();
  }
  
  global $siteRoot;
  global $siteURLprefix;
  
  global $siteInfo;
  
  if (!isset($_SESSION['shopCart'])) {
    $_SESSION['shopCart'] = array();
  }
  
  $site = array(
    "baseURL"       => $siteInfo['baseURL'],
  );
  
  if (is_array($data)) {
    extract($data);
  }
  
  
  
  require_once $siteInfo['root'].'/site/App/Views/'.$page.'.view.php';
  
  if (isset($_SESSION['form_errors'])) {
    $_SESSION['form_errors'] = array();
  }
  
  if (isset($_SESSION['form_success'])) {
    unset($_SESSION['form_success']);
  }
  
}

function redirect($link) {
  global $siteInfo;
  
  if (!headers_sent()) {
    header('Location: '.$siteInfo['urlPrefix'].$link);
    exit;
  } else {
    echo '<script type="text/javascript">window.location = "'.$siteInfo['urlPrefix'].$link.'"</script>';
  }
}

function old($field) {
  return Validation::getOld($field);
}

function dd($var) {
  echo '<div style="
  white-space: pre-wrap;
  background: #000;
  color: #fff;
  font-family: Arial;
  font-size: 14px;
  padding: 6px 12px;
  line-height: 18px;
  min-width: 100%;
  box-sizing: border-box;
  ">';
  var_dump($var);
  echo '</div>';
  die();
}

function json_return($status_code, $data) {
  http_response_code($status_code);
  $json = json_encode($data);
  echo $json;
}

?>
