<script>
$(function(){
	$("#nombre").focus();
	$("#formNuevo").submit( function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: $("#formNuevo").attr('action'),
			data: $("#formNuevo").serialize(),
			success: function(){
				$( "#nuevo" ).dialog( "close" );
				$("#contenedor").load("index.php/panel/tratamientos");
			}
		});
	});
});
</script>
<form method="post" id="formNuevo" action="index.php/pane/tratamientos/agregar">
	<div class="row">
    	<label for="nombre">Nombre</label>
        <input size="55" title="Nombre" id="nombre" name="nombre" type="text">
    </div>
</form>