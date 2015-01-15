<?php
//session_start();
/* To be configured during installation */
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'mysite';
$database = 'suitcase';
$cn=mysql_connect($db_hostname, $db_username, $db_password);
mysql_select_db($database,$cn);
if($cn === NULL){
    echo "Database connection error";
 die('mysql connection error: '.mysql_error());
}
?>
