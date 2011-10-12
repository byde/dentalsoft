<script>
$(function(){

    $( "#dia_cues" ).dialog({
        autoOpen: false,
        height: 500,
        width: 700,
        modal: true
    });

        
        $("#btn_ver").live("click",function(e){
            e.preventDefault();
            $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_cues").load($(this).attr("href"));
            $("#dia_cues").dialog("open");
        });
        
        $("#btn_imprimir").live("click",function(e){
            e.preventDefault();
            popup("ficha",$(this).attr("href"));
        });

        
        $("#btn_ver_consulta").live("click",function(e){
            e.preventDefault();
            $("#dia_cues").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_cues").load($(this).attr("href"));
            $("#dia_cues").dialog("open");
        });
        
        $("#btn_imprimir_consulta").live("click",function(e){
            e.preventDefault();
            popup("ficha",$(this).attr("href"));
        });
});
</script>
<?php if (is_array($cuestionarios)): ?>
<table border="0" cellpadding="1" cellspacing="1">
    <thead>
    <tr>
        <td>Fecha</td>
        <td>Cuestionario</td>
        <td>Consulta</td>
    </tr>
    </thead>
    <?php foreach($cuestionarios as $c): ?>
    <tr class="zebra">
        <td><?php echo $c['fecha']; ?></td>
        <td><a href="index.php/historial/ver/<?php echo $c['idcuestionario'] ?>" title="ver" class="button blue" id="btn_ver" >Ver</a>
            <a href="index.php/historial/imprimir/<?php echo $c['idcuestionario'] ?>" title="Imprimir" class="button blue" id="btn_imprimir" target="_blank" >Imprimir</a></td>
        <td><?php if( $c['idconsulta'] > 0) { ?>
            <a href="index.php/consulta/ver/<?php echo $c['idconsulta'] ?>" title="ver" class="button blue" id="btn_ver_consulta" >Ver</a>
            <a href="index.php/consulta/imprimir/<?php echo $c['idconsulta'] ?>" title="Imprimir" class="button blue" id="btn_imprimir_consulta" target="_blank" >Imprimir</a></td>
            <?php } ?></td>
    </tr><?php endforeach; ?>
</table>
<?php else : ?>
        <div class="notification warning"> <span class="strong">Sin resultados</span> No  hay citas programadas para este paciente. </div>
<?php endif; ?>
<div id="dia_consultar" title="Consulta"></div>