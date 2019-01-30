<?php
/* Package: 	pck_db
   file:		db_class_n.php
   purpuose:	clase de acceso a bases de datos, incluye funciones basicas de acceso a registros
*/
include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/classes/db_setup_class.php") ;

class db_obj extends db_setup 
{
	var $db_conn	= NULL;
	var $db_rs		= NULL;
	var $db_row		= NULL;
	var $db_SqlStr	= "";
	var $db_server	= "";
	var $cur_conn	= "";
	var $db_crono;
	var $is_debug;

	function __construct($db_name = "default")
	{
		global $db_connections_control;
		$do_conn = 0;
		if (!isset($db_connections_control))
		{
			$do_conn = 1;
		} else {
			if (!isset($db_connections_control[$db_name]))
			{
				$do_conn = 1;
			}
		}
		$tmp = explode(".", $_SERVER['SERVER_NAME']);
		$this->db_server = ($tmp[0]);
		$this->is_debug = (($tmp[0] == "zzz") ? 1 : 0);
		$host = ($this->is_debug ? "localhost" : $this->db_arr[$db_name]["host"]);
		$usr  = ($this->is_debug ? "localuser" : $this->db_arr[$db_name]["usr"]);
		$pass = ($this->is_debug ? "localpass" : $this->db_arr[$db_name]["pass"]);
		$base = $this->db_arr[$db_name]["base"].(substr($this->db_arr[$db_name]["base"], -1) == "-" ? ($this->is_debug ? $this->db_test : $this->db_server) : "");
		if ($do_conn)
		{
			$this->db_conn = mysqli_connect($host, $usr, $pass) or ($this->f_mysql_err('Err: Connecting to '.$host.' -> '.$base));
			$db_connections_control[$db_name] = $this->db_conn;
		} else {
			$this->db_conn = $db_connections_control[$db_name];
		}
		mysqli_select_db($this->db_conn, $base) or ($this->f_mysql_err('Err: Opennig '.$base.' at '.$host));
		$this->db_crono = rand();
	}
	
	function __destruct() 
	{
		$this->db_close();
	}
	
	// funcion para cerrar la conexion a la db
	function db_close() 
	{
//		mysqli_close($this->db_conn);
	}
	
	// crear consulta parametricamente (usar preferentemente)
	function db_BuildSelectSql($sSelect, $sWhere, $sGroupBy = "", $sHaving = "", $sOrderBy = "", $sFilter = "", $sSort = "") 
	{
		$sDbWhere = $sWhere;
		if ($sDbWhere <> "") {
			if ($sFilter <> "")	$sDbWhere = "(" . $sDbWhere . ") AND (" . $sFilter . ")";
		} else {
			$sDbWhere = $sFilter;
		}
		$sDbOrderBy = $sOrderBy;
		if ($sSort <> "") $sDbOrderBy = $sSort;
		$sSql = $sSelect;
		if ($sDbWhere <> "")	$sSql .= " WHERE " . $sDbWhere;
		if ($sGroupBy <> "")	$sSql .= " GROUP BY " . $sGroupBy;
		if ($sHaving <> "")	$sSql .= " HAVING " . $sHaving;
		if ($sDbOrderBy <> "")	$sSql .= " ORDER BY " . $sDbOrderBy;
		$this->db_SqlStr = $sSql;
	}
	
	// crear consulta (obsoleta, checar si se esta usando y reemplazar por db_BuildSelectSql)
	function db_BuildSimpleSql($sSql) 
	{
		throw new BadMethodCallException("Deprecated use db_BuildSelectSql instead:");
	}

	// funcion para recibir el resultset
	function db_RetRs() 
	{
		if ($this->db_SqlStr > "") 
		{
			$this->db_rs = mysqli_query($this->db_conn, $this->db_SqlStr) or ($this->f_mysql_err('Err: Creating resultset ', $this->db_SqlStr));
		} else {
			$this->db_rs = NULL;
		}
		return $this->db_rs;
	}
	function db_ret_next_row($rs = "")
	{
		if ($this->db_rs != null || $rs>"") {
			$this->db_row = mysqli_fetch_assoc(($rs>"" ? $rs : $this->db_rs));
			return $this->db_row;
		}
		return false;
	}
	
	// funcion para ejecutar un statment de sql
	function db_Exec() 
	{
		if ($this->db_SqlStr > "") 
		{
			return mysqli_query($this->db_conn, $this->db_SqlStr) or ($this->f_mysql_err('Err: Executing query ', $this->db_SqlStr));
		} else {
			return false;
		}
	}
	
	// funcion para recibir un solo registro asociado via array asociativo
	function db_RetSingleAssoc() 
	{
		if ($this->db_SqlStr > "") {
			$temp_res = mysqli_query($this->db_conn, $this->db_SqlStr." LIMIT 1") or ($this->f_mysql_err('Err: Creating single record result ', $this->db_SqlStr));
			$this->db_row = mysqli_fetch_assoc($temp_res);
			return $this->db_row;
		} else {
			return false;
		}
	}

	// funcion para recibir la cantidad de registros en un query
	function db_RetNumRecs($table, $condition, $field_name = "id") 
	{
		$sSql = "SELECT COUNT(".$field_name.") FROM " . $table;
		$cnt = 0;
		if ($condition) {
			$sSql .= " WHERE " . $condition;
		}
		$this->db_SqlStr = $sSql;
		if ($this->db_RetRs()) {
			$rRow = mysqli_fetch_row($this->db_rs) or ($this->f_mysql_err('Err: cannot count records ', $sSql));
			$cnt = $rRow[0];
		}
		return intval($cnt);
	}
	function db_last_inserted_id()
	{
		return mysqli_insert_id($this->db_conn);
	}
	
	function whats_sqlstr()
	{
		return $this->db_SqlStr;
	}

	function f_mysql_err($location = "err:undefined", $sql_statment = "")
	{
		if ($this->is_debug)
		{
			echo "<div style='border:2px #00F solid; display:block; background-color:#F00;'>".$location." -> ".mysql_errno()." : ".mysql_error()."<br>".$sql_statment."</div>";
		}
		error_log("Trace code: db_err->".$location." -> ".mysql_errno()." : ".mysql_error()."->".$sql_statment);
	}

	function f_mysql_trace($location = "err:undefined", $sql_statment = "")
	{
		if ($this->is_debug)
		{
			echo "<div style='border:2px #00F solid; display:block; background-color:#F00;'>".$location." -> ".mysql_errno()." : ".mysql_error()."<br>".$sql_statment."</div>";
		}
		error_log("Trace code: db_err->".$location." -> ".mysql_errno()." : ".mysql_error()."->".$sql_statment);
	}

}
?>