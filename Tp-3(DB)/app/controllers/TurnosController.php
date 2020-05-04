<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Models\Turno;

class TurnosController extends Controller 
{

    public function __construct()
    {
        $this->model = new Turno();
    }

    public function index()
    {
        $data = $this->model->getAllData();
        return view('index',$data);
    }


    public function nuevo(){
        return view('nuevo');
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

        
    }

}