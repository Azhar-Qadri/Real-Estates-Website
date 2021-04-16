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
    ?>
    <script type="text/javascript">
      alert('Property type Inserted Successfully');
      window.location.href="categories.php";
    </script>
    <?php  

 }
 
  
}

if(isset($_GET['cat_id']) && $_GET['cat_id']!=''){
  $cat_id=$_GET['cat_id'];
  $edit=mysqli_query($con,"select * from categories where cat_id='$cat_id'");
  $check=mysqli_num_rows($edit);
  if($check>0){
    $edit1=mysqli_fetch_array($edit);
  $categories=$edit1['cat_name'];
  }else{
    header('location:categories.php');
    die();
  }
  
}

if(isset($_REQUEST['update'])){
  $cat_name=$_POST['cat_name'];

  $update=mysqli_query($con,"UPDATE `categories` SET cat_name ='$cat_name' WHERE cat_id='$cat_id'");
  header('location:categories.php');
  die();  
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php'; ?>

    <!-- Main content -->
    <section class="content">
     
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Properties Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Property Type</label>
                    <input type="text" class="form-control" name="cat_name" value="<?php echo $categories; ?>" placeholder="Enter Categories">
                  </div>
                  <div class="msg">
                    <?php echo $msg; ?>
                  </div>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  
                <?php 
                if(isset($_REQUEST['cat_id']))
                {
                ?>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                <?php 
                }
                else
                {
                ?>
                  <button type="submit" name="submit" class="btn btn-success">Add</button>
                 <?php 
               }
                 ?>
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
</body>
</html>
