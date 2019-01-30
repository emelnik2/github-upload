<?php
/*
************************************************************************
* img_db.php							       						   *
* clase de acceso a datos de imagenes en mysql						   *
* clase instalada en SERVER (confirmar y ajustar parametros de tablas) *
************************************************************************
*/
include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/classes/db_class_n.php");

class Img_db extends db_obj
{
	function __construct()	{
		parent::__construct("images");
	}
	function save_img_tags($img_id, $key, $dta) {
		$tag_id = $this->save_tag($key);
		$this->db_BuildSelectSql("SELECT count(`id`) AS tot_rows, max(`id`) AS id FROM `img_prop_data`", "`ptr_img_data`='".$img_id."' AND `ptr_prop`='".$tag_id."'");
		$result = $this->db_RetSingleAssoc();
		if (!$result["tot_rows"]) {
			$qry = "
			INSERT INTO `img_prop_data` (`ptr_img_data`, `ptr_prop`, `content`)
				VALUES ('".$img_id."', '".$tag_id."', '".$dta."')
			";
			$this->db_BuildSelectSql($qry, "");
			$this->db_Exec();
		}
	}
	function save_tag($key) {
		$this->db_BuildSelectSql("SELECT count(id) AS tot_rows, max(id) AS id FROM `img_props`", "`desc`='".$key."'");
		$result = $this->db_RetSingleAssoc();
		if ($result["tot_rows"]) {
			return $result["id"];
		} else {
			$qry = "INSERT INTO `img_props` (`desc`) VALUES ('".$key."')";
			$this->db_BuildSelectSql($qry, "");
			$this->db_Exec();
			return $this->db_last_inserted_id();
		}
		return false;
	}
	function save_image($data) {
		$album_id = $this->save_album($this->get_album_name($data["public_id"]));
		$this->db_BuildSelectSql("SELECT count(`id`) AS tot_rows, max(`id`) AS id FROM `img_data`", "`name`='".$data["public_id"]."'");
		$result = $this->db_RetSingleAssoc();
		if ($result["tot_rows"]) {
			$img_id = $result["id"];
		} else {
			$qry = "
			INSERT INTO `img_data` 
				(`location`, `ptr_img_group`, `name`, `ts_created`, `ts_updated`)
				VALUES
				('".$data["photo_feed"]."', '".$album_id."', '".$data["public_id"]."', '".$data["created_at"]."', '".$data["version"]."');
			";
			$this->db_BuildSelectSql($qry, "");
			$this->db_Exec();
			$img_id = $this->db_last_inserted_id();
		}
		foreach ($data["tags"] as $tag=>$dta) {
			$this->save_img_tags($img_id, $tag, $dta);
		}
		foreach ($data["img_pre_url"] as $tag=>$dta) {
			$this->save_img_tags($img_id, $tag, $dta);
		}
// tomar en cuenta que algunos props (tags) no son accesibles por el usuario
// enum en props para identificar 0=no necesario, 1=obligatorio, 2=solo admin
	}
	function save_album($album, $descr = "", $full_descr = "") {
		$this->db_BuildSelectSql("SELECT count(id) AS tot_rows, max(id) AS id FROM `img_groups`", "name='".$album."'");
		$result = $this->db_RetSingleAssoc();
		if ($result["tot_rows"]) {
			return $result["id"];
		} else {
			$qry = "INSERT INTO `img_groups` (`name`".($descr>"" ? ", descr" : "").($full_descr>"" ? ", full_desc" : "").") 
			VALUES ('".$album."'".($descr>"" ? ", '".$descr."'" : "").($full_descr>"" ? ", '".$full_descr."'" : "").")";
			$this->db_BuildSelectSql($qry, "");
			$this->db_Exec();
			return $this->db_last_inserted_id();
		}
		return false;
	}
	public function global_update($data) {
		$lupdate = $this->get_last_update_date();
		foreach ($data as $key=>$data) {
				$this->save_image($data);
		}
	}

	function read_album($album) {
//		$ret_val = $this->read_album_data($album);
		$ret_val["photos"] = $this->read_images($album."%");
		return $ret_val;
	}
	function read_image($photo) {
		return $this->read_images($photo);
	}
	private function read_images($flt) {
		$qry = "
		SELECT 	`img_groups`.`name` AS album_name, `img_groups`.`descr` AS album_descr, `img_groups`.`full_desc` AS album_full_descr, 
			`img_data`.`id`, `img_data`.`location`, `img_data`.`name`, `img_data`.`alt`, `img_data`.`title`, `img_data`.`ts_created`, `img_data`.`ts_updated` 
		FROM `img_data` 
			JOIN `img_groups` ON `img_data`.`ptr_img_group`=`img_groups`.`id`
		";
		$filter = "`img_data`.`name` LIKE '".$flt."'";
		$this->db_BuildSelectSql($qry, $filter);
		$img_rs = $this->db_RetRs();
		$last_key = "";
		while ($img_row = $this->db_ret_next_row($img_rs))
		{
			$qry = "
			SELECT 	
				`img_prop_data`.`content` AS tag_content, 
				`img_props`.`desc` AS tag_name, `img_props`.`kind` AS tag_kind
			FROM `img_prop_data` 
				JOIN `img_props` ON `img_prop_data`.`ptr_prop`=`img_props`.`id`
			";
			$filter = "`img_prop_data`.`ptr_img_data` = '".$img_row['id']."'";
			$this->db_BuildSelectSql($qry, $filter);
			$prop_rs = $this->db_RetRs();
			$rearray_tags = array();
			while ($prop_row = $this->db_ret_next_row($prop_rs))
			{
				$rearray_tags[$prop_row["tag_name"]] = $prop_row["tag_content"];
			}
			$ret_val[$img_row['id']] = array(	
					"title"=>$img_row["title"],
					"description"=>$img_row["alt"],
					"public_id"=>$img_row["name"],
					"photo_feed"=>$img_row["location"],
					"img_pre_url"=>"",
					"version"=>$img_row["ts_updated"],
					"created_at"=>$img_row["ts_created"],
					"tags"=>$rearray_tags			// tags with paired values
				);
				
		}
		return $ret_val;
	}
	
	private function get_album_name($public_id) {
		if (strpos($public_id, "/") !== false) {
			$subarr		= explode("/", $public_id); 
			$ret_val	= $subarr[0];
		} else {
			$ret_val	= "general";
		}
		return $ret_val;
	}
	
	function get_last_update_date()	{
		// jalar la fecha de ultima imagen actualizada
		$qry = "SELECT ts_updated FROM img_data";
		$this->db_BuildSelectSql($qry, "", "", "", "ts_updated DESC");
		$result = $this->db_RetSingleAssoc();
		return $result["ts_updated"];
	}
	
	function read_images_by_tag($tag, $content) {
		// build full join query filter by tag_name+content
	}
	function read_images_by_size($img, $size) {
		// wondering how to!!! :D
	}
	function read_images_by_keyword($keyword) {
		// build full join query filter by keyword and clean dupes
	}
	function gen_image_sitemap() {
		// remember to link with database
		// build full join query filter by title tag (or description)
/*
1.1.1.	loc: fqurl de la imagen
1.1.2.	title: title prop of img
1.1.3.	caption: alt o caption of image
1.1.4.	licence: fqurl de la pagina donde esta la licencia de las imagenes
*/
	}
} // end of class img_db
?>
