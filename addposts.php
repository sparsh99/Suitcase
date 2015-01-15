<title>add Post</title>

<?php
  include "cn.php";
  require "check_login.php";

?>



<body>
 <?php

    if(isset($_POST['subcategory']) && isset($_POST['title'])){

      $subcategory=$_POST['subcategory']; 
      $title=$_POST['title'];
     
      if(isset($_POST['link'])){
      $link=$_POST['link'];
      if(isset($_POST['linkname'])) $linkname=$_POST['linkname'];
      }

      //$address=$_POST['address'];
      $description=$_POST['description'];
      $post=mysql_query("INSERT INTO posts(subcategory_id,title,linkname,link,description) values('$subcategory','$title','$link','$linkname','$description')",$cn) or die(mysql_error());
      $post_id=mysql_fetch_assoc((mysql_query("select * from posts order by id desc limit 1")));
      $postid=$post_id['id'];

     
      
      if(isset($_FILES["upload"]["name"])) {      

        $name=$_FILES["upload"]["name"]; 
        $tmp_name=$_FILES["upload"]["tmp_name"];
        $target_file = basename($_FILES["upload"]["name"]);
        $exe=pathinfo($target_file,PATHINFO_EXTENSION);

        $file=mysql_query("INSERT INTO files(post_id,filename,type) values('$postid','$name','$exe')",$cn) or die(mysql_error());
        //$query=mysql_query("select * from files order by id asc");
        $file_id=mysql_fetch_assoc((mysql_query("select * from files order by file_id desc limit 1")));
        $fileid=$file_id['file_id'];
        

        if(!empty($name)){
           $target_file = basename($_FILES["upload"]["name"]);
           $exe=pathinfo($target_file,PATHINFO_EXTENSION);
           $target="posts";
           if(move_uploaded_file($tmp_name,$target."/".$fileid.".".$exe))
            {echo'uploaded ';
              }  

        }

              //mkdir("users");
      
      //$fi=$_FILES["upload"]["name"];
      //$filename=basename($fi);      
      //$file=mysql_query("INSERT INTO files(post_id,filename) values('$postid','$filename')",$cn) or die(mysql_error());
     
      //move_uploaded_file($_FILES["upload"]["tmp_name"], $target.$fileid);
      }
      echo"done";
  }

  else if(isset($_POST['category']))
  { $categ=$_POST['category'];
    //echo $categ;
  	echo"<form action='addposts.php' method='POST' enctype='multipart/form-data'>
		Title:  <input type='text' name='title'></br>
		Link:   <input type='text' name='link'></br>
		Link name:   <input type='text' name='linkname'></br>
 		<textarea rows='5' cols='50' name='description' placeholder='Enter description here...'></textarea><br>";

	$query=mysql_query("select * from subcategories where category_id='$categ'",$cn);

	echo"Subcategory: <select name='subcategory'>";

	while($val=mysql_fetch_assoc($query)) {
		echo"<option value='".$val['subcategory_id']."'>".$val['subcategory_name']."</option>";
		}
	echo"</select></br>
	<input type='file' name='upload' id='upload'><br>
	<input type='submit' name='submit' value='Submit' />
  <input type='reset' name='reset'  value='Reset' />
	</form>";
  }
  else { echo"<form action='addposts.php' method='POST' enctype='multipart/form-data'>";
         echo"Please choose category: ";
         $query=mysql_query("select * from categories",$cn);
         echo"<select name='category' placeholder='Category'>";

         while($val=mysql_fetch_assoc($query)) {
            echo"<option value='".$val['Category_id']."'>".$val['Category_name']."</option>";
          }
         echo"</select></br>
         <input type='submit' name='submit' value='Submit' />
         <input type='reset' name='reset'  value='Reset' />
         </form>"; 
        }
	?>	 

</body>