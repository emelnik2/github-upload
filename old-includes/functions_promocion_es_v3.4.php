<?php

//compras
//recursos humanos
include ($_SERVER['DOCUMENT_ROOT']."/includes-es/functions_db_asesores_v2.1.php");	

//Obtenemos el asesor activo
$link = mysql_connect('borse.com.mx', 'borse_user', '#L,!pZrFMY2s')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$queryoaa="SELECT * from Tabla_Asesores where actual = 1";
	$resultoaa = mysql_query($queryoaa);
	$rowoaa = mysql_fetch_array($resultoaa);

$email_asesor_actual=$rowoaa["mail"];

$_SESSION["email_asesor"] = $email_asesor_actual;
$_SESSION["nombre_asesor"]=f_dame_nombre_asesor($_SESSION["email_asesor"]);	
		$_SESSION["id_asesor"]=f_dame_id_asesor($_SESSION["email_asesor"]);	

mysql_close($link);
 

$mail_site="cotizaciones@borse.com.mx";
$site_name="BORSE";
$site="[borse.com.mx]";

$smtp_server="smtp.gmail.com";

$contact_name =$_REQUEST["vk_nombre"];
$apellidos =$_REQUEST["vk_apellidos"];

$pais=$_REQUEST["vk_pais"];

$cve_internacional=$_REQUEST["vk_cve_internacional"];
$lada=$_REQUEST["vk_lada"];
$telefono=$_REQUEST["vk_telefono"];
$ext=$_REQUEST["vk_ext"];

$empresa =$_REQUEST["vk_empresa"];
$giro =$_REQUEST["vk_giro"];

$contact_email = $_REQUEST["vk_email"];
$como_se_entero=$_REQUEST["vk_como_se_entero"];

$cantidad=0; //ya no se utiliza
$presupuesto_maximo=$_REQUEST["vk_presupuesto_maximo"];

$codigo_promocional=$_REQUEST["vk_codigo_promocional"];
$descuento=$_REQUEST["vk_descuento"];
$especificaciones=$_REQUEST["vk_especificaciones"];

$enviar_a="Ventas";





$spam=false; $spam_pos=strpos($comentarios,"http://"); if ($spam_pos!==false) $spam=true;

$contact_subject="Solicitud de promocion " . $enviar_a;



$_SESSION["nombre_asesor"]=f_dame_nombre_asesor($_SESSION["email_asesor"]);	
		$_SESSION["id_asesor"]=f_dame_id_asesor($_SESSION["email_asesor"]);			
		$ADMIN_EMAIL = $_SESSION["email_asesor"];

include ($_SERVER['DOCUMENT_ROOT']."/includes-es/ciudad_telefono.php");
$pais_estado=$fileOutput;

$descripcion="Codigo promocional: $codigo_promocional<br/>
Presupuesto máximo: $presupuesto_maximo<br/>
Descuento: - $descuento %<br/>
Especificaciones: $especificaciones<br/>";

$contact_desc="
<br/>Sitio: $site<br/>
Nombre: $contact_name $apellidos<br/>
Teléfono: $tipo : $cve_internacional ($lada) $telefono $ext_<br/>
Pais: $pais<br/>
Empresa: $empresa<br/>
Giro: $giro<br/>
E-mail: $contact_email<br/>
Como te enteraste de nosotros: $como_se_entero<br/><br/>
$pais_estado<br/><br/>
$descripcion";

$mensaje= "datos contacto:\n $contact_desc";


$from=$contact_email;
$FromName="$contact_name $apellidos";
$subject=$contact_subject;


$spam_msg="";
if ($spam){	
	 $spam_msg="spam detected";
}

if ($spam){


}else{

	if($enviar_a=="Ventas"){
		$mailto=$ADMIN_EMAIL;
		$texto_asunto="Borse Ventas";
	}else if($enviar_a=="Brandingmix"){
		$mailto="ricardo.bc@brandingmix.com";
		$texto_asunto="Borse Desarrollo";
	}

	
		f_mail_smtp($from,$FromName,$mailto,$mensaje,$texto_asunto,"0");	
		//copia a la cuenta de cotizaciones
		$mailto=$mail_site;
		f_mail_smtp($from,$FromName,$mailto,$mensaje,$subject  . " " . $ADMIN_EMAIL,"0");
	

	
}

$mailto="ricardo.bc@brandingmix.com";
f_mail_smtp($from,$FromName,$mailto,$mensaje,"[borse.com.mx Solicitud de promocion Rick][" . $ADMIN_EMAIL . "]","0");

////////////////////////////////////////////////////////////////////////////
	$asesor=$_SESSION["nombre_asesor"];

	$datos="<p>Cotización en proceso...<br/><br/>
	Estimado(a) $contact_name $apellidos<br/><br/>
	Gracias por solicitar nuestra promoción vía internet a BÖRSE.<br/><br/>
	Su solicitud ha sido recibida. <br/><br/>
	En menos de 24 horas hábiles, le daremos respuesta a lo que solicita a continuación. <br/><br/></p>";

	$body_cliente = "<html>
	<head>
	<style type=\"text/css\">
	BODY
	{
		font-family: arial, helvetica, sans-serif;
		font-size: 12px;
	}
	P
	{		
		font-size: 12px;
	}
	TABLE
	{
		border: 1px solid #000000;
	}
	#Content
	{
		width: 485px;
	}
	#Header
	{
		font-weight: bold;
		font-size: 12pt;
	}	
	</style>
	</head>
	<body>
	<div id=\"Header\">" . $datos . "</div>
	<table cellspacing=\"0\" cellpadding=\"10\" border=\"0\"><tr><td>"	
	. $descripcion 
	. "</td></tr></table>
	<br/><br/>
	<p>
	Atentamente<br/><br/>
	$asesor<br/>
	Asesor de ventas / Sales consultant<br/>
	Winsnes de México / BÖRSE HandBranding.<br/>
	Calle 5 # 532 Zona Industrial Guadalajara JAL. México<br/><br/>
	 
	318 N Carson ST # 208 Carson City NV 89701 U.S.A.<br/><br/>
	 
	$ADMIN_EMAIL<br/>
	www.borse.com.mx<br/>
	 
	+52 33 3540-2500 con 30 líneas.<br/>
	L.S.C.01800 265 7279<br/>
	Toll Free 1 866 201 2111<br/><br/>


	Please note that federal tax regulations (Circular 230) impose certain requirements on written tax advice, including e-mails. This e-mail (including any attachments and enclosures) is not intended to be a 'reliance opinion' within the meaning of Circular 230. Accordingly, this e-mail and any tax advice given herein is not intended or written to be used, and cannot be used, as a 'reliance opinion' for the purpose of avoiding tax penalties that may be imposed under applicable tax laws.<br/><br/>
	This is an email from Borse Handbranding Inc. and/or Winsnes de Mexico S.A. and/or Plasticos Impresos Tapatios, S.A de C.V. (affiliated and independent entities). This email and any attachments hereto may contain information that is confidential and/or protected by client privilege and work product doctrine. This email is not intended for transmission to, or receipt by, any unauthorized persons. Inadvertent disclosure of the contents of this email or its attachments to unintended recipients is not intended to and does not constitute a waiver of client privilege or work product protections. If you have received this email in error, immediately notify the sender of the erroneous receipt and destroy this email, any attachments, and all copies of same, either electronic or printed. Any disclosure, copying, distribution, or use of the contents or information received in error is strictly prohibited.<br/><br/>
	 
	AVISO DE CONFIDENCIALIDAD Y CONFIABILIDAD -- La información contenida en este mensaje y sus anexos es confidencial, podría constituir información privilegiada y su no divulgación está protegida por la ley. Dicha información está dirigida únicamente a su(s) destinatario(s). Si usted no es el destinatario a quien esta comunicación va dirigida, en este acto se le notifica que cualquier uso, incluyendo sin limitarse a la diseminación, distribución, divulgación o copia de este mensaje y sus anexos esta estrictamente prohibida. Si usted no es el destinatario de esta comunicación, le rogamos nos lo notifique inmediatamente y la borre de su sistema de computo. TENGALO EN CUENTA. El mensaje contenido en esta comunicación no implica la existencia de convenio alguno o firma vinculante, expresa o implícita, a menos que en el mensaje contenido exista declaración expresa en tal sentido.
	</p>

	</body>
	</html>";	
	

$from=$ADMIN_EMAIL;
$FromName=$_SESSION["nombre_asesor"];
$mailto=array($contact_email,"$contact_name $apellidos");
$mensaje=$body_cliente;
$subject="Solicitud de promocion en proceso";
f_mail_smtp($from,$FromName,$contact_email,$mensaje,$subject,"0");

/////////////***************	
	
	$link = mysql_connect('localhost', 'borse_web', 'l6!Hwf]?5dX9')
    or die ('no se conecto');

	$Fecha=date("d/m/Y H:i:s");	
	$ip = getenv("REMOTE_ADDR");
	
	mysql_select_db('borse_contactos', $link);
	
	mysql_query("SET NAMES 'utf8'");
	$mailto_=$ADMIN_EMAIL;
	$query="insert into registro_solicitud_promocion (id,nombre,apellidos,pais,cve_internacional,lada,telefono,ext,empresa,giro,correo,enterado,asesor,cantidad,presupuesto_maximo,codigo_promocional,descuento,descripcion,activo,ip) values 
	('$Fecha','$contact_name','$apellidos','$pais_estado','$cve_internacional','$lada','$telefono','$ext','$empresa','$giro','$contact_email','$como_se_entero','$mailto_','$cantidad','$presupuesto_maximo','$codigo_promocional','$descuento','$especificaciones','1','$ip')";
	mysql_query($query);
	mysql_close($link);

	$link = mysql_connect('localhost', 'borse_user', '#L,!pZrFMY2s')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$queryba="UPDATE Tabla_Asesores SET actual = 0 WHERE ID = ".$_SESSION["id_asesor"]." ";
	$queryna="SELECT ID from Tabla_Asesores WHERE ID > ".$_SESSION["id_asesor"]." AND activo = 1";
	$resultna = mysql_query($queryna);
	if ($rowna = mysql_fetch_array($resultna)){
		$Idna=$rowna["ID"];
	} else {
		$queryna2="SELECT ID from Tabla_Asesores WHERE activo = 1";
	$resultna2 = mysql_query($queryna2);
	$rowna2 = mysql_fetch_array($resultna2);
	$Idna=$rowna2["ID"];
	}
	$queryaa="UPDATE Tabla_Asesores SET actual = 1 WHERE ID = ".$Idna." ";

	
		

		

		
		mysql_query($queryba);
		mysql_query($queryaa);
	
	
	
	mysql_close($link);	
	
	
	if ($prueba==true){ 
		echo 'prueba finalizada';
	}else{
		echo "<script>			
		$(window.location).attr('href', '/contacto-es/promocion-gracias.php');		
		</script>";
	
	}



function f_mail_smtp($from,$FromName,$mailto,$mensaje,$subject,$mostrar_error){
	
	global $mail_site, $smtp_server;

	$mensaje=html_entity_decode ($mensaje);
	$subject=html_entity_decode ($subject);
		
	if ($mostrar_error=="1"){
		echo "from:" . $from . "<br>";
		echo "FromName:" . $FromName . "<br>";
		echo "mailto:" . $mailto . "<br>";
		echo "mensaje:" . $mensaje . "<br>";
		echo "subject:" . $subject . "<br>";			
	}else{


		//$mailto=f_forward($mailto);
			
		ini_set ("SMTP",$smtp_server);
		ini_set('sendmail_from', $mail_site); 
	
		$Name = f_elimina_acentos($FromName) ;
		$email = $from; 
		$recipient = $mailto; 
		$mail_body = $mensaje;	
		$subject = $site . " " . $subject;
		$header = "From: ". $Name . " <" . $email . ">\r\n"; 
		$header .= "Content-type: text/html; charset=UTF-8\r\n"; // 		
	
	
		mail($recipient, $subject, $mail_body, $header); //mail command :)
	
	}
	
}

?>