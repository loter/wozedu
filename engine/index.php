<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("partial/functions.php") ?><?php include("partial/meta.php") ?>
    <link href="/includes/bs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/includes/bs/select/select.css" rel="stylesheet">
    <link href="/includes/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/includes/js/html5shiv.min.js"></script>
      <script src="/includes/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <?php
	  	if((isset($_GET['mod'])&&$_GET['mod']=='user'))
		{
			if(isset($_GET['action'])&&$_GET['action']=='login/')
			{
	  		include("partial/login.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='register/')
			{
				include("partial/register.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='registrationprocess/')
			{
				include("partial/registrationprocess.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='success/')
			{
				include("partial/success.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='loginprocess/')
			{
				include("partial/loginprocess.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='profile/')
			{
				include("partial/profile.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='logout/')
			{
				include("partial/logout.php");
			}
			elseif(isset($_GET['action'])&&$_GET['action']=='recover/')
			{
				include("partial/recover.php");
			}
			else
			{
				header("Location: /");
			}
		}
		elseif(ishomepage($_SERVER['QUERY_STRING']))
		{
			include("partial/welcome.php");
		}elseif(isset($_GET['mod'])&&$_GET['mod']=="404")
		{
			include("partial/404.php");
		}
	  ?>
    </div><!-- /container -->
    <script src="/includes/jq/jquery-1.11.1.min.js"></script>
    <script src="/includes/bs/js/bootstrap.min.js"></script>
    <script src="/includes/bs/select/select.js"></script>
    <script src="/includes/js/validate.js"></script>
    <?php include("partial/validation.php"); ?>
    <script>
     $('.selectpicker').selectpicker();
    </script>
  </body>
</html>