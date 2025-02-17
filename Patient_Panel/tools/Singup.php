<?php
  session_start();
  ?><?php

include("connection.php");

if (isset($_POST['care_project'])) {
    $YourNAME = $_POST['fname'];
    $PhoneNumber = $_POST['fnum'];
    $EMAIL = $_POST['email'];
    $PASSWORD = $_POST['password'];
    $ConfirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($PASSWORD !== $ConfirmPassword) {
        echo "<script>alert('Passwords do not match. Please try again.')</script>";
    } else {
        // Store the plain text password
        // Using prepared statements to prevent SQL injection
        $stmt = $connection->prepare("INSERT INTO Singup (YourName, PhoneNumber, Email, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $YourNAME, $PhoneNumber, $EMAIL, $PASSWORD);
        
        $data = $stmt->execute();
        
        if ($data) {
            echo "<script>alert('Data submitted successfully')</script>";
        } else {
            echo "<script>alert('Data submission failed')</script>";
        }

        $stmt->close();
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
            <form action="" method="POST">
              <div class="form-row">
                <div class="col-lg-6 ">
                  <div>
                    <input type="text" name="fname" placeholder="Your Name" required />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="number" name="fnum" placeholder="Phone Number" required />
                  </div>
                </div>
              </div>
              <div>
                <input type="email" name="email" placeholder="Email" required />
              </div>
              <div>
                <input type="password" name="password" placeholder="Password" required />
              </div>
              <div>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required />
              </div>
              <button type="submit" name="care_project">Sign up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

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
