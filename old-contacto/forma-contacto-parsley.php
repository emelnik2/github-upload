<?php



?>
<div class="row" style="background-color:white">
	<form id="data_form" action="#" data-parsley-validate>	
		<div class="medium-12 columns" style="">
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
		<div class="medium-6 columns">
			<label for="nombre" class="requerido">NOMBRE Y APELLIDO</label>
			<input type="text" name="vk_nombre" id="nombre" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />
		</div>
		<div class="medium-6 columns">
			<label for="email" class="requerido">CORREO ELECTRÓNICO</label>
			<input type="email" name="vk_email" id="email" value="<?php echo $vk_email; ?>"  data-parsley-trigger="change" required />
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
			<div class="medium-6  columns">
				<label for="empresa" class="requerido">NOMBRE DE SU EMPRESA</label>
				<input type="text" name="vk_empresa" value="<?php echo $vk_empresa; ?>" id="empresa"  data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />
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
		<div class="medium-6 columns right">
			<label for="enviar_a" class="hyphenate" lang="es">ENVIAR ESTA INFORMACIÓN A:</label>
			  <select name="vk_enviar_a" id="enviar_a">								
				<option value="Ventas">Ventas</option>
				<option value="Compras">Compras</option>
				<option value="Recursos Humanos">Recursos Humanos</option>
				<option value="Atención a clientes">Atención a clientes</option>
				<option value="Dirección">Dirección</option>
			</select>
		</div>
		<?php if (strlen($vk_como_se_entero)>0){?>	
			<script>
				$("select[name='vk_enviar_a']").find("option[value='<?php echo $vk_enviar_a; ?>']").attr("selected",true);
			</script>									
		<?php } ?>
														
		<div class="medium-12 columns">
			<label for="comentario" class="hyphenate" lang="es"> SU MENSAJE / COMENTARIO</label>
			<textarea id="comentario" name="vk_comentarios" rows="5" cols="25"></textarea>
		</div>								
		</div>
		<div class="medium-6 large-4 columns right">
				<input type="checkbox" class="checkbox" name="autorizo" value="autorizo" id="autotizo" data-parsley-mincheck="1" required style="float:left"  /> 
				<label for="autorizo" style="font-size:.9em;position:relative;float:left">AUTORIZO A BÖRSE PARA QUE ME CONTACTE</label>
				<br/>
				<input type="hidden" name="vk_pais_texto" id="vk_pais_texto" value="Mexico"  />
				<input type="hidden" name="contact_accion" value="enviar_contacto"  />
				<div class="buttonHolder" style="float:right;display:block;margin-top:1em;font-size:.8em">
					<button type="submit" class="primaryAction"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" enable-background="new 0 0 30 30" style="float: right;width: 3em;height: 3em;margin-left:.5em;margin-right:0"><g fill="#cf0a2c"><path d="m21 10.8v-.2h-12v.2l6 3.3z"/><path d="m23.1 11.1l-8.1 4.7-8.1-4.7v8.5h16.2z"/><path d="m27.3 4c-.2-.5-.5-1-1-1.2-.7-.4-1.5-.3-2.3-.3-6.2 0-12.3 0-18.5 0-.3 0-.6 0-.9.1-.6 0-1.1.3-1.5.7-.4.5-.6 1.1-.6 1.8 0 6.7 0 13.3 0 20 0 .7.2 1.3.7 1.8.5.4 1.2.6 1.8.6 6.7 0 13.3 0 20 0 .6 0 1.3-.2 1.8-.6.5-.5.7-1.2.7-1.8 0-6.5 0-13.1 0-19.6 0-.5 0-1-.2-1.5m-3 17h-18.6v-12h18.6v12"/></g></svg><span style="float:right;margin-top:.3em"> ENVIAR<br><span style="font-size:1.2em">CONTACTO</span></span></button>
				</div>				
		</div>
				<div class="medium-12 columns" style="">			
			<div class="medium-12 columns"><hr width="100%" style="background-color: #CF0A2C;margin-bottom:1em"></div>
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