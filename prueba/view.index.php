<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script>
        addEventListener('load',inicio,false);
        function reset()
        {
          document.getElementById('alt').innetHTML='150';
        }
        function inicio()
        {
          document.getElementById('altura').addEventListener('change',cambioAltura,false);
        }
      
        function cambioAltura()
        {    
          document.getElementById('alt').innerHTML=document.getElementById('altura').value;
        }
      </script>
    <title>Turnos médicos</title>
</head>
<body>
    <header><h1>Formulario de turnos</h1></header>
      
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class ="box" method="POST">
        <input type="text" name="nombrePaciente"placeholder="*Nombre del paciente" required 
        value="<?php if(isset($nombrePaciente)) echo $nombrePaciente ?>">
        <input type="email" name="email" id="email" placeholder="*E-mail" required>
        <input type="tel" name="tel" placeholder="*Teléfono" required>
        <input type="number" name="edad" id="edad" placeholder="Edad" min="1" max="130">
        <input type="number" name="tallaCalzado" id="tallaCalzado" placeholder="Talla" min = "20" max ="45" step="1">
       
        <div id ="boxAltura">
            <label for="range" id="rangoAltura">Altura</label>
            <input type="range" id="altura" min ="0" max ="300" id="altura" value="150" name="range">
            <span id="alt">150</span><span>cm</span>
        </div>
       
       
        <label for="Fecha_de_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="Fecha_de_nacimiento" name="Fecha_de_nacimiento" required>
        <select name="colorPelo" id="colorPelo">
            <option value="rubio">Rubio</option>
            <option value="morocho">Morocho</option>
            <option value="castaño">Castaño</option>
            <option value="pelirrojo">Pelirrojo</option>
        </select>
        <label for="date">Fecha y hora de turno:</label>
        <input type="date" id="fturno" name="fturno">
        <input type="time" id="tturno" name="tturno" min="08:00:00" max="17:00:00" step="900">
        <label for="fileImage">Diagnóstico</label><input type="file" id="fileImage" name ="filaImage" accept="image/png, .jpg">
        <p class = 'error'>*Campos requeridos</p>
        <input type="submit" value="Enviar" name="submit">
        <input type="reset" value="Limpiar" name="reset">
        <? include 'validaciones.php'; ?>
    </form>
</body>
</html>


