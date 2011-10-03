<style>
    body{
     color: #4B7792;
     font-family: Arial;
    }
    .titulo{
        font-weight: bold;
        color: white;
        background-color: #4898D5;
    }
</style>
<table width="800px">
    <tr>
        <td width="200px">
            <img src="<?php echo base_url() ?>img/logo.png" height="150px" />
        </td>
        <td align="right">
            <span style="letter-spacing: 7px; color: #3287CA; font-size: 30px; font-family: Impact, Charcoal, sans-serif;">HISTORIA CLINICA DENTAL</span>
        </td>
    </tr>
</table>
<table width="800px">
    <tr>
        <td width="500px">
            Dr. <?php echo $dr; ?>
        </td>
        <td align="right">
            Fecha: <?php echo $cuestionario['dia']; ?> /  <?php echo $meses[$cuestionario['mes']]; ?> /  <?php echo $cuestionario['anio']; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
</table>
<table width="800px">
        <tr>
            <td colspan="4" class="titulo">SIGNOS VITALES</td>
        </tr>
        <tr>
            <td>Presi&oacute;n normal arterial</td>
            <td width="100px"><?php echo $cuestionario["p1"] ?> mm/hg</td>
            <td>Pulso normal</td>
            <td width="100px"><?php echo $cuestionario["p2"] ?> x'</td>
        </tr>
        <tr>
            <td>Respiraci&oacute;n normal</td>
            <td><?php echo $cuestionario["p3"] ?> x'</td>
            <td>Temperatura normal</td>
            <td><?php echo $cuestionario["p4"] ?> &deg;C</td>
        </tr>
    <tr>
        <td colspan="4"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
    </table>
<table width="800px">
        <tr>
            <td colspan="4" class="titulo">PREGUNTAS GENERALES</td>
        </tr>
        <tr>
            <td width="300px">Motivo de consulta</td>
            <td><?php echo $cuestionario["p5"] ?></td>
        </tr>
        <tr>
            <td>Padecimiento actual</td>
            <td><?php echo $cuestionario["p6"] ?></td>
        </tr>
        <tr>
            <td>&iquest;Est&aacute; tomando alg&uacute;n medicamento?</td>
            <td><?php echo $cuestionario["p7"] ?></td>
        </tr>
        <tr>
            <td>Antecedentes con anestecia local</td>
            <td><?php echo $cuestionario["p8"] ?></td>
        </tr>
        <tr>
            <td>&iquest;Est&aacute; embarazada?</td>
            <td><?php echo $cuestionario["p9"] ?></td>
        </tr>
        <tr>
            <td>Alimentaci&oacute;n</td>
            <td><?php echo $cuestionario["p10"] ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td width="260px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p11"] == 1)?"":"un"; ?>checked.png" width="16px" /> Propenso a emorragia</td>
                        <td width="260px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p12"] == 1)?"":"un"; ?>checked.png" width="16px" /> Tabaquismo</td>
                        <td width="260px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p13"] == 1)?"":"un"; ?>checked.png" width="16px" /> Alcoholismo</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tr>
        <td colspan="2"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
    </table>
<table width="800px">
        <tr>
            <td colspan="4" class="titulo">ANTECEDENTES PERSONALES PATOLOGICOS</td>
        </tr>
        <tr>
            <td width="350px">&iquest;Padeci&oacute; enfermedades t&iacute;picas de la ni&ntilde;ez?</td>
            <td><?php echo $cuestionario["p14"] ?></td>
        </tr>
        <tr>
            <td>&iquest;Ha padecido alguna enfermeddad grave?</td>
            <td><?php echo $cuestionario["p15"] ?></td>
        </tr>
        <tr>
            <td>&iquest;Es al&eacute;rgico a alg&uacute;n medicamento?</td>
            <td><?php echo $cuestionario["p16"] ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td width="250px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p17"] == 1)?"":"un"; ?>checked.png" width="16px" /> Ha sido operado alguna ves</td>
                        <td width="240px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p18"] == 1)?"":"un"; ?>checked.png" width="16px" /> Diabetes</td>
                        <td width="170px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p19"] == 1)?"":"un"; ?>checked.png" width="16px" /> Hipertensi&oacute;n</td>
                        <td width="140px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p20"] == 1)?"":"un"; ?>checked.png" width="16px" /> Hipotensi&oacute;n</td>
                    </tr>
                    <tr>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p21"] == 1)?"":"un"; ?>checked.png" width="16px" /> C&aacute;ncer</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p22"] == 1)?"":"un"; ?>checked.png" width="16px" /> Enfermedades cardiacas</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p23"] == 1)?"":"un"; ?>checked.png" width="16px" /> Asma bronquial</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p24"] == 1)?"":"un"; ?>checked.png" width="16px" /> Tuberculosis</td>
                    </tr>
                    <tr>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p25"] == 1)?"":"un"; ?>checked.png" width="16px" /> Al&eacute;rgias</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p26"] == 1)?"":"un"; ?>checked.png" width="16px" /> Artritis</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tr>
        <td colspan="2"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
    </table>

<table width="800px">
        <tr>
            <td colspan="4" class="titulo">INTERROGATORIA DE APARATOS Y SISTEMAS</td>
        </tr>
    <tr>
        <td colspan="4"><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
        <tr>
            <td><strong>APARATO GASTROINTESTINAL</strong></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p27"] == 1)?"":"un"; ?>checked.png" width="16px" /> Dolor</td>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p28"] == 1)?"":"un"; ?>checked.png" width="16px" /> Acidez</td>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p29"] == 1)?"":"un"; ?>checked.png" width="16px" /> N&aacute;useas</td>
                        <td width="140px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p30"] == 1)?"":"un"; ?>checked.png" width="16px" /> V&oacute;mito</td>
                    </tr>
                    <tr>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p31"] == 1)?"":"un"; ?>checked.png" width="16px" /> Diarrea</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p32"] == 1)?"":"un"; ?>checked.png" width="16px" /> Epistaxis</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p33"] == 1)?"":"un"; ?>checked.png" width="16px" /> Constipaci&oacute;n</td>
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
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p34"] == 1)?"":"un"; ?>checked.png" width="16px" /> Dolor precordial</td>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p35"] == 1)?"":"un"; ?>checked.png" width="16px" /> Inflamaci&oacute;n de pies</td>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p36"] == 1)?"":"un"; ?>checked.png" width="16px" /> Taquicardia</td>
                        <td width="140px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p37"] == 1)?"":"un"; ?>checked.png" width="16px" /> Infarto</td>
                    </tr>
                    <tr>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p38"] == 1)?"":"un"; ?>checked.png" width="16px" /> Bradicardia</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p39"] == 1)?"":"un"; ?>checked.png" width="16px" /> Angina de pecho</td>
                        <td><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p40"] == 1)?"":"un"; ?>checked.png" width="16px" /> Cefalea</td>
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
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p41"] == 1)?"":"un"; ?>checked.png" width="16px" /> Disnea</td>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p42"] == 1)?"":"un"; ?>checked.png" width="16px" /> Hem&oacute;ptisis</td>
                        <td width="220px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p43"] == 1)?"":"un"; ?>checked.png" width="16px" /> Tos seca</td>
                        <td width="140px"><img src="<?php echo base_url() ?>img/<?php echo ($cuestionario["p44"] == 1)?"":"un"; ?>checked.png" width="16px" /> Tos produciva</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tr>
        <td><img src="<?php echo base_url() ?>img/space.gif" height="5px" /></td>
    </tr>
        <tr>
            <td><strong>OBSERVACIONES</strong></td>
        </tr>
        <tr>
            <td><?php echo $cuestionario["p45"] ?></td>
        </tr>
    </table>