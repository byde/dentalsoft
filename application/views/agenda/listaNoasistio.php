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
                <td><span class="error"><?php echo $c['fecha'] ?></span></td>
            <td>
                <a href="index.php/agenda/reprogramar/<?php echo $c['idagenda'] ?>" class="button small green btn_reprogramar" >Reprogramar</a>
                <a href="index.php/agenda/cancelarnoasistio/<?php echo $c['idagenda'] ?>" class="button small red btn_cancelar" >Cancelar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
        <br />
<?php else : ?>
        <div class="notification warning"> <span class="strong">Sin resultados</span> No  hay citas por reporgramar. </div>
<?php endif; ?>
