<?php
/*
*************************************************************************
* cities_db.php															*
* clase de acceso a datos para paises, estados y ciudades				*
*************************************************************************
*/
include_once("classes/db_class_n.php") ;

class Cities_db extends db_obj
{
	function __construct()	{
		parent::__construct();
	}

	function get_countries_option_list($sel_id = 138) {
		$qry = 'SELECT `id`, CONCAT(`nicename`, " +", `phonecode`) AS thevalue FROM sys_countries';
		$this->db_BuildSelectSql($qry, "", "", "", "`nicename`");
		$countries_rs = $this->db_RetRs();
		while ($country_row = $this->db_ret_next_row($countries_rs))
		{
			echo '<option value="'.$country_row["id"].'" '.($country_row["id"]==$sel_id ? 'selected="selected"' : '').'>'.$country_row["thevalue"].'</option>';
		}
	}
	function get_states_option_list($country_id = 0, $sel_id = 0) {
		$qry = 'SELECT `id`, `nombre` AS thevalue FROM sys_states';
		$flt = "`ptr_pais`=".$country_id;
		$this->db_BuildSelectSql($qry, $flt, "", "", "`nombre`");
		$states_rs = $this->db_RetRs();
		while ($states_row = $this->db_ret_next_row($states_rs))
		{
			echo '<option value="'.$states_row["id"].'" '.($states_row["id"]==$sel_id ? 'selected="selected"' : '').'>'.$states_row["thevalue"].'</option>';
		}
	}
	function get_cities_option_list($state_id, $sel_id = 0) {
		$qry = 'SELECT `id`, CONCAT(`nombre`, " (", `lada`, ")") AS thevalue FROM sys_cities';
		$flt = "`ptr_edo`=".$state_id;
		$this->db_BuildSelectSql($qry, $flt, "", "", "`nombre`");
		$cities_rs = $this->db_RetRs();
		while ($cities_row = $this->db_ret_next_row($cities_rs))
		{
			echo '<option value="'.$cities_row["id"].'" '.($cities_row["id"]==$sel_id ? 'selected="selected"' : '').'>'.$cities_row["thevalue"].'</option>';
		}
	}
	function get_city_areacode($id_cd) {
		$qry = 'SELECT `id`, `lada` FROM sys_cities';
		$flt = "`id`=".$id_cd;
		$this->db_BuildSelectSql($qry, $flt, "");
		$city_row = $this->db_RetSingleAssoc();
		return $city_row["lada"];
	}
	function get_full_city_data($id_cd) {
		$qry = 'SELECT 	sys_cities.id, sys_cities.nombre, sys_states.nombre AS state_nombre,
						sys_countries.nicename AS country_nombre
				FROM sys_cities
				JOIN sys_states ON sys_cities.ptr_edo=sys_states.id
				JOIN sys_countries ON sys_states.ptr_pais=sys_countries.id';
		$flt = "sys_cities.id=".$id_cd;
		$this->db_BuildSelectSql($qry, $flt, "");
		$city_row = $this->db_RetSingleAssoc();
		return "Pais: ".$city_row["country_nombre"]."<br/>Ciudad: ".$city_row["nombre"].", ".$city_row["state_nombre"]."<br/>";
	}
	function get_country_phonecode($id_pais) {
		$qry = 'SELECT `id`, `phonecode` FROM sys_countries';
		$flt = "`id`=".$id_pais;
		$this->db_BuildSelectSql($qry, $flt, "");
		$country_row = $this->db_RetSingleAssoc();
		return $country_row["phonecode"];
	}
	function get_country_name($id_pais) {
		$qry = 'SELECT `id`, `nicename` FROM sys_countries';
		$flt = "`id`=".$id_pais;
		$this->db_BuildSelectSql($qry, $flt, "");
		$country_row = $this->db_RetSingleAssoc();
		return $country_row["nicename"];
	}
} // end of class cities_db
?>
