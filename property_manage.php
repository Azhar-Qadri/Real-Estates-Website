<?php
require('include/header.php'); 

$user_id=''; 
$cat_id='';
$product_id='';
$name='';
$area='';
$detials='';
$features='';
$address='';
$location='';
$city='';
$pincode='';
$image='';
$status='';
$price='';
$rooms='';
$bath='';
$msg='';
$image_required='requried';


 if(isset($_GET['properties_id']) && $_GET['properties_id']!='')
 {
    $image_required='';
    $properties_id=$_GET['properties_id'];

    $res=mysqli_query($con,"SELECT * FROM `properties` WHERE  properties_id='$properties_id'");
     $check=mysqli_num_rows($res);
     
     if($check>0){
     $show=mysqli_fetch_assoc($res);
     
     $properties_id=$show['properties_id'];
     $cat_id=$show['cat_id'];
     $user_id=$show['user_id'];
     $name=$show['name'];
     $address=$show['address'];
     $location=$show['location'];
     $city=$show['city'];
     $pincode=$show['pincode'];
     $image=$show['image'];
     $price=$show['price'];
     $detials=$show['detials'];
     $features=$show['features'];
     $area=$show['area'];
     $rooms=$show['rooms'];
     $bath=$show['bath'];

     
    }
     else
     {
      header('location:properties.php');
      die();
     }
 }
if(isset($_POST['submit'])){

$cat_id=$_POST['cat_id'];
$user_id=$_SESSION['USER_ID'];
$name=$_POST['name'];
$address=$_POST['address'];
$location=$_POST['location'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$image=$_FILES['image'];
$price=$_POST['price'];
$detials=$_POST['detials'];
$features=$_POST['features'];
$area=$_POST['area'];
$rooms=$_POST['rooms'];
$bath=$_POST['bath'];




        $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'Admin/media/properties/'.$image);

       $insert_sql="INSERT INTO `properties`(cat_id,user_id, name,address, location, city, pincode, image, price, detials, features, area, rooms, bath, status) VALUES ('$cat_id','$user_id','$name','$address','$location','$city','$pincode','$image','$price','$detials','$features','$area','$rooms','$bath','1')"; 
        $insert_run=mysqli_query($con,$insert_sql);
        
        ?>
        <script>
        alert('Property Added Successfully'); 
        window.location.href="profile.php";
        </script>

        <?php 
 }
if(isset($_REQUEST['update']))
{

// $cat_id=$_POST['cat_id'];
// $user_id=$_POST['user_id'];
$name=$_POST['name'];
$address=$_POST['address'];
$location=$_POST['location'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$image=$_FILES['image'];
$price=$_POST['price'];
$detials=$_POST['detials'];
$features=$_POST['features'];
$area=$_POST['area'];
$rooms=$_POST['rooms'];
$bath=$_POST['bath'];


if($_FILES['image']['name']!=''){
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'Admin/media/properties/'.$image);

        $update_sql="UPDATE `properties` SET name='$name',address='$address',location='$location',city='$city',pincode='$pincode',image='$image',price='$price',detials='$detials',features='$features',area='$area',rooms='$rooms',bath='$bath' WHERE properties_id='$properties_id'";
          }else{
            $update_sql="UPDATE `properties` SET name='$name',address='$address',location='$location',city='$city',pincode='$pincode',price='$price',detials='$detials',features='$features',area='$area',rooms='$rooms',bath='$bath' WHERE properties_id='$properties_id'";
          }
        $update_run=mysqli_query($con,$update_sql);
        ?>
        <script>
         alert('Property Updated Successfully'); 
         window.location.href="profile.php";
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
              <h1 class="title-single">Add Property</h1>
              <span class="color-text-a">Upload Your Property if you wnat to Sell it.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Add Property
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
          <div class="col-sm-12 section-t8">
            <div class="row jumbotron">
              <div class="col-md-12">
                <form  method="post" enctype="multipart/form-data" id="frm">
                  <div class="row">
                    <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <input type="hidden" name="user_id">
                      <label class="text-uppercase">Property Type</label>
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
                    </div>
                    <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Property Name</label>
                      <input type="text"  name="name"  class="form-control" value="<?php echo $name ?>" placeholder="Enter Property Name" required>  
                      </div>
                    </div>
                     <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Property Size</label>
                         <input type="text"  name="area"  class="form-control" value="<?php echo $area ?>" placeholder="Enter Property Area" >
                   
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                      <label class="text-uppercase">Property Description</label>
                      <textarea name="detials" placeholder="Enter Detials about Property" class="form-control"><?php echo $detials; ?></textarea >  
                      </div>
                    </div>
                  <div class="col-md-6 mb-3">
                      <div class="form-group">
                      <label class="text-uppercase">Amenities</label>
                       <textarea name="features" placeholder="Enter Amenities of Property" class="form-control"><?php echo $features; ?></textarea > 
                      </div>
                    </div>
                   
                   <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Price</label>
                      <input type="text"  name="price"  class="form-control" value="<?php echo $price ?>" placeholder="Enter Number of Bed Rooms" >  
                      </div>
                    </div>
                    
                    <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Total Rooms</label>
                      <input type="text"  name="rooms"  class="form-control" value="<?php echo $rooms ?>" placeholder="Enter Number of Bed Rooms" >  
                      </div>
                    </div>


                    <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Number of Bath Rooms</label>
                      <input type="text"  name="bath"  class="form-control" value="<?php echo $bath ?>" placeholder="Enter Number of Bath Rooms" > 
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                      <label class="text-uppercase">Property Address</label>
                    <textarea name="address"  placeholder="Enter Address" class="form-control"><?php echo $address; ?></textarea >
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                      <label class="text-uppercase">Property Location</label>
                    <textarea name="location"  placeholder="Enter Address" class="form-control"><?php echo $location; ?></textarea >
                      </div>
                    </div>
                    <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Enter City</label>
                    <input type="text"  name="city" class="form-control" value="<?php echo $city ?>" placeholder="Enter City" >
                      </div>
                    </div>
                   <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">enter pincode</label>
                    <input type="text"  name="pincode" class="form-control" value="<?php echo $pincode ?>" placeholder="Enter Pincode" >
                  
                      </div>
                    </div>

                     <div class="col-md-4 mb-6">
                      <div class="form-group">
                      <label class="text-uppercase">Select Cover Image</label>
                   <input type="file"  name="image" class="form-control" width="100px" height="100px"> 
                   
                   <?php if(isset($_REQUEST['properties_id'])) { ?>
                    <br>
                    <img src="Admin/media/properties/<?php echo $image; ?>" height="100" width="100">    <?php } ?>
                   </div>
                    </div>
               <br>
                    <div class="col-md-12 text-center">
                   
                    <?php 
                if(isset($_REQUEST['properties_id']))
                {
                ?>
                  <button type="submit" name="update" class="btn btn-a">Update</button>
                <?php 
                }
                else
                {
                ?>
                  <button type="submit" name="submit" class="btn btn-a">Submit</button>
                 <?php 
               }
                 ?>
                  </div>
                
                  </div>
                </form>
              </div>
            </div>
          </div>
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
          area:
          {
            required:true,
            number:true,
          },
          detials:
          {
            required:true,
          },
          features:
          {
            required:true,
          },
          price:
          {
              required:true,
          },  
          rooms:
          {
            required:true,
            number:true,
          },
          bath:
          {
            required:true,
            number:true,
          },
          address:
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
          },





        },

        messages:
        {
          name:
          {
            required:"Please Enter Property Name",
          },
          area:
          {
            required:"Please Enter Size of Property",
          },
          detials:
          {
            required:"Please Enter Detial Information about Property",
          },
          features:
          {
            required:"Please Enter Amenities",
          },
          price:
          {
              required:"Please Enter Price",
          },  
          rooms:
          {
            required:"Please Enter Totoal Numbers of Rooms",
            number:"Please Enter Only Digits",
          },
          bath:
          {
            required:"Please enter Your Mobile",
            number:"Please Enter Only Digits",
          },
          address:
          {
            required:"Please Address",
          },
          location:
          {
            required:"Please Enter Locality",
          },
          city:
          {
            required:"Please City",
          },
          pincode:
          {
            required:"Please Enter Pincode",
            number:"Please Enter Only Digits",
          },



        },



      });
    });
  </script>


</body>

</html>