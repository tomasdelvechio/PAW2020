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
            $boton="Enviar";
            $datos=$turno->getData();
            include 'vista/nuevo.php'; 
        }
        
    }

    private function getTurno($id_t){
        $turnosLocal=$this->readArray();
        foreach($turnosLocal as $turno){ 
            if ($turno->getData()['id_turno'] == $id_t){
                    $datos=$turno->getData();
                }
        }
        return $datos;
    }

    

    public function borrar($id_t){
        $cabezera = "Borrar turno";
        $boton = "Borrar";
        $accion = "deleteTurn&id=$id_t";
        $datos = $this->getTurno($id_t);    
            if($_SERVER['REQUEST_METHOD']=='GET'){
                    include 'vista/nuevo.php';
                }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos['estado']=0;
                    foreach(self::$turnos as $idx=>$valor){
                        if($valor['id_turno']==$datos['id_turno']){
                            $reemplazo =array($idx => $datos);
                            self::$turnos=array_replace(self::$turnos,$reemplazo);
                        }
                    }
                file_put_contents('turnos.json',(json_encode(self::$turnos)));
                $this->inicio();
        }
    }                                                       


    public function nuevo(){
        $cabezera = "Nuevo turno";
        $boton = "Enviar";
        $accion = "nuevo";
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $turno=new Turno;
            $datos=$turno->getData();
            include 'vista/nuevo.php';
        }

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $turno = new Turno;
            self::$id_turno++;
            $new_post = $_POST;
            $image = $_FILES['diagnostico']['name'];
            $new_post['diagnostico']=$image;

            //agrego var new_post y verifico si esta vacio
                if(!empty($new_post['diagnostico'])){
                    $new_post['diagnostico'] = 'images/'.self::$id_turno.'.'.pathinfo($_FILES['diagnostico']['name'],PATHINFO_EXTENSION);
                    
                }else{
                    $new_post['diagnostico']='';
                }
            $new_post['estado']=1;
            $turno->import($new_post,self::$id_turno);
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

    

    public function linkturno($id_t){
        $datos=$this->getTurno($id_t);
        include 'vista/linkturno.php';
    }


    public function modificar($id_t){
        $cabezera = "Modificar turno";
        $boton='Modificar'; 
        $accion = "updateTurn&id=$id_t";
        $datos=$this->getTurno($id_t);
        if($_SERVER['REQUEST_METHOD'] =='GET'){
            include 'vista/nuevo.php';
        }

        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $update = new Turno;
            $new_post = $_POST;
            $image = $_FILES['diagnostico']['name'];
            $new_post['diagnostico']=$image;
            

            //agrego var new_post y verifico si esta vacio
                if(!empty($new_post['diagnostico'])){
                    $new_post['diagnostico'] = 'images/'.$id_t.'.'.pathinfo($_FILES['diagnostico']['name'],PATHINFO_EXTENSION);
                }else{
                    $new_post['diagnostico']=$datos['diagnostico'];
                }

                $update->import($new_post,$id_t);
                
                $errores = $update->validar();
                    if ($errores<1){
                        $route_image= 'images/'.self::$id_turno.'.'.pathinfo($_FILES['diagnostico']['name'],PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['diagnostico']['tmp_name'],$route_image);
                        $new_post= $update->getData();
                            foreach(self::$turnos as $idx=>$valor){
                                if($valor['id_turno']===$new_post['id_turno']){
                                    $reemplazo =array($idx => $new_post);
                                    self::$turnos=array_replace(self::$turnos,$reemplazo);
                                }
                        }
                        file_put_contents('turnos.json',(json_encode(self::$turnos)));
                        $this->inicio();
                    }else{
                        $cabezera = "Modificar turno";
                        $boton='Modificar'; 
                        $accion = "updateTurn&id=$id_t";
                        $datos=$update->getData();
                        include 'vista/nuevo.php';
                    }
            
        }
    }




}
