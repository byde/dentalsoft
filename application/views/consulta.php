<script>
    $(function(){
        $("#formConsultar").submit( function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $("#formConsultar").attr('action'),
                data: $("#formConsultar").serialize(),
                success: function(id){
                    //alert(id);
                    $(".eliminable").each(function(index) {
                        //alert("index.php/consulta/set_odontograma/" + id + "/" + $(this).attr("tipo") + "/" + $(this).css("left") + "/" + $(this).css("top"));
                        $.get("index.php/consulta/set_odontograma/" + id + "/" + $(this).attr("tipo") + "/" + $(this).css("left") + "/" + $(this).css("top"));
                        //alert(index + ': ' + $(this).text());
                      });
                    $( "#dia_consultar" ).dialog( "close" );
                }
            });
        });
        $("#odontograma").droppable({
            accept: '.simbolo',
            drop: function(event, ui) {
                ele = $(ui.helper).clone();
                ele.addClass("eliminable");
                //alert("se solto en " + ele.css("left"));
                $(this).append(ele);
            }
        });
        $(".eliminable").live("click", function(){
            $(this).remove();
        });
        $(".simbolo").draggable({ 
            helper: 'clone'
       });
    });
</script>
<form id="formConsultar" method="post" action="index.php/consulta/guardar/<?php echo $idagenda ?>">
    <h3>Paciente: <?php echo $paciente['nombre'] ?> <?php echo $paciente['apellidos'] ?></h3>
        
            <table>
                <tr>
                    <td width="400px">Odontograma</td>
                    <td>Simbologia</td>
                </tr>
                <tr>
                    <td><div id="odontograma"><img src="img/odontograma.jpg" height="380px" /></div></td>
                    <td valing="top">
                        <img src="img/odontograma/ausencia.gif" tipo="1" class="simbolo" height="20px" /> Ausencia de Diente<br />
                        <img src="img/odontograma/caries.gif" tipo="2" class="simbolo" height="10px" /> Caries<br />
                        <img src="img/odontograma/restauracion.gif" tipo="3" class="simbolo" height="10px" /> Restauraci&oacute;n<br />
                        <img src="img/odontograma/extraccion.gif" tipo="4" class="simbolo" height="20px" /> Diente a extraer<br />
                        <img src="img/odontograma/endodoncia.gif" tipo="5" class="simbolo" height="20px" /> Endodoncia<br />
                        <img src="img/odontograma/protesis.gif" tipo="6" class="simbolo" height="20px" /> Prótesis fija<br />
                        <img src="img/odontograma/dolorvertical.gif" tipo="7" class="simbolo" height="20px" /> Dolor a la percusión (Ver.)<br />
                        <img src="img/odontograma/dolorhorisontal.gif" tipo="8" class="simbolo" height="20px" /> Dolor a la percusión (Hor.)<br />
                        <img src="img/odontograma/movilidad.gif" tipo="9" class="simbolo" height="20px" /> Movilidad<br />
                        <img src="img/odontograma/extrusion.gif" tipo="10" class="simbolo" height="20px" /> Extrusi&oacute;n<br />
                    </td>
                </tr>
            </table>
    <fieldset>
        <legend>Diagnostico General</legend>
        <textarea cols="60" rows="5" name="diagnostico"></textarea>
    </fieldset>
    <fieldset>
        <legend>Plan De Tratamiento</legend>
        <textarea cols="60" rows="5" name="tratamiento"></textarea>
        <label>Sugerencia de Seguimiento: <input type="text" name="seguimiento" /></label>
    </fieldset>
</form>