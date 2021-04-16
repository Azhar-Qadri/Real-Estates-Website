<?php  
require 'include/db.php';
$msg='';
$categories='';

if(isset($_POST['submit'])){
  $cat_name=$_POST['cat_name'];
 
 $res=mysqli_query($con,"select * from categories where cat_name='$cat_name'");
 $check1=mysqli_num_rows($res);
 if($check1>0){
    $msg="Categories is Alreay Present";
 }else{
  $run_cat_insert=mysqli_query($con,"INSERT INTO `categories`(cat_name,status) VALUES ('$cat_name','1')");
 
  if($run_cat_insert){
  		
  		echo '<script> alert("Categories Added Successfully");</script>';

  		header('location:categories.php');
	    die();

  }else{
  		echo '<script> alert("Categories Not Added");</script>';

  }
   }
 
  
}

if(isset($_POST['update'])){
  $id=$_POST['update_id'];
  
  $cat_name=$_POST['cat_name'];

  $update="UPDATE categories SET cat_name='$cat_name' WHERE cat_id='$cat_id'";
  $update=mysqli_query($con,$update);

  
  header('location:categories.php');
  die();  
}

?>
