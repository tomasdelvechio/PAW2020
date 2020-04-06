<?php

include 'core/Router.php';
include 'core/Request.php';
include 'Controller/controller_index.php';

use App\core\Router;
use App\core\Request;
use App\Controller\controller;

$router = new Router;

$router->define_routes([
    'GET /'=> 'controller_index@index',
]);

$request = new Request;