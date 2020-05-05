<?php

namespace App\Models;

use App\Core\Model;

class Turno extends Model{

    protected static $table = 'paciente';

    private $id_turno="";
    private $nombre="";
    private $email="";
    private $telefono="";
    private $edad="";
    private $talla="";
    private $altura="";
    private $fecha_nacimiento="";
    private $color_pelo="";
    private $fecha_turno="";
    private $hora_turno="";
    private $diagnostico="";

    public function import($source,$id_turn){
        $this->id_turno=$id_turn;
        $this->nombre = $source["nombre"];
        $this->email= $source["email"];
        $this->telefono= $source["telefono"];
        $this->edad= $source["edad"];
        $this->talla= $source["talla"];
        $this->altura =$source["altura"];
        $this->fecha_nacimiento = $source["fecha_nacimiento"];
        $this->color_pelo = $source["color_pelo"];
        $this->fecha_turno = $source["fecha_turno"];
        $this->hora_turno = $source["hora_turno"];
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

        if(empty($this->telefono)){
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
        if(empty($this->fecha_nacimiento)){
            array_push($errores, "*Ingresa una fecha de nacimiento");
         }

        if(empty($this->fecha_turno)){
            array_push($errores,"*Ingrese una fecha de turno");}
        // }else if($this->fturno<$fecha_actual){
        //     array_push($errores,"*La fecha del turno no puede ser anterior a la actual");
        // }

        if(empty($this->hora_turno)){
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
            'telefono' => $this->telefono,
            'edad' =>$this->edad,
            'talla' => $this->talla,
            'altura' => $this->altura,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'color_pelo' => $this->color_pelo,
            'fecha_turno' => $this->fecha_turno,
            'hora_turno' => $this->hora_turno,
            'diagnostico' => $this->diagnostico,
        );
        return $data;
        }
    
    public function getTurno($id){
        $data = $this->db->get(self::$table,$id);
        if(!empty($data)){
                $this->import($data,$id);
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