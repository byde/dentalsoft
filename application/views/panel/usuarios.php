<style type="text/css">@import url("<?php echo base_url() ?>css/panel/usuarios.css");</style>
<script>
$(function() {
	<?php if (!$mensaje) { ?>
	$("#alertBien").hide();
	<?php } ?>
	$( "#nuevo_usuario" ).dialog({
		autoOpen: false,
		height: 340,
		width: 650,
		modal: true,
		buttons: {
			"Registrar": function() {
				$("#formNuevo").submit();
			},
			"Cancelar": function() {
				$( this ).dialog( "close" );
			}
		}
	});

	$( "#dia_mod_usu" ).dialog({
		autoOpen: false,
		height: 340,
		width: 650,
		modal: true,
		buttons: {
			"Modificar": function() {
				$("#formModificar").submit();
			},
			"Cancelar": function() {
				$( this ).dialog( "close" );
			}
		}
	});

	$("#btn_nvo_usu").click(function (e){
		e.preventDefault();
		$("#nuevo_usuario").load($(this).attr("href"));
		$( "#nuevo_usuario" ).dialog("open");
	});

	$("a.btn_mod_usu").click(function (e){
		e.preventDefault();
		$("#dia_mod_usu").load($(this).attr("href"));
		$( "#dia_mod_usu" ).dialog("open");
	});

	$("a.btn_act_usu").click(function (e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('href'),
			success: function(){
				$("#contenedor").load("index.php/panel/usuarios");
			}
		});
	});
});
</script>
<div class="grid_12"> 
	<!-- STATS -->
    <div class="box-header"> Usuarios 
    <ul class="tabs fr">
    	<li><a href="index.php/pane/usuarios/nuevo" id="btn_nvo_usu"><img src="img/add.png" width="16px" border="0" /> <b>Nuevo usuario</b></a></li>
    </ul></div>
    <div class="box tab-content">
    <div class="notification success" id="alertBien"> <span class="strong"><?php echo $alertTitle; ?></span> <?php echo $alertMsg; ?></div>
<table id="tablaUsuarios" width="60%" border="0" cellspacing="1" cellpadding="1">
<thead>
  <tr>
    <td>Nombre completo</td>
    <td colspan="2"><span class="discret">Hay <?php echo $usuarios_total; ?> usuario<?php echo ($usuarios_total == 1) ? "" : "s"; ?></span></td>
  </tr>
</thead>
<tbody><?php $e = true; ?>
<?php foreach($usuarios as $u): ?>
  <tr class="<?php echo ($e) ? "": "even"; $e = ($e) ? false : true; ?>">
    <td><?php echo $u['nombre'] . " " . $u['apellidos']; ?></td>
    <td width="100"><span class="discret"><?php echo $u['perfil']; ?></span></td>
    <td width="100">
    	<a href="index.php/pane/usuarios/modificar/<?php echo $u['idusuario']; ?>" title="Modificar" class="btn_mod_usu"><img src="<?php echo base_url() ?>img/User id.png" width="22" border="0" /></a>
        <a href="index.php/pane/usuarios/lock/<?php echo $u['idusuario']; ?>/<?php echo $u['activo']; ?>" class="btn_act_usu"><img src="<?php echo base_url() ?>img/lock<?php echo $u['activo']; ?>.png" width="22" border="0" /></a></td>
  </tr>
<? endforeach; ?>
</tbody>
</table>
<br class="cl">
<div id="nuevo_usuario" title="Crear Usuario"></div>
<div id="dia_mod_usu" title="Modificar Usuario"></div>
</div>
</div>