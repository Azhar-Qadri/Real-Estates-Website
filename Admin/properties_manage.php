<?php  
ob_start();

include 'include/db.php';
include 'include/function.php';

if(($_SESSION['ADMIN_LOGIN']!='yes')){

  header('location:login.php?id='.$_SESSION['ADMIN_LOGIN']);
  die();
}


$cat_id='';
$product_id='';
$name='';
$area='';
$detials='';
$features='';
$location='';
$city='';
$pincode='';
$image='';
$status='';
$price='';
$msg='';
$image_required='requried';


 if(isset($_GET['properties_id']) && $_GET['properties_id']!='')
 {
    $image_required='';
    $properties_id=get_safe_value($con,$_GET['properties_id']);

    $res=mysqli_query($con,"SELECT * FROM `properties` WHERE  properties_id='$properties_id'");
  
 

     $check=mysqli_num_rows($res);
     
     if($check>0){
     $show=mysqli_fetch_assoc($res);
     
     $properties_id=$show['properties_id'];
     $cat_id=$show['cat_id'];
     $name=$show['name'];
     $location=$show['location'];
     $city=$show['city'];
     $pincode=$show['pincode'];
     $image=$show['image'];
     $price=$show['price'];
     $detials=$show['detials'];
     $features=$show['features'];
     $area=$show['area'];
     
    }
     else
     {
      header('location:properties.php');
      die();
     }
 }
if(isset($_POST['submit'])){

$cat_id=get_safe_value($con,$_POST['cat_id']);
$name=get_safe_value($con,$_POST['name']);
$location=get_safe_value($con,$_POST['location']);
$city=get_safe_value($con,$_POST['city']);
$pincode=get_safe_value($con,$_POST['pincode']);
$image=get_safe_value($con,$_FILES['image']);
$price=get_safe_value($con,$_POST['price']);
$detials=get_safe_value($con,$_POST['detials']);
$features=get_safe_value($con,$_POST['features']);
$area=get_safe_value($con,$_POST['area']);



        $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'./media/properties/'.$image);

       $insert_run=mysqli_query($con,"INSERT INTO `properties`(cat_id, name, location, city, pincode, image, price, detials, features, area, status) VALUES ('$cat_id','$name','$location','$city','$pincode','$image','$price','$detials','$features','$area','1')");
      
     
    ?>
    <script>alert('Property Added Successfully'); window.location.href='properties.php';</script>
    <?php   
    
 }
if(isset($_REQUEST['update']))
{


$cat_id=get_safe_value($con,$_POST['cat_id']);
$name=get_safe_value($con,$_POST['name']);
$location=get_safe_value($con,$_POST['location']);
$city=get_safe_value($con,$_POST['city']);
$pincode=get_safe_value($con,$_POST['pincode']);
$image=get_safe_value($con,$_FILES['image']);
$price=get_safe_value($con,$_POST['price']);
$detials=get_safe_value($con,$_POST['detials']);
$features=get_safe_value($con,$_POST['features']);
$area=get_safe_value($con,$_POST['area']);


      
 if($_FILES['image']['name']!=''){
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'./media/properties/'.$image);



        $update_sql="UPDATE `properties` SET cat_id='$cat_id',name='$name',location='$location',city='$city',pincode='$pincode',image='$image',price='$price',detials='$detials',features='$features',area='$area' WHERE properties_id='$properties_id'";
          }else{
            $update_sql="UPDATE `properties` SET cat_id='$cat_id',name='$name',location='$location',city='$city',pincode='$pincode',price='$price',detials='$detials',features='$features',area='$area' WHERE properties_id='$properties_id'";
          }
        $update_run=mysqli_query($con,$update_sql);
        ?>
        <script>alert('Property Updated Successfully'); window.location.href='properties.php';</script>
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
                <h3 class="card-title">Add Properties</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" enctype="multipart/form-data"  id="frm">

                <div class="row card-body">
         
                  <div class="form-group col-md-6">
                    
                    <label>Property Type</label>
                    
                    <select class="form-control" name="cat_id" id="cat_id" required>
                      <?php 
                      echo $cat_id;
                      ?>
                      <option value="">Select Categories</option>
                      <?php 
                      
                      $sql=mysqli_query($con,"SELECT * FROM categories order by cat_name ");
                      while($row=mysqli_fetch_array($sql))
                       {

                        if($row['cat_id']==$cat_id){
                          echo "<option selected value=".$row['cat_id'].">".$row['cat_name']."</option>";
                        
                        }else{
                          echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
                        
                        }
                        
                        }
                       ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Property Name</label>
                    <input type="text"  name="name"  class="form-control" value="<?php echo $name ?>" placeholder="Enter Property Name" required>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Property Detials</label>
                    <textarea name="detials" placeholder="Enter Detials about Property" class="form-control"><?php echo $detials; ?></textarea>
                    
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Features</label>
                    <textarea name="features" placeholder="Enter Amenities of Property" class="form-control"><?php echo $features; ?></textarea>
                  </div>  
                  
                  <div class="form-group col-md-6">
                    <label>Property Size</label>
                    <input type="text"  name="area"  class="form-control" value="<?php echo $area ?>" placeholder="Enter Property Area" required>
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label>Location</label>
                      
                    <textarea name="location" class="form-control"><?php echo $location; ?></textarea>
                    
                  </div>  
                  
                  <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text"  name="city" class="form-control" value="<?php echo $city ?>" placeholder="Enter City" required>
                  </div> 

                  <div class="form-group col-md-6">
                    <label>Pincode</label>
                    <input type="text"  name="pincode" class="form-control" value="<?php echo $pincode ?>" placeholder="Enter Pincode" required>
                  </div> 

                  
                  <div class="form-group col-md-6">
                    <label>Price</label>
                    <input type="text"  name="price" class="form-control" value="<?php echo $price ?>" placeholder="Enter Price" required>
                  </div> 
                   
                   <div class="form-group col-md-6">
                    
                    <label>Product Image</label>
                    <input type="file"  name="image" class="form-control" width="100px" height="100px" 
                    >
                   <?php if(isset($_REQUEST['properties_id'])) { ?> <img src="media/properties/<?php echo $image; ?>" height="100" width="100">    <?php } ?>
                   </div> 

                 </div>

                    </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                <?php 
                if(isset($_REQUEST['properties_id']))
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
