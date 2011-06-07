$(function(){
    $("a.paginacion").click(function(e){
        e.preventDefault();
        $("#contenedor").load($(this).attr("href"));
    });
    $("#btn_nvo").click(function (e){
        e.preventDefault();
        $("#nuevo").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#nuevo").load($(this).attr("href"));
        $("#nuevo").dialog("open");
    });
    $("a.btn_com").live('click', function(e) {
        e.preventDefault();
        $("#comentarios").html($("<img />").attr("src", "img/ajax-loader.gif"));
        $("#comentarios").load($(this).attr("href"), {});
        $("#comentarios").dialog("open");
    });
    $( "#nuevo" ).dialog({
        autoOpen: false,
        height: 430,
        width: 730,
        modal: true,
        buttons: {
            "Registrar": function() {
                $("#modificar").submit();
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