<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ingresar al Sistema</title>
<style type="text/css">@import url("css/base.css");</style>
<style type="text/css">@import url("css/grid.css");</style>
<style type="text/css">@import url("css/extensions.css");</style>
<link href='css/themes/blue.css' rel='stylesheet' type='text/css' />
  <script type="text/javascript" language="javascript" src="js/jquery-1.4.4.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/login.js"></script>
</head>

<body>
<div id="page">
	<div class="container_12">
    	<div class="grid_7">
        <div class="box-header"> Ingrese sus datos</div>
        <!-- FORMS - TAB 1 -->
        <div id="forms-tab1" class="box">
              <div class="notification error"  id="mensaje"> <span class="strong">ERROR!</span> Los datos no coinciden. </div>
              <div class="notification warning" id="mensaje2"> <span class="strong">ERROR!</span> A superado los intentos permitidos, pongase en contacto con el administrador. </div>
              <div class="notification info" id="mensaje1"> <span class="strong">COMPROBANDO DATOS</span> Sus datos se estan comprobando. </div>
          <form method="post" action="#" id="ingresarForm">
            <div class="row">
              <label>Usuario:</label>
              <input size="35" title="usuarios" id="user" name="username" type="text">
            </div>
            <div class="row">
              <label>Contrase&ntilde;a:</label>
              <input size="25" title="Password" id="pass" name="pass" type="password">
            </div>
            <div class="row" style="text-align:right;">
              <input value="Ingresar" class="button medium blue" type="submit">
            </div>
          </form>
        </div>
        </div>
	</div>
</div>
</body>
</html>