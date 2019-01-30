<?php 

//le falta php session

@$contact_accion=$_REQUEST["contact_accion"];

include ($_SERVER['DOCUMENT_ROOT']."/includes-es/doctype.php"); 

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index,follow" />
<title>Forma de Contacto Borse</title>
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

input.checkbox  {
	width: 2em;
	height: 2em;
	display: inline;
		padding: 0;
	}

.primaryAction svg g {fill:#CF0A2C !important}
	
.requerido:before{content: "*"; display: block; width: .8em; height: 1em; color: #CF0A2C; margin-right: 0; float: left; font-size: 1.3em;}
	
</style>
</head>
<body>
<div id="main_container" >
	<div id="contact_container">
  <?php

    $contact_accion=$_REQUEST["contact_accion"];

		if ($contact_accion=="enviar_contacto"){
	
							
			include ($_SERVER['DOCUMENT_ROOT']."/includes-es/functions_contacto_v2.5.php");			    	  		

		}else{    	
			include($_SERVER['DOCUMENT_ROOT']."/contacto-es/forma-contacto-parsley.php");	
		}		


?>
<script type="text/javascript">
  $('#data_form').parsley();
</script>
	</div>
</div>
</body>
</html>