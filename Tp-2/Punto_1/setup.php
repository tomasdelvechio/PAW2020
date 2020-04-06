<?php

include 'core/Router.php';
include 'core/Request.php';


use App\core\Router;
use App\core\Request;
use App\Controller\controller;

$router = new Router;

$router->define_routes([
    'GET /'=> 'controller_index',
    'POST /newForm' => 'newForm',
    'GET /newForm' => 'newForm',
]);

$request = new Request;