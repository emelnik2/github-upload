<?php

//Include the database configuration file
include 'includes/dbConfig_borse_clientes.php';

$query = "SELECT MAX(id) AS LastID FROM borse_contactos";
$result = $link->query($query);
$row = mysqli_fetch_array($result);
$last_id_contactos = $row["LastID"];

//$result->close();
//link->close();

$query = $link->query("SELECT * FROM sys_countries ORDER BY id ASC");
$rowCount = $query->num_rows;
?>

<section class="seccion-forma">
    <div class="container">
        <form id="data_form" action="#" data-parsley-validate="">
            <div class="columns">
                <div class="column is-6">
                    <img src="/dev/images-es/logos/logotipo-borse.svg" title="BÖRSE" alt="Logotipo BÖRSE" width="200" height="auto">
                </div>
                <div class="column is-6">
                    <div class="tile is-ancestor">
                        <div class="tile is-vertical is-parent is-8">
                            <div class="tile is-child">
                                <p class="contactid">SOLICITUD DE CONTACTO - ID: <?php echo $last_id_contactos ?></p>
                            </div>
                            <div class="tile is-child">
                                <p class="txt-block is-size-7">SU INFORMACION ES MUY IMPORTANTE PARA NOSOTROS,<br> LE PEDIMOS ATENTAMENTE QUE LLENE EL SIGUIENTE FORMULARIO.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="style13">

            <div class="columns">
                <div class="column is-6">

                    <div class="field">
                        <label for="nombre" class="requerido">NOMBRE Y APELLIDO</label>
                        <div class="control">
                            <input class="input" name="vk_nombre" id="vk_nombre" type="text" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" value="" data-parsley-minlength="3" data-parsley-trigger="change" tabindex="1" required>
                            <!--<input type="text" name="vk_nombre" id="nombre" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />-->
                        </div>
                    </div>

                    <div class="field is-grouped ">

                        <div class="control is-expanded">
                            <label for="pais" class="requerido">PA&#205;S</label>
                            <div class="select is-fullwidth">
                                <select name="vk_pais" id="vk_pais" tabindex="3">
                                    <option value="52" selected="selected">Seleccionar...</option>
                                    <?php
                                        //include ($_SERVER['DOCUMENT_ROOT']."/dev/contacto-es/includes/opcion_paises.php");
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

                        <div class="control is-expanded">
                            <label for="cve" style="white-space:nowrap;">CLAVE</label>
                            <div class="field">
                                <input class="input" name="vk_cve_internacional" id="vk_cve_internacional" type="number" value="52" size="8" tabindex="4">
                            </div>
                        </div>

                        <div class="control is-expanded">
                            <label for="lada" class="requerido">LADA</label>
                            <div class="field">
                                <input class="input" name="vk_lada" id="vk_lada" type="number" value="" size="8" data-parsley-length="[2, 4]" data-parsley-type="digits" data-parsley-trigger="change" data-parsley-required-message="Requerido" tabindex="5" required>
                            </div>
                        </div>

                    </div>


                    <div class="field">
                        <label for="empresa" class="requerido">NOMBRE DE SU EMPRESA</label>
                        <div class="control has-icons-left">
                            <input class="input" name="vk_empresa" type="text" placeholder="Nombre de su Empresa" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" value="" data-parsley-minlength="3" data-parsley-trigger="change" tabindex="8">
                            <!--<input type="text" name="vk_empresa" value="" id="empresa"  data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />-->
                            <span class="icon is-left">
                                  <i class="fa fa-bank"></i>
                                </span>
                        </div>
                    </div>

                    <div class="field">
                        <label for="giro" class="requerido">&#191; CU&#193;L ES EL GIRO DE SU NEGOCIO ?</label>
                        <div class="control is-expanded has-icons-left">
                            <div class="select is-fullwidth">
                                <select name="vk_giro" id="vk_giro" tabindex="10" required>
                                    <option value="">&nbsp;</option>
                                    <option value="Boutique">Boutique</option>
                                    <option value="Tienda departamental">Tienda departamental</option>
                                    <option value="Zapatería">Zapatería</option>
                                    <option value="Tienda de ropa">Tienda de ropa</option>
                                    <option value="Joyería">Joyería</option>
                                    <option value="Regalos">Regalos</option>
                                    <option value="Otros">Otros</option>
                                </select>
                                <span class="icon is-left">
                                        <i class="fa fa-question"></i>
                                    </span>
                            </div>
                        </div>
                    </div>


                    <label for="comentario" class="hyphenate" lang="es"> OBSERVACIONES</label>
                    <div class="field">
                        <textarea class="textarea" name="vk_comentarios" rows="5" cols="25" placeholder="Ingrese sus comentarios" tabindex="12"></textarea>
                    </div>


                </div>

                <div class="column is-6">



                    <div class="field">
                        <label for="email" class="requerido">CORREO ELECTR&#211;NICO</label>
                        <div class="control has-icons-left">
                            <input class="input" type="email" name="vk_email" placeholder="Ingrese su direcci&#243;n de correo" tabindex="2">
                            <!--<input type="email" name="vk_email" id="email" value=""  data-parsley-trigger="change" required />-->
                            <span class="icon is-small is-left">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>


                    <div class="field is-grouped">

                        <div class="control is-expanded">
                            <label for="telefono" class="requerido">TEL&#201;FONO</label>
                            <div class="field is-fullwidth">
                                <input class="input" id="vk_telefono" name="vk_telefono" type="number" value="" data-parsley-minlength="7" data-parsley-maxlength="8" data-parsley-type="digits" data-parsley-type-message="Ingrese solo n&#250;meros" data-parsley-trigger="change" tabindex="6" required />
                            </div>
                        </div>

                        <div class="control">
                            <label for="ext">EXTENSI&#211;N</label>
                            <div class="field">
                                <input class="input" id="ext" name="vk_ext" type="number" value="" data-parsley-type="digits" data-parsley-type-message="Ingrese solo n&#250;meros" data-parsley-trigger="change" tabindex="7" />
                            </div>
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


                    <div class="field" class="add_padding_bottom">
                        <label for="como_se_entero" class="requerido">¿ C&#211;MO SE ENTER&#211; DE B&#214;RSE<sup>&#174;</sup> ?</label>
                        <div class="control has-icons-left">
                            <div class="select is-fullwidth">
                                <select name="vk_como_se_entero" id="como_se_entero" data-parsley-trigger="change" required="" tabindex="9">
                                    <option value="Google">Google</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Expos">Expos</option>
                                    <option value="Por recomendación">Por recomendación</option>
                                    <option value="Portal Cosmos">Portal Cosmos</option>
                                    <option value="Otros sitios">Otros Páginas de Internet</option>
                                    <option value="Otro">Otros</option>
                                </select>
                                <span class="icon is-left">
                                        <i class="fa fa-question"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label for="enviar_a" class="hyphenate" lang="es">ENVIAR ESTA INFORMACIÓN A:</label>
                        <div class="control is-expanded has-icons-left">
                                <div class="select is-fullwidth">
                                    <select name="vk_enviar_a" id="enviar_a" tabindex="11">
                                        <option value="Ventas">Ventas</option>
                                        <option value="Compras">Compras</option>
                                        <option value="Recursos Humanos">Recursos Humanos</option>
                                        <option value="Atención a clientes">Atención a clientes</option>
                                        <option value="Dirección">Dirección</option>
                                    </select>
                                    <span class="icon is-left">
                                            <i class="fa fa-question"></i>
                                        </span>
                                </div>
                            </div>
                    </div>

                    <div class="field is-grouped is-grouped-left is-small">
                        <input id="switchColorDanger" class="is-checkradio has-background-color is-danger is-small" name="vk_datos_correctos" data-parsley-mincheck="1" type="checkbox" checked tabindex="13" required="">
                        <label class="label is-small" for="switchColorDanger">MIS DATOS SON CORRECTOS</label>
                    </div>

                    <div class="field is-grouped is-grouped-left is-small">
                        <input class="is-checkradio has-background-color is-danger is-small" id="exampleCheckboxBackgroundColorInfo" name="vk_autorizo" data-parsley-mincheck="1" type="checkbox" checked tabindex="14" required="">
                        <label class="label is-small" for="exampleCheckboxBackgroundColorInfo">AUTORIZO AL PERSONAL A BÖRSE A CONTACTARME</label>
                    </div>

                    <input type="hidden" name="vk_pais_texto" id="vk_pais_texto" value="Mexico"  />
                    <input type="hidden" name="contact_accion" value="enviar_contacto"  />
                    <input type="hidden" name="ciudad" id="ciudad"/>
                    <input type="hidden" name="estado" id="estado"/>


                    <div class="field is-grouped is-grouped-right">
                        <div class="control" type="submit" value="validate">
                            <button class="button has-background-color is-danger" id="boton_enviar" name="boton_enviar" tabindex="15">Enviar</button>
                        </div>
                    </div>


                    <!--<div class="field is-grouped is-grouped-right">
                        <div class="control" type="submit" value="validate">
                            <button class="control bttn-fill bttn-sm bttn-primary bttn-no-outline">
                                <div class="icon is-size-4" style="">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <span class="is-size-7">ENVIAR</span><br/>
                                CONTACTO</button>
                        </div>
                    </div>-->

                </div>

            </div>
            <hr class="style13">
        </form>

        <div class="columns">
            <div class="column is-6">
                <i style="background-image: url(http://www.borse.com.mx/dev/images-es/interface/ico-info.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em;">SUS DATOS SON CONFIDENCIALES</span>
            </div>
            <div class="column is-6">
                <i style="background-image: url(http://www.borse.com.mx/dev/images-es/interface/ico-lock.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em"><a href="http://www.borse.com.mx//aviso-de-privacidad" style="color:#404040;text-decoration: none;" target="_blank" tabindex="16">NUESTRO AVISO DE PRIVACIDAD</a></span>
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
    })
    document.addEventListener('DOMContentLoaded', function () {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any nav burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
<!-- Parsley -->
<script type="text/javascript">
    $(function () {
        $('#forma-de-contacto').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function() {
                return true; // False if you Don't want to submit the form
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

