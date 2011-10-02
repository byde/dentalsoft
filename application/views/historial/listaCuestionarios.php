<script>
$(function(){

    $( "#dia_cues" ).dialog({
        autoOpen: false,
        height: 500,
        width: 700,
        modal: true
    });

        
        $("a.btn_ver").live("click",function(e){
            e.preventDefault();
            $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_cues").load($(this).attr("href"));
            $("#dia_cues").dialog("open");
        });
        
        $("a.btn_imprimir").live("click",function(e){
            e.preventDefault();
            $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_cues").load($(this).attr("href"));
            $("#dia_cues").dialog("open");
        });
});
</script>
<?php if (is_array($cuestionarios)): ?>
<table border="0" cellpadding="1" cellspacing="1">
    <thead>
    <tr>
        <td>Fecha</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <?php foreach($cuestionarios as $c): ?>
    <tr class="zebra">
        <td><?php echo $c['fecha']; ?></td>
        <td><a href="index.php/historial/ver/<?php echo $c['idcuestionario'] ?>" title="ver" class="button blue btn_ver" >Ver</a>
            <a href="index.php/historial/imprimir/<?php echo $c['idcuestionario'] ?>" title="Imprimir" class="button blue btn_imprimir" target="_blank" >Imprimir</a></td>
    </tr><?php endforeach; ?>
</table>
<?php else : ?>
        <div class="notification warning"> <span class="strong">Sin resultados</span> No  hay citas programadas para este paciente. </div>
<?php endif; ?>
<div id="dia_consultar" title="Consulta"></div>