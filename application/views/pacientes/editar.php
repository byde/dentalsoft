<script type="ttext/javascript" src="<?php echo base_url(); ?>js/jquery.ui.datepicker-es.js"></script>
<script>
$(function(){
    jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd-mm-yy',
                altField: '#fecnac',
                altFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});
	$("#nombre").focus();
	$("#formNuevo").submit( function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: $("#formNuevo").attr('action'),
			data: $("#formNuevo").serialize(),
			success: function(){
                            $("#dia_ficha").load("index.php/ficha/ver/<?php echo $paciente['idpaciente']; ?>");
			}
		});
	});
        $( "#fecnac2" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1910:2011'
        });
});
</script>
<form method="post" id="formNuevo" action="index.php/pacientes/guardareditar/<?php echo $paciente["idpaciente"] ?>">
<div style="display:table">
    <div style="display:table-cell; padding:5px; vertical-align:top">
    <div class="row">
    	<label for="nombre">Nombre</label>
        <input size="55" title="Nombre" id="nombre" name="nombre" type="text" value="<?php echo $paciente["nombre"] ?>" >
    </div>
    <div class="row">
    	<label for="apellidos">Apellidos</label>
        <input size="55" title="Apellidos" id="apellidos" name="apellidos" type="text" value="<?php echo $paciente["apellidos"] ?>">
    </div>
    <div class="row">
    	<label for="fecnac">Fecha Nacimiento</label>
        <input size="55" title="Nacimiento" id="fecnac2" type="text" value="<?php echo $paciente["fecnac_es"] ?>">
        <input id="fecnac" name="fecnac" type="hidden" value="<?php echo $paciente["fecnac"] ?>">
    </div>
    <div class="row">
    	<label for="edocivil">Estado Civil</label>
        <select title="Estado Civil" id="edocivil" name="edocivil">
            <?php foreach($edocivil as $edo): ?>
            <option value="<?php echo $edo['idedocivil']; ?>" <?php echo ($paciente["edocivil"] == $edo['idedocivil']) ? "selected":""; ?>><?php echo $edo['edocivil']; ?></option>
           <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <label for="medgen">M&eacute;dico General</label>
        <input size="55" title="Medico General" id="medgen" name="medgen" type="text" value="<?php echo $paciente["medgen"] ?>">
    </div>
    <div class="row"><br />
        <input type="submit" value="Guardar" class="button small green" />
    </div>
    </div>
    <div style="display:table-cell; padding:5px; vertical-align:top">
    <div class="row">
    	<label for="ocupacion">Ocupación</label>
        <input size="55" title="Ocupacion" id="ocupacion" name="ocupacion" type="text" value="<?php echo $paciente["ocupacion"] ?>">
    </div>
    <div class="row">
        <label for="direccion">Direcci&oacute;n</label>
        <input size="55" title="Direccion" id="direccion" name="direccion" type="text" value="<?php echo $paciente["direccion"] ?>">
    </div>
    <div class="row">
    	<label for="colonia">Colonia</label>
        <input size="55" title="Colonia" id="colonia" name="colonia" type="text" value="<?php echo $paciente["colonia"] ?>">
    </div>
    <div class="row">
    	<label for="ciudad">Ciudad</label>
        <input size="55" title="Ciudad" id="ciudad" name="ciudad" type="text" value="<?php echo $paciente["ciudad"] ?>">
    </div>
    <div class="row">
    	<label for="estado">Estado</label>
        <input size="55" title="Estado" id="estado" name="estado" type="text" value="<?php echo $paciente["estado"] ?>">
    </div>
    </div>
    <div style="display:table-cell; padding:5px; vertical-align:top">
    <div class="row">
        <label for="telefono">Tel&eacute;fono 1</label>
        <input size="55" title="Telefono" id="telefono" name="telefono1" type="text" value="<?php echo $paciente["telefono1"] ?>">
    </div>
    <div class="row">
    	<label for="telefono2">Teléfono 2</label>
        <input size="55" title="Telefono" id="telefono2" name="telefono2" type="text" value="<?php echo $paciente["telefono2"] ?>">
    </div>
    <div class="row">
    	<label for="email">Email</label>
        <input size="55" title="Email" id="email" name="email" type="text" value="<?php echo $paciente["email"] ?>">
    </div>
    <div class="row">
    	<label for="nota">Nota</label>
        <textarea cols="30" rows="4" name="nota"></textarea>
    </div>
    </div>
</div>
</form>