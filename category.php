<?php 

include "cn.php";
require "check_login.php";

if(isset($_POST['category_name']))
	{  $categ=$_POST['category_name'];
	   mysql_query("INSERT INTO categories(Category_name) values('$categ')",$cn) or die(mysql_error());
	   	}
else { 	 echo"<form action='category.php' method='POST' enctype='multipart/form-data'>
				   Category name:  <input type='text' name='category_name'></br>
				   <input type='submit' name='submit' value='Submit' />";

}