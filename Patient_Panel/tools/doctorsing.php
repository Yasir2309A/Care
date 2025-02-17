<?php
  session_start();
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

  <style>
    .error {
      color: red;
    }
  </style>
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
      <div></div>
      <div class="row text-center">
        <div class="col-md-6 mx-auto">
          <h2 class="font-weight-bold">Signup</h2><br>
          <div class="form_container contact-form">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validatePassword()">
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="name" placeholder="Enter Your Name" required />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="number" name="phone" placeholder="Enter Your Phone Number" required />
                  </div>
                </div>
              </div>
              <div>
                <input type="file" name="Filename" placeholder="Add Profile Image" required />
              </div>
              <div>
                <input type="email" name="email" placeholder="Email" required />
              </div>
              <div>
                <input type="text" name="experience" placeholder="Enter Your Experience" required />
              </div>
              <div class="form-group">
                <select class="form-control" name="departments" required>
                  <option>Neurology</option>
                  <option>Cardiology</option>
                  <option>Pathology</option>
                  <option>Oncology</option>
                  <option>Pediatrics</option>
                  <option>Urology</option>
                </select>
              </div>
              <div>
                <input type="password" id="password" name="password" placeholder="Password" required />
                <small id="passwordError" class="error"></small>
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

  if (isset($_POST['submit'])) {

    $img_name = $_FILES["Filename"]["name"];
    $tmp_name = $_FILES["Filename"]["tmp_name"];

    move_uploaded_file($tmp_name, "images/" . $img_name);

    $name = $_POST['name'];
    $num = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $departments = $_POST['departments'];
    $experience = $_POST['experience'];

    $query = "INSERT INTO doctor_ar (imag, name, phone, email, password, departments, experience)
    VALUES ('$img_name', '$name', '$num', '$email', '$password', '$departments', '$experience')";

    $data = mysqli_query($connection, $query);

    if ($data) {
      echo '<script>alert("Signup pending approval...");</script>';
    } else {
      echo '<script>alert("Signup failed");</script>';
    }
  }

  ?>
 <script>
    function validatePassword() {
      var password = document.getElementById("password").value;
      var passwordError = document.getElementById("passwordError");

      // Regular expression for password validation
      var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

      if (!regex.test(password)) {
        passwordError.textContent = "Password must contain at least 8 characters, including 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character. For Example (@Name123)";
        return false; // Prevent form submission
      }

      passwordError.textContent = ""; // Clear error if valid
      return true; // Allow form submission
    }
  </script>
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

  <!-- Password Validation Script -->
 

</body>

</html>
