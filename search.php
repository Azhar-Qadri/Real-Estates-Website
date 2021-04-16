<?php
 require('include/header.php'); 

$rows='';

if(isset($_REQUEST['btnsearch']))
{

 $txtsearch=$_REQUEST['search'];
 $locality=$_REQUEST['location'];

if($txtsearch=='')
{
$sql1="select * from properties where location like '$locality%' and status=1";
}
else
{
$sql1="select * from properties where name like '$txtsearch%' or detials like '$txtsearch%' and status=1";

}

$get_property=mysqli_query($con,$sql1);
$rows=mysqli_num_rows($get_property);
}

?>
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <?php 
    if($rows>0)
    {
       ?>
          <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>All</option>
                  <option value="1">New to Old</option>
                  <option value="2">For Rent</option>
                  <option value="3">For Sale</option>
                </select>
              </form>
            </div>
          </div>
        <?php 
          foreach($get_property as $list){
            ?>
          <div class="col-md-3">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
              <img style="height: 350px" src="Admin/media/properties/<?php echo $list['image'] ?>" alt="property image" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property.php?properties_id=<?php echo $list['properties_id'] ?>"><?php echo $list['name'] ?>
                        <br /><?php echo $list['location']; ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">views | <?php echo $list['views']; ?></span>
                    </div>
                    <a href="product.php?properties_id=<?php echo $list['properties_id']; ?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?php echo $list['area']; ?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

   <?php }else{
        ?>
      <div class="container">
      <h5>Data not Found</h5>
      </div>
    <?php  

   }  ?> 
          

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