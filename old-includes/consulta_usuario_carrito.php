<?php

ob_start("ob_gzhandler"); ini_set("session.gc_maxlifetime", "18000");  session_start();

/*include_once($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_function_check_mail.php");*/			

$accion_submit=$_REQUEST["accion_submit"];

if ($accion_submit=="login_carrito"){

		$carrito_nombre=$_REQUEST["carrito_nombre"];
		$carrito_telefono=$_REQUEST["carrito_telefono"];
		$carrito_lada=$_REQUEST["carrito_lada"];
		$carrito_email=$_REQUEST["carrito_email"];		
		$carrito_pais=$_REQUEST["carrito_pais"];
		$carrito_ext=$_REQUEST["carrito_ext"];
		$carrito_cve=$_REQUEST["carrito_cve"];
		
		
		$carrito_empresa=$_REQUEST["carrito_empresa"];
		$carrito_tipo_de_establecimiento=$_REQUEST["carrito_tipo_de_establecimiento"];
		$carrito_sucursales=$_REQUEST["carrito_sucursales"];
		$carrito_logotipo_tintas=$_REQUEST["carrito_logotipo_tintas"];
		$carrito_como_se_entero=$_REQUEST["carrito_como_se_entero"];								
		$carrito_presupuesto=$_REQUEST["carrito_presupuesto"];
								
								
		$_SESSION["carrito_nombre"]=$carrito_nombre;
		$_SESSION["carrito_telefono"]=$carrito_telefono;
		$_SESSION["carrito_lada"]=$carrito_lada;		
		$_SESSION["carrito_email"]=$carrito_email;
		$_SESSION["carrito_pais"]=$carrito_pais;
		$_SESSION["carrito_cve"]=$carrito_cve;
		
		
		$_SESSION["carrito_empresa"]=$carrito_empresa;
		$_SESSION["carrito_tipo_de_establecimiento"]=$carrito_tipo_de_establecimiento;
		$_SESSION["carrito_sucursales"]=$carrito_sucursales;
		$_SESSION["carrito_logotipo_tintas"]=$carrito_logotipo_tintas;
		$_SESSION["carrito_como_se_entero"]=$carrito_como_se_entero;
		$_SESSION["carrito_presupuesto"]=$carrito_presupuesto;
}	
	

	echo "datos_ok";
		

		
?>