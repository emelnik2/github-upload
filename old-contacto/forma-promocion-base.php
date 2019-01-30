<?php 

ob_start("ob_gzhandler"); ini_set("session.gc_maxlifetime", "18000");  session_start(); include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/consulta_usuario_cotizacion_simple.php");

@$contact_accion=$_REQUEST["contact_accion"];

include ($_SERVER['DOCUMENT_ROOT']."/includes-es/doctype.php"); 

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index,follow" />
<title>Forma de Solicitud de Promoción Borse</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<link href="/styles/foundation.css" rel="stylesheet" type="text/css" />
<link href="/styles/borse_forms_foundation.css" rel="stylesheet" type="text/css" />
<link href="/styles/parsley.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes-es/load_jquery.php"); ?>
<script type="text/javascript" src="/scripts/parsley.min.js"></script>
<script src="/scripts/i18n/es.js"></script>
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes-es/ga_asynchrona.php"); ?>
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

.primaryAction svg g {fill:#CF0A2C !important}

.requerido:before{content: "*"; display: block; width: .8em; height: 1em; color: #CF0A2C; margin-right: 0; float: left; font-size: 1.3em;}
	
.span_button {
  font-weight: 600;
  font-size: 1.2em;
	margin-right: 3em;
}	

.ico_btn {
  float: right;
  margin-top: -0.1em;
  margin-left: 0.3em;
  width: 2.3rem;
  height: 1.3rem;
}

a:hover {color:#CF0A2C !Important}

</style>
</head>
<body>
<div id="main_container" >
	<div id="contact_container">
    <?php

      $contact_accion=$_REQUEST["contact_accion"];

  		if ($contact_accion=="enviar_contacto"){
  							
  			include ($_SERVER['DOCUMENT_ROOT']."/includes-es/functions_promocion_es_v3.4.php");			    	  		

  		}else{

  			include($_SERVER['DOCUMENT_ROOT']."/contacto-es/forma-promocion-parsley.php");	
  		}

    ?>
<script type="text/javascript">
  $('#data_form').parsley();
</script>
	</div>
</div>
</body>
</html>