<script>
    window.print();
    window.close();
</script>
<style>
    body{
        color: #4B7792;
        font-family: Arial;
    }
    .titulo{
        font-weight: bold;
        color: white;
        background-color: #4898D5;
    }
</style>
<table width="800px">
    <tr>
        <td width="200px">
            <img src="<?php echo base_url() ?>img/logo.png" height="150px" />
        </td>
        <td align="right">
            <span style="letter-spacing: 7px; color: #4898D5; font-size: 30px; font-family: Impact, Charcoal, sans-serif;">HISTORIA CLINICA DENTAL</span>
        </td>
    </tr>
</table>
<table width="800px">
    <tr>
        <td width="500px">
            Dr. <?php echo $dr; ?>
        </td>
        <td align="right">
            Fecha: <?php echo $consulta['dia']; ?> /  <?php echo $meses[$consulta['mes']]; ?> /  <?php echo $consulta['anio']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
</table>
<table width="800px" border="0">
    <tr>
        <td colspan="2" class="titulo">FICHA DE IDENTIFICACI&Oacute;N</td>
    </tr>
    <tr>
        <td width="540px">
            Nombre del paciente: <?php echo $paciente["nombre"] . ' ' . $paciente["apellidos"]; ?>
        </td>
        <td>
            Edad: <?php echo $paciente["fecnac_es"]; ?> (<?php echo $edad; ?> a&ntilde;os)
        </td>
    </tr>
    <tr>
        <td>
            Domicilio: <?php echo $paciente["direccion"]; ?>, <?php echo $paciente["colonia"]; ?>, <?php echo $paciente["ciudad"]; ?>
        </td>
        <td>
            Estado Civil: <?php echo $paciente["civil"]; ?>
        </td>
    </tr>
    <tr>
        <td valign="top">
            Ocupaci&oacute;n: <?php echo $paciente["ocupacion"]; ?>
        </td>
        <td>
            T&eacute;lefono: <?php echo $paciente["telefono1"]; ?>
            <?php if (count($paciente["telefono2"]) > 0) { ?>
                y 
            <?php } echo $paciente["telefono2"]; ?>
        </td>
    </tr>
    <tr>
    <td colspan="2">
        M&eacute;dico General <?php echo $paciente["nombre"]; ?>
        </td>
        </tr>
        <td>&nbsp;</td>
        <td><?php if (count($paciente["telefono2"]) > 0) { ?>
                y 
            <?php } echo $paciente["telefono2"]; ?>
        </td>
        </tr>
        
        <tr>
            <td colspan="2"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
        </tr>
</table>
<table width="800px" border="0">
    <tr>
        <td colspan="2" class="titulo">ODONTOGRAMA</td>
    </tr>
    <tr>
        <td>
            <div>
                <img src="<?php echo base_url() ?>img/odontograma.jpg" height="380px" />
                <?php if (is_array($simbolos)) : ?>
                    <?php foreach ($simbolos as $s) : ?>
                        <img src="<?php echo base_url() ?>img/odontograma/<?php echo $rutas[$s["tipo"]] ?>"  height="20px" style="position: absolute; left: <?php echo $s["left"] - 10 ?>px; top: <?php echo $s["top"]+288 ?>px;" />
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </td>
        <td valing="top">
            <img src="<?php echo base_url() ?>img/odontograma/ausencia.gif" tipo="1" class="simbolo" height="20px" /> Ausencia de Diente<br />
            <img src="<?php echo base_url() ?>img/odontograma/caries.gif" tipo="2" class="simbolo" height="20px" /> Caries<br />
            <img src="<?php echo base_url() ?>img/odontograma/restauracion.gif" tipo="3" class="simbolo" height="20px" /> Restauraci&oacute;n<br />
            <img src="<?php echo base_url() ?>img/odontograma/extraccion.gif" tipo="4" class="simbolo" height="20px" /> Diente a extraer<br />
            <img src="<?php echo base_url() ?>img/odontograma/endodoncia.gif" tipo="5" class="simbolo" height="20px" /> Endodoncia<br />
            <img src="<?php echo base_url() ?>img/odontograma/protesis.gif" tipo="6" class="simbolo" height="20px" /> Prótesis fija<br />
            <img src="<?php echo base_url() ?>img/odontograma/dolorvertical.gif" tipo="7" class="simbolo" height="20px" /> Dolor a la percusión (Ver.)<br />
            <img src="<?php echo base_url() ?>img/odontograma/dolorhorisontal.gif" tipo="8" class="simbolo" height="20px" /> Dolor a la percusión (Hor.)<br />
            <img src="<?php echo base_url() ?>img/odontograma/movilidad.gif" tipo="9" class="simbolo" height="20px" /> Movilidad<br />
            <img src="<?php echo base_url() ?>img/odontograma/extrusion.gif" tipo="10" class="simbolo" height="20px" /> Extrusi&oacute;n<br />
        </td>
    </tr>
    <tr>
        <td colspan="2"><h3>Diagnostico General</h3></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $consulta['diagnostico'] ?></td>
    </tr>
    <tr>
        <td colspan="2"><h3>Plan De Tratamiento</h3></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $consulta['tratamiento'] ?></td>
    </tr>
    <tr>
        <td colspan="2"><h3>Seguimiento</h3></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $consulta['seguimiento'] ?></td>
    </tr>
</table>
