<?php

//$mail_site="contacto@borse.com.mx";
//$site_name="BORSE";
//$smtp_server="mail.borse.com.mx";

include ($_SERVER['DOCUMENT_ROOT']."/includes-es/functions_db_asesores_v2.1.php");	


$link = mysql_connect('borse.com.mx', 'borse_user', '!borseUsR#')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$queryoaa="SELECT * from Tabla_Asesores where actual = 1";
	$resultoaa = mysql_query($queryoaa);
	$rowoaa = mysql_fetch_array($resultoaa);

$email_asesor=$rowoaa["mail"];

$nombre_asesor=f_dame_nombre_asesor($email_asesor);	
$id_asesor=f_dame_id_asesor($email_asesor);	

mysql_close($link);
$_SESSION["email_asesor"] = $email_asesor;
$_SESSION["nombre_asesor"]=$nombre_asesor;	
		$_SESSION["id_asesor"]=$id_asesor;	
		$ADMIN_EMAIL=$email_asesor;


	
		
	
//aqui ya debe de estar guardado en la session el nombre de asesor
	

include_once($_SERVER['DOCUMENT_ROOT']."/includes-es/function_check_mail.php");	
	
	
	
	$carrito_ext_="";
	if (strlen($carrito_ext)>0) $carrito_ext_=" Ext. " . $carrito_ext_;
	
	$carrito_pais_="";
	if ($carrito_pais=="52"){
		$carrito_pais_="01";
	}else {
		$carrito_pais_=$carrito_pais;
	}
	
	$datos="nombre y apellidos: $carrito_nombre<br/>
	teléfono: $carrito_pais_ ($carrito_lada) $carrito_telefono$carrito_ext_<br/>
	email: $carrito_email<br/>";


	$cve_internacional=$carrito_pais;
	$lada=$carrito_lada;
	include ($_SERVER['DOCUMENT_ROOT']."/includes-es/ciudad_telefono.php");
	$pais_estado=$fileOutput;

	
	if (strlen($pais_estado)>0) $datos=$datos . $pais_estado;
	
	//if (strlen($carrito_pais)) $datos=$datos . "pais: $carrito_pais<br/>";
	if (strlen($carrito_empresa)) $datos=$datos . "empresa: $carrito_empresa<br/>";
	if (strlen($carrito_tipo_de_establecimiento)) $datos=$datos . "tipo de establecimiento: $carrito_tipo_de_establecimiento<br/>";
	//if (strlen($carrito_sucursales)) $datos=$datos . "sucursales: $carrito_sucursales<br/>";
	//if (strlen($carrito_logotipo_tintas)) $datos=$datos . "logotipo tintas: $carrito_logotipo_tintas<br/>";	
	if (strlen($carrito_como_se_entero)) $datos=$datos . "como se entero: $carrito_como_se_entero<br/>";
    if (strlen($carrito_presupuesto)) $datos=$datos . "presupuesto: $carrito_presupuesto<br/>";
	
	$nombre_completo = $carrito_nombre;	
	$email=$carrito_email;

	
	
	$asesor=$_SESSION["nombre_asesor"];

	

	foreach($_POST as $key => $value)
	{
		//echo $key . ": " . $value . "<br />";
		$$key=$value;
	}

	//echo "itemCount:" . $itemCount;

	$div ='<tr class="cartHeaders"><td class="itemname">Descripción</td><td class="itemthumb">Foto</td><td class="itemQuantity">Cantidad</td><td class="itemObservaciones">Observaciones</td></tr>';


	for ($i=1;$i<$itemCount+1;$i++){
		
	$var1="item_name_" . $i;
	$var2="item_options_" . $i;
	$var3="item_quantity_" . $i;
	//$$var2=str_replace("thumb: ","",$$var2);
	
	
	
	$material=f_dame_opcion($$var2,"material","cantmin");
	$thumb=f_dame_opcion($$var2,"thumb","sizes");	
	$ancho=f_dame_opcion($$var2,"ancho","alto");	
	$alto=f_dame_opcion($$var2,"alto","base");	
	$base=f_dame_opcion($$var2,"base","tintasvta");		
	$sizes_selected=f_dame_opcion($$var2,"sizes_selected",",");
	$tipo_selected=f_dame_opcion($$var2,"tipo_selected",",");
	$empacar_selected=f_dame_opcion($$var2,"empacar_selected",",");
	$tintasfte_selected=f_dame_opcion($$var2,"tintasfte_selected",",");
	$tintasvta_selected=f_dame_opcion($$var2,"tintasvta_selected",",");
	$fechaentrega=f_dame_opcion($$var2,"fechaentrega_selected",",");
	$evento=f_dame_opcion($$var2,"eventos_selected",",");
	//$evento=f_dame_opcion($$var2,"evento","fechaentrega");
	$unidades=f_dame_opcion($$var2,"unidades",",");


	$size=str_replace("ocultar","",$size);		
	

	if (substr($$var1,0,9)=="PAPEL DE "){

	}else if (substr($$var1,0,10)=="ROLLOS DE "){

	}else if (substr($$var1,0,10)=="BOLSAS DE "){

	}else{
		
		$$var1="BOLSAS DE " . strtoUpper($material) . " " . $$var1;
		

	}



	if (strlen($tintasfte_selected)==0){
		$tintasfte_selected="1";
	}

	if (strlen($tintasvta_selected)==0){
		$tintasvta_selected="0";
	}


	$observaciones=f_dame_opcion($$var2,"observaciones","");

	if (strlen($empacar_selected)>0){
		$empacar_selected="<br/>Para empacar: " . $empacar_selected;
	}

	if (strlen($fechaentrega)>0){
		$fechaentrega="Fecha deseable para entrega: " . $fechaentrega . "<br/><br/>";
	}

	if (strlen($evento)>0){
		$evento="Tiene Usted algún evento: " . $evento . "<br/><br/>";
	}
	

	
	if (strlen($sizes_selected)>0){
		$size=$sizes_selected;
	}else{
		$size="ancho:" . $ancho . " alto:" . $alto;
		if (strlen($base)>0) $size.="base:" . $base;
	}
	
	
	//echo $$var2;
	$div.='<tr class="itemContainer">';
	$div.= '<td class="itemname">' . $$var1 . '
	<br/>tamaño:' . $size . ', tintas: ' . $tintasfte_selected . ' frente  / ' . $tintasvta_selected . ' vuelta 
	<br/>' . $tipo_selected . '
	' . $empacar_selected . '
	</td>';
	$div.= '<td class="itemthumb"><img src="' . $thumb . '"/></td>';
	$div.= '<td class="itemQuantity">' . $$var3 . ' ' . $unidades . '</td>';
	$div.= '<td class="itemObservaciones">' . $fechaentrega . $evento . $observaciones . '</td>';
	$div.='</tr>';
	}

	//if( !isset($_POST['div']) ){

	  //echo "no data provided"; 
	  //return;
	//} 	  	


	$body = "<html>
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
	.simpleCart_items .cartHeaders
	{
		border-top: 1px solid #000000;
		border-bottom: 1px solid #000000;
	}
	.itemContainer
	{
		border-bottom: 1px solid #000000;
		border-top: 1px solid #000000;
	}
	.itemQuantity
	{
		width: 73px;
		border-bottom: 1px solid #000000;
		border-right: 1px solid #000000;
	}
	.itemObservaciones
	{
		width: 280px;
		border-bottom: 1px solid #000000;
	}
	.itemthumb
	{
		width: 57px;
		border-right: 1px solid #000000;
		border-bottom: 1px solid #000000;
	}
	.itemName
	{
		width: 247px;
		border-right: 1px solid #000000;
		border-bottom: 1px solid #000000;
	}
	.itemTotal
	{
		width: 102px;
		border-left: 1px solid #000000;
		text-align: right;
		border-bottom: 1px solid #000000;
	}
	.itemQuantity INPUT
	{
		width: 58px;
		border: 1px solid transparent;
		text-align: center;
	}
	.itemPrice
	{
		width: 70px;
		border-right: 1px solid #000000;
	}
	#cartTotal
	{
		color: #020202;
		font-weight: bold;
		font-size: 14pt;
		margin-left: 244px;
	}

	</style>
	</head>
	<body>
	<div id=\"Header\">" . $datos . "</div>
	<table cellspacing=\"0\" cellpadding=\"10\" border=\"0\">"
	. $div 
	. "</table>
	</body>
	</html>";

	

	
	$datos="<p>$email_asesor Cotización en proceso...<br/><br/>
	Estimado(a) $carrito_nombre<br/><br/>
	Gracias por solicitar tu cotización vía internet a BÖRSE.<br/><br/>
	Tu solicitud de cotización ha sido recibida. <br/><br/>
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
	.simpleCart_items .cartHeaders
	{
		border-top: 1px solid #000000;
		border-bottom: 1px solid #000000;
	}
	.itemContainer
	{
		border-bottom: 1px solid #000000;
		border-top: 1px solid #000000;
	}
	.itemQuantity
	{
		width: 73px;
		border-bottom: 1px solid #000000;
		border-right: 1px solid #000000;
	}
	.itemObservaciones
	{
		width: 280px;
		border-bottom: 1px solid #000000;
	}
	.itemthumb
	{
		width: 57px;
		border-right: 1px solid #000000;
		border-bottom: 1px solid #000000;
	}
	.itemName
	{
		width: 247px;
		border-right: 1px solid #000000;
		border-bottom: 1px solid #000000;
	}
	.itemTotal
	{
		width: 102px;
		border-left: 1px solid #000000;
		text-align: right;
		border-bottom: 1px solid #000000;
	}
	.itemQuantity INPUT
	{
		width: 58px;
		border: 1px solid transparent;
		text-align: center;
	}
	.itemPrice
	{
		width: 70px;
		border-right: 1px solid #000000;
	}
	#cartTotal
	{
		color: #020202;
		font-weight: bold;
		font-size: 14pt;
		margin-left: 244px;
	}

	</style>
	</head>
	<body>
	<div id=\"Header\">" . $datos . "</div>
	<table cellspacing=\"0\" cellpadding=\"10\" border=\"0\">"
	. $div 
	. "</table>
	<br/><br/>
	<p>
	Atentamente<br/><br/>
	$asesor<br/>
	Asesor de ventas / Sales consultant<br/>
	Winsnes de México / BÖRSE HandBranding.<br/>
	Calle 5 # 532 Zona Industrial Guadalajara JAL. México<br/><br/>
	 
	318 N Carson ST # 208 Carson City NV 89701 U.S.A.<br/><br/>
	 
	$email_asesor--<br/>
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
	
			
	$link = mysql_connect('localhost', 'borse_web', '#H+2F4vSokoc')
    or die ('no se conecto');

	$Fecha=date("d/m/Y H:i:s");	
	$ip = getenv("REMOTE_ADDR");
	
	$descripcion='<table cellspacing=\"0\" cellpadding=\"10\" border=\"0\">"'. $div .'"</table>';
	
	mysql_select_db('borse_contactos', $link);
	
	mysql_query("SET NAMES 'utf8'");
	
	$query="insert into registro_cotizaciones (id,nombre,apellidos,pais,cve_internacional,lada,telefono,ext,
	empresa,giro,correo,asesor,sucursales,tintas_logotipo,enterado,descripcion,activo,ip) values 
	('$Fecha','$carrito_nombre','','$pais_estado','$cve_internacional','$lada','$carrito_telefono','$carrito_ext',
	'$carrito_empresa','$carrito_tipo_de_establecimiento','$carrito_email','$email_asesor','$carrito_sucursales','$carrito_logotipo_tintas','$carrito_como_se_entero','$descripcion','1','$ip')";
	
	
		mysql_query($query);
		
		$contacto_repetido=false;
		
		$query="SELECT count(DISTINCT r1.id) AS registros, MAX(r1.numero) AS ultimo_numero FROM `registro_cotizaciones` AS r1 INNER JOIN `registro_cotizaciones` AS r2 WHERE r1.nombre=r2.nombre AND r1.apellidos=r2.apellidos AND r1.pais=r2.pais AND r1.cve_internacional=r2.cve_internacional AND r1.lada=r2.lada AND r1.telefono=r2.telefono AND r1.ext=r2.ext AND r1.empresa=r2.empresa AND r1.giro=r2.giro AND r1.correo=r2.correo AND r1.sucursales=r2.sucursales AND r1.tintas_logotipo=r2.tintas_logotipo AND r1.enterado=r2.enterado AND  r1.descripcion=r2.descripcion AND r1.ip=r2.ip AND r1.ip LIKE '$ip'";
		
		$result =  mysql_db_query('borse_contactos', $query);
		
		$row = mysql_fetch_array($result);
			
		if ($row['registros']>1){		
			$query = "DELETE FROM `registro_cotizaciones` WHERE `numero` = " . $row['ultimo_numero'] . ";";
			mysql_db_query('borse_contactos', $query);
			$contacto_repetido=true;
		}
			
		
		
		mysql_close($link);	
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
		

	if ($contacto_repetido==false){
						
		$subject = "solicitud de cotización borse";
		$mensaje=$body;		
			
		//email a persona en borse		
		$mailto=$ADMIN_EMAIL;
		f_mail_smtp($carrito_email,$nombre_completo,$mailto,$mensaje,$subject,0);
			
		//email todo a la cuenta de cotizaciones
		$mailto="cotizaciones@borse.com.mx";
		f_mail_smtp($carrito_email,$nombre_completo,$mailto,$mensaje,$subject . " " . $ADMIN_EMAIL,0);
		
		//email a rod
		$mailto="ricardo.bc@brandingmix.com";
		f_mail_smtp($carrito_email,$nombre_completo,$mailto,$mensaje,$subject . " " . $ADMIN_EMAIL,0);	
		
		
		//email al cliente
		$mensaje=$body_cliente;
		$from=$ADMIN_EMAIL;
		$FromName=$asesor;		
		$mailto=$carrito_email;
		$subject="Cotización en proceso";		
		f_mail_smtp($from,$FromName,$mailto,$mensaje,$subject,0);	

		//email al cliente copia Rick
		$mailto="ricardo.bc@brandingmix.com";
		f_mail_smtp($from,$FromName,$mailto,$mensaje,"cc " . $subject,0);

	
		echo "<script>					
		$(window.location).attr('href', '/contacto-es/cotizacion_gracias.php'); 
		</script>";
	
	}else{
	
		echo "<script>					
		$(window.location).attr('href', '/contacto-es/cotizacion_gracias.php'); 
		</script>";
	
	
	}
			



	


		//de preferencia que brinque al url donde se envio
		echo "<script>
			
		$(window.location).attr('href', '/');
		
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
		//$header = "Message-ID: <".time()." TheSystem@".$_SERVER['SERVER_NAME'].">\r\n";
		$header = "From: ". $Name . " <" . $email . ">\r\n"; 
		$header .= "Content-type: text/html; charset=UTF-8\r\n"; 		
		//$header .= "X-Mailer: PHP v".phpversion()."\r\n";
	
		mail($recipient, $subject, $mail_body, $header); //mail command :)
	
	}
	
}	
	
function f_dame_opcion($string,$opcion,$sig_opcion){
	
	$string_length=strlen($string);	
	$opcion_length=strlen($opcion)+1;	
	$sig_opcion_length=strlen($sig_opcion)+2;
	$output="";
	for ($j=0;$j<$string_length;$j++){
		if ($ini==true){
			if ($sig_opcion=="," && substr($string,$j,1)==","){
				break;
			}
			if (substr($string,$j,$sig_opcion_length)==", " . $sig_opcion){	
				break;
			}
		}		
		if (substr($string,$j,$opcion_length)==$opcion . ":"){				
			$j=$j+$opcion_length+1;
			$ini=true;
		}
		if ($ini==true){
			$output.=substr($string,$j,1);
		}
		
	}
	return($output);
	
}

function f_esta_palabra_es_variable($string,$desde){

	$string_length=strlen($string);	
	for ($k=$desde;$k<$string_length;$k++){
		if (substr($string,$k,1)==":"){	
			return(true);
		}else if (substr($string,$k,1)==" "){	
			return(false);
		}
	}
	return(false);
}



//ob_end_flush(); 
?>