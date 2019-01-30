<?php 

//le falta php session

//@$contact_accion=$_REQUEST["contact_accion"];
ob_start();
include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/doctype.php");

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forma de Contacto | BÖRSE</title>
<meta name="description" content="Si necesita contactar con un representante de bolsas impresas BÖRSE, nuestra forma de contacto es el medio ideal para hacerlo." />
<meta name="robots" content="index,follow" />

<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="./styles/bulma-radio-checkbox.css">

<link rel="stylesheet" href="../styles-es/bulma.css">
<link rel="stylesheet" href="../styles-es/borse.css">
<!--<link rel="stylesheet" href="../styles-es/debug.css">-->
<!--<link rel="stylesheet" href="../contacto-es/styles/borse_forms_foundation.css">-->
<link href="./styles/parsley.css" rel="stylesheet" type="text/css" />

<?php include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/load_jquery.php"); ?>
<script type="text/javascript" src="./scripts/parsley.min.js"></script>
<script src="./scripts/i18n/es.js"></script>
<?php include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/ga_asynchrona.php"); ?>

<!-- Buttons CSS file -->
<!-- <link rel="stylesheet" type="text/css" href="../styles-es/buttons.css">-->

<!-- BULMA Extensions CSS file -->
<link rel="stylesheet" type="text/css" href="../styles-es/bulma-extensions.css">

<style>

input.checkbox  {
	width: 2em;
	height: 2em;
	display: inline;
	padding: 0;
}

.primaryAction svg g {fill:#CF0A2C !important}
	
.contactid {
    color: white;
    background-color: rgb(207, 13, 42);
    text-align: center;
}

.requerido:before{content: "*"; display: block; width: .8em; height: 1em; color: #CF0A2C; margin-right: 0; float: left; font-size: 1.3em;}

hr.style13 {
    height: 10px;
    border: 0;
    box-shadow: 0 10px 10px -10px #cf0d2a inset;
}
	
</style>
</head>
<body>

    <?php
        if(isset($_REQUEST["contact_accion"]) && $_REQUEST["contact_accion"]!="") {
            if ($_REQUEST["contact_accion"]=="enviar_contacto"){
                include "./includes/funciones-forma-contacto_v2.6.php";
            }
         } else {
            include "forma-contacto-bulma.php";
        }
    ?>

    <script type="text/javascript">
  $('#data_form').parsley();
</script>
</div>
</body>
</html>