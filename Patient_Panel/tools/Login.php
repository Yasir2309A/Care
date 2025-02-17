<?php
  session_start();

include('connection.php');

    if(isset($_POST['submit'])){

    $email =$_POST['email'];
    $password =$_POST['password'];


    // if($email=='admin@email.com'&& $password=='admin')
    // {
    //    echo '<script>window.location.href="../admin/template/index.php"</script>';
    // }
    

    $query = "SELECT * FROM  singup WHERE email='$email' && password='$password'";

    $data = mysqli_query($connection,$query);

    $total = mysqli_num_rows($data);

    if($total == true){
      $_SESSION['user_name']= $email;



      echo '<script>alert("successfully Login");</script>';
       

   }
   else{
      echo '<script>alert("Not successfully");</script>';
   }



}






  














?>
   



<!DOCTYPE html>
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

  <title> care </title>

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
   <div class="text-center "  >
  <section class="contact_section layout_padding">
    <div class="container">
      <div >
        
      </div>
      <div class="row text-center">
        <div class="col-md-8 mx-auto  ">
        <h2 class="font-weight-bold">Login</h2>
        <br>
          <div class="form_container contact-form text-center">
            <form action="" method="POST">
              <div class="form-row">
                <div class="col-lg-12 ">
                  
                  
                </div>
                <div class="col-lg-12 text-center">
                  
                </div>
              </div>
              <div>
                <input type="email" name="email" placeholder="email" required />
              </div>
              <div>
                <input type="password" name="password" placeholder="password" required />
              </div>
              
              <button type="submit" name="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
  <!-- end contact section -->

  <!-- footer section -->
  <?php include("footer.php"); ?>

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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










