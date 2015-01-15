<?php 
include "cn.php";

if(isset($_SESSION['user_name']) && isset($_SESSION['password']))
{  $user_name=$_SESSION['user_name'];
   $password=$_SESSION['password'];
   $query=mysql_fetch_array(mysql_query("select COUNT(*) as cnt from users where user_name='$user_name' and password='$password'"));
   if($query['cnt']!=1) header("Location: http://localhost/suitcase/login.php");
   }
?>