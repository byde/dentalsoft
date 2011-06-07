<table id="tablaUsuarios" width="60%" border="0" cellspacing="1" cellpadding="1">
<thead>
  <tr>
    <td>Nombre</td>
    <td colspan="2"><span class="discret"><small>Hay </small><?php echo $pacientes_total; ?> <small>paciente<?php echo ($pacientes_total == 1) ? "" : "s"; ?></small></span><br />
<ul class="pagination">
	<?php echo $paginas; ?>
</ul></td>
  </tr>
</thead>
<tbody><?php $e = true; ?>
<?php foreach($pacientes as $c): ?>
  <tr class="<?php echo ($e) ? "": "even"; $e = ($e) ? false : true; ?>">
    <td><?php echo $c['nombre'] . ' ' . $c['apellidos']; ?></td>
    <td width="100"><i><?php echo $c['telefono1']; ?></i></td>
    <td width="50">
    	<a href="index.php/ficha/ver/<?php echo $c['idpaciente']; ?>" title="Ficha" class="btn_ficha"><img src="<?php echo base_url() ?>img/User id.png" width="22" border="0" /></a>
    	<a href="index.php/pacientes/comentario/<?php echo $c['idpaciente']; ?>" title="Comentarios" class="btn_com"><img src="<?php echo base_url() ?>img/comment.png" width="22" border="0" /></a></td>
  </tr>
<? endforeach; ?>
</tbody>
</table>