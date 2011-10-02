<?php if (is_array($citas)): ?>
<table width="700px">
    <thead>
    <tr>
        <td>Paciente</td>
        <td>Cita</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($citas as $c): ?>
        <tr class="zebra">
            <td>
                <a href="index.php/ficha/ver/<?php echo $c['idpaciente']; ?>" title="Ficha" class="btn_ficha">
                <?php echo $c['paciente'] ?>
                </a></td>
            <td><?php echo $c['fecha'] ?></td>
            <td>
                <a href="index.php/agenda/confirmarcita/<?php echo $c['idagenda'] ?>/<?php echo $dia ?>" class="button small grey btn_confirma" >Confirmar Cita</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
        <br />
<?php else : ?>
        <div class="notification warning"> <span class="strong">Sin resultados</span> No  hay citas por confirmar. </div>
<?php endif; ?>
