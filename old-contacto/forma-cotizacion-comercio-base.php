<?php 

ob_start("ob_gzhandler"); ini_set("session.gc_maxlifetime", "18000");  session_start(); include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/consulta_usuario_cotizacion_simple.php");

include ($_SERVER['DOCUMENT_ROOT']."/includes-es/doctype.php"); 

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forma de Cotización Comercio | Börse</title>
<meta name="robots" content="noindex,follow" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<link href="/styles/foundation.css" rel="stylesheet" type="text/css" />
<link href="/styles/borse_forms_foundation.css" rel="stylesheet" type="text/css" />
<link href="/styles/parsley.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
<? include ($_SERVER['DOCUMENT_ROOT']."/includes-es/load_jquery.php"); ?>
<script type="text/javascript" src="/scripts/parsley.min.js"></script>
<script src="/scripts/i18n/es.js"></script>
<? include ($_SERVER['DOCUMENT_ROOT']."/includes-es/ga_asynchrona.php"); ?>
<style>
i { color: rgb(207, 13, 42); }

@media only screen{
.column, .columns {
  position: relative;
  padding-left: .5em;
  padding-right: .5em;
  float: left;
}
}

@media only screen and (min-width: 40.063em){
.column, .columns {
  padding-left: .5em;
  padding-right: .5em;
}
}

.fa-chevron-down:hover, .fa-chevron-up:hover (color:grey !important);

.thumbnail{margin-left:auto;margin-right:auto}

input.checkbox  {
	width: 2em;
	height: 2em;
	display: inline;
		padding: 0;
	}

</style>
</head>
<body>
<div id="main_container" >
	<div id="contact_container">
  <?

    $contact_accion=$_REQUEST["contact_accion"];

		if ($contact_accion=="enviar_contacto"){
							
			include ($_SERVER['DOCUMENT_ROOT']."/includes-es/functions_cotizacion_comercio_v1.5.php");			    	  		

		}else{    	
			include($_SERVER['DOCUMENT_ROOT']."/contacto-es/forma-cotizacion-comercio-parsley.php");	
		}		


?>
<script type="text/javascript">
  $('#form').parsley();
</script>
	</div>
</div>
</body>
</html>