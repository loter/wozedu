<?php
// Checking if we're on homepage or not.
// $param: variable, $_SERVER['QUERY_STRING']

function ishomepage($param)
{
	if(strlen($param)===0) 
	{
		return true;
	}else
	{
		return false;
	}
}
function generate_types()
{
	global $lc;
	global $database_lc;
	$return = "";
	mysql_select_db($database_lc, $lc) or die(mysql_error());
	$qry_generate_types = sprintf("SELECT * from user_types order by user_type_id ASC;");
	$rs_qry_generate_types = mysql_query($qry_generate_types, $lc) or die(mysql_error());
	$row_rs_qry_generate_types = mysql_fetch_assoc($rs_qry_generate_types);
	$count_rs_qry_generate_types = mysql_num_rows($rs_qry_generate_types);
	if($count_rs_qry_generate_types>0)
	{
		do
		{
			$return .= sprintf('<option value="%d">%s</option>',$row_rs_qry_generate_types['user_type_id'],$row_rs_qry_generate_types['user_type_name']);
		}while($row_rs_qry_generate_types = mysql_fetch_assoc($rs_qry_generate_types));
	}
	return $return;
}
function getstack()
{
	global $lc;
	global $database_lc;
	$stack = array();
	mysql_select_db($database_lc, $lc) or die(mysql_error());
	$qry_generate_types = sprintf("SELECT * from user_types order by user_type_id ASC;");
	$rs_qry_generate_types = mysql_query($qry_generate_types, $lc) or die(mysql_error());
	$row_rs_qry_generate_types = mysql_fetch_assoc($rs_qry_generate_types);
	$count_rs_qry_generate_types = mysql_num_rows($rs_qry_generate_types);
	if($count_rs_qry_generate_types>0)
	{
		do
		{
			array_push($stack,$row_rs_qry_generate_types['user_type_id']);
		}while($row_rs_qry_generate_types = mysql_fetch_assoc($rs_qry_generate_types));
	}
	return $stack;
}
function res($str)
{
	return mysql_real_escape_string($str);
}
function already_registered($username)
{
	global $lc;
	global $database_lc;
	$return = true;
	mysql_select_db($database_lc, $lc) or die(mysql_error());
	$qry_get_level = sprintf("SELECT user_id from users where user_username='%s' LIMIT 1",res(trim($username)));
	$rs_qry_get_level = mysql_query($qry_get_level, $lc) or die(mysql_error());
	$row_rs_qry_get_level = mysql_fetch_assoc($rs_qry_get_level);
	$count_rs_qry_get_level = mysql_num_rows($rs_qry_get_level);
	if($count_rs_qry_get_level==1)
	{
		$return = true;
	}else
	{
		$return = false;
	}
	return $return;
}
function getlevel($levelid)
{
	global $lc;
	global $database_lc;
	$return = "";
	mysql_select_db($database_lc, $lc) or die(mysql_error());
	$qry_get_level = sprintf("SELECT user_type_name from user_types where user_type_id='%d' LIMIT 1",$levelid);
	$rs_qry_get_level = mysql_query($qry_get_level, $lc) or die(mysql_error());
	$row_rs_qry_get_level = mysql_fetch_assoc($rs_qry_get_level);
	$count_rs_qry_get_level = mysql_num_rows($rs_qry_get_level);
	if($count_rs_qry_get_level==1)
	{
		$return = $row_rs_qry_get_level['user_type_name'];
	}
	return $return;
}
?>