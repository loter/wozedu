<?php
$meta_title="Welcome |";
$meta_keywords="Welcome |";
$meta_description="Welcome |";

if((isset($_GET['mod'])&&$_GET['mod']=='user')&&(isset($_GET['action'])&&$_GET['action']=='login/'))
		{
			$meta_title="Login |";
			$meta_keywords="Login |";
			$meta_description="Login |";
		}else if((isset($_GET['mod'])&&$_GET['mod']=='user')&&(isset($_GET['action'])&&$_GET['action']=='register/'))
		{
			$meta_title="Register |";
			$meta_keywords="Register |";
			$meta_description="Register |";
		}elseif(isset($_GET['mod'])&&$_GET['mod']=="404")
		{
			$meta_title="404 |";
			$meta_keywords="404 |";
			$meta_description="404 |";
		}
?>
<title><?php echo $meta_title." "; echo SITENAME; ?></title>
<meta name="keywords" content="<?php echo $meta_keywords." ".SITENAME; ?>">
<meta name="description" content="<?php echo $meta_description." ".SITENAME; ?>">