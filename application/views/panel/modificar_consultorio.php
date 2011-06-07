<script>
$(function(){
	$("#nombre").focus();
	$("#formModificar").submit( function (e){
		e.preventDefault();
		$.ajax({
			  type: 'POST',
			  url: $("#formModificar").attr('action'),
			  data: $("#formModificar").serialize(),
			  success: function(){
				  $( "#dia_mod" ).dialog( "close" );
				  $("#contenedor").load("index.php/panel/consultorios");
			  }
		});
	});
});
</script>
<form method="post" id="formModificar" action="index.php/pane/consultorios/modificarbyid/<?php echo $id; ?>">
	<div class="row">
    	<label for="nombre">Nombre</label>
        <input size="55" title="Nombre" id="nombre" name="nombre" value="<?php echo $consultorio['nombre']; ?>" type="text">
    </div>
</div>
</form>