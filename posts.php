

<?php

include 'cn.php';
include "check_login.php";
//session_start();
    if(isset($_GET['subcat']))
        { $subcat=$_GET['subcat'];
          //echo $subcat;         
          $query=mysql_query("SELECT * FROM posts where subcategory_id='$subcat' order by time desc") or die(mysql_error());//limit $start,$end
 
    while($fet = mysql_fetch_array($query))
        {   $time=$fet['time'];
            $id=$fet['id'];
            //$src="adphotos/".$id.".jpg";
            
            /*if(file_exists($src))
                {   echo "<img src='$src' width='250' height='250'></br>";
                    }*/
            echo "<i>Posted on:".$fet['time']."</i> &nbsp&nbsp<a href='editposts.php?post_id=".$id."'>Edit</a></br>";        
            echo "Title -".$fet['title']."</br>";
            //echo "Category -".$fet['Category']."</br>";

            echo "Link - <a href='".$fet['link']." target=new_window'>".$fet['linkname']."</a></br>";
            echo "description -".$fet['description']."</br>";
            $query1=mysql_query("SELECT * FROM files where post_id='$id'");
            echo "Files Uploaded:<br>";
            while($file=mysql_fetch_assoc($query1))
              {  
                $filename=$file['filename'];
                $fileid=$file['file_id'];
                $type=$file['type'];
                
                echo "<i><a href='posts/".$fileid.".".$type."'>".$filename."</a></i><br>";

                }


            echo "</br>";
            echo "</br>";
           }
       }

    else 
        { 
          //echo $subcat;         
          $query=mysql_query("SELECT * FROM posts order by time desc") or die(mysql_error());//limit $start,$end
          $i=0;
    while($fet = mysql_fetch_array($query))// && $i<10)
        {   $time=$fet['time'];
            $id=$fet['id'];
            $sub_id=$fet['subcategory_id'];


            //$query1=mysql_query("SELECT * FROM subcategories where subcategory_id='$sub_id'") or die(mysql_error());
            $query1=mysql_fetch_assoc(mysql_query("SELECT * FROM subcategories where subcategory_id='$sub_id'"));
            $subcat_name=$query1['subcategory_name'];
            $cat_id=$query1['category_id'];
            $query1=mysql_fetch_assoc(mysql_query("SELECT * FROM categories where Category_id='$cat_id'"));
            $cat_name=$query1['Category_name'];

            //$src="adphotos/".$id.".jpg";
            
            /*if(file_exists($src))
                {   echo "<img src='$src' width='250' height='250'></br>";
                    }*/

            echo "<i>Posted on:".$fet['time']."</i> &nbsp&nbsp<a href='editposts.php?post_id=".$id."'>Edit</a><br>";
            echo "<i>Posted in:".$cat_name."=>".$subcat_name."</i><br>";        
            echo "Title -".$fet['title']."</br>";
            //echo "Category -".$fet['Category']."</br>";
            echo "Link - <a href='".$fet['link']." target=new_window'>".$fet['linkname']."</a></br>";
            echo "description -".$fet['description']."</br>";
            echo "Files Uploaded:<br>";
            $query1=mysql_query("SELECT * FROM files where post_id='$id'");
            while($file=mysql_fetch_assoc($query1))
              {  
                $filename=$file['filename'];
                $fileid=$file['file_id'];
                $type=$file['type'];
                
                echo "<i><a href='posts/".$fileid.".".$type."'>".$filename."</a></i><br>";

                }


            echo "</br>";
            $i=$i+1;
           }
       }
?>