<style>
    .horas { height: 18px; padding: 0.9px; margin: 2px;font-size: 1em; border: 1px solid #a3a3a3;  text-align: right; font-weight: bold; display: block; }
    .item {  margin: 2px; font-size: 1em; text-align: center; border: 1px solid #a3a3a3; color: #eeeeee; font-weight: bold; display: block; }
    .ocupado {background-color: greenyellow; width: 300px;  margin: 2px; font-size: 1em; text-align: center; border: 1px solid #a3a3a3; color: #333333; font-weight: bold; display: block; }
    .hora { width: 300px; height: 18px; color: #00F; padding: 0.9px;  }
    a.horah { background-color: greenyellow; color: #333333;}
    a.horay { background-color: #F7E928; color: #333333;}
    .hab { background-color: greenyellow; color: #333333;}
    .listin { position:fixed; background-color: #4A4A46; color: white; height: 26; width: 500px; margin-left: 0px; padding: 4px }
    #seleccionada { color: white; }
    a.aficha {color: #333333; }
    a.aficha:hover{ font-size: large;}
</style>
<script>
$(function(){
    $("#fecha").datepicker({
            showOn: "button",
            buttonImage: "img/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'dd-mm-yy'
    });
    var obtenerDia = function (con,dia){
        $.ajax({
            url: "index.php/agenda/horariocodism/"+con+"/"+dia,
            dataType: 'json',
            beforeSend: function (){
                $("#img" + con).attr("src", "img/ajax-loader.gif");
            },
            success: function (data){
                $("#img" + con).attr("src", "img/pic.gif");
                var items = [];
                //alert(data);
                var fin = 0;
                var pac = null;
                var idpac = null;
                var med = null;
                  $.each(data.horas, function(key, val) {
                      if (val.termina != null)
                          fin = parseInt(val.termina);
                      if (fin < parseInt(val.idhorario))
                        items.push('<div idhorario="' + val.idhorario + '" class="item hora">' + val.hora + '</div>');
                      else {
                        pac = (val.paciente == null) ? pac : val.paciente;
                        idpac = (val.idpaciente == null) ? idpac : val.idpaciente;
                        med = (val.medico == null) ? med : val.medico;
                        items.push('<div idhorario="' + val.idhorario + '" class="ocupado"><small>' + val.hora + '</small> - <a href="index.php/ficha/ver/' + idpac + '" class="aficha btn_ficha">' + pac + '</a> - <small>' + med + '</small></div>');
                      }
                  });
                  $("div[con=" + con + "]").html(items.join(''));
            }
        });
    };

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
            <input type="hidden" name="seleccionada" id="hseleccionada" />
        </div></form>
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
