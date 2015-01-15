<?php 
include "cn.php";
session_start();
if(isset($_POST['user_name']) && isset($_POST['password']))
{	 
   $user_name=$_POST['user_name'];
 	 $password=$_POST['password'];
     $fetch=mysql_query("select count(*) as cnt from users where user_name='$user_name' and password='$password'",$cn);
   	 $query=mysql_fetch_array($fetch);
     echo "here";
   	 if($query['cnt']==1)
   		{	$_SESSION['user_name']=$user_name;
   			$_SESSION['password']=$password;
   			header('Location: menu_bar.php');
   			}
   	 else {	header('Location:login.php');

   	 		}

}

else if(isset($_SESSION['user_name']) && isset($_SESSION['password']))
{
  header('Location: menu_bar.php');

}

else {

echo"<form action='login.php' method='POST' enctype='multipart/form-data'>
		User Name:  <input type='text' name='user_name'></br>
		Password:   <input type='password' name='password'></br>
		";

	echo"</br>
  <input type='submit' name='submit' value='Submit' />
  <input type='reset' name='reset'  value='Reset' />
	</form>";
}