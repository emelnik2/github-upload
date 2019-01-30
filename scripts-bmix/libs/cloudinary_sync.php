<?php
session_start();
$params = $_GET;
// read albums from cloudinary to db or directly from db or just read from cloudinary
// modo de uso: 
// CloudinarySync.php?album=album_name&todb=1/0&readdb=0/1/0
// todos los parametros son opcionales, por default lee todos los albumes, no graba en db y no lee de db
// album_name es el nombre del album a leer 
// todb especifica si solo se quiere leer de cloudinary (0) o tambien grabar en db (1)
// readdb especifica si se quiere leer el album de la db (1) o no (0)
include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/classes/image_getter.class.php");
try {
	$album_name = (isset($params["album"]) ? $params["album"] : "");
	$save_to_db = (isset($params["todb"]) ? $params["todb"] : "0");
	$rd_from_db = (isset($params["readdb"]) ? $params["readdb"] : "0");
	$resumes_db = (isset($params["continue"]) ? $params["continue"] : "0");
	$img_db_cl = new Img_db();
	$img_lib_cy = new img_getter_cy();
	$img_lib_cy->get_key = function($img_name){if (strpos($img_name, "-inp-") !== false) {$subarr = explode("-inp-", $img_name); return "inp-".$subarr[1];} else {return $img_name;}};
	$img_lib_cy->get_title = function($img_name){if (strpos($img_name, "/") !== false) {$subarr = explode("/", $img_name); $tmp_tit = $subarr[count($subarr)-1];} else {$tmp_tit=$img_name;} if (strpos($tmp_tit, "-inp-") !== false) {$subarr = explode("-inp-", $tmp_tit); return $subarr[0];} else {return $tmp_tit;}};
	if ($resumes_db) {
		$res_from_lib = $_SESSION["clouddta"];
	} else {
		$res_from_lib = $img_lib_cy->get_base_info($album_name);//, "", $yesternod->format(DateTime::ISO8601));
	}

	if ($save_to_db) {
		echo "Total de imagenes: ".count($res_from_lib)."<br>";
		for ($z_loop=1; $z_loop<21; $z_loop++) {
			$one_img_dta = $img_lib_cy->render_one(array_shift($res_from_lib));
			if (is_array($one_img_dta)){
				$img_db_cl->global_update($one_img_dta);
			}
		}
		if (count($res_from_lib)) {
			echo "quedan: ".count($res_from_lib)." oprima F5 para continuar<br>";
		}
		$_SESSION["clouddta"] = $res_from_lib;
//		$img_db_cl->global_update($res_from_lib);
	}

	if ($rd_from_db) {
		$img_from_db = $img_db_cl->read_album($album_name);
		echo "<pre><h1>from DB->></h1>";print_r($img_from_db);echo "</pre><br>";
	} else {
//		echo "<pre><h1>from CY->></h1>";print_r($res_from_lib);echo "</pre><br>";
		echo "<pre><h1>info->></h1>";print_r($img_lib_cy->get_cloudinary_info());echo "</pre><br>";
	}
//	echo "<pre><h1>params->></h1>";print_r($params);echo "</pre><br>";
} catch (Exception $e) {
	echo "Ooops... Error".$e->getMessage();
}
?>