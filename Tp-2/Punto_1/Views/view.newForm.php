<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/styles.css">
    <title>Resumen turno</title>
</head>
<body>
    <header><h1>Formulario de turnos</h1></header>

    <main>
        
        <div class='resumen'>
        <h2>Resumen de turno</h2>
            <?php 
                echo  "<p>Al paciente $_POST[nombrePaciente] 
                de edad $_POST[edad] se le asignó un turno la fecha 
                $_POST[fturno] a las $_POST[tturno].</p>" ;

                echo "<p>Datos cargados relacionados al paciente:</p>";
                echo "<p>Fecha de nacimiento: $_POST[Fecha_de_nacimiento]</p>";
                echo "<p>Email: $_POST[email]</p>";
                echo "<p>Telefono: $_POST[tel]</p>";
                echo "<p>Talla: $_POST[tallaCalzado]</p>";
                echo "<p>Altura: $_POST[range]cm</p>";
            ?>
            <input type="button" value="Atrás" name="buttonBack">
            
        </div>
    </main>
    
</body>
</html>

