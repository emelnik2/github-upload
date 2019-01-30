<?php
function f_my_htmlentities($data)
{
		$ret_val = str_replace('_', ' ', $data);
		$ret_val = str_replace('%C3%B1', 'ñ', $ret_val);
		$ret_val = str_replace('%C3%A1', 'á', $ret_val);
		$ret_val = str_replace('%C3%A9', 'é', $ret_val);
		$ret_val = str_replace('%C3%AD', 'í', $ret_val);
		$ret_val = str_replace('%C3%B3', 'ó', $ret_val);
		$ret_val = str_replace('%C3%BA', 'ú', $ret_val);
        $ret_val = str_replace('%40', '@', $ret_val);
    $ret_val = str_replace('+', ' ', $ret_val);
		$ret_val = htmlentities($ret_val);
		return $ret_val;
}
function f_strip_accent($data)
{
		$ret_val = str_replace('ñ', 'n', $data);
		$ret_val = str_replace('á', 'a', $ret_val);
		$ret_val = str_replace('é', 'e', $ret_val);
		$ret_val = str_replace('í', 'i', $ret_val);
		$ret_val = str_replace('ó', 'o', $ret_val);
		$ret_val = str_replace('ú', 'u', $ret_val);
		$ret_val = str_replace('Ñ', 'n', $ret_val);
		$ret_val = str_replace('Á', 'a', $ret_val);
		$ret_val = str_replace('É', 'e', $ret_val);
		$ret_val = str_replace('Í', 'i', $ret_val);
		$ret_val = str_replace('Ó', 'o', $ret_val);
		$ret_val = str_replace('Ú', 'u', $ret_val);
		return $ret_val;
}

function remove_quotes($s) {
    $remove[] = "'";
    $remove[] = '"';
    return str_replace( $remove, "", $s );
}

?>