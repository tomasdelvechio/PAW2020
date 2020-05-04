<form action="/index.php?accion=<?=$accion?>" method="POST" enctype="multipart/form-data" class="box">

        <label class="separate"> Datos personales</label>
        <input type="hidden" id="estado" name="estado" value="<?=$datos['estado']?>">
        
        <input type="text" name="nombre"placeholder="*Nombre del paciente" required value="<?= $datos['nombre']?>">
        <label for="nombre" class = "error"><?=$errores[0]?></label>
        
        <input type="email" name="email" id="email" placeholder="*E-mail" required value="<?= $datos['email']?>">
        <label for="email" class = "error"><?=$errores[1]?></label>

        <input type="tel" name="tel" placeholder="*Teléfono" required value="<?= $datos['tel']?>">
        <label for="tel" class = "error"><?=$errores[2]?></label>

        <input type="number" name="edad" id="edad" placeholder="Edad" min="1" max="130" value = "<?= $datos['edad']?>">
        <label for="edad" class = "error"><?=$errores[3]?></label>
        
        <input type="number" name="talla" id="talla" placeholder="Talla" min = "20" max ="45" step="1" value="<?= $datos['talla']?>">
        <label for="talla" class = "error"><?=$errores[4]?></label>

        <div id ="boxAltura">
            <label for="range" id="rangoAltura">Altura</label>
            <input type="range" id="altura" min ="0" max ="300" id="altura" value="150" name="altura">
            <span id="alt">150</span><span>cm</span>
        </div>
       
       
        <label for="Fecha_de_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="nacimiento" name="nacimiento" required value="<?= $datos['nacimiento']?>">
        <label for="nacimiento" class = "error"><?=$errores[5]?></label>
        
        <select name="pelo" id="pelo">
            <option value="rubio">Rubio</option>
            <option value="morocho">Morocho</option>
            <option value="castaño">Castaño</option>
            <option value="pelirrojo">Pelirrojo</option>
        </select>
        
        <label for="date" class = "separate">Fecha y hora de turno:</label>
        <input type="date" id="fturno" name="fturno" value="<?= $datos['fturno']?>">
        <label for="fturno" class = "error"><?=$errores[6]?></label>

        <input type="time" id="tturno" name="tturno" min="08:00:00" max="17:00:00" step="900" value="<?= $datos['tturno']?>">
        <label for="tturno" class = "error"><?=$errores[7]?></label>

        <label for="diagnostico" class = "separate" >Diagnóstico</label>
        <input type="file" id="diagnostico" name ="diagnostico" accept="image/png, .jpg" value =<?= $datos['diagnostico']?> >
        <label for="diagnostico" class = "error"><?=$errores[8]?></label>

        <input type="submit" value="<?=$boton?>" name="submit">
        <input type="reset" value="Limpiar" name="reset">
        
</form>