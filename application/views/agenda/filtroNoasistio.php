<script>
    $(function(){
        $("#resultado").load("index.php/agenda/listanoasistio");
        $("a.btn_cancelar").live('click', function(e){
            e.preventDefault();
            if(confirm('Esta seguro que desea cancelar esta cita?')){
                $("#resultado").load($(this).attr("href"));
            }
        });
        
        $("a.btn_reprogramar").live("click",function(e){
            e.preventDefault();
            $("#dia_reprogramar").html($("<img />").attr("src", "img/ajax-loader.gif"));
            $("#dia_reprogramar").load($(this).attr("href"));
            $("#dia_reprogramar").dialog("open");
        });
    
    });
</script>
<div class="grid_12">
    <div class="box-header">Citas por Confirmar</div>
    <div class="box">
        <hr />
        <div class="table" id="resultado">
        </div>
    </div>
</div>