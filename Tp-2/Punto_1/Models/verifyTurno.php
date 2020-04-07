<?php

namespace App\Models;

class Turno {
    
    public function validateParameter($parameter){
        if(empty($parameter)){
            return '*Completar campo' .$parameter ;
        }
    }

    public function comprobar ($parameter){
        if(isset($_POST['submit'])){
            if(!empty($parameter)){
                return $parameter;
            }else{
                return "";
            }
        }
    }


}