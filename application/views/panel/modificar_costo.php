<script>
$(function(){
	$("#costo").focus();
        $( "#slider" ).slider({
            max:12,
            range: 'min',
            value: <?php echo ($tratamiento['tiempo']>0) ? $tratamiento['tiempo'] : "0"; ?>,
            slide: function(event, ui) {
                $("#tiemposide").html((ui.value)*15);
                $("#tiempo").val(ui.value);
            }
        });

	$("#formModificar").submit( function (e){
            e.preventDefault();
            $.ajax({
                  type: 'POST',
                  url: $("#formModificar").attr('action'),
                  data: $("#formModificar").serialize(),
                  success: function(){
                          $( "#dia_mod" ).dialog( "close" );
                          $("#contenedor").load("index.php/pane/tratamientos/medico");
                  }
            });
	});
});
</script>
<form method="post" id="formModificar" action="index.php/pane/tratamientos/modificarcostobyid/<?php echo $tratamiento['idcosto']; ?>">
    <div class="row">
    	<?php echo $tratamiento['nombre']; ?>
    </div>
    <div class="row">
    	<label for="costo">Costo</label>
        <input size="55" title="Costo" id="costo" name="costo" value="<?php echo $tratamiento['costo']; ?>" type="text">
    </div>
    <div class="row">
        <div id="slider"></div>
    	<label for="tiempo">Tiempo</label>
        <span id="tiemposide"><?php echo ($tratamiento['tiempo']>0) ? ($tratamiento['tiempo'])*15 : "0"; ?></span> min.
              <input type="hidden" id="tiempo" name="tiempo" value="<?php echo $tratamiento['tiempo'] ?>">
              <input type="hidden" id="tiempo" name="idtratamiento" value="<?php echo $tratamiento['idtratamiento'] ?>">
    </div>
</form>