<script>
    $(function(){
        $("#abono").keyup(function(){
            $("#saldo").html(<?php echo $monto; ?>-$(this).val());
        });
        $("#formabonar").submit( function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: $("#formabonar").attr('action'),
			data: $("#formabonar").serialize(),
			success: function(){
                            $("#dia_mensaje").html("<div class=\"notification success\"> <span class=\"strong\">Pago Registrado!</span> Se guardo el pago con exito</div>");
                            $("#dia_mensaje").dialog("open");
			}
		});
	})
    });
</script>
<form action="index.php/caja/abonar_pago/<?php echo $idpago; ?>" method="post" id="formabonar">
<h2>Cobrar</h2>
<table>
    <tr>
        <td><b>Monto</b></td>
        <td><b>Abono</b></td>
        <td><b>Saldo</b></td>
    </tr>
    <tr class="zebra">
        <td><?php echo $monto ?></td>
        <td><input type="text" id="abono" name="abono" value="<?php echo $monto; ?>" /></td>
        <td><b>$<span id="saldo">0</span></b></td>
    </tr>
</table>
</form>