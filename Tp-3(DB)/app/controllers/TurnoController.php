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
        $turnos = $this->model->getAllData();
        return view('inicio',compact('turnos'));
  }

    public function nuevo(){
        $cabecera = "Nuevo turno";
        return view('form');
    }
   
    public function ver(){
        $id = $_GET['id'];
        $turno=$this->model->getTurno($id);
        return view('linkTurno', compact('turno'));
    }

    public function editar(){
        $id = $_GET['id'];
        $turno = $this->model->getTurno($id);
        $cabezera = "Modificar turno";
        $boton = "Modificar";
        return view('form', compact('turno'));
    }

    public function guardar(){
        $errores=$turno->validar();
        
    }

 

}