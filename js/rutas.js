// JavaScript Document
function popup (titulo, pagina) {
                        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=650, height=450, top=85, left=140";
                        window.open(pagina,titulo,opciones);
                    }

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
        width: 800,
        close: function(){
                $( this ).empty();
        }
    });
    //#d4e7f5
    $("#dia_reprogramar").dialog({
        autoOpen: false,
        height: 500,
        width: 1000
    });
    $("tr.zebra").live("mouseover mouseout", function(event) {
        if ( event.type == "mouseover" ) {
            $(this).addClass("zebraActiva");
        } else {
            $(this).removeClass("zebraActiva");
        }
    });
});