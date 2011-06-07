<form method="post" id="formNuevo" action="<?php echo base_url();?>index.php/costoTratamiento/agregar">
	<div class="row">
    	<label for="costo">Costo</label>
        <input size="9" title="Costo" id="costo" name="costo" type="text">
    </div>
	<div class="row">
    	<label for="tiempo">Tiempo</label>
        <input size="55" title="Tiempo" id="tiempo" name="tiempo" type="text">
    </div>
	<div class="row">
		<label for="idtratamiento">Tratamiento</label>
		<select name="id">
			<?php foreach ($tratamientos as $r): ?>
			<option value="<?php echo $r['idtratamiento']?>"><?php echo $r['nombre']?></option>
			<?php endforeach; ?>
		</select>
    </div>
	<input type="submit" value="Mandar" />
</form>