<script>
$(function(){

    $( "#dia_consultar" ).dialog({
        autoOpen: false,
        height: 500,
        width: 800,
        modal: true,
        buttons: {
            "Guardar": function() {
                $("#formNuevo").submit();
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        }
    });

    $("input.btn_consu").live('click', function(e){
        e.preventDefault();
        $("#dia_consultar").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_consultar").load("index.php/consulta/consultar/<?php echo $id; ?>");
        $("#dia_consultar").dialog("open");
    });
        
        $("a.btn_reprogramar").live("click",function(e){
            e.preventDefault();
            $("#dia_reprogramar").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_reprogramar").load($(this).attr("href"));
            $("#dia_reprogramar").dialog("open");
        });
        
        $("a.btn_cuestionario").live("click",function(e){
            e.preventDefault();
            $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_cues").load($(this).attr("href"));
            $("#dia_cues").dialog("open");
        });
});
</script>
<?php if (is_array($citas)): ?>
<table border="0" cellpadding="1" cellspacing="1">
    <thead>
    <tr>
        <td>Fecha</td>
        <td>Consultorio</td>
        <td>Hora</td>
        <td>M&eacute;dico</td>
        <td>Estado</td>
    </tr>
    </thead>
    <?php foreach($citas as $c): ?>
    <tr>
        <td><?php echo $c['fechacita']; ?> 
            <?php if ($c['idestado'] == 1): ?><input type="button" class="button small green btn_consu" value="Consultar" /><?php endif; ?>
            <?php if ($c['idestado'] == 0): ?>
                <a href="index.php/agenda/reprogramar/<?php echo $c['idagenda'] ?>" title="Reprogramar" class="btn_reprogramar" ><img src="img/refresh.png" width="12px" brder="0" alt="Reprogramar" /></a>
                <a href="index.php/agenda/cuestionario/<?php echo $c['idagenda'] ?>" title="Iniciar Cuestionario" class="btn_cuestionario" ><img src="img/pencil.png" width="18px" brder="0" alt="Iniciar Cuestionario" /></a>
                <?php endif; ?>
        </td>
        <td><?php echo $c['consu']; ?></td>
        <td><?php echo $c['ini'] . ' - ' . $c['fin']; ?></td>
        <td><?php echo $c['user']; ?></td>
        <td><?php echo $c['estado']; ?></td>
    </tr><?php endforeach; ?>
</table>
<?php else : ?>
        <div class="notification warning"> <span class="strong">Sin resultados</span> No  hay citas programadas para este paciente. </div>
<?php endif; ?>
<div id="dia_consultar" title="Consulta"></div>