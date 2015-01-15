<?php
  include "cn.php";
  require "check_login.php";
  //session_start();

  if(isset($_POST['submit']))
  { $post_id=$_SESSION['postid'];
  	if (isset($_POST['title'])) 
  		{   $change=$_POST['title'];
  			$query=mysql_query("update posts set title='$change' where id='$post_id'");
  			}
  	if (isset($_POST['link'])) 
  		{   $change=$_POST['link'];
  			$query=mysql_query("update posts set title='$change' where id='$post_id'");
  			}

  	if (isset($_POST['linkname'])) 
  		{   $change=$_POST['title'];
  			$query=mysql_query("update posts set title='$change' where id='$post_id'");
  			}
  	if (isset($_POST['description'])) 
  		{   $change=$_POST['title'];
  			$query=mysql_query("update posts set title='$change' where id='$post_id'");
  			}

  	if(!empty($_FILES["upload"]["name"]) && isset($_FILES["upload"]["name"])) {      

        $name=$_FILES["upload"]["name"]; 
        $tmp_name=$_FILES["upload"]["tmp_name"];
        $target_file = basename($_FILES["upload"]["name"]);
        $exe=pathinfo($target_file,PATHINFO_EXTENSION);

        $file=mysql_query("INSERT INTO files(post_id,filename,type) values('$post_id','$name','$exe')",$cn) or die(mysql_error());
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

    	  if(!empty($_POST['files'])){
		// Loop to store and display values of individual checked checkbox.
		foreach($_POST['files'] as $selected){
			echo $selected."</br>";
			$query=mysql_fetch_assoc(mysql_query("select * from files where file_id='$selected'"));

			unlink("posts/".$selected.".".$query['type']);
			mysql_query("delete from files where file_id='$selected'");
			}
			}


  	}

  else if(isset($_GET['post_id']))
  {  
  	 $post_id=$_GET['post_id'];
  	 $_SESSION['postid']=$post_id;
	 $query=mysql_query("select * from posts where id='$post_id'",$cn);
	 $post=mysql_fetch_assoc($query);

	 echo"<form action='editposts.php' method='POST' enctype='multipart/form-data'>
		Title:  <input type='text' name='title' placeholder=".$post['title']."></br>
		Link:   <input type='text' name='link' placeholder=".$post['link']."></br>
		Link name:   <input type='text' name='linkname' placeholder=".$post['linkname']."></br>
 		<textarea rows='5' cols='50' name='description' placeholder=".$post['description']."></textarea><br>";

	//$query=mysql_query("select * from subcategories where category_id='$categ'",$cn);

	//echo"Subcategory: <select name='subcategory'>";

	/*while($val=mysql_fetch_assoc($query)) {
		echo"<option value='".$val['subcategory_id']."'>".$val['subcategory_name']."</option>";
		}*/
	//echo"</select></br>";
	echo"To remove a file check it:<br>";
	$query=mysql_query("select * from files where post_id='$post_id'",$cn);

	while($file=mysql_fetch_assoc($query))
	{ 
	  $filename=$file['filename'];
      $fileid=$file['file_id'];
      $type=$file['type'];
	  echo"</t><input type='checkbox' name='files[]' value=".$fileid.">".$filename."<br>";

	}

	echo" <br>if you want to upload more files, you can edit and upload more files <br>
	<input type='file' name='upload' id='upload'><br><br>
	<input type='submit' name='submit' value='Submit' />
    <input type='reset' name='reset'  value='Reset' />
	</form>";
  }

?>

