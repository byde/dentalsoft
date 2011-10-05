<script>
$(function(){
    $("#formConsultar").submit( function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: $("#formConsultar").attr('action'),
			data: $("#formConsultar").serialize(),
			success: function(){
				$( "#dia_consultar" ).dialog( "close" );
			}
		});
	});
});
</script>
<form id="formConsultar" method="post" action="index.php/consulta/guardar/<?php echo $idagenda ?>">
    <h3>Paciente: <?php echo $paciente['nombre']?> <?php echo $paciente['apellidos']?></h3>
<fieldset>
    <legend>Diagnostico General</legend>
    <textarea cols="60" rows="5" name="diagnostico"></textarea>
</fieldset>
<fieldset>
    <legend>Plan De Tratamiento</legend>
    <textarea cols="60" rows="5" name="tratamiento"></textarea>
    <label>Sugerencia de Seguimiento: <input type="text" name="seguimiento" /></label>
</fieldset>
</form>