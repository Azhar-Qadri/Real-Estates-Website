<?php  
include 'include/db.php';
include 'include/function.php';
$row='';
$properties_id='';

if(($_SESSION['ADMIN_LOGIN']!='yes')){

  header('location:login.php?id='.$_SESSION['ADMIN_LOGIN']);
   die();
}


if(isset($_GET['type']) && $_GET['type']!=''){
   
    $type=get_safe_value($con,$_GET['type']);
   
    if($type=='status'){
       $operation=$_GET['operation'];
       $product_id=$_GET['properties_id'];
   
      if($operation=='active'){
          $status='1';
      }else{
          $status='0';
      }
      $update_status="UPDATE `properties` SET status='$status' WHERE properties_id='$properties_id'";
      mysqli_query($con,$update_status);
    }

    if($type=='delete'){
      $properties_id=get_safe_value($con,$_GET['properties_id']);
      $delete_sql="DELETE FROM `properties` WHERE properties_id='$properties_id'";
      mysqli_query($con,$delete_sql);
    }
}


$sql="SELECT properties.*,categories.cat_name FROM properties,categories where properties.cat_id=categories.cat_id  order by properties.properties_id desc";
$run=mysqli_query($con,$sql); 


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
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Properties</b></h3>
                <br>
                <b><a class='btn btn-primary btn-sm' href='properties_manage.php'>Add Properties</a></b>
                <br>
                <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Sr.NO</th>
                      <th>ID</th>
                      <th>Properties Type</th>
                      <th>Propertie Name</th>
                      <th>properties Detials</th>
                      <th>Features</th>
                      <th>Area</th>
                      <th>Location</th>
                      <th>City</th>
                      <th>Pincode</th>
                      <th>Price</th>
                      <th>Images</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php
                    $i=1;
                     while($row=mysqli_fetch_array($run)){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['properties_id']; ?></td>
                      <td><?php echo $row['cat_name']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['detials']; ?></td>
                      <td><?php echo $row['features']; ?></td>
                      <td><?php echo $row['area']; ?></td>
                      <td><?php echo $row['location']; ?></td>
                      <td><?php echo $row['city']; ?></td>
                      <td><?php echo $row['pincode']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                     <td><img width="100px" height="100px" src="media/properties/<?php echo $row['image'];?>"/></td>
                      <td>
                        <?php 
                        if($row['status']==1){
                            echo "<a href='?type=status&operation=deactive&properties_id=".$row['properties_id']."'>Active</a>";
                         }else{
                            echo "<a href='?type=status&operation=active&properties_id=".$row['properties_id']."'>Deactive</a>";
                         }  
                         ?>
                        
                      </td>
                      <td>
                        <?php 
                        echo "<a href='?type=delete&properties_id=".$row['properties_id']."'>Delete</a> | <a href='properties_manage.php?type=edit&properties_id=".$row['properties_id']."'>Edit</a>";
                         ?>
                      </td>
                      


                    </tr>
                  <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
xxx
</body>
</html>
