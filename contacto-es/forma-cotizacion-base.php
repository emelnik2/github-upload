<?php 

ob_start("ob_gzhandler"); ini_set("session.gc_maxlifetime", "18000");  session_start(); /*include ($_SERVER['DOCUMENT_ROOT']."/vk_includes/consulta_usuario_cotizacion_simple.php");*/

include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/doctype.php");

if(isset($_REQUEST["thumbnail"])) {
    $thumbnail = $_REQUEST["thumbnail"];
}

if(isset($_REQUEST["data_title"])) {
    $data_title = $_REQUEST["data_title"];
}

?>


<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forma de Cotización Comercio | BÖRSE</title>
<meta name="robots" content="noindex,follow" />

<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<link href="styles/foundation.css" rel="stylesheet" type="text/css" />
<!--<link href="styles/borse_forms_foundation.css" rel="stylesheet" type="text/css" />-->
<link href="styles/parsley.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

<link rel="stylesheet" href="../styles-es/bulma.css">
<link rel="stylesheet" href="../styles-es/borse.css">
<!--<link rel="stylesheet" href="../styles-es/debug.css">-->

<!-- Buttons CSS file -->
<!--<link rel="stylesheet" type="text/css" href="../styles-es/buttons.css">-->

<!-- BULMA Extensions CSS file -->
<link rel="stylesheet" type="text/css" href="../styles-es/bulma-extensions.css">

<?php  include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/load_jquery.php"); ?>
<script type="text/javascript" src="./scripts/parsley.min.js"></script>
<script src="./scripts/i18n/es.js"></script>
<?php  include ($_SERVER['DOCUMENT_ROOT']."/dev/includes-es/ga_asynchrona.php"); ?>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/scripts/parsley.min.js"></script>
<script src="/dev/contacto-es/scripts/i18n/es.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-36246904-1', 'borse.com.mx');
    ga('require', 'linkid', 'linkid.js');
    ga('send', 'pageview');

</script>

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

    .quoteid {
        color: white;
        background-color: rgb(207, 13, 42);
        text-align: center;
    }

    .requerido:before{content: "*"; display: block; width: .8em; height: 1em; color: #CF0A2C; margin-right: 0; float: left; font-size: 1.3em;}

    .add_padding_top {
        padding-top:  5px;
    }

    hr.style13 {
        height: 10px;
        border: 0;
        box-shadow: 0 10px 10px -10px #cf0d2a inset;
    }

</style>
</head>
<body>

     <?php
         if(isset($_REQUEST["cotizacion_accion"]) && $_REQUEST["cotizacion_accion"]!="") {
             if ($_REQUEST["cotizacion_accion"]=="enviar_cotizacion"){
                 include "./includes/funciones-forma-cotizacion_v2.6.php";
             }
         } else {
             include "forma-cotizacion-bulma.php";
         }
	?>

<script type="text/javascript">
  $('#form').parsley();
</script>
</body>
</html>