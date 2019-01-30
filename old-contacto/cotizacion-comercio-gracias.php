<? 

include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_mobile_detect.php"); 
$detect = new Mobile_Detect;

include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_doctype.php"); 
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="noindex,follow" /><title>Gracias por cotizar</title>
<meta name="description" content="" />
<link rel="stylesheet" href="/styles/foundation.css" />
<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<? include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_ga_asyncrona.php"); ?></head>
<body>
<div class="row">	
	<div class="small-6 small-centered large-5 xlarge-4 columns" style="text-align:center;margin-top:1em">
		<object class="acceso_bottom" data="/images/responsive-01/borse-logo.svg" type="image/svg+xml"></object>
	</div>
	<div class="small-12 columns" style="text-align:center;font-size:1.2rem">
		GRACIAS POR SU INTERÉS BÖRSE
	</div>
	<div class="small-12 large-10 large-centered columns" style="text-align:center;font-size:1rem;margin-top:1rem">
		EN MENOS DE 24 HORAS HÁBILES UNO DE NUESTROS REPRESENTANTES SE PONDRÁ EN CONTACTO CON USTED PARA ATENDER SU SOLICITUD.
	</div>
	
	<div class="small-12 columns" style="text-align:center;font-size:1.2rem;margin-top: .2rem; ">
		<div style="border-top: 2px solid rgb(207, 13, 42); margin-top: 1em; "></div>
		<span style="font-size:.8rem;font-weight:600;width: 13em;
  background-color: white;
  display: block;
  padding: .5em;
  position: relative;
  margin-top: -1.2em;
  margin-left: auto;
  margin-right: auto;">AVISO IMPORTANTE</span>		
	</div>
	
	<div class="small-12 large-6 large-centered columns" style="text-align:center;font-size:.8rem;margin-top:1rem">
		NO OLVIDE <span style="color:rgb(207, 13, 42)">REVISAR SU BANDEJA DE SPAM</span> (CORREO NO DESEADO) AGREGUE A SU EJECUTIVO DE BÖRSE A A SU LISTA DE REMITENTES SEGUROS
	</div>
	
	<?
	if ($detect->isMobile()){
	?>
	<div class="small-12 large-8 large-centered columns" style="text-align:center;font-size:.9rem;margin-top:2rem">
		¡ESPERE UNOS SEGUNDOS!
	</div>	
	<div class="small-12 large-8 large-centered columns" style="text-align:center;font-size:.8rem;margin-top:0;font-weight:600">
		REGRESARÁ AUTOMÁTICAMENTE A NUESTRA PÁGINA...
	</div>	
	<script type="text/javascript">		
		
		$(document).ready(function() {
		setTimeout(function() {
		window.history.go(-2) 
		}, 6000);
		});
		
	</script>
	<?
}
?>
</div>
</body>
</html>