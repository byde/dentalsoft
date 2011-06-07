<style type="text/css">@import url("<?php echo base_url() ?>css/panel/usuarios.css");</style>
<script>
$(function() {
	<?php if (!$mensaje) { ?>
	$("#alertBien").hide();
	<?php } ?>
	$( "#dia_mod" ).dialog({
		autoOpen: false,
		height: 250,
		width: 350,
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
	$("a.btn_mod").click(function (e){
		e.preventDefault();
		$("#dia_mod").load($(this).attr("href"));
		$( "#dia_mod" ).dialog("open");
	});
});
</script>
<div class="grid_12"> 
	<!-- STATS -->
    <div class="box-header"> Tratamientos</div>
    <div class="box tab-content">
    <div class="notification success" id="alertBien"> <span class="strong"><?php echo $alertTitle; ?></span> <?php echo $alertMsg; ?></div>
<table id="tablaUsuarios" width="60%" border="0" cellspacing="1" cellpadding="1">
<thead>
  <tr>
    <td>Nombre</td>
    <td>Tiempo</td>
    <td>Costo</td>
    <td><span class="discret">Hay <?php echo $tratamientos_total; ?> tratamiento<?php echo ($tratamientos_total == 1) ? "" : "s"; ?></span></td>
  </tr>
</thead>
<tbody><?php $e = true; ?>
<?php foreach($tratamientos as $c): ?>
  <tr class="<?php echo ($e) ? "": "even"; $e = ($e) ? false : true; ?>">
    <td><?php echo $c['nombre']; ?></td>
    <td><?php echo ($c['tiempo'])*15; ?> min.</td>
    <td>$ <?php echo $c['costo']; ?></td>
    <td width="120">
    	<a href="index.php/pane/tratamientos/modificarcosto/<?php echo $c['idtratamiento']; ?>" title="Modificar" class="btn_mod"><img src="<?php echo base_url() ?>img/User id.png" width="22" border="0" /></a></td>
  </tr>
<? endforeach; ?>
</tbody>
</table>
<br class="cl">
<div id="nuevo" title="Crear Tratamiento"></div>
<div id="dia_mod" title="Modificar Tratamiento"></div>
</div>
</div>