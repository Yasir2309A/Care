<?php
// Start the session
session_start();

// Include the connection
include('connection.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {

    // Capture and sanitize input
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Prepare the query to avoid SQL injection
    $query = "SELECT * FROM add_doctor WHERE email=? AND password=?";
    
    // Prepare the statement
    if ($stmt = mysqli_prepare($connection, $query)) {

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if any row is returned
        if ($row = mysqli_fetch_assoc($result)) {

            // Set session variable
            $_SESSION['name2'] = $email;

            // Redirect to the doctor's panel with the doctor ID
            echo '<script>
                    window.location.href="../../Doctor_Panel/src/html/Doctorsadd.php?id=' . $row['id'] . '";
                  </script>';
        } else {
            echo '<script>alert("Login not successful. Please check your credentials.");</script>';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Database query error.");</script>';
    }
}

// Close the database connection
mysqli_close($connection);
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
        <h2 class="font-weight-bold">Doctor Panel Login</h2>
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
           


              <button type="submit" name="submit">login
               </button>
            
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











