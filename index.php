<?php

//Configs
require_once 'configs.php';

//AutoLoader
require_once 'site/_autoloader.php';

//Functions
require_once 'site/functions.php';

//Routing
$router = new Router();
require_once 'site/App/routes/routes.php';
$router->index();

?>
