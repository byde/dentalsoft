// JavaScript Document
$(function() {
	$("#lista_usuarios").click(function (e) {
		e.preventDefault();
		$("#contenedor").load("index.php/panel/usuarios");
	});
	$("#lista_consultorios").click(function (e) {
		e.preventDefault();
		$("#contenedor").load("index.php/panel/consultorios");
	});
	$("#lista_tratamientos").click(function (e) {
		e.preventDefault();
		$("#contenedor").load("index.php/panel/tratamientos");
	});
});