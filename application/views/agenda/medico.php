<script>
    $(function () {
        $("#formModificar").submit( function (e){
            e.preventDefault();
            $.ajax({
                  type: 'POST',
                  url: $("#formModificar").attr('action'),
                  data: $("#formModificar").serialize(),
                  success: function(){
                        $("#dia_programar").html($("<img />").attr("src", "img/ajax-loader.gif"));
                        $("#dia_programar").load("index.php/agenda/horario");
                  }
            });
	});
    });
</script>
<form id="formModificar" action="index.php/agenda/set_medico">
<h1><?php echo $paciente['nombre'] . ' ' . $paciente['apellidos']; ?></h1>
<div>Seleccione el medico
    <select name="medico">
        <?php foreach($medicos as $medico): ?>
        <option value="<?php echo $medico['idusuario']; ?>"><?php echo $medico['medico']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div>
    <table width="600px">
        <thead>
            <tr>
                <td>Seleccione los tratamientos</td>
            </tr>
        </thead>
        <?php foreach($tratamientos as $t): ?>
        <tr><td><label><input type="checkbox" name="trat[]" value="<?php echo $t['idtratamiento']; ?>" /> <?php echo $t['nombre']; ?></label></td></tr><br />
        <?php endforeach ?>
    </table>
</div>
<div>
    <input type="hidden" name="idpaciente" value="<?php echo $paciente['idpaciente'] ?>" />
    <input type="submit" id="siguienteAgenda" class="button small green" value="Siguiente paso"></div>
</form>