<!-- REVISAR Y ADAPTAR CON LOS USUARIOS CORRESPONDIENTES Y PASSWORDS SEGUN SE REQUIERA -->
<?php
class db_setup {

	var $db_arr  = array(
			     "default"=>array("host"=>"localhost", "usr"=>"root", "pass" =>"", "base"=>"borse_contactos"),
			     "srvr"=>array("host"=>"localhost", "usr"=>"root", "pass" =>"", "base"=>"borse_contactos"),
			     "udta"=>array("host"=>"localhost", "usr"=>"root", "pass" =>"", "base"=>"borse_contactos"),
			     "images"=>array("host"=>"localhost", "usr"=>"root", "pass" =>"", "base"=>"borse_imagenes") 
			     );
	
	function __construct()
	{
		//dummy func to initialize class
	}
	
}