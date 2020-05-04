<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/styles.css">
    <title>Nuevo turno</title>
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
</head>
<body>
<?php include 'header.php'?>
    <h2><?=$cabezera?></h2>
    <?php include 'form.php'?>
</body>
</html>