<?php 
include ('include/db.php');
include ('include/function.php');


$run=mysqli_query($con,"select * from users");
$fetch=mysqli_fetch_array($run);

$oldpwd=$fetch['password'];
 $user_id=$fetch['user_id'];


if(isset($_POST['submit'])){

      $current=$_POST['current'];
      $new=$_POST['new'];
      $confirm=$_POST['confirm'];

      if($current == $oldpwd){
        if($new == $confirm){
          $update="UPDATE `users` SET password='$new' WHERE user_id='$user_id'";
          $update_run=mysqli_query($con,$update);
          if($update_run){
            echo "Your Password Changed Successfully";
            header('location:login.php');
            die();
          }else{
            echo "error";
          }
        }else{
            echo "Your Password do not Match";
          }

      }else{
        echo "You Enter Invalid Password";
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
        width: 400px;
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
    <form  method="post">
     
     <h4 style="margin-top: 10%;"><b>Real Estates</b> | <i>Change Password</i></h4>

      <h4><?php echo $_SESSION['USER_NAME'] ?></h4>
      <br>
        <div class="form-group">
            <input type="password" name="current" class="form-control" placeholder="Enter old Password" required="required">
        </div>

        <div class="form-group">
            <input type="password" name="new" class="form-control" placeholder="Enter New Password" required="required">
        </div>

        <div class="form-group">
            <input type="text" name="confirm" class="form-control" placeholder="Please Conform Password" required="required">
        </div>

        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="submit">
        <br>
    <div class="text-center small">Don't want to Change Password <a href="profile.php"><strong>Back to Profile</strong></a></div>
        <br>

             
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
