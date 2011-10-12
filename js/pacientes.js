$(function(){
    $("a.paginacion").click(function(e){
        e.preventDefault();
        $("#contenedor").load($(this).attr("href"));
    });
    $("#btn_nvo").click(function (e){
        e.preventDefault();
        $("#dia_nuevo").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#dia_nuevo").load($(this).attr("href"));
        $("#dia_nuevo").dialog("open");
    });
    $("a.btn_com").live('click', function(e) {
        e.preventDefault();
        $("#comentarios").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#comentarios").load($(this).attr("href"), {});
        $("#comentarios").dialog("open");
    });
    $( "#dia_nuevo" ).dialog({
        autoOpen: false,
        height: 430,
        width: 730,
        modal: true,
        buttons: {
            "Registrar": function() {
                $("#formNuevo").submit();
                $( this ).dialog( "close" );
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        }
    });
    $( "#comentarios" ).dialog({
        autoOpen: false,
        height: 230,
        width: 500
    });
});