<?php

try{
    $_SERVER['PHP_SELF'] = "index.php"; 
    include "view.index.php";
}catch(Error $e){
    http_response_code(404);
    include "Views/view.error404.php";
}
?>