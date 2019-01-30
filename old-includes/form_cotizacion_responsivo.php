<?php

?>
<div id="form_data_cotizacion" class="row" style="padding-left:0;padding-right:0">
	<form id="data_form" method="post" data-parsley-validate>
		<div class="medium-6 columns" style="background-color: white; padding-top: .5em; height: auto;">
			<div style="width: 12em; height: 5.3em;">
				<object data="/images/responsive-01/borse-logo.svg" type="image/svg+xml" style="width: 100%;height: auto;"></object>					
			</div>
		</div>
		<div class="medium-6 columns" style="min-height:6em;font-size:1em;float:left;margin-bottom:1em;padding-top:2em;text-align:right;">	
			SU INFORMACIÓN ES MUY IMPORTANTE<br/>
			PARA ATENDERLE COMO USTED SE MERECE<br/>
			POR FAVOR LLENE EL SIGUIENTE FORMULARIO
		</div>	
		<div class="columns"><hr width="100%" style="border-color:#CF0A2C; background-color: #CF0A2C;margin-bottom:1em;"></div>
			<div class=" small-12 large-6 xlarge-4 columns" style="height:3em">
				<label for="carrito_nombre" class="requerido">NOMBRE Y APELLIDO</label>
				<input type="text" name="carrito_nombre" id="carrito_nombre" value="<?php echo $carrito_nombre; ?>"  data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required />
			</div>
			<div class="large-6 xlarge-4 columns" style="height:3em">			
				<label for="carrito_email" class="nowrap requerido"> CORREO ELECTRÓNICO</label>
				<input type="email" name="carrito_email" id="carrito_email" value="<?php echo $carrito_email; ?>" data-parsley-trigger="change" required  />
			</div>
			<div class="large-6 xlarge-4 columns right" style="height:3em">
				<label for="carrito_email_confirm" class="nowrap requerido">CONFIRME SU CORREO ELECTRÓNICO</label>
				<input type="email" name="carrito_email_confirm" id="carrito_email_confirm" value="<?php echo $carrito_email; ?>" data-parsley-equalto="#carrito_email" data-parsley-trigger="change" required  />
			</div>
			<div class="paddings_form_inside_level1 small-12 large-6 xlarge-4 columns" style="height:3em">
				<div class="paddings_form_inside_level2 row">
					<div class="small-6 large-6 xlarge-6 columns">
						<label for="carrito_pais" class="requerido">PAIS</label>
						 <select name="carrito_pais" id="carrito_pais">
						 <?php include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_option_paises.php"); ?>
						</select>
					</div>
					<div class="small-3 large-2 xlarge-2 columns">
						<label for="carrito_cve">CLAVE</label>
						<input id="carrito_cve" name="carrito_cve" type="number" value="<?php echo $carrito_cve; ?>" />
					</div>
					<div class="small-3 large-4 xlarge-4 columns">
						<label for="carrito_lada" class="requerido">LADA</label>
						<input id="carrito_lada" name="carrito_lada" type="number" value="<?php echo $carrito_lada; ?>" data-parsley-length="[2, 4]" data-parsley-type="digits" data-parsley-trigger="change" required data-parsley-required-message="Requerido" />
					</div>
				</div>
			</div>
			<div class="paddings_form_inside_level1 small-12 large-6 xlarge-4 columns" style="height:3em">
				<div class="paddings_form_inside_level2 row">
					<div class="small-8 large-10 xlarge-10 columns">
						<label for="carrito_telefono" class="requerido">TELÉFONO</label>
						<input id="carrito_telefono" name="carrito_telefono" type="number" value="<?php echo $carrito_telefono; ?>" data-parsley-minlength="7" data-parsley-type="digits" data-parsley-type-message="only numbers" data-parsley-trigger="change" required />
					</div>
					<div class="small-4 large-2 xlarge-2 columns">
						<label for="carrito_ext">EXT</label>
						<input id="carrito_ext" name="carrito_ext" type="number" value="<?php echo $carrito_ext; ?>" data-parsley-trigger="change" data-parsley-type="digits" />
					</div>
				</div>
			</div>
			<div class="large-6 xlarge-4 columns" style="height:3em">
				<label for="carrito_empresa" class="requerido">NOMBRE DE SU EMPRESA</label>
				<input type="text" name="carrito_empresa" id="carrito_empresa" value="<?php echo $carrito_empresa; ?>" data-parsley-pattern="/^[a-zA-Z\.\' ñáéíóú,]+$/i" data-parsley-minlength="3" data-parsley-trigger="change" required  />
			</div>
			<div class="large-6 xlarge-4 columns" style="height:3em">
				<label for="carrito_tipo_de_establecimiento" class="requerido">¿ CUÁL ES EL GIRO DE SU NEGOCIO ?</label>
				 <select name="carrito_tipo_de_establecimiento" id="carrito_tipo_de_establecimiento" data-parsley-trigger="change" required="">
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
			<div class="large-6 xlarge-4 columns" style="height:3em">
				<label for="carrito_como_se_entero" class="requerido">¿ CÓMO SE ENTERO DE BORSE ?</label>
				 <select name="carrito_como_se_entero" id="carrito_como_se_entero" data-parsley-trigger="change" required="">
					<option value="">&nbsp;</option>			
					<option value="Google">Google</option>								
					<option value="Facebook">Facebook</option>
					<option value="Expos">Expos</option>								
					<option value="Por recomendación">Por recomendación</option>
					<option value="Portal Cosmos">Portal Cosmos</option>
					<option value="Otros sitios">Otras Páginas de Internet</option>					
					<option value="Otro">Otros</option>
				</select>				
			</div>		
			<div class="large-6 xlarge-4 columns" style="height:3em">
				<label for="presupuesto_maximo">¿ CUÁL ES SU PRESUPUESTO ?</label>
				<input id="presupuesto_maximo" name="carrito_presupuesto" type="text">
			</div>
			<div class="visible-only-xlarge columns" style="height:1em"></div>
			<div class="large-6 xlarge-4 columns" style="margin-bottom:1em">
				<i style="background-image: url(/images/responsive-01/ico-promociones.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em; background-repeat: no-repeat;margin-bottom:3em;margin-top:.3em"></i> <span style="font-size:.9em;">
				CONOCER SU PRESUPUESTO, NOS BRINDA LA OPORTUNIDAD DE OFRECERLE LA MEJOR OPCIÓN EN CUANTO A PRECIO.</span>
			</div>			
			<div class="large-6 xlarge-4 columns" style="margin-bottom:1em">
			
				<i style="background-image: url(/images/responsive-01/ico-checkmark.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:.9em">AUTORIZO A BÖRSE PARA QUE ME CONTACTE</span>
				<br/><br/>
				
				<input type="hidden" value="login_carrito" name="accion_submit" />			
				<input class="bt_login" type="submit" value="Recordar" name="submit" />
				<span style="font-size:.9em">MIS DATOS SON CORRECTOS</span>
			</div>
			
			<div class="large-6 xlarge-4 columns" style="margin-bottom:1em" id="ocultar">				
					<a href="javascript:;" class="btn_hidden <?php echo $checkout; ?>" id="btn_solicitar_cotizacion"><i class="fa fa-envelope-o right fa-2x" style="margin-left:.5em;margin-top:.2em"></i> ENVIAR<br/><strong>SOLICITUD</strong></a>				
			</div>
			<div class="columns"><hr width="100%" style="border-color:#CF0A2C;background-color: #CF0A2C;margin-bottom:1em"></div>
		<div class="medium-6 xlarge-4 columns" style="margin-bottom:1em">
			<i style="background-image: url(/images/responsive-01/ico-info.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em;">SUS DATOS SON CONFIDENCIALES</span>
		</div>
		<div class="medium-6 xlarge-4 columns right" style="margin-bottom:1em;">
			<i style="background-image: url(/images/responsive-01/ico-lock.svg); width: 28px;height: 28px; float: left; display: block; top: -.3em; position: relative; margin-right: .5em;background-repeat: no-repeat;;margin-top:.3em"></i> <span style="font-size:1em"><a href="/aviso-de-privacidad" style="color:#404040;text-decoration: none;" target="_blank">NUESTRO AVISO DE PRIVACIDAD</a></span>
		</div>
		</div>		
	</form>		
</div>
<script type="text/javascript">
$.listen('parsley:form:validated', function(e){
if (e.validationResult) {
/* Validation has passed, prevent double submissions $('button[type=submit]').attr('disabled', 'disabled');*/


            div = document.getElementById('ocultar');
            div.style.display = 'none';
        
}
});
</script>