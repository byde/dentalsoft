<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DentalSoft</title>
	<style type="text/css">@import url("css/base.css");</style>
    <style type="text/css">@import url("css/grid.css");</style>
    <style type="text/css">@import url("css/extensions.css");</style>
    <link href='css/themes/blue.css' rel='stylesheet' type='text/css' />
    <link href='css/black-tie/jquery-ui-1.8.10.custom.css' rel='stylesheet' type='text/css' />
    <script src="js/jquery-1.4.4.min.js"></script>
    <script src="js/jquery-ui-1.8.10.custom.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/rutas.js"></script>
</head>

<body> 
<div id="header">
    <!-- LOGO --> 
    <h1>Art Dental</h1> 
    <!-- LOGO END --> 
  </div>
        <ul id="nav">
        <?php $first = 0;
		foreach($menus as $menu): ?>
          <li class="m<?php echo $menu['rel']; ?>"><a href="<?php echo $menu['ruta']; ?>" rel="<?php echo $menu['rel']; ?>" class="load"><?php echo $menu['menu']; ?></a></li>
          <?php $first++;
		  endforeach; ?>
          <li><a href="index.php/log/out">Salir</a></li>
        </ul>
<div id="page">
	<div id="contenedor" class="container_12">
    </div>
</div>
    <div id="dia_programar" title="Programar Cita"></div>
    <div id="dia_reprogramar" title="Reprogramar Cita"></div>
    <div id="dia_ficha" title="Ficha M&eacute;dica del Paciente"></div>
</body>
</html>