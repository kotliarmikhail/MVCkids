<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
//FrontController
define('ROOT', dirname(__FILE__));

require_once ROOT . '/application/components/Router.php';
$router = new Router();
$router->run();
