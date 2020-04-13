<?php
include 'controlador/Turnera.php';
try{
    $controlador = new Turnera;
    
    
    switch ($_GET['accion']){
        //nuevo
        case 'nuevo':
            $controlador->nuevo();
        break;
        case 'viewTurn':
            $controlador->linkturno($_GET['id']);
            
        break;

        default :
            $controlador->inicio();
        break;
    }
    
}catch(Error $e){
    print_r($e);
}