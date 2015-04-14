<?
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==1)
{
?>
<p>Welcome, <strong><?=$_SESSION['user_name'] ?></strong> (<?=$_SESSION['user_email'] ?>) [<a href="/user/logout/" title="logout">logout</a>]</p>
<p>Your access level is: <strong><?=getlevel($_SESSION['user_type']);?></strong></p>
<? 
$onlyme="";
if($_SESSION['user_type']==1)
{
	$access="(1,2,3)";
}
if($_SESSION['user_type']==2)
{
	$access="(3)";
}
if($_SESSION['user_type']==3)
{
	$access="(3)";
	$onlyme=sprintf(" AND user_id ='%d' ",$_SESSION['user_id']);
}
$sql = sprintf("SELECT user_name,user_email,user_type from users where user_type IN %s%s;",$access,$onlyme);
$rs_qry_user_data = mysql_query($sql, $lc) or die(mysql_error());
$count_rs_qry_user_data = mysql_num_rows($rs_qry_user_data);
if($count_rs_qry_user_data>0)
{
	$row_rs_qry_user_data = mysql_fetch_assoc($rs_qry_user_data);
	$i=0;
?>
<table class="table table-striped">
	<thead>
	<tr>
    	<td>#</td>
    	<td>Name</td>
        <td>Email</td>
        <td>Type</td>
    </tr>
    </thead>
    <tbody>
    <?php do{ ?>
	<tr>
    	<td><? echo ++$i;?></td>
    	<td><?=$row_rs_qry_user_data['user_name'];?></td>
        <td><?=$row_rs_qry_user_data['user_email'];?></td>
        <td><?=getlevel($row_rs_qry_user_data['user_type']);?></td>
    </tr>
    <? }while ($row_rs_qry_user_data = mysql_fetch_assoc($rs_qry_user_data)); ?>
    </tbody>
</table>
<?
}else
{ 
?>
<p>No results</p>
<?
}
}
?>