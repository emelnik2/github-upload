<?php

ob_start("ob_gzhandler"); ini_set("session.gc_maxlifetime", "18000");  session_start(); include ($_SERVER['DOCUMENT_ROOT']."/includes-es/consulta_usuario_carrito_v2.php");


include ($_SERVER['DOCUMENT_ROOT']."/includes-es/doctype.php"); 
?>
<title></title>
<meta name="Description" content="" />
<meta name="robots" content="noindex,nofollow" />
<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/includes-es/mobile_detect.php"); 
$detect = new Mobile_Detect;

?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/scripts/simpleCartBorseResponsivo.js"></script>
<script type="text/javascript">

simpleCart({
checkout: {
type: "SendForm",
url: "/includes-es/bolsas-a-cotizar.php",
method: "POST" , 
cartColumns: [
		{ attr: "name" , label: "Producto" } ,
		{ view: "decrement" , label: false , text: "-" } ,
		{ attr: "quantity" , label: "Qty" } ,
		{ view: "increment" , label: false , text: "+" } ,		
		{ view: "image" , attr:" thumb" , label: false} ,
		{ view: "remove" , text: "Remove" , label: false }
	]
}
});

</script>	
<?php include ($_SERVER['DOCUMENT_ROOT']."/includes-es/ga_asynchrona.php"); ?>
</head>
<body>			
	<?php
		include ($_SERVER['DOCUMENT_ROOT']."/includes-es/functions_cotizacion.php");
	?>
</body>
</html>