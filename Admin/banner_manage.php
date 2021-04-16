<?php  

include 'include/db.php';

if(($_SESSION['ADMIN_LOGIN']!='yes')){

  header('location:login.php?id='.$_SESSION['ADMIN_LOGIN']);
  die();
}

$b_id='';
$b_name='';
$b_location='';
$b_address='';
$image='';
$b_price='';
$msg=''; 
$image_required='requried';
$h_number='';

 if(isset($_GET['b_id']) && $_GET['b_id']!='')
 {
    $image_required='';
    $b_id=$_GET['b_id'];

    $res=mysqli_query($con,"SELECT * FROM `banner` WHERE b_id='$b_id'");
  
    $check=mysqli_num_rows($res);
     
     if($check>0){
     $show=mysqli_fetch_assoc($res);
     
     $b_id=$show['b_id'];
     $b_name=$show['b_name'];
     $h_number=$show['h_number'];
     $b_address=$show['b_address'];
     $b_location=$show['b_location'];
     $b_price=$show['b_price'];
     $image=$show['image'];
     
    }
     else
     {
      header('location:banner.php');
      die();
     }
 }

if(isset($_POST['submit'])){
  
     $b_name=$_POST['b_name'];
     $h_number=$_POST['h_number'];
     $b_address=$_POST['b_address'];
     $b_location=$_POST['b_location'];
     $b_price=$_POST['b_price'];
     $status=$_POST['status'];


 if($_FILES['image']['name']!=''){
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'./media/banner/'.$image);
    
      $insert="INSERT INTO `banner`(b_name, h_number, b_address, b_location, b_price, image, status) VALUES ('$b_name','$h_number','$b_address','$b_location','$b_price','$image','1')";

       $insert_run=mysqli_query($con,$insert);

     }
      
      ?>
    <script>alert('Banner Added Successfully'); window.location.href='banner.php';</script>
    <?php   
    
 }
if(isset($_REQUEST['update']))
{

     $b_name=$_POST['b_name'];
     $h_number=$_POST['h_number'];
     $b_address=$_POST['b_address'];
     $b_location=$_POST['b_location'];
     $b_price=$_POST['b_price'];


 if($_FILES['image']['name']!=''){
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'./media/banner/'.$image);

        $update_sql="UPDATE `banner` SET b_id='$b_id', b_name='$b_name',h_number='$h_number',b_address='$b_address',b_location='$b_location',b_price='$b_price',image='$image' WHERE b_id='$b_id'";
          }else{
            $update_sql="UPDATE `banner` SET b_id='$b_id',b_name='$b_name',h_number='$h_number',b_address='$b_address',b_location='$b_location',b_price='$b_price' WHERE b_id='$b_id'";
          }
       $update_run=mysqli_query($con,$update_sql);
        ?>
        <script>alert('Banner Updated Successfully'); window.location.href='banner.php';</script>
        <?php

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Real Estate</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 <?php include 'include/header.php'; ?>
 <?php include 'include/sidebar.php'; ?> 
    <!-- Main content -->
    <section class="content">
     
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" enctype="multipart/form-data" >

                <div class="row card-body">
         
                  <div class="form-group col-md-6">
                    <label>Banner Name</label>
                    <input type="text"  name="b_name"  class="form-control" value="<?php echo $b_name ?>" placeholder="Enter Property Name" required>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>House Number</label>
                    <input type="text"  name="h_number"  class="form-control" value="<?php echo $h_number ?>" placeholder="Enter Property Number" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Address</label>
                    <textarea name="b_address" placeholder="Enter Local Address of Property" class="form-control"><?php echo $b_address; ?></textarea>
                    
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Location</label>
                    <textarea name="b_location" placeholder="Enter Location" class="form-control"><?php echo $b_location; ?></textarea>
                  </div>  
                  
                  
                  <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="text"  name="b_price" class="form-control" value="<?php echo $b_price ?>" placeholder="Enter Price" required>
                  </div> 
                   
                   <div class="form-group col-md-6">
                    
                    <label>Banner Image</label>
                    <input type="file"  name="image" class="form-control" width="100px" height="100px" 
                    multiple>
                   <?php if(isset($_REQUEST['b_id'])) { ?> <img src="media/banner/<?php echo $image; ?>" height="100" width="100">    <?php } ?>
                   </div> 

                 </div>

                    </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                <?php 
                if(isset($_REQUEST['b_id']))
                {
                ?>
                  <button type="submit" name="update" style="margin-left: 20%; " class="btn btn-success btn-lg  col-md-6">Update</button>
                <?php 
                }
                else
                {
                ?>
                  <button type="submit" name="submit" style="margin-left: 20%; " class="btn btn-success btn-lg  col-md-6">Submit</button>
                 <?php 
               }
                 ?>
                  <br>

                <div class="text-danger">
                  <?php echo $msg; ?>
                </div>
                </div>
        </form>
            </div>
             
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'include/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<script src="js/jq.js"></script>
  <script src="js/jqv.js"></script>
  <script>
    $(document).ready(function(){
      $("#frm").validate({
        rules:
        {
          name:
          {
            required:true,
          },
          detials:
          {
            required:true,
          },
          features:
          {
            required:true,
          },
          area:
          {
            required:true,
          },
          location:
          {
              required:true,
          },  
          city:
          {
            required:true,
          },
          pincode:
          {
            required:true,
            number:true,
            minlength:6,
            maxlength:6,
          },
          price:
          {
            required:true,
          },
          

          },

        messages:
        {
          name:
          {
            required:"Please Enter Property Name",
          },
          detials:
          {
            required:"Please Enter Your Detials about Property",
          },

          features:
          {
            required:"Please Write some Features about Property",
          },
          area:
          {
            required:"Please Enter Size of Property",
          },
          location:
          {
              required:"Please enter Address",
          },  
          city:
          {
            required:"Please Enter City",
          },
          pincode:
          {
            required:"Please enter Pincode",
            number:"Please Enter Only Digits",
            },
          price:
          {
            required:"Please Price",
          },


        },



      });
    });
  </script>

</body>
</html>
