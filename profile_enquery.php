<?php
require('include/header.php'); 
include('include/timestamp.php');
 
$total_enquery='';
$time='';

//Display Sql
$properties_id=$_GET['properties_id'];
$sql="select * from properties as p,categories as c where p.cat_id=c.cat_id and p.properties_id='$properties_id'";
$get_property=mysqli_query($con,$sql);
$display=mysqli_fetch_array($get_property);


//Enquery Sql
$user_sid=$_SESSION['USER_ID'];
 $enquery_sql="select * from enquries as e,properties as p,users as u where e.properties_id=p.properties_id and u.user_id=e.user_id and p.user_id='$user_sid' and e.properties_id='$properties_id'";
$enquery_run=mysqli_query($con,$enquery_sql);
$b=mysqli_num_rows($enquery_run);


//Enquery Status
if(isset($_REQUEST['id']) && isset($_REQUEST['properties_id']) && isset($_REQUEST['status']))
{

 $id=$_REQUEST['id'];
$properties_id=$_GET['properties_id'];

   
    $status=$_REQUEST['status'];
    if($status=='Sent')
    {
       $update="update `enquries` set status='Approved' where id='$id'";
       mysqli_query($con,$update);
    }
    else if($status=='Approved')
    {
       $update="update `enquries` set status='Rejected' where id='$id'";
       mysqli_query($con,$update);

    }
    else
    {
       $update="update `enquries` set status='Sent' where id='$id'";
       mysqli_query($con,$update);

    }
    ?>
    <script type="text/javascript">
      window.location.href="profile_enquery.php?properties_id=<?php echo $properties_id ?>";
    </script>
    <?php
}


//multiple images
$multiple_sql="SELECT * FROM `property_image` WHERE properties_id='$properties_id'";
$multiple_run=mysqli_query($con,$multiple_sql);
$type='';
  if($type='delete'){
  $id=$_REQUEST['id'];

            $delete_sql="DELETE FROM `property_image` WHERE id='$id'";
            mysqli_query($con,$delete_sql);
    //         ?>
    // <script type="text/javascript">
    //   window.location.href="profile.php";
    // </script>
    // <?php           

}
?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $display['name']; ?></h1>
              <span class="color-text-a">
             </span>
                <a class="btn btn-success"  href="property_manage.php?type=edit&properties_id=<?php echo $display['properties_id'] ?>"> Edit Property <i class="fa fa-edit" aria-hidden="true"></i></a>
                

            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="property.php">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $display['name']; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <div class="carousel-item-b">
                <img style="height: 650px" src="Admin/media/properties/<?php echo $display['image']; ?>" alt="">
              </div>
              </div>
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">₹</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $display['price'] ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span><?php echo $display['properties_id'] ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Views</strong>
                        <span><?php echo $display['views'] ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Total Enquery</strong>
                        <span><?php echo $b ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span><?php echo $display['location']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Property Type:</strong>
                        <span><a href="property.php?cat_id=<?php echo $display['cat_id']; ?>"><?php echo $display['cat_name']; ?></a></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Area:</strong>
                        <span><?php echo $display['area'] ?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Rooms:</strong>
                        <span><?php echo $display['rooms']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Baths:</strong>
                        <span><?php echo $display['bath']; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    <?php echo $display['detials'] ?>
                  </p>
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li><?php echo $display['features']; ?></li>
                   </ul>
                   <br>
                  <br>
                  <br>
                    <div class="title-box-d">
                    <h4 class="title-d">Property Images</h4>
                    <b><a class="btn btn-success" href="property_image_manage.php?type=add&properties_id=<?php echo $display['properties_id'] ?>">Add More Images <i class="fa fa-plus-square" aria-hidden="true"></i></a></b>
                  </div>
                    <br>
    <?php 

            while($file2=mysqli_fetch_array($multiple_run))
            {
          ?>
        <div style="height: 200px; width: 200px; float: left; margin: 25px;">
            <img src="<?php echo $file2['file']; ?>" height="200" width="200">

<a class="btn btn-danger form-control" href="profile_enquery.php?type=delete&id=<?php echo $file2['id']?>">Delete</a>

                      
            </tr>
          </table>
      
      </div>
          <?php 
            }
          ?>
 

                </div>
              </div>
            </div>
          </div>

        <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Enquries</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Sr.NO</th>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i=1;
                    while($row=mysqli_fetch_array($enquery_run)) { ?>
                      <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row['user_name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['message']; ?></td>
                      <td><?php echo time_ago($row['8']); ?></td>
                      <td>
                       <a class="btn btn-success" href="profile_enquery.php?id=<?php echo $row['id']?>&properties_id=<?php echo $row['properties_id']; ?>&status=<?php echo $row['7']?>">
                       <?php echo $row['7'] ?>
                       </a>
                     </td> 
                      
                     
                      </tr> 
                       <?php  $i++; }   ?> 
                 </tbody>
                </table>
              </div>
      </div>
        </div>
      </div>
    </section><!-- End Property Single-->

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