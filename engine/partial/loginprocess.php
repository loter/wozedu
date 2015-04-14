<?
//Process login
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']===true)
{
	header("Location: /user/profile/");
}else
{
$referrer = strtok($_SERVER["HTTP_REFERER"],'?');
if(isset($_POST['inputcUserName'])&&isset($_POST['inputPassword'])&&strlen($_POST['inputcUserName'])>5&&strlen($_POST['inputPassword'])>5)
	{
		//input is fine
		$v1 = res(trim($_POST['inputcUserName']));
		$v2 = res($_POST['inputPassword']);
		$sql = sprintf("SELECT user_id,user_name,user_email,user_type FROM users where user_username = '%s' and user_password='%s' LIMIT 1",$v1,md5($v2));
		
		$rs_qry_user_login = mysql_query($sql, $lc) or die(mysql_error());
		$row_rs_qry_user_login = mysql_fetch_assoc($rs_qry_user_login);
		$count_rs_qry_user_login = mysql_num_rows($rs_qry_user_login);
		if(!$rs_qry_user_login)
		{
			header("Location: ".$referrer."?err=1");
			exit(0);
		}else
		{
			if($count_rs_qry_user_login==1)
			{
				session_start();
				$_SESSION['user_id'] = $row_rs_qry_user_login['user_id'];
				$_SESSION['user_name'] = $row_rs_qry_user_login['user_name'];
				$_SESSION['user_email'] = $row_rs_qry_user_login['user_email'];
				$_SESSION['user_type'] = $row_rs_qry_user_login['user_type'];
				$_SESSION['loggedin'] = true;
				header("Location: /user/profile/");
			}else
			{
				header("Location: ".$referrer."?err=1");
				exit(0);
			}
		}
	}else
	{
		header("Location: ".$referrer."?err=1");
	}
}
?>