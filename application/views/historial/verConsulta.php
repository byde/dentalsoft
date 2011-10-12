<h2>Consulta de <?php echo $consulta['fecha'] ?></h2>
<fieldset>
    
    <h3>Odontograma</h3>
    <div>
        <img src="img/odontograma.jpg" height="380px" />
        <?php if(is_array($simbolos)) : ?>
        <?php foreach ($simbolos as $s) : ?>
        <img src="img/odontograma/<?php echo $rutas[$s["tipo"]] ?>"  height="20px" style="position: absolute; left: <?php echo $s["left"]-7 ?>px; top: <?php echo $s["top"]-7 ?>px;" />
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <h3>Diagnostico General</h3>
    <p><?php echo $consulta['diagnostico'] ?></p>
    <h3>Plan De Tratamiento</h3>
    <p><?php echo $consulta['tratamiento'] ?></p>
    <h3>Seguimiento</h3>
    <p><?php echo $consulta['seguimiento'] ?></p>
</fieldset>