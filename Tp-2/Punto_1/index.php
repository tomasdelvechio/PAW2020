<?php

include 'setup.php';

try{
    $router->direct($request);
}catch(Error $e){
    http_response_code(404);
    include "Views/view.error404.php";
}
?>