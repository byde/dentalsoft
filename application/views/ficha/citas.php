<script>
$(function(){

    $( "#dia_consultar" ).dialog({
        autoOpen: false,
        height: 500,
        width: 730,
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
});
</script>
<table border="0" cellpadding="1" cellspacing="1">
    <tr>
        <td>Fecha</td>
        <td>Consultorio</td>
        <td>Hora</td>
        <td>M&eacute;dico</td>
        <td>Estado</td>
    </tr><?php foreach($citas as $c): ?>
    <tr>
        <td><?php echo $c['fechacita']; ?> <?php if ($c['idestado'] == 1): ?><input type="button" class="button small green btn_consu" value="Consultar" /><?php endif; ?></td>
        <td><?php echo $c['consu']; ?></td>
        <td><?php echo $c['ini'] . ' - ' . $c['fin']; ?></td>
        <td><?php echo $c['user']; ?></td>
        <td><?php echo $c['estado']; ?></td>
    </tr><?php endforeach; ?>
</table>
<div id="dia_consultar" title="Consulta"></div>