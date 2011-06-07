	<html>
		<head>
			<title>
				Consumibles
			</title>
		</head>
		<body>
		<?php if($consumibles == null){
			header('Location: '.base_url()."index.php");
		}?>
			<div>
				<table id="tablaConsumibles" width="60%" border="0" cellspacing="1" cellpadding="1">
					<thead>
						<tr>
							<td>
								Nombre
							</td>
							<td>
								Precio
							</td>
							<td>
								Cantidad Disponible
							</td>
							<td colspan="2">
								<span class="discret">
									<small>
										Hay
									</small>
									<?php echo count($consumibles); ?>
									<small>
										consumible<?php echo (count($consumibles) == 1) ? "" : "s"; ?>
									</small>
								</span>
								<br />
								<ul class="pagination">
								</ul>
							</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($consumibles as $c): ?>
						<tr>
							<td>
								<?php echo $c['nombre'];?>
							</td>
							<td>
								<?php echo $c['precio']; ?>	
							</td>
							<td>
								<?php echo $c['existencias']; ?>	
							</td>
							<td width="50">
								<a href="<?php echo base_url() ?>index.php/consumibles/modificar/<?php echo $c['idconsumible']; ?>" title="Modificar" class="btn_mod">
									<img src="
										<?php echo base_url() ?>
										img/icons/small/page_edit.png" width="22" border="0" />
								</a>
								<a href="<?php echo base_url() ?>index.php/consumibles/eliminar/<?php echo $c['idconsumible']; ?>" title="Eliminar" class="btn_com">
									<img src="
										<?php echo base_url() ?>
										img/icons/small/page_delete.png" width="22" border="0" />
								</a>
							</td>
						</tr>
						<? endforeach; ?>
					</tbody>
				</table>
			</div>
		</body>
	</html>
