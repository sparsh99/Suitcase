<?php
ob_start();
require "check_login.php";
//session_start();
//session_start();
if(isset($_SESSION['start']) && isset($_SESSION['end']))
	{   
				$start=$_SESSION['start'];
				$end=$_SESSION['end'];	
							}
else
	{
				$start=0;
				$end=10;
							}

include_once 'cn.php';

?>

	<head>
		<style>
			header {
			    background-color:#0B4C5F;
			    color:white;
			    text-align:center;
			    padding:5px;	 
				}
			nav {
			    line-height:30px;
			    background-color:#eeeeee;
			    height:50px;
			    width: 100%;
			    float:left;
			    padding:0px;	      
				}
			
			section {
			    height:100%;
			    width:100px;
			    float:left;
			    padding:10px;	 	 
				}
			aside {
			    height:100%;
			    width:100px;
			    float:left;
			    padding:10px;	 	 
				}
			footer {
    			    background-color:#610B0B;
			    color:white;
			    clear:both;
			    text-align:center;
			    padding:0px;	 	 
				}
		</style>
	</head>


	<body>


		<header>
		<h1>SUITCASE</h1>
		</header>
				
	<nav>
		
		<?php

			//$loginid=$_SESSION['admin'];
			//$pass=$_SESSION['adminpass'];
			//$result=mysql_query("select count(*) as cnt from Admin where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
			//$fet = mysql_fetch_array($result);
					 
			/*if($fet['cnt']!=1)
				{		echo "<li><a href='adminlogin.php'> sign in</a><li>";
						echo "<li><a href='adminregister.php'> sign up</a><li>";		
												} 
			else
				{ 	*/echo "&nbsp<a href='posts.php' target='iframe_b'>Home</a>";
					  echo "&nbsp<a href='category.php' target='iframe_b'>Add Category</a>";
					  echo "&nbsp<a href='subcategory.php' target='iframe_b'>Add Sub-Category</a>";
					  echo "&nbsp<a href='addposts.php' target='iframe_b'> Add Posts</a>";
					  echo "&nbsp<a href='logout.php'> Logout</a>";
	
					  //echo "<a href='blockuser.php'>&nbsp Block User</a>";
					  //echo "<a href='adminregister.php'>&nbsp Registeradmin</a>";
					  //echo "<li><a href='adminlogout.php'>Logout</a></li>"; 
					  //echo "<li style='color:red'>Hey! $loginid<li>"; 
							 				 //}
								//}
				 			/*else
				 				{
									echo "<a href='adminlogin.php'> sign in</a>";
							 		echo "<li><a href='adminregister.php'> sign up</a><li>";
								}*/
						?>
				
	</nav>

					

						<!-- <li><a href="login.php">Sign in</a></li>
						<li><a href="register.php">Sign up</a></li> -->
<section>
<?php
    $query=mysql_query("SELECT * FROM categories order by Category_id",$cn) or die(mysql_error());
    while($fet = mysql_fetch_array($query))
      { echo "<a href='menu_bar.php?cat=".$fet['Category_id']."'>".$fet['Category_name']."</a><br><br>";
          }
?>
</section>

<aside>
<?php 
    if(isset($_GET['cat'])) { $cat=$_GET['cat'];
    $query=mysql_query("SELECT * FROM subcategories where category_id='$cat' order by subcategory_id",$cn) or die(mysql_error());
    while($fet = mysql_fetch_array($query))
      {
        echo "<a href='posts.php?subcat=".$fet['subcategory_id']."' target='iframe_b'>".$fet['subcategory_name']."</a><br><br>";
          }}
?>
</aside>		

<iframe width="1090px" height="100%" src="posts.php" frameborder="0" name="iframe_b" background=red></iframe>

</body>

</html>
