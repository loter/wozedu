<?php
// Enable/Disable debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define vars
define("SITENAME","WozEdu");

// Enable validation vars 
$validate_register = 0;
$validate_login = 0;
$validate_recover=0;

// Database Connection settings
$hostname_lc = "localhost";
$database_lc = "weblux_md_task1";
$username_lc = "task1_dbu";
$password_lc = "q6f9Tr6?";

// Connect
$lc = mysql_pconnect($hostname_lc, $username_lc, $password_lc) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8', $lc);
mysql_select_db($database_lc, $lc) or die(mysql_error());
?>