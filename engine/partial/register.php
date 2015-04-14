<?
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
	$err = sprintf($etemplate,"Please check Name field.");
}
if(isset($_GET['err'])&&$_GET['err']==2)
{
	$err = sprintf($etemplate,"Please check UserName field.");
}
if(isset($_GET['err'])&&$_GET['err']==3)
{
	$err = sprintf($etemplate,"Please check Email field.");
}
if(isset($_GET['err'])&&$_GET['err']==4)
{
	$err = sprintf($etemplate,"Please check Password field.");
}
if(isset($_GET['err'])&&$_GET['err']==5)
{
	$err = sprintf($etemplate,"Please check Password field.");
}
if(isset($_GET['err'])&&$_GET['err']==6)
{
	$err = sprintf($etemplate,"Please check Type field.");
}
if(isset($_GET['err'])&&$_GET['err']==7)
{
	$err = sprintf($etemplate,"Such username already registered. Please use other username.");
}
echo $err;
?>
<noscript><p class="text-warning">Warning: For best experience, please enable Javascript support in your browser</p></noscript>
<form id="form-signup" class="jval_validator" method="post" action="/user/registrationprocess/">
  <h2 class="form-signin-heading">Registration</h2>
  <p>Please complete all fields and click Confirm</p>
  <label for="inputcName">Name</label>
  <input type="text" id="inputcName" class="form-control required" placeholder="Name" name="inputcName" value="<? if(isset($_SESSION['reg']['name'])) echo $_SESSION['reg']['name'];?>">
  <label for="inputcUserName">Username</label>
  <input type="text" id="inputcUserName" class="form-control required" placeholder="Username" name="inputcUserName" value="<? if(isset($_SESSION['reg']['username'])) echo $_SESSION['reg']['username'];?>">
  <label for="inputEmail">Email address</label>
  <input type="email" id="inputEmail" class="form-control required email" placeholder="Email address" name="inputEmail" value="<? if(isset($_SESSION['reg']['email'])) echo $_SESSION['reg']['email'];?>">
  <label for="inputPassword">Password</label>
  <input type="password" id="inputPassword" class="form-control required" placeholder="Password" name="inputPassword">
  <label for="inputrePassword">Repeat Password</label>
  <input type="password" id="inputrePassword" class="form-control required" placeholder="Repeat Password" name="inputRePassword" equalTo="#inputPassword">
  <label for="cRole">Type</label>
  <select name="cRole" class="selectpicker">
    <?=generate_types()?>
  </select>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
  
  <p class="pd"><a href="/" title="Go back">&lt;-- Click here to go back</a></p>
</form>
<?php $validate_register = 1; }?>
