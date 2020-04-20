<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/styles.css">
    <title>Inicio</title>
</head>
<body>
    <?php include 'header.php'?>
    <h2>Turnos dados</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Ficha</th>
        </tr>
        <? foreach ($turnosLocal as $turno) : ?> 
            <tr>
                <td><?=$turno->getData()['id_turno'];?></td>
                <td><?=$turno->getData()['fturno'];?></td>
                <td><?=$turno->getData()['tturno'];?></td>
                <td><?=$turno->getData()['nombre'];?></td>
                <td><?=$turno->getData()['email'];?></td>
                <td><?=$turno->getData()['tel'];?></td>
                <td><a href="/index.php?accion=viewTurn&id=<?=($turno->getData()['id_turno']);?>">Ver</a></td>
            </tr>
        <? endforeach?>
        

    </table>
    
</body>
</html>