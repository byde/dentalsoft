<script>
$(function(){
    $("#dia_programar").dialog({
        autoOpen: false,
        height: 500,
        width: 1000
    });
    $("#dia_cues").dialog({
        autoOpen: false,
        height: 500,
        width: 600
    });
    $("#btn_programar").click(function(){
        $("#dia_programar").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_programar").load("index.php/agenda/medico/<?php echo $paciente['idpaciente']; ?>");
        $("#dia_programar").dialog("open");
    });
    $("#btn_cues").click(function(){
        $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_cues").dialog("open");
        $("#dia_cues").load("index.php/historial/set/<?php echo $paciente['idpaciente']; ?>");
    });

    $( "#tabs" ).tabs({
        ajaxOptions: {
            error: function( xhr, status, index, anchor ) {
                $( anchor.hash ).html(
                    "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                    "If this wouldn't be a demo." );
            }
        }
    });
});
</script>
<h1><?php echo $paciente['nombre'] . ' ' . $paciente['apellidos']; ?></h1>
<div id="listin"><input type="button" id="btn_programar" class="button small blue" value="Programar Cita">
<input type="button" id="btn_cues" class="button small blue" value="Iniciar Cuestionario"></div>
<div id="tabs">
    <ul>
        <li><a href="#personal">Personal</a></li>
        <li><a href="index.php/ficha/citas/<?php echo $id; ?>">Citas</a></li>
        <li><a href="index.php/historial/ver/<?php echo $id; ?>">Historial</a></li>
    </ul>
    <div id="personal">
            <table border="0" cellpadding="1" cellspacing="1">
        <tr>
            <td colspan="4"><b>Nombre</b>: <?php echo $paciente['nombre'] . ' ' . $paciente['apellidos']; ?></td>
        </tr>
        <tr>
            <td>Estado civil</td>
            <td>Ocupacion</td>
            <td>Fecha de nacimiento</td>
            <td>Edad</td>
        </tr>
        <tr>
            <td><?php echo $paciente['civil']; ?></td>
            <td><?php echo $paciente['ocupacion']; ?></td>
            <td><?php echo $nac; ?></td>
            <td><?php echo $edad; ?> a&ntilde;os</td>
        </tr>
    </table>
    </div>
</div>
<div id="dia_cues" title="Cuestionario"></div>