<?php
 require('include/header.php'); 
$rows='';
$sql='';
$res='';
$pagi='';


  $properties_id=$_GET['properties_id'];

if(isset($_GET['sort'])){

  $sort=$_GET['sort'];

    if($sort=='high'){
      $sql.="select * from properties where status=1  order by price desc";
    }
    if($sort=='low'){
      $sql.="select * from properties where status=1  order by price asc";
    }
    if($sort=='new'){
      $sql.="select * from properties where status=1  order by properties_id desc";

    }if($sort=='old'){
      $sql.="select * from properties where status=1  order by properties_id asc";
    }

}
else{
$per_page=4;
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
$record=mysqli_num_rows(mysqli_query($con,"select * from properties where status=1 order by properties_id desc"));
$pagi=ceil($record/$per_page);

$sql.= "select * from properties limit $start,$per_page";
}
$res=mysqli_query($con,$sql);

?>
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">All properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  All Properties
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    
          <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                   <select class="custom-select" onchange="sort_property('<?php echo $properties_id?>','<?php echo SITE_PATH ?>')" id="sort_property_id">
                  <option selected>All</option>
                  <option value="high">Price High to Low</option>
                  <option value="low">Price Low to High</option>
                  <option value="new">New Properties</option>
                  <option value="old">Old Properties</option>
                </select>
              </form>
            </div>
          </div>
          <?php 
          // foreach($get_property as $list)
            while ($row=mysqli_fetch_array($res)) { ?>
          <div class="col-md-3">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
              <img style="height: 350px"; src="Admin/media/properties/<?php echo $row['image'] ?>" alt="property image" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property.php?properties_id=<?php echo $list['properties_id'] ?>"><?php echo $row['name'] ?>
                        <br /><?php echo $row['location']; ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">views | <?php echo $row['views']; ?></span>
                    </div>
                    <a href="product.php?properties_id=<?php echo $row['properties_id']; ?>" class="link-a">Click here to view
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
                        <span><?php echo $row['rooms']; ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?php echo $row['bath']; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <div class="row">
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
      </div>
    </section><!-- End Property Grid Single-->

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

<script type="text/javascript">
  

  function sort_property(properties_id,site_path){
      var sort_property_id=jQuery('#sort_property_id').val();
      window.location.href=site_path+"categories.php?properties_id="+properties_id+"&sort="+sort_property_id;
  }

</script>
</body>

</html>