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

$email_asesor=$rowoaa["mail"];

$nombre_asesor=f_dame_nombre_asesor($email_asesor);	
$id_asesor=f_dame_id_asesor($email_asesor);	

mysql_close($link);


$mail_site="contacto@borse.com.mx";
$site_name="BORSE";

if ($borseusa==true){
	$site="[borsehandbranding.com]";
}else{
	$site="[borse.com.mx]";
}
$smtp_server="smtp.gmail.com";

$contact_name =$_REQUEST["vk_nombre"];
$apellidos =$_REQUEST["vk_apellidos"];

$pais_texto=$_REQUEST["vk_pais_texto"];
$cve_internacional=$_REQUEST["vk_cve_internacional"];

$lada=$_REQUEST["vk_lada"];
$telefono=$_REQUEST["vk_telefono"];
$ext=$_REQUEST["vk_ext"];

$empresa =$_REQUEST["vk_empresa"];
$giro =$_REQUEST["vk_giro"];

$contact_email = $_REQUEST["vk_email"];
$como_se_entero=$_REQUEST["vk_como_se_entero"];
$enviar_a=$_REQUEST["vk_enviar_a"];
$comentarios=$_REQUEST["vk_comentarios"];



if ($borseusa==true){
	$contact_subject="Contact " . $enviar_a;
}else{
	$contact_subject="Contactenos " . $enviar_a;
}




if (strlen($ext)>0) {
	$ext_="ext. " . $ext;
}else{
	$ext_="";
}

include ($_SERVER['DOCUMENT_ROOT']."/includes-es/ciudad_telefono.php");
$pais_estado=$fileOutput;


$contact_desc="
<br/>Sitio: $site<br/>
Nombre: $contact_name $apellidos<br/>
Teléfono: $tipo : $cve_internacional ($lada) $telefono $ext_<br/>
$pais_estado
Empresa: $empresa<br/>
Giro: $giro<br/>
E-mail: $contact_email<br/>
Como te enteraste de nosotros: $como_se_entero<br/>
Comentarios: $comentarios";

$mensaje= "datos contacto:\n $contact_desc";


$from=$contact_email;
$FromName="$contact_name $apellidos";
$subject=$contact_subject;

/*include "vk_spam_detected.php";*/

if ($seo || $spam){ } else{
	
	if($enviar_a=="Compras"){
		$mailto="esmeralda@borse.com.mx";
		$texto_asunto="Borse Compras";
	}else if($enviar_a=="Recursos humanos"){
		$mailto="adrianar@borse.com.mx";	
		$texto_asunto="Borse Recursos Humanos";
	}else if($enviar_a=="Atención a clientes"){
		$mailto="alejandra@borse.com.mx";	
		$texto_asunto="Borse Atencion a clientes";
	}else if($enviar_a=="Dirección"){
		$mailto="christian@borse.com.mx";
		$texto_asunto="Borse Direccion";
	}else if($enviar_a=="Ventas"){
		$mailto=$email_asesor;
		$texto_asunto="Borse Ventas";
	}else if($enviar_a=="Brandingmix"){
		$mailto="brandingmix@borse.com.mx";
		$texto_asunto="Borse Desarrollo";
	}	
}

	$mailto_=$mailto;
	
	

		$link = mysql_connect('localhost', 'borse_web', 'l6!Hwf]?5dX9')
		or die ('no se conecto');

		$Fecha=date("d/m/Y H:i:s");	
		$ip = getenv("REMOTE_ADDR");
		
		mysql_select_db('borse_contactos', $link);
		
		mysql_query("SET NAMES 'utf8'");
		
		$query="insert into registro_contactos (id,nombre,apellidos,pais,cve_internacional,lada,telefono,ext,empresa,giro,correo,enviar_a,enterado,comentario,activo,ip) values 
		('$Fecha','$contact_name','$apellidos','$pais_estado','$cve_internacional','$lada','$telefono','$ext','$empresa','$giro','$contact_email','$mailto_','$como_se_entero','$comentarios','1','$ip')";
		
		mysql_query($query);
						
		mysql_close($link);	

		$link = mysql_connect('localhost', 'borse_user', '#L,!pZrFMY2s')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$queryba="UPDATE Tabla_Asesores SET actual = 0 WHERE ID = ".$id_asesor." ";
	$queryna="SELECT ID from Tabla_Asesores WHERE ID > ".$id_asesor." AND activo = 1";
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

		
	
			//email todo a la cuenta de contacto
			$mailto=$mail_site;
			f_mail_smtp($from,$FromName,$mailto,$mensaje,$subject,"0");
	
			//email a persona en borse
			f_mail_smtp($from,$FromName,$mailto_,$mensaje,$texto_asunto,"0");	
		
			//email a rod
			$mailto="ricardo.bc@brandingmix.com";
			f_mail_smtp($from,$FromName,$mailto,$mensaje,$site . "[copia ricardo][" . $subject . "][" . $mailto_ . "]","0");

			//email al cliente
			$from=$mail_site;
			$FromName=$site_name;				
			$mensaje="$contact_name,<br/><br/>Usted ha establecido contacto con BÖRSE, su petición será atendida muy pronto.";
			$subject="Gracias por establecer contacto.";					
			$mailto=array($contact_email,"$contact_name $apellidos");
			f_mail_smtp($from,$FromName,$contact_email,$mensaje,$subject,"0");			
			
			echo "<script>
			
			$(window.location).attr('href', '/contacto-es/contacto-gracias.php');
		
			</script>";
			
			
		
		
		
	
	
	

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
		//$headers.= "From: =?utf-8?b?".base64_encode($Name)."?= <".$email.">\r\n";
		
		$header = "Content-type: text/html; charset=UTF-8\r\n"; // 
		$header .= "From: ". $Name . " <" . $email . ">\r\n"; 		
	
	
		mail($recipient, $subject, $mail_body, $header); //mail command :)
	
	}
	
}


?>