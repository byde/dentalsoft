<script>
$(function(){
    $("#formCuestionario").submit(function(e){
        e.preventDefault();
        $.ajax({
                  type: 'POST',
                  url: $("#formCuestionario").attr('action'),
                  data: $("#formCuestionario").serialize(),
                  success: function(){
                        $("#dia_cues").html("<div class=\"notification success\"> <span class=\"strong\">Cuestionario Guardado!</span> Se guardo el cuestionario con exito</div>");
                  }
            });
    });
});
</script>
<form id="formCuestionario" action="index.php/historial/guardar/<?php echo $idagenda ?>/<?php echo $paciente["idpaciente"] ?>">
<fieldset>
    <legend>SIGNOS VITALES</legend>
    <table>
        <tr>
            <td>Presi&oacute;n normal arterial</td>
            <td><input type="text" name="p1" class="small" size="10" /> mm/hg</td>
            <td>Pulso normal</td>
            <td><input type="text" name="p2" class="small" size="10" /> x'</td>
        </tr>
        <tr>
            <td>Respiraci&oacute;n normal</td>
            <td><input type="text" name="p3" class="small" size="10" /> x'</td>
            <td>Temperatura normal</td>
            <td><input type="text" name="p4" class="small" size="10" /> °C</td>
        </tr>
    </table>
</fieldset>
<fieldset>
    <legend>PREGUNTAS GENERALES</legend>
    <table>
        <tr>
            <td>Motivo de consulta</td>
            <td><input type="text" size="40" name="p5" class="large" /></td>
        </tr>
        <tr>
            <td>Padecimiento actual</td>
            <td><input type="text" name="p6" size="40" class="large" /></td>
        </tr>
        <tr>
            <td>&iquest;Est&aacute; tomando alg&uacute;n medicamento?</td>
            <td><input type="text" name="p7" size="40" class="large" /></td>
        </tr>
        <tr>
            <td>Antecedentes con anestecia loca</td>
            <td><input type="text" name="p8" size="40" class="large" /></td>
        </tr>
        <tr>
            <td>&iquest;Est&aacute; embarazada?</td>
            <td><input type="text" name="p9" size="40" class="large" /></td>
        </tr>
        <tr>
            <td>Alimentaci&oacute;n</td>
            <td><input type="text" name="p10" size="40" class="large" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td><label><input type="checkbox" name="p11" /> Propenso a emorragia</label></td>
                        <td><label><input type="checkbox" name="p12" /> Tabaquismo</label></td>
                        <td><label><input type="checkbox" name="p13" /> Alcoholismo</label></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</fieldset>
<fieldset>
    <legend>ANTECEDENTES PERSONALES PATOLOGICOS</legend>
    <table>
        <tr>
            <td>&iquest;Padeci&oacute; enfermedades t&iacute;picas de la ni&ntilde;ez?</td>
            <td><input type="text" name="p14" class="large" /></td>
        </tr>
        <tr>
            <td>&iquest;Ha padecido alguna enfermeddad grave?</td>
            <td><input type="text" name="p15" class="large" /></td>
        </tr>
        <tr>
            <td>&iquest;Es al&eacute;rgico a alg&uacute;n medicamento?</td>
            <td><input type="text" name="p16" class="large" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td><label><input type="checkbox" name="p17" /> Ha sido operado alguna vez</label></td>
                        <td><label><input type="checkbox" name="p18" /> Diabetes</label></td>
                        <td><label><input type="checkbox" name="p19" /> Hipertensi&oacute;n</label></td>
                        <td><label><input type="checkbox" name="p20" /> Hipotensi&oacute;n</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox" name="p21" /> C&aacute;ncer</label></td>
                        <td><label><input type="checkbox" name="p22" /> Enfermedades cardiacas</label></td>
                        <td><label><input type="checkbox" name="p23" /> Asma bronquial</label></td>
                        <td><label><input type="checkbox" name="p24" /> Tuberculosis</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox" name="p25" /> Al&eacute;rgias</label></td>
                        <td><label><input type="checkbox" name="p26" /> Artritis</label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</fieldset>
<fieldset>
    <legend>INTERROGATORIA DE APARATOS Y SISTEMAS</legend>
    <table>
        <tr>
            <td><strong>APARATO GASTROINTESTINAL</strong></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td><label><input type="checkbox" name="p27" /> Dolor</label></td>
                        <td><label><input type="checkbox" name="p28" /> Acidez</label></td>
                        <td><label><input type="checkbox" name="p29" /> N&aacute;useas</label></td>
                        <td><label><input type="checkbox" /> V&oacute;mito</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox" name="p30" /> Diarrea</label></td>
                        <td><label><input type="checkbox" name="p31" /> Epistaxis</label></td>
                        <td><label><input type="checkbox" name="p32" /> Constipaci&oacute;n</label></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>CARDIOVASCULAR</strong></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td><label><input type="checkbox" name="p33" /> Dolor precordial</label></td>
                        <td><label><input type="checkbox" name="p34" /> Inflamaci&oacute;n de pies</td>
                        <td><label><input type="checkbox" name="p35" /> Taquicardia</label></td>
                        <td><label><input type="checkbox" name="p36" /> Infarto</label></td>
                    </tr>
                    <tr>
                        <td><label><input type="checkbox" name="p37" /> Bradicardia</label></td>
                        <td><label><input type="checkbox" name="p38" /> Angina de pecho</label></td>
                        <td><label><input type="checkbox" name="p39" /> Cefalea</label></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>RESPIRATORIO</strong></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td><label><input type="checkbox" name="p40" /> Disnea</label></td>
                        <td><label><input type="checkbox" name="p41" /> Hem&oacute;ptisis</label></td>
                        <td><label><input type="checkbox" name="p42" /> Tos seca</label></td>
                        <td><label><input type="checkbox" name="p43" /> Tos produciva</label></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><strong>OBSERVACIONES</strong></td>
        </tr>
        <tr>
            <td><textarea cols="50" name="p44" rows="4"></textarea></td>
        </tr>
    </table>
</fieldset>
    <input type="submit" class="button medium green" value="Guardar Cuestionario" />
</form>