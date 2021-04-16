<?php  
   require('include/db.php');
   include('include/function.php');

   $user_id=$_SESSION['USER_ID'];

   $cat_res=mysqli_query($con,"select * from categories where status=1 order by cat_name");
   
   $sort_sql="select DISTINCT location from properties order by location";
   $sort_run=mysqli_query($con,$sort_sql);
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>EstateAgency</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons -->
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
      <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
      <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
      <!-- =======================================================
         * Template Name: EstateAgency - v2.2.0
         * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
         * Author: BootstrapMade.com
         * License: https://bootstrapmade.com/license/
         ======================================================== -->
   </head>
<!-- <script type="text/javascript">
      function search(textsearch)
      {
         //alert(textsearch);
         var a;
         if(window.XMLHttpRequest)
         {
            a=new XMLHttpRequest;
         }
         a.onreadystatechange=function()
         {
            if(a.readyState==4)
            {
               document.getElementById("tbl").innerHTML=a.responseText;
            }
         }
         a.open("GET","search.php?text="+textsearch,true);
         a.send();
      }
   </script>
    --><body>
      <!-- ======= Property Search Section ======= -->
      <div class="click-closed"></div>
      <!--/ Form Search Star /-->
      <div class="box-collapse">
         <div class="title-box-d">
            <h3 class="title-d">Search Property</h3>
         </div>
         <span class="close-box-collapse right-boxed ion-ios-close"></span>
         <div class="box-collapse-wrap form">
            
            <form class="form-a" action="search.php" method="POST">
               <div class="row">
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="Type">Keyword</label>
                  <input type="text" placeholder="Search" name="search" class="form-control form-control-lg form-control-a" placeholder="Keyword">
                     </div>
                  </div>
                  <br>
                  <div class="col-md-6 mb-2">
                     <div class="form-group">
                        <label for="city">Locality</label>
                        <select class="form-control form-control-lg form-control-a" name="location" id="city">
                           <option>All Area</option>
                           <?php
                           $i=''; 
                           $i=1;
                           while($sort_display=mysqli_fetch_assoc($sort_run)){ ?>
         <option value="<?php echo $sort_display['location']; ?>"><?php echo $sort_display['location']; ?></option>";  
                        <?php $i++; } ?>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-12">
                  <input type="submit"class="btn btn-b" placeholder="Search"  name="btnsearch" value="Search">

                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- End Property Search Section -->>
      <!-- ======= Header/Navbar ======= -->
      <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
         <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
            </button>
            <a class="navbar-brand text-brand" href="index.php">Estate<span class="color-b">Agency</span></a>
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " href="categories.php">All Properties</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                     Property Types
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                           $cat_arr=array();
                           while($row=mysqli_fetch_assoc($cat_res)){ ?>
                        <a class="dropdown-item" href="property.php?cat_id=<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></a>
                        <?php 
                           }
                          ?>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.php">About</a>
                  </li>
                 <li class="nav-item">
                     <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                     My Account
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php

                     if(isset($_SESSION['USER_LOGIN'])){
                        ?>

                              <a class="nav-link " href="profile.php" style="margin-left: 10%; font-size: 17px ">Profile</a>

                              <a class="nav-link" href="profile_manage.php?type=edit&user_id=<?php echo $_SESSION['USER_ID']; ?>" style="margin-left: 10%; font-size: 17px " >Edit Profile</a>

                              <a class="nav-link" href="change_password.php?change&user_id=<?php echo $_SESSION['USER_ID']; ?>" class="forgot-link" style="margin-left: 10%; font-size: 17px ">Change Password</a>


                              <a class="nav-link" href="logout.php" style="margin-left: 10%; font-size: 17px ">Logout</a>
                          <?php  
                  }else{ ?>
                              <a class="nav-link" href="login.php" style="margin-left: 10%; font-size: 17px ">Login</a>

                    <?php   }
                     ?>
                     </div>
               </li>
            </ul>
            </div>
            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
            </button>
         </div>
         
            <div id="google_translate_element"></div>

      </nav>
      <!-- End Header/Navbar -->
      