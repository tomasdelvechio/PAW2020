<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function __construct()
    {
        $this->model = new Turno();
    }

    public function inicio(){
        $data = $this->model->getAllData();
       return view('index',$data);
  }

    public function nuevo(){
        $cabezera = "Nuevo turno";
        return view('form');
    }
   
    public function ver(){
        $id = $_GET['id'];
        $data = $this->model->getTurno($id);
        return view('linkTurno', $data);
    }

    public function editar(){
        $id = $_GET['id'];
        $data = $this->model->getTurno($id);
        $cabezera = "Modificar turno";
        $boton = "Modificar";
        return view('form', $data);
    }

    public function guardar(){
        $errores=$turno->validar();
        
    }

 

}