<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/styles.css">
    <title>Resumen turno</title>
</head>
<body>
    <? include 'header.php'?>
    <h2>Datos turno # <?= $datos['id_turno'];?></h2>
     
     <ul class = "resumen">
        <li>Paciente: <?=$datos['nombre'];?></li>
        <li>Correo electrónico: <?=$datos['email'];?></li>
        <li>Teléfono: <?=$datos['tel'];?></li>
        <li>Edad: <?=$datos['edad'];?></li>
        <li>Talla de calzado: <?=$datos['talla'];?></li>
        <li>Altura: <?=$datos['altura'];?></li>
        <li>Fecha de nacimiento: <?=$datos['nacimiento'];?></li>
        <li>Color de pelo: <?=$datos['pelo'];?></li>
        <li>Fecha de turno: <?=$datos['fturno'];?></li>
        <li>Hora de turno: <?=$datos['tturno'];?></li>
        <li>Diagnóstico adjuntado:</li>
        <li><img src="<?=$datos['diagnostico'];?>" alt="Imagen diagnostico"></li>  
     </ul>
     
</body>
</html>