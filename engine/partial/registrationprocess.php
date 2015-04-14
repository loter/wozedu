<?
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']===true)
{
	header("Location: /user/profile/");
}else
{
$referrer = strtok($_SERVER["HTTP_REFERER"],'?');
if(isset($_POST['inputcName'])&&strlen($_POST['inputcName'])>5)
{
	$_SESSION['reg']['name']=$_POST['inputcName'];
	if(isset($_POST['inputcUserName'])&&strlen($_POST['inputcUserName'])>5)
	{
		if(!already_registered($_POST['inputcUserName']))
		{
		$_SESSION['reg']['username']=$_POST['inputcUserName'];
		if(isset($_POST['inputEmail'])&&strlen($_POST['inputEmail'])>4)
		{
			if (filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) 
			{
				$_SESSION['reg']['email']=$_POST['inputEmail'];
				if(isset($_POST['inputPassword'])&&strlen($_POST['inputPassword'])>5)
				{
					if(isset($_POST['inputRePassword'])&&strlen($_POST['inputRePassword'])>5)
					{
						if(strcmp($_POST['inputPassword'],$_POST['inputRePassword'])!==0)
						{
							header("Location:".$referrer."?err=5");
						}else
						{
							if(isset($_POST['cRole'])&&intval($_POST['cRole'])>0)
							{
								if(!in_array($_POST['cRole'],getstack()))
								{
									header("Location:".$referrer."?err=6");
								}else
								{
									//echo "Okay let's proceed";
									$v1 = res($_POST['inputcName']);
									$v2 = res($_POST['inputcUserName']);
									$v3 = res($_POST['inputEmail']);
									$v4 = res($_POST['inputPassword']);
									$v5 = res($_POST['cRole']);
									$sql = sprintf("INSERT INTO users(user_name,user_username,user_password,user_email,user_type) VALUES ('%s',LOWER('%s'),'%s',LOWER('%s'),'%s')",$v1,$v2,md5($v4),$v3,$v5);
									echo '<br>'.$sql.'<br>';
									$result = mysql_query($sql);
										if (!$result) {
										die('Query execution error:' . mysql_error());
										}
									header("Location: /user/success/");
								}
							}else
							{
								header("Location:".$referrer."?err=5");
							}
						}
					}else // inputPassword
					{
					header("Location:".$referrer."?err=4");
					}					
				}else // inputPassword
				{
					header("Location:".$referrer."?err=4");
				}
			}else // inputEmail
			{
				header("Location:".$referrer."?err=3");
			}
		}else // inputEmail
		{
		header("Location:".$referrer."?err=3");
		}
	}else // username already registered
	{
	header("Location:".$referrer."?err=7");
	}	
	}else // inputcUserName
	{
	header("Location:".$referrer."?err=2");
	}	
}else // inputcName
{
	header("Location:".$referrer."?err=1");
}
}
//break;
//exit(0);
?>