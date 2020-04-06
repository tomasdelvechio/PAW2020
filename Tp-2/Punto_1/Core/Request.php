<?php

namespace App\core;

class Request {

    public function __construct(){
        $this->path= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
}