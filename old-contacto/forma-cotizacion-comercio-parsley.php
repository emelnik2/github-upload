<?

$thumbnail=$_REQUEST["thumbnail"];
$thumbnail=str_replace("/s160/","/s198/",$thumbnail);

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

/*
if (count($array_optimo)>1){
	$sizes=implode(", ", $array_optimo);
}else{
	$sizes=$array_optimo[0];
}
*/

$cantidad_minima=$_REQUEST["cantidad_minima"];



 
?>
<div class="row" style="background-color:white">
	<form data-parsley-validate>	
		<div class="medium-12 columns" style="">
			<div class="medium-6 columns" style="background-color: white; padding-top: .5em; height: auto;">
				<div style="width: 15em; height: 7em;">
					<object data="/images/responsive-01/borse-logo.svg" type="image/svg+xml" style="width: 100%;height: auto;"></object>					
				</div>
			</div>
			<div class="medium-6 columns" style="min-height:6em;font-size:1em;float:left;margin-bottom:1em;padding-top:2em;text-align:right;font-size: .8em;">	
				<span style="font-weight:600; font-size: 1.1em;">SU INFORMACIÓN ES MUY IMPORTANTE</span><br/>
				POR FAVOR LLENE CORRECTAMENTE <span style="white-space:nowrap;">LOS SIGUIENTES DATOS</span><br/>
				VERIFIQUE QUE SUS <span style="white-space:nowrap;">DATOS SON CORRECTOS</span>
			</div>	
		</div>	
		<div class="medium-12 columns" style="">
			<div class="medium-4 columns">
				<label for="nombre" class=""><i class="fa fa-asterisk"></i> NOMBRE</label>
				<input type="text" name="vk_nombre" id="nombre" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" required />
			</div>
			<div class="medium-4 columns">
				<label for="apellidos" class=""><i class="fa fa-asterisk"></i> APELLIDO(S)</label>
				<input type="text" name="vk_apellidos" id="apellidos" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i"data-parsley-minlength="3" required />
			</div>
			<div class="medium-4 columns">
				<label for="email" class=""><i class="fa fa-asterisk"></i> CORREO ELECTRÓNICO</label>
				<input type="email" name="vk_email" value="<? echo $vk_email; ?>" id="email" data-parsley-trigger="change" required />				
			</div>				
			<div class="medium-12 columns" style="padding:0">
				<div class="small-12 medium-6 columns">
					<label for="pais" class="hyphenate" lang="es">PAIS</label>
					  <select name="vk_pais" id="pais" required>
						<? include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_option_paises.php"); ?>
					</select>
				</div>
				<?if (strlen($vk_pais)>0){?>	
					<script>
						$("select[name='vk_pais']").find("option[value='<? echo $vk_pais; ?>']").attr("selected",true);
					</script>									
				<?}?>										
				<div class="small-2 medium-1 columns">
					<label for="cve" class="" style="white-space:nowrap;"><i class="fa fa-asterisk"></i> CVE</label>
					<input id="cve" name="vk_cve_internacional" value="52" type="text" required>
				</div>
				<div class="small-2 medium-1 columns">
					<label for="lada" class="" style="white-space:nowrap;"><i class="fa fa-asterisk"></i> LADA</label>
					<input id="lada" name="vk_lada" type="text" data-parsley-length="[2, 4]" data-parsley-type="digits" required>
				</div>
				<div class="small-6 medium-3 columns">
					<label for="telefono" class=""><i class="fa fa-asterisk"></i> TELÉFONO</label>
					<input id="telefono" type="text" name="vk_telefono" data-parsley-minlength="7" data-parsley-type="digits" data-parsley-type-message="solo números" required>
				</div>
				<div class="small-2 medium-1 columns">
					<label for="ext" class="">EXT</label>
					<input id="ext" name="vk_ext" type="text" size="35" data-parsley-type="digits" >
				</div>
				<script>
						$("#lada").change(function (){
							if ($("#cve").val()=="52"){
								var lada_=$("#lada").val().trim();							
								if (lada_.substring(0, 2)=="81" && lada_.length==3){
									$("#lada").val("81");
								}else if (lada_=="333"){
									$("#lada").val("33");
								}else if (lada_=="555"){
									$("#lada").val("55");
								}else if (lada_=="044"){
									alert ("Advertencia, por favor no utilice 044, en su lugar ponga los (2 o 3) dígitos iníciales de su número de celular de 10 dígitos");
									$("#lada").val("");
								}else if (lada_=="045"){
									alert ("Advertencia, por favor no utilice 045, en su lugar ponga los (2 o 3) dígitos iníciales de su número de celular de 10 dígitos");
									$("#lada").val("");
								}else if (lada_=="01"){
									alert ("Advertencia, por favor no utilice 01, en su lugar ponga los (2 o 3) dígitos iníciales de su número telefónico de 10 dígitos");
									$("#lada").val("");
								}
							}
						})
						$("#telefono").change(function (){
									if ($("#vk_pais").val()=="52"){
										var telefono_=$("#telefono").val();
										var lada_=$("#lada").val().trim();
										if (lada_=="33" || lada_=="55" || lada_=="81"){
										
										}else if(lada_.length==2){
											$("#lada").val(lada_+telefono_.substring(0, 1));
											$("#telefono").val(telefono_.substring(1, telefono_.length));
										}
									}
						})	
						$("#pais").change(function(){
							var cve_=$("#pais").val();
							$("#cve").val(cve_);
							var pais_=$("#pais option:selected").text();
							$("#vk_pais_texto").val(pais_);
							
						});	
					</script>
			</div>
			<div class="medium-6  columns">
				<label for="empresa" class=""><i class="fa fa-asterisk"></i> NOMBRE DE SU EMPRESA</label>
				<input type="text" name="vk_empresa" value="<? echo $vk_empresa; ?>" id="empresa" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i"data-parsley-minlength="3" required />				
			</div>				
			<div class="medium-6 columns">
				<label for="giro" class="required"><i class="fa fa-asterisk"></i>¿CUAL ES EL GIRO DE SU NEGOCIO?</label>
				 <select name="vk_giro" id="giro" required>
					<option value="">&nbsp;</option>
					<option value="Boutique">Boutique</option>
					<option value="Tienda departamental">Tienda departamental</option>
					<option value="Zapatería">Zapatería</option>
					<option value="Tienda de ropa">Tienda de ropa</option>
					<option value="Joyería">Joyería</option>						
					<option value="Regalos">Regalos</option>						
					<option value="Otros">Otros</option>
				</select>
			</div>						
			<? if (strlen($vk_giro)>0){ ?>	
			<script>
				$("select[name='vk_giro']").find("option[value='<? echo $vk_giro; ?>']").attr("selected",true);									
			</script>									
			<? } ?>	  			

			<div class="medium-6 columns">
				<label for="como_se_entero" class="hyphenate" lang="es">¿CÓMO SE ENTERÓ DE BÖRSE<sup>®</sup>?</label>
				  <select name="vk_como_se_entero" id="como_se_entero">								
					<option value="Google">Google</option>								
					<option value="Facebook">Facebook</option>
					<option value="Expos">Expos</option>
					<option value="Por recomendación">Por recomendación</option>
					<option value="Portal Cosmos">Portal Cosmos</option>
					<option value="Otros sitios">Otros Páginas de Internet</option>					
					<option value="Otro">Otros</option>
				</select>
			</div>
			<?if (strlen($vk_como_se_entero)>0){?>	
				<script>
					$("select[name='vk_como_se_entero']").find("option[value='<? echo $vk_como_se_entero; ?>']").attr("selected",true);
				</script>									
			<?}?>
			<div class="medium-6 columns" style="padding:0">
				<div class="small-12 medium-6 columns">
					<label for="sucursales" class=""><i class="fa fa-asterisk"></i> No. DE SUCURSALES</label>
					<input id="sucursales" type="number" value="<? echo $vk_sucursales; ?>" name="vk_sucursales" data-parsley-type="number" required>
				</div>
				<div class="small-12 medium-6 columns">
					<label for="logotipo_tintas" class=""><i class="fa fa-asterisk"></i> TINTAS EN SU LOGO</label>
					<input id="logotipo_tintas" type="number" value="<? echo $vk_logotipo_tintas; ?>" name="vk_logotipo_tintas" data-parsley-type="number" required>
				</div>
			</div>
		</div>
		<div class="medium-12 columns" style="">			
			<div class="medium-4 columns" style="text-align:center">
				<img src="<? echo $thumbnail; ?>" class="thumbnail"/>
				<input type="hidden" name="vk_thumbnail" value="<? echo $thumbnail; ?>"  />
			</div>
			<div class="medium-4 columns">
				<label for="bolsastipo" class=""> ESTED ESTA COTIZANDO</label>
				<textarea style="resize:none;" id="bolsastipo" name="vk_bolsastipo" rows="1" cols="25" readonly><? echo $bolsastipo; ?></textarea>
			</div>
			<div class="medium-4 columns">
				<label for="modelo_referencia" class=""> MODELO DE REFERENCIA</label>
				<textarea style="resize:none" id="modelo_referencia" name="vk_modelo_referencia" rows="1" cols="25" readonly><? echo $modelo_referencia; ?></textarea>
			</div>
			<div class="medium-4 columns">				
				<div class="medium-12 columns">
					<label for="medidas" class=""> MEDIDAS EN CM.</label>
					<select name="vk_medidas" id="medidas" required>								
							<option value=""></option>							
							<?
							for ($i=0;$i<count($array_optimo);$i++){						
									echo '<option>' .$array_optimo[$i] . '</option>';
							}
							echo '<option>por definir</option>';
							?>
					</select>								
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
				</div>
				<div class="medium-12 columns">					
					<div class="small-4 columns">
						<label for="ancho" class=""> ANCHO</label>
						<input id="ancho" name="vk_ancho" value="<? echo $ancho; ?>" size="35" class="textInput color_fix" type="text" data-parsley-type-message="solo 2 dígitos" data-parsley-length="[2, 2]" data-parsley-type="digits" required>
					</div>
					<div class="small-4 columns">
						<label for="alto" class=""> ALTO</label>
						<input id="alto" name="vk_alto" value="<? echo $alto; ?>" size="35" class="textInput color_fix" type="text" data-parsley-type-message="solo 2 dígitos" data-parsley-length="[2, 2]" data-parsley-type="digits" required>
					</div>
					<div class="small-4 columns">
						<label for="fondo" class=""> FONDO</label>
						<input id="fondo" name="vk_fondo" value="<? echo $fondo; ?>" size="35" class="textInput color_fix" type="text">
					</div>				
				</div>				
			</div>
			<div class="medium-4 columns">				
				<div class="medium-12 columns">
					<div class="small-11 columns">
						<label for="cantidad" class=""> CANTIDAD</label>
						<input id="cantidad" name="vk_cantidad" value="<? echo $cantidad_minima; ?>" type="text" data-parsley-min="<? echo $cantidad_minima; ?>" data-parsley-type="digits" required>				
					</div>
					<div class="small-1 columns" style="padding-top:1.4em">
						<a href="#" id="btn_sumar_cantidad" class="selector_cantidad"><i class="fa fa-chevron-up"></i></a>
						<a href="#" id="btn_restar_cantidad" class="selector_cantidad"><i class="fa fa-chevron-down"></i></a>
						<script type="text/javascript">						
			
								$("#btn_sumar_cantidad").click(function(e){								
									e.preventDefault();
									var $result=parseInt($("#cantidad").val())+<? echo $cantidad_minima; ?>;						
									$("#cantidad").attr("value",$result);	
								});		
								$("#btn_restar_cantidad").click(function(e){						
									e.preventDefault();
									var $result=parseInt($("#cantidad").val())-<? echo $cantidad_minima; ?>;						
									if ($result>=<? echo $cantidad_minima; ?>){
										$("#cantidad").attr("value",$result);	
									}
								});											
						</script>
					</div>					
				</div>		
				<div class="medium-12 columns">
						<label for="comentario" class=""> OBSERVACIONES</label>
						<textarea style="resize:none" id="comentario" name="vk_comentarios" rows="1" cols="25"></textarea>
				</div>
			</div>
		</div>		
		<div class="medium-12 columns" style="">			
			<div class="medium-6 columns">				
				<div class="medium-12 columns" style="height:3em;font-size:.7em;padding:.5em;padding-left:1em">
					<i class="fa fa-exclamation fa-2x"></i> <span style="  font-size: 1em;
  margin-top: -1.7em;
  position: relative;
  display: block;
  margin-left: 2.5em;">REVISE SU BANDEJA DE SPAM - AGUARDE A QUE LA FORMA SEA ENVIADA</span>
				</div>
				<div class="medium-12 columns" style="height:3em;font-size:.7em;padding:.5em">
					<i style="background-image: url(/images/responsive/ico-lock.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;"></i> <span style="font-size:1em;  top: .6em; position: relative;">SUS DATOS SON CONFIDENCIALES</span>
				</div>				
			</div>		
			<div class="medium-6 columns">
				<div class="medium-12 columns right" style="height:3em;font-size:.7em;padding:.5em;text-align:right">
					<input type="checkbox" class="checkbox right" name="autorizo" value="autorizo" data-parsley-mincheck="1" required/> 
					<span style="font-size: 1em; margin-top: .5em; position: relative; display: block; margin-right: 3em;">AUTORIZO A BÖRSE PARA QUE ME CONTACTE</span>
				</div>				
				<input type="hidden" name="vk_pais_texto" id="vk_pais_texto" value="Mexico"  />
				<input type="hidden" name="contact_accion" value="enviar_contacto"  />
				<div class="buttonHolder" style="float:right;display:block;margin-top:1em;font-size:.8em"><button type="submit" class="primaryAction"><i class="fa fa-envelope-o right fa-2x" style="color:white;margin-left:.5em;margin-top:.4em"></i> ENVIAR<br><strong style="font-size:1.1em">SOLICITUD DE COTIZACIÓN</strong></button></div>				
			</div>
		</div>		
	</form>          
</div>
<script type="text/javascript">
$.listen('parsley:form:validated', function(e){
if (e.validationResult) {
/* Validation has passed, prevent double submissions */
$('button[type=submit]').attr('disabled', 'disabled');
}
});
</script>