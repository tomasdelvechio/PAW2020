<?php

include 'core/Router.php';
include 'core/Request.php';


use App\core\Router;
use App\core\Request;



$router = new Router;

$router->define_routes([
    'GET /'=> 'index',
    'POST /index.php'=> 'index',
    'POST /newForm' => 'newForm',
    'GET /newForm' => 'newForm',
]);

$request = new Request;