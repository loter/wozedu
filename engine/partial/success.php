<?php
//no direct access
if(strpos($_SERVER['HTTP_REFERER'],"/user/register/")===false)
{
header("Location: /");
}else
{
session_start();
if(isset($_SESSION['reg']))
{
if(isset($_SESSION['reg']['username'])) 
{$tmp = $_SESSION['reg']['username'];
session_unset($_SESSION['reg']);
$_SESSION['login'] = $tmp;
}
}
?>
<h1>Registration success!</h1>
<p>Please <a href="/user/login/">click here</a> to login</p>
<?php } ?>