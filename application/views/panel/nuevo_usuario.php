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
				$( "#nuevo_usuario" ).dialog( "close" );
				$("#contenedor").load("index.php/panel/usuarios");
			}
		});
	});
});
</script>
<form method="post" id="formNuevo" action="index.php/pane/usuarios/agregar">
<div style="display:table">
	<div style="display:table-cell; padding:5px; vertical-align:top">
    <fieldset class="box">
    	<legend>Personal</legend>
        <div class="row">
           <label for="nombre">Nombre</label>
           <input size="35" title="nombre" id="nombre" name="nombre" type="text" class="validate['required']">
        </div>
        <div class="row">
           <label for="apellidos">Apellidos</label>
           <input size="35" title="apellidos" id="apellidos" name="apellidos" type="text">
        </div>
    </fieldset>
    </div>
    <div style="display:table-cell padding:5px">
	<fieldset class="box">
    	<legend>Cuenta del sistema</legend>
        <div class="row">
           <label for="usuario">Usuario</label>
           <input size="35" title="usuario" id="usuario" name="usuario" type="text">
        </div>
        <div class="row">
           <label for="pass">Contrase&ntilde;a</label>
           <input size="35" title="Contrase&ntilde;a" id="pass" name="pass" type="password">
        </div>
        <div class="row">
           <label for="perfil">Perfil</label>
           <select name="perfil" id="perfil"><?php foreach($perfiles as $perfil): ?>
           		<option value="<?php echo $perfil['idperfil']; ?>"><?php echo $perfil['perfil']; ?></option><?php endforeach; ?>
           </select>
        </div>
    </fieldset>
    </div>
</div>
</form>