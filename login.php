<?php 

error_reporting(0);
include ('include/db.php');
include ('include/function.php');

$msg='';
$user_id='';
$ADMIN_NAME='';
$image='';

  if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
    
    $run=mysqli_query($con,"SELECT * FROM `users` WHERE email='$email'and password='$password'");
 
  $count=mysqli_num_rows($run);
  if($count>0){
    $fetch=mysqli_fetch_array($run);

      $_SESSION['USER_LOGIN']='yes';
      $_SESSION['USER_NAME']=$fetch['user_name'];
      $_SESSION['USER_ID']=$fetch['user_id'];
      $_SESSION['USER_EMAIL']=$fetch['email'];
      $_SESSION['USER_MOBILE']=$fetch['mobile'];

      
      ?>
      <script> alert('Login Successfully done'); window.location.href='index.php'; </script>
      <?php
  }else{
      $msg="*Please Enter Correct Login Information";
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
        width: 350px;
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
    <form  method="post"  enctype="multipart/form-data">
     <!--  <div class="avatar"><i class="material-icons"><img width="150px"  height="150px" style="border-radius: 50%; margin-left: 50%;" src="Admin/media/user/<?php echo $_SESSION['USER_PROFILE']; ?>"></i></div><br>
     -->
     <h4 style="margin-top: 10%;"><b>Real Estates</b> | <i>Sign In</i></h4>

      <p class="text-center modal-title" ><strong>Sign In for Login</strong></p>
      <br>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required="required">
        </div>

        <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
            
        </div> 
        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="submit">
        <br>
    <div class="text-center small">Don't have an account? <a href="register.php">Sign up</a></div>
        <br>

        <div class="msg">
        <?php echo $msg; ?>  
        </div>
                      
    </form>     
</div>
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
          password:
          {
            required:true,
            minlength:5,
            maxlength:10,
          },
        },

        messages:
        {
          name:
          {
            required:"Please Enter Your Name",
          },
          password:
          {
            required:"Please Enter Your Password",
            minlength:"Please Enter Atleast 5 Character",
            maxlength:"Please Enter Only 10 Character",
          },
        },



      });
    });
  </script>

</body>
</html>                                   
