<?php

include ('modelo/Turno.php');

class Turnera {

    private static $turnos;
    private static $id_turno;

    public function __construct(){
        if(file_exists('turnos.json')){
            self::$turnos = json_decode(file_get_contents('turnos.json'),true);
            //me traigo el archivo, si no existe me lo traigo vacio
        }else{
            self::$turnos=array();
        }
        self::$id_turno=count(self::$turnos);
        
    }

    
    public function addTurno($turno){
        $errores=$turno->validar();
        if(count($errores)<1){
            $route_image= 'images/'.self::$id_turno.'.'.pathinfo($_FILES['diagnostico']['name'],PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['diagnostico']['tmp_name'],$route_image);
            array_push(self::$turnos,$turno->getData()); //self:: entro a propiedades estaticas
            file_put_contents('turnos.json',(json_encode(self::$turnos)));
            //Guardo en disco
            $turno=new Turno;
            $this->linkturno(self::$id_turno);
        }else{
            $datos=$turno->getData();
            include 'vista/nuevo.php'; 
        }
        
    }
   


    public function nuevo(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $turno=new Turno;
            $datos=$turno->getData();
            include 'vista/nuevo.php';
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $turno = new Turno;
            self::$id_turno++;
            $_POST['diagnostico'] = 'images/'.self::$id_turno.'.'.pathinfo($_FILES['diagnostico']['name'],PATHINFO_EXTENSION);
            $turno->import($_POST,self::$id_turno);
            $this->addTurno($turno);
        }
    }


    private function readArray(){
        $turnosLocal=array();
        foreach(self::$turnos as $idx=>$valor){
                 $_turnos=new Turno;
                 $_turnos->import($valor,++$idx);
                 $turnosLocal[$idx] = $_turnos;
            }
        return $turnosLocal;
    }
    public function inicio(){
        $turnosLocal=$this->readArray();
        include 'vista/inicio.php';
    }

    

    public function linkturno($id){
        $turnosLocal=$this->readArray();
        foreach($turnosLocal as $turno) 
        if ($turno->getData()['id_turno'] == $id){
            $datos=$turno->getData();
        }
            
        include 'vista/linkturno.php';
    }
}