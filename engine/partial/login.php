<?php 
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']===true)
{
	header("Location: /user/profile/");
}else
{
$err = "";
$etemplate = "<p class='warning'>Please fix the following problem: %s</p>";
if(isset($_GET['err'])&&$_GET['err']==1)
{
	$err = sprintf($etemplate,"Username and password mismatch.");
}
echo $err;
?>
<form class="form-signin" id="form-signin" role="form" method="post" action="/user/loginprocess/">
  <h2 class="form-signin-heading">Please sign in</h2>
  <p>Please enter your username and password to proceed</p>
  <label for="inputcUserName">Username</label>
  <input type="text" id="inputcUserName" class="form-control required" placeholder="Username" name="inputcUserName" value="<? if(isset($_SESSION['login'])) echo $_SESSION['login'];?>">
  <label for="inputPassword">Password</label>
  <input type="password" id="inputPassword" class="form-control required" placeholder="Password" name="inputPassword">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="pd"><a href="/" title="Go back">&lt;-- Click here to go back</a></p>
</form>
<?php
$validate_login=1;
}
?>