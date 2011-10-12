<?php 
$totoltoal =0;
if (is_array($pagos)): ?>
    <script>
        $(function(){
            $( "#dia_abonar" ).dialog({
                autoOpen: false,
                height: 250,
                width: 500,
                modal: true,
                buttons: {
                    "Cobrar": function() {
                        $("#formabonar").submit();
                        $( "#tabs" ).tabs("load", 3);
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
            
            
    $(".btn_abonar").live("click",function(e){
        e.preventDefault();
        $("#dia_abonar").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_abonar").load($(this).attr("href"));
        $("#dia_abonar").dialog("open");
    });
        });
    </script>
    <table border="0" cellpadding="1" cellspacing="1">
        <thead>
            <tr>
                <td>Cita</td>
                <td>Monto</td>
                <td>Saldo</td>
            </tr>
        </thead>
        <?php foreach ($pagos as $c): ?>
            <tr class="zebra">
                <td><?php echo $c['cita']; ?> <a href="index.php/caja/abonar/<?php echo $c['idpago']; ?>" class="button small green btn_abonar" >Abonar</a></td>
                <td><?php echo $c['monto']; ?></td>
                <td><?php echo $c['saldo']; ?></td>
            </tr><?php $totoltoal += $c['saldo']; ?>
            <?php foreach ($c["abonos"] as $a): ?>
                <tr class="zebra">
                    <td>&nbsp;</td>
                    <td>Abono (<?php echo $a['fecha_es']; ?>) - <?php echo $a['abono']; ?></td>
                    <td>&nbsp;</td>
                </tr>
           <?php endforeach; ?>
        <?php endforeach; ?>
            <tr>
                <td colspan="2"><b>Saldo total</b></td>
                <td><b>$ <?php echo $totoltoal; ?></b></td>
            </tr>
    </table>
<?php else : ?>
    <div class="notification warning"> <span class="strong">Sin resultados</span> No  hay adeudos para este paciente. </div>
<?php endif; ?>
<div id="dia_abonar" title="abonar"></div>