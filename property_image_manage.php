<?php
include('include/header.php'); 




 if(isset($_GET['properties_id']) && $_GET['properties_id']!='')
 {

$properties_id=$_GET['properties_id'];

if(isset($_REQUEST['btnupload'])){
  
      $filename=$_FILES['f']['name'];
      $i=0;
      foreach($filename as $finalname)
      {
          $tmp=$_FILES['f']['tmp_name'][$i];
          $path="Admin/media/properties/".$finalname;
          move_uploaded_file($tmp, $path);        
          $in="insert into property_image (properties_id,file) values('$properties_id','$path')";
          mysqli_query($con,$in);
          $i++;
          ?>
          <script type="text/javascript">
            alert('Images Uploaded Successfully');
      window.location.href="profile_enquery.php?properties_id=<?php echo $properties_id; ?>";
            
          </script>          
          <?php 
      }
      
}      

}


?>

<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Add Property Images</h1>
              <span class="color-text-a">Upload More Property.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Add Property Images
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
           <br>
        <form method="post" enctype="multipart/form-data">
      <fieldset style="margin-left: 60%">  
        <legend>Multiple File</legend>
          <table class="table table-bordered" align="center" border="1">
            <tr>
                <th>Files:</th>
                <td>
                  <input type="file" name="f[]" multiple/></td>
            </tr>

            <tr>
                <th colspan='2' class="text-center" ><input class="btn btn-a" type="submit" name="btnupload" value="Upload"></th>
            </tr>
          </table>
      </fieldset>
  </form>
  
        </div>
      </div>
    </section><!-- End Contact Single-->

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