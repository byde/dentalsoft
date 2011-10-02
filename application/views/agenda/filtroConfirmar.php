<script>
$(function(){
    $("#resultado").load("index.php/agenda/confirma/1");
    $("#opt_dias").change(function(){
        $("#resultado").load("index.php/agenda/confirma/" + $(this).val());
    });
    $("a.btn_confirma").live('click', function(e){
        e.preventDefault();
        if(confirm('Esta seguro que desea confirmar esta cita?')){
            $("#resultado").load($(this).attr("href"));
        }
    });
});
</script>
<div class="grid_12">
    <div class="box-header">Citas por Confirmar</div>
    <div class="box">
        <div><select id="opt_dias">
                <option value="1">1</option>
                <option value="3">3</option>
                <option value="5">5</option>
            </select> dias antes de la cita</div>
        <hr />
    <div class="table" id="resultado">
    </div>
    </div>
</div>