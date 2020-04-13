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
        if ($class == 'index'){
            include 'Views/view.index.php';
        }else if ($class == 'newForm'){
            include 'Views/view.newForm.php';
         }else if (($class != 'controller_index') || ($class != 'newForm')){
             include 'Views/view.error404.php';
        }
        
    }
}
