<?php





//function f_asesor_vigente($asesor_found,$array_asesores){
function f_asesor_vigente($asesor_found){
	$asesor_actual=false;
	/* for ($i=0;$i<count($array_asesores);$i++){
		if ($asesor_found==$array_asesores[$i][1]){
			$asesor_actual=true;
			break;
		}
	} */
	$link = mysql_connect('localhost', 'borse_user', '#L,!pZrFMY2s')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$queryav="SELECT * from Tabla_Asesores WHERE actual = 1";
	$resultav = mysql_query($queryav);
	$rowav = mysql_fetch_array($resultav);

	if($rowav["activo"]==1){
	$asesor_actual=true;
	}
	mysql_close($link);

	return($asesor_actual);
}

function f_elimina_acentos($string){

	$string = str_replace("á", "a", $string);
	$string = str_replace("é", "e", $string);
	$string = str_replace("í", "i", $string);
	$string = str_replace("ó", "o", $string);
	$string = str_replace("ú", "u", $string);
	$string = str_replace("Á", "A", $string);
	$string = str_replace("É", "E", $string);
	$string = str_replace("Í", "I", $string);
	$string = str_replace("Ó", "O", $string);
	$string = str_replace("Ú", "U", $string);
	$string = str_replace("ñ", "n", $string);
	$string = str_replace("Ñ", "N", $string);
	}





function f_dame_nombre_asesor($email_user){
//function f_dame_nombre_asesor_picasa($email_user,$array_asesores){

	/*global $prueba;

	for ($iii=0;$iii<count($array_asesores);$iii++){
		if ($email_user==$array_asesores[$iii][1] . "@borse.com.mx"){
			return((string)$array_asesores[$iii][0]);
		}
	}
	*/
	$link = mysql_connect('localhost', 'borse_user', '#L,!pZrFMY2s')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$querydna="SELECT * from Tabla_Asesores WHERE mail = '".$email_user."'";
	$resultdna = mysql_query($querydna);
	$rowdna = mysql_fetch_array($resultdna);

	if($rowdna["activo"]==1){
	return($rowdna["descr"]);
	}

mysql_close($link);

	//si no lo encuentra es que el asesor esta inactivo
	return(false);
}


// Nueva funcion para facilitar la asignacion del proximo asesor

function f_dame_id_asesor($email_user){
//function f_dame_nombre_asesor_picasa($email_user,$array_asesores){

	/*global $prueba;

	for ($iii=0;$iii<count($array_asesores);$iii++){
		if ($email_user==$array_asesores[$iii][1] . "@borse.com.mx"){
			return((string)$array_asesores[$iii][0]);
		}
	}
	*/
	$link = mysql_connect('localhost', 'borse_user', '#L,!pZrFMY2s')
    or die ('no se conecto');
	
	mysql_select_db('borse_asesores', $link);

	$querydia="SELECT * from Tabla_Asesores WHERE mail = '".$email_user."'";
	$resultdia = mysql_query($querydia);
	$rowdia = mysql_fetch_array($resultdia);

	if($rowdia["activo"]==1){
	return($rowdia["ID"]);
	}

mysql_close($link);

	//si no lo encuentra es que el asesor esta inactivo
	return(false);
}


?>