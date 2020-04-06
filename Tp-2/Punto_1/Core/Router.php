<?php

namespace App\core;


class Router {

    public $routes = [];

    public function define_routes($routes){
        $this->routes = $routes;
    }

    function direct($request){
        $operation = $this->routes["{$request->method} {$request->path}"];
        list($class, $method) = explode('@',$operation);
        include "App/Controller//$class";
        // $controller->$method();
    }
}
