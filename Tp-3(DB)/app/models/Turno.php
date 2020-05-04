<?php

namespace App\Models;

use App\Core\Model;

class Turno extends Model{

    protected static $table = 'paciente';

    private $id_turno="";
    private $nombre="";
    private $email="";
    private $tel="";
    private $edad="";
    private $talla="";
    private $altura="";
    private $nacimiento="";
    private $pelo="";
    private $fturno="";
    private $tturno="";
    private $diagnostico="";

    public function import($source,$id_turn){
        $this->id_turno=$id_turn;
        $this->nombre = $source["nombre"];
        $this->email= $source["email"];
        $this->tel= $source["tel"];
        $this->edad= $source["edad"];
        $this->talla= $source["talla"];
        $this->altura =$source["altura"];
        $this->nacimiento = $source["nacimiento"];
        $this->pelo = $source["pelo"];
        $this->fturno = $source["fturno"];
        $this->tturno = $source["tturno"];
        $this->diagnostico = $source["diagnostico"];
    }

    public function validar(){
        $errores = array();
        if(empty($this->nombre)){
            array_push($errores,"*Ingrese nombre");
        }else if (strlen($this->nombre)>30){
            array_push($errores,"*Nombre muy largo");
        }
        
        if(empty($this->email)){
            array_push($errores,"*Ingrese email");
        }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            array_push($errores, "*Ingrese un email correcto");
        }

        if(empty($this->tel)){
            array_push($errores,"*Ingrese un teléfono");
        }else if(preg_match("/\d{4}[ \- ]\d{2}[ ]\d{4}/i", $this->_tel)){
            array_push($errores, "*Ingrese un teléfono válido");
        }

        if(empty($this->edad)){
            array_push($errores, "*Ingrese edad");
        }

        if(($this->talla <20) || ($this->talla>45)){
            array_push($errores, "*Ingrese una talla válida");
        }

        $fecha_actual=date("Y-m-d");
        if(empty($this->nacimiento)){
            array_push($errores, "*Ingresa una fecha de nacimiento");
         }

        if(empty($this->fturno)){
            array_push($errores,"*Ingrese una fecha de turno");}
        // }else if($this->fturno<$fecha_actual){
        //     array_push($errores,"*La fecha del turno no puede ser anterior a la actual");
        // }

        if(empty($this->tturno)){
            array_push($errores, "*Ingrese horario");
        }else if(!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $this->tturno)){
            array_push($errores, "*Ingrese un horario válido");
        }
        
        if(!empty($this->diagnostico) && (!in_array($this->_diagnostico, ["", ".jpg", ".png"]))){
            array_push($errores, "*Ingrese un formato de imagen válido");
        }
    
        return $errores;
    }

    public function getData(){
        $data= array(
            'id_turno' => $this->id_turno,
            'nombre' => $this->nombre,
            'email' => $this->email,
            'tel' => $this->tel,
            'edad' =>$this->edad,
            'talla' => $this->talla,
            'altura' => $this->altura,
            'nacimiento' => $this->nacimiento,
            'pelo' => $this->pelo,
            'fturno' => $this->fturno,
            'tturno' => $this->tturno,
            'diagnostico' => $this->diagnostico,
        );
        return $data;
        }
    
    public function getTurno($id){
        $data = $this->db->get(self::$table,$id);
            if(!empty($data)){
                $this->import($data);
            }
            return $this->getData();
    }

    public function guardar(){
        $this->id_turno = $this->db->insert(self::$table, $this->getData());
    }

    public function borrar($id){
        $this->db->remove(self::$table, $id);
    }
    public function getAllData(){
        return $this->db->selectAll(self::$table);
    }

}