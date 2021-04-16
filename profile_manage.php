<?php
require('include/header.php'); 

$user_id=''; 
$user_name='';
$email='';
$mobile='';
$description='';
$password='';
$cpassword='';
$user_image='';
$status='';
$msg='';
$image_required='requried';


    $image_required='';
    
 $user_id=$_SESSION['USER_ID'];
 $ress="SELECT * FROM users WHERE user_id='$user_id'";

$res=mysqli_query($con,$ress);
 $check=mysqli_num_rows($res);
     
if($check>0){

$show=mysqli_fetch_array($res);


$user_name=$show['user_name'];
$email=$show['email'];
$mobile=$show['mobile'];
$password=$show['password'];
$cpassword=$show['cpassword'];
$description=$show['description'];
$user_image=$show['user_image'];
  
    }
     else
     {
      header('location:profile.php');
      die();
     }
 
if(isset($_REQUEST['update']))
{

$user_id=$_SESSION['USER_ID'];
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$description=$_POST['description'];
$user_image=$_FILES['user_image'];

if($_FILES['user_image']['name']!='')
 {
            $user_image=rand(11111111,99999999).'_'.$_FILES['user_image']['name'];
        move_uploaded_file($_FILES['user_image']['tmp_name'],'Admin/media/user/'.$user_image);
 
    $update_sql="UPDATE `users` SET user_name='$user_name',email='$email',mobile='$mobile',password='$password',cpassword='$cpassword',description='$description',user_image='$user_image' WHERE user_id='$user_id'";
    
          }
          else{
       $update_sql="UPDATE `users` SET user_name='$user_name',email='$email',mobile='$mobile',password='$password',cpassword='$cpassword',description='$description' WHERE user_id='$user_id'";
          }
        $update_run=mysqli_query($con,$update_sql);
        
        ?>
        <script>alert('Profile Updated Successfully'); window.location.href='profile.php';</script>
        <?php

}



?>

<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Edit Profile</h1>
              <span class="color-text-a">Manage your Profile as you Want.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <a href="profile.php">My Profile</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                 Edit Profile
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 section-t8">
            <div class="row jumbotron">
              <div class="col-md-10">
                <form  method="POST" style="margin-left: 25%" enctype="multipart/form-data" role="form">
                  <div class="row">
                     
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                      <input type="text" name="user_name"  class="form-control" value="<?php echo $user_name ?>" placeholder="Enter Name" required>  <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                      <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php echo $email; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                         <input type="text"  name="mobile"  class="form-control" value="<?php echo $mobile ?>" placeholder="Enter Mobile Number" required>
                   <div class="validate"></div>
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                      <textarea name="description" placeholder="Write About yourself" class="form-control"><?php echo $description; ?></textarea>
                   
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                    <input type="file"  name="user_image" class="form-control" width="100px" height="100px"> 
                    
                   <?php 
                   if(isset($_REQUEST['user_id'])) { ?>
                    <br>

                    <img src="Admin/media/user/<?php echo $user_image; ?>" height="100" width="100"> 
                  <?php } ?>
                   
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                  <button type="submit" name="update" class="btn btn-a">Update</button>
                   </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->

<?php include('include/footer.php'); ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>