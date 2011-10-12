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
        $("a.btn_cuestionario").click(function(){
            $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_cues").dialog("open");
            $("#dia_cues").load($(this).attr("href"));
        });
        $("#btn_editar").click(function(){
            $("#dia_ficha").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_ficha").load("index.php/pacientes/editar/<?php echo $paciente['idpaciente']; ?>");
            //$("#dia_cues").dialog("open");
        });

        $( "#tabs" ).tabs({
            ajaxOptions: {
                error: function( xhr, status, index, anchor ) {
                    $( anchor.hash ).html(
                    "error." );
                }
            }
        });
    });
</script>
<div id="listin"><input type="button" id="btn_programar" class="button small blue" value="Programar Cita"></div>
<div id="tabs">
    <ul>
        <li><a href="#personal">Personal</a></li>
        <li><a href="index.php/ficha/citas/<?php echo $id; ?>">Citas</a></li>
        <li><a href="index.php/historial/lista/<?php echo $id; ?>">Historial</a></li>
        <li><a href="index.php/caja/resumen/<?php echo $id; ?>">Estado de Cuenta</a></li>
    </ul>
    <div id="personal">
        <table border="0" cellpadding="1" cellspacing="1">
            <tr>
                <td colspan="4"><b>Nombre</b>: <?php echo $paciente['nombre'] . ' ' . $paciente['apellidos']; ?></td>
            </tr>
            <tr>
                <td><b>Estado civil</b></td>
                <td><b>Ocupacion</b></td>
                <td><b>Fecha de nacimiento</b></td>
                <td><b>Edad</b></td>
            </tr>
            <tr>
                <td><div class="campo" campo="edocivi"><?php echo $paciente['civil']; ?></div></td>
                <td><?php echo $paciente['ocupacion']; ?></td>
                <td><?php echo $nac; ?></td>
                <td><?php echo $edad; ?> a&ntilde;os</td>
            </tr>
            <tr>
                <td><b>Direcci&oacute;n</b></td>
                <td><b>Colonia</b></td>
                <td><b>Ciudad</b></td>
                <td><b>Estado</b></td>
            </tr>
            <tr>
                <td><?php echo $paciente['direccion']; ?></td>
                <td><?php echo $paciente['colonia']; ?></td>
                <td><?php echo $paciente['ciudad']; ?></td>
                <td><?php echo $paciente['estado']; ?></td>
            </tr>
            <tr>
                <td><b>Tel&eacute;fono</b></td>
                <td><b>Tel&eacute;fono</b></td>
                <td><b>Correo-e</b></td>
                <td><b>M&eacute;dico General</b></td>
            </tr>
            <tr>
                <td><?php echo $paciente['telefono1']; ?></td>
                <td><?php echo $paciente['telefono2']; ?></td>
                <td><?php echo $paciente['email']; ?></td>
                <td><?php echo $paciente['medgen']; ?></td>
            </tr>
            <tr>
                <td><b>Nota</b></td>
                <td colspan="3"><?php echo $paciente['nota']; ?></td>
            </tr>
        </table>
        <input type="button" id="btn_editar" class="button small red" value="Editar" />
    </div>
</div>
<div id="dia_cues" title="Cuestionario"></div>