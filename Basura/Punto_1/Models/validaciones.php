<?php

namespace App\Models;


    if(isset ($_POST['submit'])){
      $nombrePaciente = $_POST['nombrePaciente'];
      $email = $_POST['email'];
      $telefono = $_POST['tel'];
      $edad = $_POST['edad'];
      $talla = $_POST['tallaCalzado'];
      $rango = $_POST['range'];
      $dateNac =$_POST['Fecha_de_nacimiento'];
      $dateTurn =$_POST['fturno'];
      $tturno = $_POST['tturno'];
      $image = $_POST['fileImage'];
    
           

        if (empty($nombrePaciente)){
            echo "<p> Agrega tu nombre </p>";
            }else{
                if (strlen($nombrePaciente) > 30 ){
                    echo "<p class='error'>*Nombre muy largo </p>";
                }
            }
        
        if (empty($email)){
            echo "<p class= 'error'>*Completa campo E-mail </p>";
        }
        
        if(empty($telefono)){
            echo"<p class= 'error'>*Completa campo Teléfono</p>";
        }

        if(empty($edad)){
            echo "<p class='error'>*Completa campo Edad</p>";
        }else{
            if ($edad<0 or $edad>130){
                echo "<p class='error'>*Ingresa una edad válida</p>";
            }
        }

        if(empty($talla)){
            echo "<p class='error'>*Completa el campo Talla</p>";
        }else{
            if($talla<20 or $talla>45){
                echo "<p class='error'>*Ingresa un n° de Talla válido</p>";
            }
        }

        if(empty($dateNac)){
            echo "<p class='error'>*Ingresa una fecha</p>";
        }else{
                $fecha_actual=date("Y-m-d");
                $anio_date= substr($dateNac,0,4);
                if($dateNac>$fecha_actual){
                    echo "<p class='error'>*La fecha no puede ser anterior a la actual</p>";
                }
                if(($anio_date+$edad)>(substr($fecha_actual,0,4))){
                 echo "<p class='error'>*Su fecha de nacimiento no coincide con su edad</p>";
                }
            }
        
        if(empty($tturno)){
            echo "<p class='error'>*Ingresa una fecha</p>";
        }

        if(empty($image)){
            echo "<p class = 'error'>Advertencia, no ha cargado ninguna imagen</p>";
        }
    
    }
    // include 'verifyTurno.php';
