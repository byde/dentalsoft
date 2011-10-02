<style>
    .horas { height: 18px; padding: 0.9px; margin: 2px;font-size: 1em; border: 1px solid #a3a3a3;  text-align: right; font-weight: bold; display: block; }
    a.item {  margin: 2px; font-size: 1em; text-align: center; border: 1px solid #a3a3a3; color: #eeeeee; font-weight: bold; display: block; }
    .ocupado {background-color: red; width: 190px;  margin: 2px; font-size: 1em; text-align: center; border: 1px solid #a3a3a3; color: #eeeeee; font-weight: bold; display: block; }
    .hora { width: 190px; }
    a.horah { background-color: greenyellow; color: #333333;}
    a.horay { background-color: #F7E928; color: #333333;}
    .hab { background-color: greenyellow; color: #333333;}
    .listin { position:fixed; background-color: #4A4A46; color: white; height: 26; width: 500px; margin-left: 0px; padding: 4px }
    #seleccionada { color: white; }
</style>
<script>
$(function(){
    var duracion = <?php echo $duracion ?>;
    $("#formModificar").submit( function (e){
            e.preventDefault();
            $.ajax({
                  type: 'POST',
                  url: $("#formModificar").attr('action'),
                  data: $("#formModificar").serialize(),
                  success: function(){
                        $("#dia_<?php echo $re; ?>programar").html($("<img />").attr("src", "img/ajax-loader.gif"));
                        $("#dia_<?php echo $re; ?>programar").load("index.php/agenda/<?php echo $re; ?>aceptar");
                  }
            });
	});
    $("#fecha").datepicker({
            showOn: "button",
            buttonImage: "img/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
    });
    $(".hora").live('click', function (e){
        $("#seleccionada").html($(this).html());
        $("#hseleccionada").val($(this).attr("idhorario"));
        $("#hsiguiente").removeClass("red").addClass("green");
        $("#hcons").val($(this).attr("c"));
    });
    var obtenerDia = function (con,dia){
        $.ajax({
            url: "index.php/agenda/horariocodi/"+con+"/"+dia,
            dataType: 'json',
            beforeSend: function (){
                $("#img" + con).attr("src", "img/ajax-loader.gif");
            },
            success: function (data){
                $("#img" + con).attr("src", "img/pic.gif");
                var items = [];
                //alert(data);
                var fin = 0;
                  $.each(data.horas, function(key, val) {
                      if (val.termina != null)
                          fin = parseInt(val.termina);
                      if (fin < parseInt(val.idhorario))
                        items.push('<a href="#" c="' + con + '" idhorario="' + val.idhorario + '" class="item hora">' + val.hora + '</a>');
                      else
                        items.push('<div idhorario="' + val.idhorario + '" class="ocupado">' + val.hora + '</div>');
                  });
                  $("div[con=" + con + "]").html(items.join(''));
            }
        });
    };
    $("a.hora").live('mouseover mouseout', function(event) {
      if (event.type == 'mouseover') {
          //$(this).addClass("horah");
          var h = 0;
          for(i=0;i<duracion;i++)
              h = ($("a.hora[idhorario=" + (parseInt($(this).attr("idhorario"))+i) + "][c=" + $(this).attr("c") + "]").length > 0) ? h : h+1;

          for(i=0;i<duracion;i++)
              if(h>0)
                $("a.hora[idhorario=" + (parseInt($(this).attr("idhorario"))+i) + "][c=" + $(this).attr("c") + "]").addClass("horay");
              else
                $("a.hora[idhorario=" + (parseInt($(this).attr("idhorario"))+i) + "][c=" + $(this).attr("c") + "]").addClass("horah");
        // do something on mouseover
      } else {
          for(i=0;i<duracion;i++){
              $("a.hora[idhorario=" + (parseInt($(this).attr("idhorario"))+i) + "][c=" + $(this).attr("c") + "]").removeClass("horah");
              $("a.hora[idhorario=" + (parseInt($(this).attr("idhorario"))+i) + "][c=" + $(this).attr("c") + "]").removeClass("horay");
          }
        // do something on mouseout
      }
    });

    $("#fecha").change(function (){
    <?php foreach($consultorios as $c): ?>
        obtenerDia(<?php echo $c['idconsultorio']; ?>,$("#fecha").val());
    <?php endforeach; ?>

    });
    <?php foreach($consultorios as $c): ?>
        obtenerDia(<?php echo $c['idconsultorio']; ?>,$("#fecha").val());
    <?php endforeach; ?>
});
</script>
<div><form id="formModificar" action="index.php/agenda/set_hora">
        <div class="listin">Fecha <input id="fecha" name="fecha" value="<?php echo date('d-m-Y'); ?>" /> <span id="seleccionada"></span>
            <input type="hidden" name="seleccionada" id="hseleccionada" /> <input type="hidden" name="consultorio" id="hcons" /> <input type="submit" id="hsiguiente" class="button small red" value="Siguiente"></div></form>
    <br /><br /><br />
    <table border="o" cellpadding="0" cellspacing="1" width="">
        <tr>
            <td width="80px">&nbsp;</td>
            <?php foreach($consultorios as $c): ?>
            <td width="190px"><?php echo $c['nombre']; ?> <img id="img<?php echo $c['idconsultorio']; ?>" src="img/pic.gif" height="18px" /></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td valign="top"><?php foreach($horas as $h): ?>
                <div idhora="<?php echo $h['idhorario'] ?>" class="horas"><?php echo $h['hora'] ?></div>
            <?php endforeach; ?></td>
            <?php foreach($consultorios as $c): ?>
            <td valign="top"><div con="<?php echo $c['idconsultorio']; ?>"></div></td>
            <?php endforeach; ?>
        </tr>
    </table>
</div><!-- End demo -->
