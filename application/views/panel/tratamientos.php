<style type="text/css">@import url("<?php echo base_url() ?>css/panel/usuarios.css");</style>
<script>
$(function() {
	<?php if (!$mensaje) { ?>
	$("#alertBien").hide();
	<?php } ?>
	$( "#nuevo" ).dialog({
		autoOpen: false,
		height: 170,
		width: 300,
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

	$( "#dia_mod" ).dialog({
		autoOpen: false,
		height: 170,
		width: 300,
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

	$("#btn_nvo").click(function (e){
		e.preventDefault();
		$("#nuevo").load($(this).attr("href"));
		$( "#nuevo" ).dialog("open");
	});

	$("a.btn_mod").click(function (e){
		e.preventDefault();
		$("#dia_mod").load($(this).attr("href"));
		$( "#dia_mod" ).dialog("open");
	});

	$("a.btn_act").click(function (e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('href'),
			success: function(){
				$("#contenedor").load("index.php/panel/tratamientos");
			}
		});
	});
});
</script>
<div class="grid_12"> 
	<!-- STATS -->
    <div class="box-header"> Tratamientos 
    <ul class="tabs fr">
    	<li><a href="index.php/pane/tratamientos/nuevo" id="btn_nvo"><img src="img/add.png" width="16px" border="0" /> <b>Nuevo tratamiento</b></a></li>
    </ul></div>
    <div class="box tab-content">
    <div class="notification success" id="alertBien"> <span class="strong"><?php echo $alertTitle; ?></span> <?php echo $alertMsg; ?></div>
<table id="tablaUsuarios" width="60%" border="0" cellspacing="1" cellpadding="1">
<thead>
  <tr>
    <td>Nombre</td>
    <td><span class="discret">Hay <?php echo $tratamientos_total; ?> tratamiento<?php echo ($tratamientos_total == 1) ? "" : "s"; ?></span></td>
  </tr>
</thead>
<tbody><?php $e = true; ?>
<?php foreach($tratamientos as $c): ?>
  <tr class="<?php echo ($e) ? "": "even"; $e = ($e) ? false : true; ?>">
    <td><?php echo $c['nombre']; ?></td>
    <td width="120">
    	<a href="index.php/pane/tratamientos/modificar/<?php echo $c['idtratamiento']; ?>" title="Modificar" class="btn_mod"><img src="<?php echo base_url() ?>img/User id.png" width="22" border="0" /></a>
        <a href="index.php/pane/tratamientos/lock/<?php echo $c['idtratamiento']; ?>/<?php echo $c['activo']; ?>" class="btn_act"><img src="<?php echo base_url() ?>img/lock<?php echo $c['activo']; ?>.png" width="22" border="0" /></a></td>
  </tr>
<? endforeach; ?>
</tbody>
</table>
<br class="cl">
<div id="nuevo" title="Crear Tratamiento"></div>
<div id="dia_mod" title="Modificar Tratamiento"></div>
</div>
</div>