// JavaScript Document

$(function() {
	$("a.load").click(function (e) {
		e.preventDefault();
		$("li.current").removeClass("current");
		$("li.m"+$(this).attr('rel')).addClass("current");
		$("#contenedor").load($(this).attr("href"));
	});

    $("a.btn_ficha").live('click', function(e) {
        e.preventDefault();
        $("#dia_ficha").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_ficha").load($(this).attr("href"), {});
        $("#dia_ficha").dialog("open");
    });

    $("#dia_ficha").dialog({
        autoOpen: false,
        modal: true,
        height: 530,
        width: 800
    });
});