<?php 

include "cn.php";
require "check_login.php";


if(isset($_POST['subcategory_name'])&&isset($_POST['category']))
	{   $categ=$_POST['category'];
		$subcateg=$_POST['subcategory_name'];
	   mysql_query("INSERT INTO subcategories(category_id,subcategory_name) values('$categ','$subcateg')",$cn) or die(mysql_error());
	   	}
else { 	 echo"<form action='subcategory.php' method='POST' enctype='multipart/form-data'>";

					 $query=mysql_query("select * from categories",$cn);
         			echo"Category: <select name='category' placeholder='Category'>";
				    while($val=mysql_fetch_assoc($query)) {
            		echo"<option value='".$val['Category_id']."'>".$val['Category_name']."</option>";
          				}
          		    echo"</select><br>Sub-category name:  <input type='text' name='subcategory_name'></br>
				   <input type='submit' name='submit' value='Submit' />";

}