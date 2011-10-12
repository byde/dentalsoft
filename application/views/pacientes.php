<style type="text/css">@import url("<?php echo base_url() ?>css/panel/usuarios.css");</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>js/pacientes.js"></script>
<script>
$(function() {
	<?php if (!$mensaje) { ?>
	$("#alertBien").hide();
	<?php } ?>
        $("#nores").hide();
        $("#tabla").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#tabla").load("<?php echo base_url(); ?>index.php/pacientes/todos");
        $("#buscar_cmp").keyup(function(e){
            if ($(this).val() != "")
                urlb = "<?php echo base_url(); ?>index.php/pacientes/buscar/" + $(this).val();
            else
                urlb = "<?php echo base_url(); ?>index.php/pacientes/todos";
            $.ajax({
                url: urlb,
              context: document.body,
              beforeSend : function (){
                  $("#imgbusca").attr("src", "img/ajax-loader.gif");
              },
              success: function(data){
                  $("#imgbusca").attr("src", "img/pic.gif");
                  if(data == "false") {
                    $("#tabla").html("");
                    $("#nores").show();
                  } else {
                    $("#nores").hide();
                    $("#tabla").html(data);
                  }
              }
            });
        });
});
</script>
<div class="grid_12"> 
	<!-- STATS -->
    <div class="box-header"> Pacientes 
      <ul class="tabs fr">
    	<li><a href="index.php/pacientes/nuevo" id="btn_nvo"><img src="img/add.png" width="16px" border="0" /> <b>Nuevo paciente</b></a></li>
    </ul></div>
    <div class="box tab-content">
        <form action="#"><label>Buscar paciente: </label><input type="text" id="buscar_cmp" name="buscar" size="32" /><img id="imgbusca" src="img/pic.gif" width="22" /></form>
    <div class="notification success" id="alertBien"> <span class="strong"><?php echo $alertTitle; ?></span> <?php echo $alertMsg; ?></div>
    <div id="tabla">
    </div>
        <div class="notification warning" id="nores"> <span class="strong">SIN RESULTADOS!</span> La b&uacute;squeda no encuentro ninguna coincidencia. </div>
<br class="cl">
<div id="dia_nuevo" title="Nuevo Paciente"></div>
<div id="comentarios" title="Comentario"></div>
</div>
</div>