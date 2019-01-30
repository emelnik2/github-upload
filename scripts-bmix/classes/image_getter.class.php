<?php

/**
 * image getter for cloudinary library
 * ===================================
 * @author      Ricardo Bolaños Cacho Loaiza <ricardo.bc@brandingmix.com>
 * @license     Author Copyrigthed, licenced to brandingmix.com
 * @Notes       Libreria SI instalada en el server (confirmar)
 */
include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/libs/cloudinary.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/libs/api.php");
if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/classes/cloudinary.cfg.php"))
{
	include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/classes/cloudinary.cfg.php");
} else {
	throw new BadMethodCallException("No existe el archivo de configuracion cy: Fatal error");
	die();
}
include_once($_SERVER["DOCUMENT_ROOT"]."/Borse/scripts-bmix/classes/img_db.php");

class img_getter_cy // agregar el extends cloudinary.cfg
{
	protected static $cloudinary_dta;
	protected static $cloudinary_info;
	
    public function __construct()
	{
		$this->get_key		= "";
		$this->get_title	= "";
		$this->get_desc		= "";
    }
	public function render($album="", $photo="")
	{
		$this->read_album($album);
		return $this->gen_paired_values($photo);
	}
	public function render_for_db($album="", $photo="", $dte="")
	{
		$yesternod = new DateTime(date("Ymd")."0000");
		$this->read_album($album, $photo, $dte);
		return $this->gen_paired_values($photo);
	}
	public function render_one($dta) {
		return $this->gen_paired_values($dta);
	}
	public function get_base_info($album = "") {
		$this->read_album($album);
		return self::$cloudinary_dta;
	}
	private function gen_paired_values($feed = "")
	{
		$api = new \Cloudinary\Api();
		$ret_val   = array();
		$ctr_items = 0;
		if ($feed>"")
		{
			$res 			= $api->resource($feed["public_id"], array("image_metadata"=>true));
			self::$cloudinary_info["rate_limit_reset_at"] = date("Ymd His", $res->rate_limit_reset_at);
			self::$cloudinary_info["rate_limit_allowed"] = $res->rate_limit_allowed;
			self::$cloudinary_info["rate_limit_remaining"] = $res->rate_limit_remaining;
			// los albums en picasa podian tener un caption que se usaba como descripcion y
			//		cloudinary no lo tiene, como manejarlo, db?
			$key_code 		= $res["public_id"];
			$description	= (isset($res["image_metadata"]["Description"]) ? $res["image_metadata"]["Description"] : "No description found!");
			$title			= (isset($res["context"]["custom"]["title"])? $res["context"]["custom"]["title"] : "No title found!");
			$link 			= (isset($res["url"]) ? $res["url"] : "No url found!");
			if(is_callable($this->get_key)){
				$key_code 	= call_user_func($this->get_key, ($res["public_id"]));
			}
			if(is_callable($this->get_title)){
				$title	 	= call_user_func($this->get_title, ($res["public_id"]));
			}
			if(is_callable($this->get_desc)){
				$description= call_user_func($this->get_desc, ($res["public_id"]));
			}
			
			$rearray_tags = (isset($res["context"]["custom"]) ? $res["context"]["custom"] : array());
			if (isset($res["tags"]))
			{
				foreach ($res["tags"] as $temp)
				{
					$tmp = $this->gen_clean_tags($temp);
					foreach ($tmp as $key=>$dta)
					{
						$rearray_tags[$key] = $dta;
					}
				}
			}
			if (isset($res["image_metadata"]["Keywords"]) && $res["image_metadata"]["Keywords"]>"")
			{
				$keywords = $this->gen_clean_tags($res["image_metadata"]["Keywords"]);
				foreach ($keywords as $key=>$dta)
				{
					$rearray_tags[$key] = $dta;
				}
			}
			$img_pre_url = str_replace("/upload/","/upload/<@>/",$link);
			$ret_val[$key_code] = array(	
					"title"=>$title,
					"description"=>$description,
					"public_id"=>$res["public_id"],
					"photo_feed"=>$link,
					"img_pre_url"=>array("all_token"=>$img_pre_url),
					"version"=>date("YmdHis", $res["version"]),
					"created_at"=>date("YmdHis", strtotime($res["created_at"])),
					"tags"=>$rearray_tags			// tags with paired values
				);

		}
		return $ret_val;
	}
	private function read_album($album = "", $nextcursor = "", $dte = "")
	{
		$api = new \Cloudinary\Api();
		$data = array(
					"type"=>"upload", 
					"tags"=>true, 
					"keywords"=>true, 
					"max_results"=>500,
					"context"=>true
					);
		if ($dte>"") {
			$data["start_at"]  = $dte;
			$data["direction"] = "desc";
		} else {
			$data["prefix"] = $album;
		}
		if ($nextcursor>"") {
			$data["next_cursor"] = $nextcursor;
		}
		$result = $api->resources($data);
		foreach ($result["resources"] as $dta) {
			self::$cloudinary_dta[] = $dta;
		}
		self::$cloudinary_info["rate_limit_reset_at"] = date("Ymd His", $result->rate_limit_reset_at);
		self::$cloudinary_info["rate_limit_allowed"] = $result->rate_limit_allowed;
		self::$cloudinary_info["rate_limit_remaining"] = $result->rate_limit_remaining;
		if (isset($result["next_cursor"])) {
			$this->read_album($album, $result["next_cursor"], $dte);
		}
	}
	// magic function :D	
    public function __call($name, $arguments)
    {
		$kind = strtolower($name);
		switch ($kind)
		{
			case 'resize_img_to':
				return $arguments[0][$arguments[1]];
				break;
			case 'get_album_title':
				return $this->cloudinary_dta->title;
				break;
			case 'get_album_description':
				return $this->cloudinary_dta->subtitle;
				break;
			case 'get_cloudinary_info':
				return self::$cloudinary_info;
				break;
//			default:
//				throw new BadMethodCallException("Nope, such method not exists here: $name->".print_r($arguments, true));
		}
    }
	private function gen_clean_tags($keywords) {
		$rearray_tags = array();
		if ($keywords>"") {
			$array_tags = explode(",", $keywords);
			foreach ($array_tags as $key => $dta)
			{
				$temp = explode("!", $dta);
				$rearray_tags[trim(str_replace('"', '', $temp[0]))] = trim(str_replace('"', '', $temp[1]));
			}
		}
		return $rearray_tags;
	}
}
?>