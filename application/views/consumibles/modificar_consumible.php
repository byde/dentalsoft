<form method="post" id="formModificar" action="<?php echo base_url();?>index.php/consumibles/modificarbyid/<?php echo $id; ?>">
	<?php foreach ($consumible as $r):?>
	<div class="row">
    	<label for="nombre">Nombre</label>
        <input size="55" title="Nombre" id="nombre" name="nombre" value="<?php echo $r->nombre; ?>" type="text">
    </div>
    <div class="row">
    	<label for="costo">Costo</label>
        <input size="55" title="Costo" id="costo" name="costo" value="<?php echo $r->precio; ?>" type="text">
    </div>
    <div class="row">
    	<label for="existencia">Existencias</label>
        <input size="55" title="Existencias" id="existencia" name="existencia" value="<?php echo $r->existencias; ?>" type="text">
    </div>
    <?php endforeach;?>
    <input type="submit" />
</div>
</form>