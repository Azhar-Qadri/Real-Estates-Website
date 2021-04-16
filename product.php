<?php
ob_start();
$USER_LOGIN='';
require('include/header.php'); 
 
$properties_id=$_GET['properties_id'];
 $sql="select * from properties as p,categories as c,users as u where p.user_id=u.user_id and  p.cat_id=c.cat_id and p.properties_id='$properties_id'";

$get_property=mysqli_query($con,$sql);
$display=mysqli_fetch_array($get_property);





$multiple_sql="SELECT * FROM `property_image` WHERE properties_id='$properties_id'";
$multiple_run=mysqli_query($con,$multiple_sql);
 
$view=$display['views'];
$view=$view+1;
$update_sql="update properties set views='$view' where properties_id='$properties_id'";
$update_run=mysqli_query($con,$update_sql);


$views_sql="select views from properties where properties_id='$properties_id'";
$views_run=mysqli_query($con,$views_sql);
$views_display=mysqli_fetch_array($views_run);


 if(isset($_POST['submit']))
   {
date_default_timezone_set("asia/culcutta");
        $user_id=$_SESSION['USER_ID'];
        $properties_id=$_REQUEST['properties_id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $message=$_POST['message'];
        $added_on=date('y-m-d h:i:s');
         
        $mobile1=$display['mobile'];

           $data = [
    'phone' => $mobile1, // Receivers phone
    'body' =>  "Hello You Recived a New Enquery,".$message, // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$token = 'rkeajejr2rgdsjy6';
$instanceId = '777';
$url = 'https://eu138.chat-api.com/instance226433/message?token='.$token;
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);
echo '<pre>';
print_r($result);


   $insert_enquery="INSERT INTO `enquries`(user_id,properties_id,name, email, mobile, message, added_on) VALUES ('$user_id','$properties_id','$name','$email','$mobile','$message','$added_on')";
   $run=mysqli_query($con,$insert_enquery); 

         ?>

      <script type="text/javascript">
          alert('Your Enquery is successfully done.')
          window.location.href="categories.php";
         </script> 
       <?php  
     }


?>
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
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $display['name']; ?></h1>
              <span class="color-text-a"><?php echo $display['location']; ?></span>
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
                <img style="height: 600px" src="Admin/media/properties/<?php echo $display['image']; ?>" alt="">
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
                        <strong>Views:</strong>
                        <span><?php echo $views_display['views']; ?></span>
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
                    </div>
                    <br>
          
 <?php 

            while($file2=mysqli_fetch_array($multiple_run))
            {
          ?>
      <div style="height: 200px; width: 200px;  float: left; margin: 5px;">
        <img src="<?php echo $file2['file']; ?>" height="200" width="200">
      </div>
          <?php 
            }
          ?>
                     </div>
              </div>
            </div>
          </div>
          

          <?php 

if(!isset($_SESSION['USER_LOGIN'])){
?>
<br>
<br>
<div class="container" style="margin-left: 15%">
   
<p>If you want to Contact with Our Agent then you have to first Login in our Web site <a class="text-success" href="login.php"><b>Click here to Login</b></a></p>

  
</div><?php 

}else{
  ?>
 <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            

            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="Admin/media/user/<?php echo $display['user_image']; ?>" alt="" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent"><?php echo $display['user_name']; ?></h4>
                  <p class="color-text-a">
                    <?php  echo $display['description']; ?>
                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Mobile:</strong>
                      <span class="color-text-a"><?php echo $display['mobile']; ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a"><?php echo $display['email']; ?></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a" method="post" id="frm">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text"  name="name" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" name="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" name="mobile" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Mobile Number *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" name="message" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
  <?php  
}  


           ?>
         
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
          message:
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

          message:
          {
            required:"Please Write Message",
          },

        },



      });
    });
  </script>
</body>

</html>