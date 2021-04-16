<?php include 'include/db.php';

$user_image='';
$user_name='';
$email='';
$mobile='';
$password='';
$cpassword='';
$description='';


if(isset($_POST['submit'])){
  $user_name=$_POST['user_name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $description=$_POST['description'];
  $user_image=rand(11111111,99999999).'_'.$_FILES['user_image']['name'];
        move_uploaded_file($_FILES['user_image']['tmp_name'],'Admin/media/user/'.$user_image);
   
 $sql_register="INSERT INTO `users` (user_name,email,mobile,password,cpassword,description,user_image) VALUES ('$user_name','$email','$mobile','$password','$cpassword','$description','$user_image')";
  $run_register=mysqli_query($con,$sql_register);

      
      
  
  if ($run_register){
   $_SESSION['USER_PROFILE']=$user_image;
   
   ?>

   <script type="text/javascript">
     alert('Data Inserted Successfully');
     window.location.href='login.php';
   </script>
   <?php 
  }else{
    ?>
   <script type="text/javascript">
     alert('Data Not Inserted');
     window.location.href='register.php';
   </script>
   <?php 
  }
  
}

?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Real Estates</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #999;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
  }
  .form-control {
    box-shadow: none;
    border-color: #ddd;
  }
  .form-control:focus {
    border-color: #4aba70; 
  }
  .login-form {
        width: 600px;
    margin: 0 auto;
    padding: 30px 0;
  }
    .login-form form {
        color: #434343;
    border-radius: 1px;
      margin-bottom: 15px;
        background: #fff;
    border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
  }
  .login-form h4 {
    text-align: center;
    font-size: 22px;
        margin-bottom: 20px;
  }
    /*.login-form .avatar {
        color: #fff;
    margin: 0 auto 30px;
        text-align: center;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    z-index: 9;
    background: #4aba70;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
  }*/
    /*.login-form .avatar i {
        font-size: 62px;
    }*/
    .login-form .form-group {
        margin-bottom: 20px;
    }
  .login-form .form-control, .login-form .btn {
    min-height: 40px;
    border-radius: 2px; 
        transition: all 0.5s;
  }
  .login-form .close {
        position: absolute;
    top: 15px;
    right: 15px;
  }
  .login-form .btn {
    background: #4aba70;
    border: none;
    line-height: normal;
  }
  .login-form .btn:hover, .login-form .btn:focus {
    background: #42ae68;
  }
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #4aba70;
    }
    .msg{
      color: red;
    }
    label.error
    {
      color:red;
    }
    input.error
    {
      color: red;
    }
    input.valid
    {
      color:green;
    }

</style>
</head>
<body>
<div class="login-form">    
    <form  method="post" id="frm" enctype="multipart/form-data">
      <h4 style="margin-top: 10%;"><b>E_COMMERCE</b> | <i>Sign Up</i></h4>

      <p class="text-center modal-title" ><strong>Sign Up for New Admin Account</strong></p>
        <br>
        <div class="row">
        <div class="form-group col-md-6 mb-6">
          <input type="text" name="user_name" class="form-control" placeholder=" Enter name" required="">
        </div>
        
        <div class="form-group col-md-6 mb-6">
          <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
        </div>
        
         <div class="form-group col-md-6 mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder=" Enter Password" required="">
        </div>
        
        <div class="form-group col-md-6 mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder=" Enter Conform Password" required="">
        </div>

        <div class="form-group col-md-6 mb-3">
          <input type="text" name="mobile" class="form-control" placeholder=" Enter Mobile Number" required="">
        </div>

        <div class="form-group col-md-6 mb-3">
         <textarea class="form-control" name="description" placeholder="Write About Your Self"></textarea required="">
       </div>
        
        <div class="form-group col-md-6 mb-3">
          <input type="file" name="user_image" class="form-control" placeholder=" Select Your Image" required="">
        </div>
        </div>
        <br>
        <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          
        <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="forgot-link">Forgot Password?</a>
        </div> 

        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Sign Up">
        <br>
   
        <a href="login.php" class="text-center">I already have an Account</a>           
    </form>     
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="assets/js/jq.js"></script>
<script src="assets/js/jqv.js"></script>
  <script>
    $(document).ready(function(){
      $("#frm").validate({
        rules:
        {
          name:
          {
            required:true,
          },
          email:
          {
            required:true,
            email:true,
          },
          password:
          {
            required:true,
            minlength:5,
            maxlength:10,
          },
          cpassword:
          {
            required:true,
            equalTo:"#password",
          },
          mobile:
          {
              required:true,
              number:true,
            minlength:12,
            maxlength:12,
          },  
          description:
          {
            required:true,
          },
        },

        messages:
        {
          name:
          {
            required:"Please Enter Your Name",
          },
          email:
          {
            required:"Please Enter Your Email",
            email:"Please Enter Valid Email Address",
          },

          password:
          {
            required:"Please Enter Your Password",
            minlength:"Please Enter Atleast 5 Character",
            maxlength:"Please Enter Only 10 Character",
          },
          cpassword:
          {
            required:"Please Enter Confirm Password",
            equalTo:"Please Enter Same as Password",
          },
          mobile:
          {
            required:"Please enter Your Mobile",
            number:"Please Enter Only Digits and don't forget to add +91",
            minlength:"Please Enter 12 Digits Mobile No",
            maxlength:"Please Enter Valid Mobile",
          },
          description:
          {
            required:"Please Write about your self for Profile",
          },


        },



      });
    });
  </script>

</body>
</html>
