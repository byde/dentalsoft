<h2>M&eacute;dico</h2>
<span><?php echo $medico['nombre'] . ' ' . $medico['apellidos']; ?></span>
<h2>Tratamientos</h2>
<ul style="list-style: none; width: 300px">
    <?php foreach($tratamientos as $t): ?>
    <li><?php echo $t['nombre']; ?></li>
    <?php endforeach; ?>
</ul>
<h2>Fecha</h2>
<span><?php echo $fecha; ?></span>
<h2>Duraci&oacute;n</h2>
<span>Inicio: <b><?php echo $inicio['hora']; ?></b></span>
<span>Fin: <b><?php echo $fin['hora']; ?></b></span>