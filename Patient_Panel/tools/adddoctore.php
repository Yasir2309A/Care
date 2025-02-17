
<?php
  session_start();
  ?><!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Care </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section starts -->
    <?php include("nav.php"); ?>
    <!-- end header section -->
  </div>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div >
       
      </div>
      <div class="row text-center">
        <div class="col-md-6 mx-auto">
        <h2 class="font-weight-bold">Signup</h2><br>
          <div class="form_container contact-form">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-lg-6 ">
                  <div>
                    <input type="text" name="uname" placeholder="Enter Your Name" required />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="number" name="uphone" placeholder="Enter Your Phone Number" required />
                  </div>
                </div>
              </div>
              <div>
                <input type="file" name="Filename" placeholder="Add profile Image" required />
              </div>
             
              <div>
                <input type="email" name="uemail" placeholder="Email" required />
              </div>
              <div>
                <input type="text" name="experience" placeholder="Enter Your  Experience" required />
              </div>
             
              
            
              <div class="form-group">   
          
                <select class="form-control" name="departments" placeholder="Email"  id="">
                <option>Neurology</option>
                <option>Cardiology</option>
                <option>Pathology</option>
                <option>Oncology</option>
                <option>Pediatrics</option>
                <option>Urology</option>
                </select>
              </div>

              <div>
                <input type="password" name="upasswrod" placeholder="Password" required />
              </div>
       
              <button type="submit" name="submit" value="submit">Sign up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->



  <?php

include('connection.php');

   if(isset($_POST['submit'])){


    $img_name= $_FILES["Filename"]["name"];
    $tmp_name= $_FILES["Filename"]["tmp_name"];
    

    move_uploaded_file($tmp_name,"images/".$img_name);
    
   
    $Name =$_POST['uname'];
    $Pnum =$_POST['uphone']; 
    $Email =$_POST['uemail'];   
    $Password =$_POST['upasswrod'];  
    $departments =$_POST['departments'];
    $experience =$_POST['experience'];


 
    
 $query = "INSERT INTO add_doctor( `imag`, `name`, `departments`, `experience`, `email`, `phone`, `password`)VALUES ('$img_name','$Name','$Pnum','$Email','$Password','$departments','$experience')";
    $data = mysqli_query($connection,$query);

    if($data){
        
         echo '<script>alert("scuuecfully");</script>';
        

    }
    else{
        echo '<script>alert("Not scuuecfully");</script>';
    }

}

?>



  <!-- footer section -->
  <?php include("footer.php"); ?>

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>
</html>
