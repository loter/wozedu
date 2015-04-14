<?php require_once('connections/lc.php'); ?>
<?
	// to add HTTP referer protection
	mysql_select_db($database_lc, $lc);
	if(isset($_GET['inputcUserName']))
	{
		$fld = mysql_real_escape_string(trim($_GET['inputcUserName']));
	if(strlen($fld)>5)
	{
	$qry_username_check = sprintf("SELECT user_id from users where user_username='%s' LIMIT 1;",$fld);
	$rs_qry_username_check = mysql_query($qry_username_check, $lc) or die(mysql_error());
	$row_rs_qry_username_check = mysql_fetch_assoc($rs_qry_username_check);
	$count_rs_qry_username_check = mysql_num_rows($rs_qry_username_check);
	if($count_rs_qry_username_check==1)
	{
		echo "false";
	}else
	{
		echo "true";
	}
	}
	
	}
?>