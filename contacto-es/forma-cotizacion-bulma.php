<?php

//$thumbnail=str_replace("/s160/","/s198/",$thumbnail);

//Include the database configuration file
include 'includes/dbConfig_borse_clientes.php';

$link = new mysqli($servername_operaciones, $username_operaciones, $password_operaciones, $dbname_operaciones);
$query = "SELECT MAX(id) AS LastID FROM borse_cotizaciones";
$result = $link->query($query);
$row = mysqli_fetch_array($result);
$last_id_cotizaciones = $row["LastID"];

//$result->close();
//$link->close();

$array_optimo = array("20X25", "20X30", "25X30", "25X35", "30X35");
$array_materiales = array("Papel Bond", "Papel Couché Brillante", "Papel Couché Mate", "Papel Bristol", "Papel Kraft Blanco", "Papel Kraft Natural", "Papel Kraft Blanco", "Pl&#225;stico Normal", "Pl&#225;stico Biodegradable", "Plastico 100% Reciclado", "Pl&#225;stico 70% Reciclado", "Pl&#225;stico 85% Reciclado", "Non Woven", "Poliester Delgado", "Poliester Grueso", "Algod&#243;n Natural", " Hilo Pet");
$array_tintas = array(1, 2, 3, 4, "Selección de Color");

$query = $link->query("SELECT * FROM sys_countries ORDER BY id ASC");
$rowCount = $query->num_rows;

/*
$bolsastipo=$_REQUEST["bolsastipo"];
$modelo_referencia=$_REQUEST["modelo_referencia"];
$medidas=$_REQUEST["medidas"];


$array_optimo=explode(",", $medidas);


$comercio=$_REQUEST["comercio"];



if (strlen($vk_giro)==0) {	
	$vk_giro=ucfirst($comercio);
	
	if ($vk_giro=="Departamental") $vk_giro="Tienda departamental";
	if ($vk_giro=="Zapateria") $vk_giro="Zapatería";
	if ($vk_giro=="Regalo") $vk_giro="Regalos";
}

if (count($array_optimo)>1){
	$sizes=implode(", ", $array_optimo);
}else{
	$sizes=$array_optimo[0];
}

/*
$cantidad_minima=$_REQUEST["cantidad_minima"];



 */
?>

<section class="seccion-forma">
    <div class="container">

        <form data-parsley-validate>

            <nav class="level">
                <div class="columns is-multiline">
                    <div class="column is-6">
                            <img src="/dev/images-es/logos/logotipo-borse.svg" title="BÖRSE" alt="Logotipo BÖRSE" width="200" height="auto">
                    </div>
                    <div class="column is-6">
                        <div class="tile is-ancestor">
                            <div class="tile is-vertical is-parent is-8">
                                <div class="tile is-child">
                                    <p class="quoteid">SOLICITUD DE COTIZACIÓN - ID: <?php echo $last_id_cotizaciones ?></p>
                                </div>
                                <div class="tile is-child">
                                    <p class="txt-block is-size-7">SU INFORMACION ES MUY IMPORTANTE PARA NOSOTROS,<br> LE PEDIMOS ATENTAMENTE QUE LLENE EL SIGUIENTE FORMULARIO.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>

            <hr class="style13">

            <nav class="level">
                <div class="columns is-multiline">

                    <hr class="style13">

                    <div class="column is-4"> <!-- Primera Columna -->

                        <!-- Thumbnaiil box -->
                        <figure class="image is-256x256 card">
                            <img src="<?php echo $thumbnail; ?>" class="thumbnail"/>
                            <input type="hidden" name="thumbnail" value="<?php echo $thumbnail; ?>"  />
                            <input type="hidden" name="data_title" value="<?php echo $data_title; ?>"  />
                        </figure>

                        <!-- Medidas Sugeridas -->

                        <div class="field add_padding_top">
                            <label for="medidas" class="label is-small"><i class="fa fa-asterisk"></i> MEDIDAS SUGERIDAS</label>
                            <div class="control">
                                <div class="select is-fullwidth is-small">
                                    <select name="vk_medidas" id="medidas" tabindex="1" required>
                                        <option value="">SELECCIONE</option>
                                        <?php
                                            for ($i=0;$i<count($array_optimo);$i++){
                                                echo '<option>' .$array_optimo[$i] . '</option>';
                                            }
                                            echo '<option>por definir</option>';
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).on('change','#medidas',function(){
                                var str = "";
                                $( "#medidas option:selected" ).each(function() {
                                    str += $( this ).text() + " ";
                                    str = $.trim(str);
                                });

                                if (str=="por definir"){
                                    $( "#ancho" ).val( "" );
                                    $( "#alto" ).val( "" );
                                    $( "#fondo" ).val( "" );
                                }else{
                                    $( "#ancho" ).val( f_ancho(str) );
                                    $( "#alto" ).val( f_alto(str) );
                                    $( "#fondo" ).val( f_base(str) );
                                }
                            });


                            function f_ancho(ancho_){
                                ancho__="";
                                cbase=ancho_.indexOf("+");
                                for (i=0;i<ancho_.length;i++){
                                    if (ancho_.slice(i,i+1)=="+") break;
                                    if (ancho_.slice(i,i+1)=="X") break;
                                    ancho__=ancho__ + ancho_.slice(i,i+1);
                                }
                                return(ancho__);
                            }

                            function f_alto(alto_){
                                alto__="";
                                cbase=alto_.indexOf("X")+1;

                                for (i=cbase;i<alto_.length;i++){
                                    alto__=alto__ + alto_.slice(i,i+1);
                                }
                                return(alto__);

                            }

                            function f_base(base_){
                                base__="";
                                cbase=base_.indexOf("+");

                                if (cbase >= 0){
                                    cbase=cbase+1;
                                    for (i=cbase;i<base_.length;i++){
                                        if (base_.slice(i,i+1)=="X") break;
                                        base__=base__ + base_.slice(i,i+1);
                                    }
                                    return(base__);
                                }else{
                                    return("N/A");
                                }
                            }
                        </script>

                        <div class="field is-grouped">

                            <div class="control">
                                <label for="ancho" class="label is-small"><i class="fa fa-asterisk"></i> ANCHO</label>
                                <div class="field is-small">
                                    <input id="ancho" name="vk_ancho" value="ancho" size="8" class="textInput" type="text" data-parsley-type-message="solo 2 dígitos" data-parsley-length="[2, 2]" data-parsley-type="digits" tabindex="4" required>
                                </div>
                            </div>

                            <div class="control has-icons-left">
                                <label for="alto" class="label is-small"><i class="fa fa-asterisk"></i> ALTO</label>
                                <div class="field is-small">
                                    <input id="alto" name="vk_alto" value="alto" size="8" class="textInput color_fix" type="text" data-parsley-type-message="solo 2 dígitos" data-parsley-length="[2, 2]" data-parsley-type="digits" tabindex="5" required>
                                </div>
                            </div>

                            <div class="control has-icons-left">
                                <label for="fondo" class="label is-small"><i class="fa fa-asterisk"></i> FONDO</label>
                                <div class="field is-small">
                                    <input id="fondo" name="vk_fondo" value="fondo" size="8" class="textInput color_fix" type="text" tabindex="6">
                                </div>
                            </div>
                        </div>

                        <div class="control">
                            <label for="cantidad" size="8" class="label is-small"><i class="fa fa-asterisk"></i> CANTIDAD</label>
                            <div class="field is-small">
                                <input class="input is-small" id="cantidad" name="vk_cantidad" type="number" value="5000" step="1000" data-parsley-min="5000" data-parsley-type="digits" data-parsley-type-message="Ingrese solo n&#250;meros" data-parsley-trigger="change" tabindex="12"/>
                                <!--<input id="cantidad" name="vk_cantidad" value="5000" type="text" data-parsley-min="2000" data-parsley-type="digits" required>-->
                            </div>
                        </div>

                        <div class="field">
                            <label for="material" class="label is-small" lang="es"><i class="fa fa-asterisk"></i> MATERIAL:</label>
                            <div class="control is-expanded">
                                <div class="select is-fullwidth is-small">
                                    <select name="vk_material" id="enviar-a" required="" tabindex="15">
                                        <option>SELECCIONE</option>
                                        <?php
                                            for ($i=0;$i<count($array_materiales);$i++){
                                                echo '<option>' .$array_materiales[$i] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped">

                            <div class="control">
                                <label for="tintas_frente" class="label is-small"><i class="fa fa-asterisk"></i> TINTAS FRENTE</label>
                                <div class="select is-small">
                                    <select name="vk_tintas_frente" id="tintas_frente" required="" tabindex="18">
                                        <option>SELECCIONE    </option>
                                        <?php
                                            for ($i=0;$i<count($array_tintas);$i++){
                                                echo '<option>' .$array_tintas[$i] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control">
                                <label for="tintas_vuelta" class="label is-small"><i class="fa fa-asterisk"></i> TINTAS VUELTA</label>
                                <div class="select is-small">
                                    <select name="vk_tintas_vuelta" id="tintas_vuelta" tabindex="19" required="">
                                        <option>SELECCIONE    </option>
                                        <?php
                                            for ($i=0;$i<count($array_tintas);$i++){
                                                echo '<option>' .$array_tintas[$i] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div> <!-- Primera Columna -->

                    <div class="column is-4"> <!-- Segunda Columna -->

                        <div class="control">
                            <label for="nombre_apellido is-small" class="label is-small"><i class="fa fa-asterisk"></i> NOMBRE Y APELLIDO</label>
                            <div class="field is-small">
                                <!-- <input type="text" name="vk_nombre" id="nombre" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" required />-->
                                <input class="input is-small" name="vk_nombre" id="nombre" type="text" placeholder="Nombre y Apellido" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" value="" data-parsley-minlength="3" data-parsley-trigger="change" tabindex="2" required>
                            </div>
                        </div>

                        <div class="field is-grouped">

                            <div class="control is-expanded">
                                <label for="pais" class="label is-small" lang="es"><i class="fa fa-asterisk"></i> PA&#205;S</label>
                                <div class="select is-fullwidth is-small">
                                    <select name="vk_pais" id="vk_pais" tabindex="7" required="">
                                        <?php
                                            // include ($_SERVER['DOCUMENT_ROOT']."/dev/contacto-es/includes/opcion_paises.php");
                                            if($rowCount > 0){
                                                while($row = $query->fetch_assoc()){
                                                    echo '<option value="'.$row['id'].'">'.$row['nicename'].'</option>';
                                                }
                                            }else{
                                                echo '<option value="">Pa&#237;s no disponible</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control">
                                <label for="cve" class="label is-small" style="white-space:nowrap;"><i class="fa fa-asterisk"></i> CLAVE</label>
                                <div class="field is-small">
                                    <input class="input is-small" id="vk_cve_internacional" size="8" name="vk_cve_internacional" value="52" type="text" tabindex="8" required>
                                </div>
                            </div>

                            <div class="control">
                                <label for="lada" class="label is-small" style="white-space:nowrap;"><i class="fa fa-asterisk"></i> LADA</label>
                                <div class="field is-small">
                                    <input class="input is-small" id="vk_lada" size="8" name="vk_lada" type="text" data-parsley-length="[2, 4]" data-parsley-type="digits" tabindex="9" required>
                                </div>
                            </div>

                        </div>

                        <div class="field">
                            <label for="empresa" class="label is-small"><i class="fa fa-asterisk"></i> NOMBRE DE SU EMPRESA</label>
                            <div class="control">
                                <div class="field is-small">
                                    <input class="input is-small" name="vk_empresa" type="text" placeholder="Nombre de su Empresa" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" value="" data-parsley-minlength="3" data-parsley-trigger="change" tabindex="13" required>
                                    <!--<input type="text" name="vk_empresa" value="" id="empresa" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i"data-parsley-minlength="3" required />-->
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="giro" class="label required is-small"><i class="fa fa-asterisk"></i>¿CUAL ES EL GIRO DE SU NEGOCIO?</label>
                            <div class="control is-expanded is-small">
                                <div class="select is-fullwidth is-small">
                                    <select name="vk_giro" id="giro" tabindex="16" required>
                                        <option value="">SELECCIONE </option>
                                        <option value="Boutique">Boutique</option>
                                        <option value="Tienda departamental">Tienda departamental</option>
                                        <option value="Zapatería">Zapatería</option>
                                        <option value="Tienda de ropa">Tienda de ropa</option>
                                        <option value="Joyería">Joyería</option>
                                        <option value="Regalos">Regalos</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="comentario" class="label is-small"> OBSERVACIONES</label>
                            <textarea class="textarea is-small" style="resize:none" id="comentario" name="vk_comentarios" placeholder="Ingrese sus comentarios" rows="15" tabindex="20"></textarea>
                        </div>

                    </div>  <!-- Segunda Columna -->

                    <div class="column is-4"> <!-- Tercera Columna -->

                        <div class="control">
                            <label for="email" class="label is-small"><i class="fa fa-asterisk"></i> CORREO ELECTRÓNICO</label>
                            <div class="field is-small">
                                <input class="input is-small" type="email" id="email" name="vk_email" placeholder="Ingrese su direcci&#243;n de correo" data-parsley-trigger="change" tabindex="3" required />
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <label for="telefono" class="label is-small"><i class="fa fa-asterisk"></i> TEL&#201;FONO</label>
                                <div class="field is-fullwidth">
                                    <input class="input is-small" id="telefono" name="vk_telefono" type="number" value="" data-parsley-minlength="7" data-parsley-maxlength="8" data-parsley-type="digits" data-parsley-type-message="Ingrese solo n&#250;meros" data-parsley-trigger="change" tabindex="10" required />
                                </div>
                            </div>

                            <div class="control">
                                <label for="ext" class="label is-small">EXTENSI&#211;N</label>
                                <div class="field">
                                    <input class="input is-small" id="ext" name="vk_ext" type="number" value="" data-parsley-type="digits" data-parsley-type-message="Ingrese solo n&#250;meros" data-parsley-trigger="change" tabindex="11" />
                                </div>
                            </div>

                        </div>

                        <div class="field">
                            <label for="como_se_entero" class="label is-small" lang="es">&#191;C&#211;MO SE ENTER&#211; DE B&#214;RSE?<sup>&#174;</sup>?</label>
                            <div class="control">
                                <div class="select is-fullwidth is-small">
                                    <select name="vk_como_se_entero" id="como_se_entero" tabindex="14">
                                        <option value="Google">Google</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Expos">Expos</option>
                                        <option value="Por recomendación">Por recomendación</option>
                                        <option value="Portal Cosmos">Portal Cosmos</option>
                                        <option value="Otros sitios">Otros Páginas de Internet</option>
                                        <option value="Otro">Otros</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="control">
                            <label for="sucursales" class="label is-small"><i class="fa fa-asterisk"></i> No. DE SUCURSALES</label>
                            <div class="field">
                                <input class="input is-small" id="sucursales" name="vk_sucursales" type="number" data-parsley-type="digits" data-parsley-type-message="Ingrese solo n&#250;meros" data-parsley-trigger="change" tabindex="17" />
                            </div>
                        </div>

                        <script>
                            $("#vk_pais").change(function(){
                                var countryID = $('#vk_pais').val();
                                if(countryID){
                                    $.ajax({
                                        type:'POST',
                                        url:'includes/ajaxData.php',
                                        data: {"country_id": countryID},
                                        success: function(result) {
                                            $("#vk_cve_internacional").val(result);
                                        },
                                        error: function(jqxhr, status, exception) {
                                            alert('Exception:', exception);
                                        }
                                    })
                                }

                                var pais_=$("#vk_pais option:selected").text();
                                $("#vk_pais_texto").val(pais_);
                            });
                        </script>

                        <input type="hidden" name="vk_pais_texto" id="vk_pais_texto" value="Mexico"  />
                        <input type="hidden" name="ciudad" id="ciudad"/>
                        <input type="hidden" name="estado" id="estado"/>
                        <input type="hidden" name="cotizacion_accion" value="enviar_cotizacion"  />

                        <br>

                        <div class="field is-grouped is-grouped-left is-small">
                            <input class="is-checkradio has-background-color is-danger is-small" id="exampleCheckboxBackgroundColorInfo" name="autorizo" data-parsley-mincheck="1" type="checkbox" tabindex="21" checked required="">
                            <label class="label is-small" for="exampleCheckboxBackgroundColorInfo">AUTORIZO A BÖRSE A CONTACTARME</label>
                        </div>

                        <div class="field is-grouped is-grouped-left is-small">
                            <input id="switchColorDanger" class="is-checkradio has-background-color is-danger is-small" name="datos_correctos" data-parsley-mincheck="1" type="checkbox" tabindex="22" checked required="">
                            <label class="label is-small" for="switchColorDanger">MIS DATOS SON CORRECTOS</label>
                        </div>

                        <div class="field is-grouped is-grouped-right">
                            <div class="control" type="submit" value="validate">
                                <button class="button has-background-color is-danger" id="boton_enviar" name="boton_enviar" tabindex="23">Enviar</button>
                            </div>
                        </div>

                    </div>  <!-- Tercera Columna -->
                </div>
            </nav>

            <hr class="style13">

        </form>

        <div class="columns">
            <div class="column is-6">
                <i style="background-image: url(http://www.borse.com.mx/dev/images-es/interface/ico-info.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em;">SUS DATOS SON CONFIDENCIALES</span>
            </div>
            <div class="column is-6">
                <i style="background-image: url(http://www.borse.com.mx/dev/images-es/interface/ico-lock.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em"><a href="http://www.borse.com.mx//aviso-de-privacidad" style="color:#404040;text-decoration: none;" target="_blank" tabindex="24">NUESTRO AVISO DE PRIVACIDAD</a></span>
            </div>
        </div>

    </div>

</section>

<!-- === START OF JAVASCRIPT === -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#vk_lada').on('change',function(){
            var ladaID = $(this).val();
            var countryID = $('#vk_pais').val();
            if(ladaID && countryID){
                $.ajax({
                    type:'POST',
                    url:'includes/ajaxData.php',
                    data: {"lada_id": ladaID, "country_id": countryID},
                    success: function(result) {
                        $('#estado').val(result);
                    },
                    error: function(jqxhr, status, exception) {
                        alert('Exception:', exception);
                    }
                })
            }
            $("#boton_enviar").click(function () {
                setTimeout(function () { disableButton(); }, 0);
            });

            function disableButton() {
                $("#boton_enviar").prop('disabled', true);
            }
        });
    });
</script>


<script type="text/javascript">
$.listen('parsley:form:validated', function(e){
    if (e.validationResult) {
        // Unobtrusive javascript to disable the submit event on the form after it has already been submitted.
        $("form").submit(function () {
            if ($(this).valid()) {
                $(this).submit(function () {
                    return false;
                });
                return true;
            }
            else {
                return false;
            }
        });
    }
});
</script>