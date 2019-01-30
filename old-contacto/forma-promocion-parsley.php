<?php

$vk_codigo_promocional=$_REQUEST["codigo_promocional"];
$vk_descuento=$_REQUEST["descuento"];
$vk_especificaciones=$_REQUEST["especificaciones"];
 
?>
<div class="row" style="background-color:white">
	<form id="data_form" action="#" data-parsley-validate>	
		<div class="medium-12 columns">
			<div class="medium-6 columns" style="background-color: white; padding-top: .5em; height: auto;">
				<div style="width: 15em; height: 7em;">
					<object data="/images/responsive-01/borse-logo.svg" type="image/svg+xml" style="width: 100%;height: auto;"></object>		
				</div>
			</div>
			<div class="medium-6 columns" style="min-height:6em;font-size:1em;float:left;margin-bottom:1em;padding-top:2em;text-align:right;">	
				SU INFORMACIÓN ES MUY IMPORTANTE<br/>
				PARA ATENDERLE COMO USTED SE MERECE<br/>
				POR FAVOR LLENE EL SIGUIENTE FORMULARIO
			</div>	
			<div class="medium-12 columns"><hr width="100%" style="background-color: #CF0A2C;"></div>
		</div>	
		<div class="medium-12 columns" style="">
			<div class="medium-6 columns">
				<label for="nombre" class="requerido">NOMBRE Y APELLIDO</label>
				<input type="text" name="vk_nombre" id="nombre" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />
			</div>
			<div class="medium-6 columns">
				<label for="email" class="requerido">CORREO ELECTRÓNICO</label>
				<input type="email" name="vk_email" id="email" value="<? echo $vk_email; ?>"  data-parsley-trigger="change" required />
			</div>				
			<div class="medium-6 columns" style="padding:0">
				<div class="small-6 columns">
					<label for="pais" class="requerido">PAIS</label>
					  <select name="vk_pais" id="pais">
						<?php include ($_SERVER['DOCUMENT_ROOT']."/includes-es/option_paises.php"); ?>
					</select>
				</div>
				<?php if (strlen($vk_pais)>0){?>	
					<script>
						$("select[name='vk_pais']").find("option[value='<?php echo $vk_pais; ?>']").attr("selected",true);
					</script>									
				<?php } ?>									
				<div class="small-3 columns">
					<label for="cve" style="white-space:nowrap;">CLAVE</label>
					<input id="cve" name="vk_cve_internacional" value="52" type="number" />
				</div>
				<div class="small-3 columns">
					<label for="lada" class="requerido">LADA</label>
					<input id="lada" name="vk_lada" type="number" value="<?php echo $vk_lada; ?>"  data-parsley-length="[2, 4]" data-parsley-type="digits" data-parsley-trigger="change" required data-parsley-required-message="Requerido"/>
				</div>
			</div>
			<div class="medium-6 columns" style="padding:0">
				<div class="small-9 columns">
					<label for="telefono" class="requerido">TELÉFONO</label>
					<input id="telefono" name="vk_telefono" type="number" value="<?php echo $vk_telefono; ?>" data-parsley-minlength="7" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-trigger="change" required />	
				</div>
				<div class="small-3 columns">
					<label for="ext">EXTENSIÓN</label>
					<input id="ext" name="vk_ext" type="number" value="<?php echo $vk_ext; ?>" data-parsley-trigger="change" data-parsley-type="digits">
				</div>
				<script>
						$("#lada").change(function (){
							if ($("#cve").val()=="52"){
								var lada_=$("#lada").val().trim();							
								if (lada_.substring(0, 2)=="81" && lada_.length==3){
									alert ("Advertencia, la lada de Monterrey es 81, solo es de 2 digítos.");
									$("#lada").val("81");
								}else if (lada_=="333"){
									alert ("Advertencia, la lada de Guadalajara es 33, solo es de 2 digítos.");
									$("#lada").val("33");
								}else if (lada_=="555"){
									alert ("Advertencia, la lada de la Ciudad de México es 55, solo es de 2 digítos.");
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
			<div class="medium-6 columns">
				<label for="empresa" class="requerido">NOMBRE DE SU EMPRESA</label>
				<input type="text" name="vk_empresa" value="<? echo $vk_empresa; ?>" id="empresa"  data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />
			</div>				
			<div class="medium-6 columns">
				<label for="giro" class="requerido">¿ CUÁL ES EL GIRO DE SU NEGOCIO ?</label>
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
			<?php if (strlen($vk_giro)>0){ ?>	
			<script>
				$("select[name='vk_giro']").find("option[value='<?php echo $vk_giro; ?>']").attr("selected",true);								
			</script>									
			<?php } ?>  
			<div class="medium-6 columns">
				<label for="como_se_entero" class="requerido">¿ CÓMO SE ENTERÓ DE BÖRSE<sup>®</sup> ?</label>
				  <select name="vk_como_se_entero" id="como_se_entero" data-parsley-trigger="change" required="">								
					<option value="Google">Google</option>								
					<option value="Facebook">Facebook</option>
					<option value="Expos">Expos</option>
					<option value="Por recomendación">Por recomendación</option>
					<option value="Portal Cosmos">Portal Cosmos</option>
					<option value="Otros sitios">Otros Páginas de Internet</option>					
					<option value="Otro">Otros</option>
				</select>
			</div>
			<?php if (strlen($vk_como_se_entero)>0){?>	
				<script>
					$("select[name='vk_como_se_entero']").find("option[value='<?php echo $vk_como_se_entero; ?>']").attr("selected",true);
				</script>									
			<?php } ?>
			<div class="medium-6 columns">
				<label for="presupuesto_maximo">¿ CUÁL ES SU PRESUPUESTO ?</label>
				<input id="presupuesto_maximo" name="vk_presupuesto_maximo" type="text">
			</div>
			<div class="medium-6 columns">
				<label for="empresa">USTED ESTA COTIZANDO:</label>
				<textarea style="resize:none;background-color: white;" id="codigo_promocional" name="vk_codigo_promocional" rows="1" cols="25" readonly><?php echo $vk_codigo_promocional; ?></textarea>
			</div>
			<div class="medium-6 columns" style="text-align:center;height:6em">
				<span style="color:#CF0A2C;font-size:1.5em;font-weight:700;">DESCUENTO:</span>
				<span style="color:#CF0A2C;font-size:2.6em;font-weight:600;">-<?php echo $vk_descuento; ?>%</span><br/>
				<span style="margin-top:-.5em;display:block">¡ SOBRE EL TOTAL COTIZADO !</span>
			</div>
			<div class="medium-6 columns" style="margin-bottom:1em; clear:both">
				<i style="background-image: url(/images/responsive-01/ico-promociones.svg); width: 28px;height: 44px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em; background-repeat: no-repeat;margin-bottom:3em;margin-top:.3em"></i>
				<span style="font-size:.9em;">
				LAS PROMOCIONES QUE LE OFRECEMOS SE ADAPTAN A SU PRESUPUESTO, USTED SOLO TIENE QUE ESPECIFICARNOSLO Y NOSOTROS NOS ENCARGAMOS DEL RESTO.<br/>
				NOTA:PRESUPUESTO MINIMO: <b>$ 5,000.00</b></span>
			</div>
			<div class="medium-6 columns">
				<i style="background-image: url(/images/responsive-01/ico-checkmark.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i>
				<span style="font-size:.9em">AUTORIZO A BÖRSE PARA QUE ME CONTACTE</span>
				<br/>
				<input type="hidden" name="vk_pais_texto" id="vk_pais_texto" value="Mexico"  />
				<input type="hidden" name="contact_accion" value="enviar_contacto"  />
				<input type="hidden" name="vk_codigo_promocional" value="<? echo $vk_codigo_promocional; ?>"  />				
				<input type="hidden" name="vk_descuento" value="<? echo $vk_descuento; ?>"  />				
				<input type="hidden" name="vk_especificaciones" value="<? echo $vk_especificaciones; ?>"  />								
				<div class="buttonHolder" style="float:right;display:block;margin-top:1em;font-size:.8em">				
					<button type="submit" class="primaryAction">
						<span>
							<div class="icon-ico-cotizar ico_btn " style="background-image: none;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"><g fill="#cf0a2c"><path d="M16.4 8.6h-1.6V7c0-.2-.1-.4-.2-.6-.2-.2-.3-.2-.6-.2-.2 0-.4.1-.6.2-.2.2-.2.3-.2.6v1.6h-1.6c-.2 0-.4.1-.6.2 0 .2-.1.3-.1.6s.1.4.2.6c.2.2.3.2.6.2h1.6v1.6c0 .2.1.4.2.6.2.2.3.2.6.2.2 0 .4-.1.6-.2.2-.2.2-.3.2-.6v-1.6h1.6c.2 0 .4-.1.6-.2.2-.2.2-.3.2-.6s-.2-.4-.3-.6c-.2-.2-.4-.2-.6-.2"></path><path d="M24.8 1.5c-.2-.5-.5-1-1-1.2-.7-.4-1.6-.3-2.3-.3H3c-.3 0-.6 0-.9.1C1.5.1 1 .4.6.8.2 1.3 0 1.9 0 2.6v20c0 .7.2 1.3.7 1.8.5.4 1.2.6 1.8.6h20c.6 0 1.3-.2 1.8-.6.5-.5.7-1.2.7-1.8V3c0-.5 0-1-.2-1.5m-2.1 11c0 .2-.1.4-.2.5s-.3.2-.5.3L9.2 14.8c0 .1 0 .1.1.3 0 .1.1.2.1.3v.3c0 .1-.1.4-.3.8h11.3c.2 0 .4.1.6.2.2.2.2.3.2.6s-.1.4-.2.6c-.2.2-.3.2-.6.2h-.8c.4 0 .8.2 1.1.5.3.3.5.7.5 1.1s-.2.8-.5 1.1c-.3.3-.7.5-1.1.5-.4 0-.8-.2-1.1-.5-.3-.4-.5-.8-.5-1.2s.2-.8.5-1.1c.3-.3.7-.5 1.1-.5h-11c.4 0 .8.2 1.1.5.3.3.5.7.5 1.1s-.2.8-.5 1.1c-.3.3-.7.4-1.1.4-.4 0-.8-.2-1.1-.5-.3-.2-.5-.6-.5-1s.2-.8.5-1.1c.3-.3.6-.5 1.1-.5h-.8c-.2 0-.4-.1-.6-.2-.1-.2-.2-.4-.2-.6 0-.1 0-.3.1-.5s.2-.5.4-.7c.2-.3.2-.4.3-.5L5.6 5.4H3.1c-.2 0-.4-.1-.6-.2-.1-.2-.2-.3-.2-.6s.1-.4.2-.6c.2-.2.3-.2.6-.2h3.1c.1 0 .2 0 .3.1.2.1.2.2.3.2.1.1.1.2.2.3s0 .3.1.4c0 .1 0 .2.1.4s0 .3.1.3H22c.2 0 .4.1.6.2.2.2.2.3.2.6v6.2z"></path></g></svg></div>
							SOLICITAR  <br><span class="span_button">PROMOCIÓN</span>
						</span>
					</button>
				</div>
			</div>
		</div>	
		<div class="columns">			
			<div class="columns"><hr width="100%" style="background-color: #CF0A2C;margin-bottom:1em"></div>
			<div class="medium-6 columns" style="margin-bottom:1em">
				<i style="background-image: url(/images/responsive-01/ico-info.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em;">SUS DATOS SON CONFIDENCIALES</span>
			</div>
			<div class="medium-6 columns" style="margin-bottom:1em">
				<i style="background-image: url(/images/responsive-01/ico-lock.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em"><a href="/aviso-de-privacidad" style="color:#404040;text-decoration: none;" target="_blank">NUESTRO AVISO DE PRIVACIDAD</a></span>
			</div>
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