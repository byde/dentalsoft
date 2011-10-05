<h2>Cobrar</h2>
<table>
    <tr>
        <td>Concepto</td>
        <td>Monto</td>
    </tr>
    <?php foreach($conceptos as $c): ?>
    <tr>
        <td><?php echo $c['nombre'] ?></td>
        <td><?php echo $c['costo']?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td><b>Total</b></td>
        <td><h3><?php echo $total; ?></h3></td>
    </tr>
</table>
<form action="index.php/caja/guardar/<?php echo $idagenda; ?>" method="post" id="formPagar">
    <input type="hidden" name="total" value="<?php echo $total ?>" />
</form>