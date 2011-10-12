<script>
    $(function(){
        $("#abono").keyup(function(){
            $("#saldo").html(<?php echo $total; ?>-$(this).val());
        });
        $("#formCobrar").submit( function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: $("#formCobrar").attr('action'),
			data: $("#formCobrar").serialize(),
			success: function(){
                            $("#dia_mensaje").html("<div class=\"notification success\"> <span class=\"strong\">Pago Registrado!</span> Se guardo el pago con exito</div>");
                            $("#dia_mensaje").dialog("open");
			}
		});
	})
    });
</script>
<form action="index.php/caja/guardar/<?php echo $idagenda; ?>" method="post" id="formCobrar">
<h2>Cobrar</h2>
<table>
    <tr>
        <td><b>Concepto</b></td>
        <td><b>Monto</b></td>
    </tr>
    <?php foreach($conceptos as $c): ?>
    <tr class="zebra">
        <td><?php echo $c['nombre'] ?></td>
        <td>$ <?php echo $c['costo']?></td>
    </tr>
    <?php endforeach; ?>
    <tr class="zebra">
        <td><b>Total</b></td>
        <td><h3>$ <?php echo $total; ?></h3></td>
    </tr>
    <tr class="zebra">
        <td><b>Abono</b></td>
        <td><input type="text" id="abono" name="abono" value="<?php echo $total; ?>" /></td>
    </tr>
    <tr class="zebra">
        <td><b>Saldo</b></td>
        <td><b>$<span id="saldo">0</span></b></td>
    </tr>
</table>
    <input type="hidden" name="monto" value="<?php echo $total ?>" />
</form>