<?php
	$nombre_archivo =$_SERVER['REQUEST_URI'];
	
	if (strpos($nombre_archivo, '.php')){	
		$nombre_archivo = str_replace(".php","",$nombre_archivo);
		echo '<link rel="canonical" href="http://www.borse.com.mx' . $nombre_archivo . '" />';
	}
?>