<?php

  session_start();

  $namea =  $_SESSION['name'];
  if($namea == true){



  }
  else{
    echo '<script>window.location.href="l.php" </script> ';
    
    
  }
  ?>
<!doctype html>
<html lang="en">
  <head>
  <title>Admin</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/f.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php include('nav.php')?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php include('header.php')?>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->

         <h1>Signup Data</h1><br><br>
<br><br>

<?php
      include('connection.php');
      $query = "select * from  singup";
      $data = mysqli_query($connection,$query);
      $total =mysqli_num_rows($data);
      if($total != 0){
      ?>

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
        
     
            <th>ACTION</th>
          </tr>
        </thead>
      

      <?php

      while($result = mysqli_fetch_assoc($data)) {

        echo "

        <tr>
        <td>".$result['id']."</td>
        <td>".$result['YourName']."</td>
        <td>".$result['Email']."</td>
        <td>".$result['PhoneNumber']."</td>
        <td>".$result['Password']."</td>
        <td>
        <a name='delete' href='delete sigin.php?id=$result[id]' class='btn btn-success'>Delete</a>

        </td>
    
        </tr>
        
        
        ";
     
      }

      }else{

        echo 'not succesfully';
      }
      
      ?></table>
 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
