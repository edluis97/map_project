<?php 

$conn = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME');
mysqli_set_charset($conn, "utf8");

/*
$siteInfo = array(
  "root"  => $_SERVER['DOCUMENT_ROOT'].'/projects/map_project',
  "baseURL" => '/projects/map_project/',
);
*/
$siteInfo = array(
  "root"  => $_SERVER['DOCUMENT_ROOT'],
  "baseURL" => '/',
);

$smtp = array(
  'sender_address' => '',
  'sender_alias'  => '',
  'password'  => '',
  'port'  => '',
  'secure'  => '',
  'auth'  => '',
  'debug' => 0, //PHPMailer Debug 0 to 4
  'smtp_server' => '',
  'to_address'  => '',
  'to_alias'  => '',
  'reply_address' => '',
  'reply_alias' => '',
  "cc" => '',
  "ccName" => '',
  "bcc" => '',
  "bccName" => '',
);

?>