<?php  
   require 'include/db.php';
   require 'include/function.php';
   
   $type='';
   
   // if(isset($_GET['type']) && $_GET['type']!=''){
   //   $type=$_GET['type'];
   
   //   if($type=='status'){
   //        $operation=$_GET['operation'];
   //        $cat_id=$_GET['cat_id'];
   
   //        if($operation=='active'){
   //         $status='1';
   //        }else{
   //         $status='0';
   //        }
   //        }
   
   //        $update_status="UPDATE `categories` SET status='$status' WHERE cat_id='$cat_id'";
   //        mysqli_query($con,$update_status);
   
   //   }
   
   //   if($type='delete'){
   //        $cat_id=$_GET['cat_id'];
   //         $delete=mysqli_query($con,"DELETE FROM `categories` WHERE cat_id='$cat_id'");
   //   }
   // }

   if(isset($_GET['type']) && $_GET['type']!=''){
   
    $type=get_safe_value($con,$_GET['type']);
   
    if($type=='status'){
       $operation=$_GET['operation'];
       $cat_id=$_GET['cat_id'];
   
      if($operation=='active'){
          $status='1';
      }else{
          $status='0';
      }
      $update_status="UPDATE `categories` SET status='$status' WHERE cat_id='$cat_id'";
      mysqli_query($con,$update_status);
    }

    if($type=='delete'){
      $cat_id=$_GET['cat_id'];
      $delete_sql="DELETE FROM `categories` WHERE cat_id='$cat_id'";
      mysqli_query($con,$delete_sql);
    }
}

   
   $sql_cat="SELECT * FROM `categories` order by cat_name";
   $run_cat=mysqli_query($con,$sql_cat);
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
   <!-- Button trigger modal -->
   <!-- Add Modal -->
   <!-- <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Properties Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="categories_code.php">
          <div class="modal-body">
                     <div class="form-group">
                        <label>Property Type</label>
                        <input type="text" class="form-control" name="cat_name" placeholder="Enter Categories">
                      </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
          </div>
          </form>
        </div>
      </div>
      </div>
      --><!-- Modal End -->
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
                        <h3 class="card-title"><b>Property Type</b></h3>
                        <br>
                        <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">Add Properties</button> -->
                        <a href="categories_manage.php" class="btn btn-primary">Add Property Type</a>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                           <thead>
                              <tr>
                                 <th>Sr.NO</th>
                                 <th>ID</th>
                                 <th>Property Type</th>
                                 <th>Status</th>
                                 <th colspan="2">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $i=1;
                                  while($row=mysqli_fetch_array($run_cat)){ ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $row['cat_id']; ?></td>
                                 <td><?php echo $row['cat_name']; ?></td>
                           <td>
                        <?php 
                        if($row['status']==1){
                            echo "<a href='?type=status&operation=deactive&cat_id=".$row['cat_id']."'>Active</a>";
                         }else{
                            echo "<a href='?type=status&operation=active&cat_id=".$row['cat_id']."'>Deactive</a>";
                         }  
                         ?>
                        
                      </td>
                                 <!-- <td><button class="btn btn-info editbtn" type="button">EDIT</button></td> -->
                                 <td>
                                    <?php 
                                       echo "<a href='?type=delete&cat_id=".$row['cat_id']."'>Delete</a>  | <a href='categories_manage.php?type=edit&cat_id=".$row['cat_id']."'>Edit</a>";
                                       
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
      <script src="//code.jquery.com/jquery-3.5.1.js"></script>
      <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="//cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript">
         $('.table').DataTable();
      </script>
      <!-- <script type="text/javascript">
         $(document).ready(function(){
             $('.editbtn').on('click',function(){
               $('#editmodal').modal('show');
                   $tr = $(this).closest('tr');
                 var data = $tr.children("td").map(function(){
                   return $(this).text();
                 }).get();
         
                 console.log(data);
         
                 $('#update_id').val(data[0]);
                 $('#cat_name').val(data[2]);
             });
         });
         </script> -->
   </body>
</html>