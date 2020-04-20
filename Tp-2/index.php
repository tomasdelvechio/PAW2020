<?php
include 'controlador/Turnera.php';
try{
    $controlador = new Turnera;
    
    $accion = $_GET['accion'];
    
    switch ($accion){
        //nuevo
        case 'nuevo':
            $controlador->nuevo();
        break;
        case 'viewTurn':
            $id_t=$_GET['id'];
            $controlador->linkturno($id_t);
        break;

        default :
            $controlador->inicio();
        break;
    }
    
}catch(Error $e){
    print_r($e);
}