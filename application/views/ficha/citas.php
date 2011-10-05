<script>
$(function(){
    $( "#dia_consultar" ).dialog({
        autoOpen: false,
        height: 500,
        width: 800,
        modal: true,
        buttons: {
            "Guardar": function() {
                $("#formConsultar").submit();
                $( "#tabs" ).tabs("load", 1);
                $( this ).dialog( "close" );
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        },
        close: function(){
                $( this ).empty();
        }
    });

    $( "#dia_cobrar" ).dialog({
        autoOpen: false,
        height: 500,
        width: 600,
        modal: true,
        buttons: {
            "Cobrar": function() {
                $("#formCobrar").submit();
                $( "#tabs" ).tabs("load", 1);
                $( this ).dialog( "close" );
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        },
        close: function(){
                $( this ).empty();
        }
    });

    $("#btn_cobrar").live('click', function(e){
        e.preventDefault();
        $("#dia_cobrar").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_cobrar").load($(this).attr("href"));
        $("#dia_cobrar").dialog("open");
    });

    $("#btn_consu").live('click', function(e){
        e.preventDefault();
        $("#dia_consultar").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_consultar").load($(this).attr("href"));
        $("#dia_consultar").dialog("open");
    });
        
        $("#btn_reprogramar").live("click",function(e){
            e.preventDefault();
            $("#dia_reprogramar").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_reprogramar").load($(this).attr("href"));
            $("#dia_reprogramar").dialog("open");
        });
        
        $("#btn_cuestionario").live("click",function(e){
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
            <?php if ($c['idestado'] == 2): ?><a href="index.php/caja/cobrar/<?php echo $c['idagenda'] ?>" class="button small green" id="btn_cobrar">Cobrar</a><?php endif; ?>
            <?php if ($c['idestado'] == 1): ?><a href="index.php/consulta/consultar/<?php echo $c['idagenda'] ?>" class="button small green" id="btn_consu">Consultar</a><?php endif; ?>
            <?php if ($c['idestado'] == 0): ?>
                <a href="index.php/agenda/reprogramar/<?php echo $c['idagenda'] ?>" title="Reprogramar" id="btn_reprogramar" ><img src="img/refresh.png" width="12px" brder="0" alt="Reprogramar" /></a>
                <a href="index.php/agenda/cuestionario/<?php echo $c['idagenda'] ?>" title="Iniciar Cuestionario" id="btn_cuestionario" ><img src="img/pencil.png" width="18px" brder="0" alt="Iniciar Cuestionario" /></a>
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
<div id="dia_cobrar" title="Cobrar"></div>