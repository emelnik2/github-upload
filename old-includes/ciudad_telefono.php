<?php
//ini_set("allow_url_fopen", 1);					
//ini_set("allow_url_include", 1);
$_REQUEST["cve_internacional"]=$cve_internacional;
$_REQUEST["lada"]=$lada;
ob_start();
include_once($_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_consulta_pais_ciudad2.php");
$fileOutput = ob_get_contents();
ob_end_clean();
//$file_=$_SERVER['DOCUMENT_ROOT']."/vk_includes/vk_consulta_pais_ciudad2.php?cve_internacional=".$cve_internacional."&lada=".$lada;
//$fileOutput=implode('',file($file_));  
//ini_set("allow_url_fopen", 0);					
//ini_set("allow_url_include", 0);
?>