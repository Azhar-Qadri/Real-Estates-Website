<?php
ob_start();
require('include/header.php'); 
include('include/timestamp.php');


// $user_sid=$_SESSION['USER_ID'];

//  $sql="SELECT * FROM properties where user_id='$user_sid' order by properties_id desc";
//  $get_property=mysqli_query($con,$sql);

// $sql="SELECT properties.*,categories.cat_name FROM properties,categories where properties.cat_id=categories.cat_id  order by properties.properties_id desc";


//Display Data any Pagination
$user_sid=$_SESSION['USER_ID'];
$per_page=3;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
  $start=$_GET['start'];
  if($start<=0){
    $start=0;
    $current_page=1;
  }else{
    $current_page=$start;
    $start--;
    $start=$start*$per_page;
  }
}
$record=mysqli_num_rows(mysqli_query($con,"select * from properties where user_id='$user_sid' and status=1 order by properties_id desc"));
$pagi=ceil($record/$per_page);

$sql.= "select * from properties where user_id='$user_sid' limit $start,$per_page";

$get_property=mysqli_query($con,$sql);






//My enquery

 $enquery_sql1="select enquries.*,properties.name from enquries,properties where enquries.properties_id=properties.properties_id and enquries.user_id='$user_sid'";
$my_enquery_sql=mysqli_query($con,$enquery_sql1);

$type='';
  if(isset($_GET['type']) && $_GET['type']!=''){
   
    $type=$_GET['type'];
   
    if($type=='delete'){
      $id=$_GET['id'];
      $delete_sql="DELETE FROM `enquries` WHERE id='$id'";
      mysqli_query($con,$delete_sql);
      header('location:profile.php');
      die();
    }
  }

$edit="select * from users where user_id='$user_sid'";
 $user_sql=mysqli_query($con,$edit);
 $user_run=mysqli_fetch_array($user_sql);




//Delete Property
 if($type=='d'){
          $properties_id=$_GET['properties_id'];
           $delete=mysqli_query($con,"DELETE FROM `properties` WHERE properties_id='$properties_id'");
           header("location:profile.php");
           die();
     }

?>




<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
    background-color: white;
  color: black;

}
th, td {
  padding: 10px;
  text-align: left;
}
</style>
  
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $user_run['user_name']; ?></h1>
              <span class="color-text-a"><?php echo $user_run['email']; ?></span>
            </div>
          </div>
        </div>
      </div>  
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <div class="agent-avatar-box">
                  <img src="Admin/media/user/<?php echo $user_run['user_image']; ?>" alt="" class="agent-avatar img-fluid">
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d"><?php echo $user_run['user_name']; ?>
                     
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                     <?php echo $user_run['description']; ?>
                     </p>
                    <div class="info-agents color-a">
                      
                      <p>
                        <strong>Mobile: </strong>
                        <span class="color-text-a"> <?php echo $user_run['mobile']; ?></span>
                      </p>
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> <?php echo $user_run['email']; ?></span>
                      </p>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
          </div>
            <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Property</h3>
              <h4 ><a class="btn btn-success"href="property_manage.php?user_id=<?php echo $_SESSION['USER_ID']; ?>">Add Property  <i class="fa fa-plus-square" aria-hidden="true"></i></a></h4>
              
            </div>
            </div>
                <div class="row">
                  
          <?php
              while($row=mysqli_fetch_assoc($get_property)){
                $id=$row['properties_id'];
                $get_enquiry_count="select * from enquries where properties_id=$id";
                $count_query=mysqli_query($con,$get_enquiry_count);
                $count_row=mysqli_num_rows($count_query);

               ?>
        <div class="col-sm-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="Admin/media/properties/<?php echo $row['image']; ?>" alt="" class="img-a img-fluid">
              </div>  
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#"><?php echo $row['name']; ?>
                       </a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                        <span class="price-a">Enquery | <?php echo $count_row; ?></span>
                    </div>
                    <a href="profile_enquery.php?properties_id=<?php echo $row['properties_id']; ?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?php echo $row['area']; ?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Rooms</h4>
                        <span><?php echo $row['rooms'] ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?php echo $row['bath'] ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-danger form-control" style="margin-top: 5px;" href="profile.php?type=d&properties_id=<?php echo $row['properties_id']; ?>" class="link-a"> Delete 
                      <span class="ion-ios-trash"></span>
            </a>
          </div>
            <?php    } ?> 
</div>
</div>
<div style="margin-top: 15px" class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
  <?php 
  for($i=1;$i<=$pagi;$i++){
  $class='';
  if($current_page==$i){
    ?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
  }else{
  ?>
    <li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
  <?php
  }
  ?>
    
  <?php } ?>
  
              </ul>
            </nav>
          </div>
        </div>

        <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">My Enquries</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Sr.NO</th>
                      <th>Property Name</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=1;
                    while($eq=mysqli_fetch_array($my_enquery_sql)) { ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $eq['name'] ?></td>
                        <td><?php echo $eq['message']; ?></td>
                        <td><?php echo time_ago($eq['added_on']); ?></td>
                        <td><?php echo $eq['status']; ?></td>
                      <td>
                        <?php 
                        echo "<b><a class='btn btn-danger' href='?type=delete&id=".$eq['id']."'>Delete</a></b>";
                         ?>
                      </td>
                      
                      </tr> 
                    <?php $i++; } ?>

                  </tbody>
                </table>
              </div>
      </div>
      </div>
    </section><!-- End Agent Single -->

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