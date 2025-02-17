

<?php

  session_start();

  $namea =  $_SESSION['name'];
  if($namea == true){



  }
  else{
    echo '<script>window.location.href="l.php" </script> ';
    
    
  }
  ?><!doctype html>
<html lang="en">
  <head>
  <title> Admin Panel</title>
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

         <h1>Add Doctors Profile</h1><br><br>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Add Doctors Profile
</button><br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method ="POST" enctype="multipart/form-data">
        <div class="form-group">         
      <label for="">Image</label>
      <input type="file"
      
        class="form-control" name="Filename" id="" aria-describedby="helpId" placeholder="">
    </div>
    <!-- <th>Departments</th>
            <th>Experience</th>
            <th>Satisfaction</th> -->
        <div class="form-group">
              <label for="">Name</label>
              <input type="text"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="enter your name">
            </div>
            <div class="form-group">   
            <label for="">Departments</label>
                <select class="form-control" name="departments" id="">
                <option>Neurology</option>
                <option>Cardiology</option>
                <option>Pathology</option>
                <option>Oncology</option>
                <option>Pediatrics</option>
                <option>Urology</option>
                </select>
              </div>
              <div class="form-group">
              <label for="">Experience</label>
              <input type="text"
                class="form-control" name="experience" id="" aria-describedby="helpId" placeholder="Enter your Experience">
            </div>
            <div class="form-group">
              <label for="">Satisfaction</label>
              <input type="text"
                class="form-control" name="satisfaction" id="" aria-describedby="helpId" placeholder="Enter your Satisfaction">
            </div>
            <div class="form-group">   
            <label for="">Status</label>
                <select class="form-control" name="live"  placeholder="Enter Your Country" name="country" id="">
                <option>Online</option>
                <option>Offline</option>
                </select>
              </div>
              <div class="modal-footer">
   
   <button class="btn btn-primary" type="submit"  name="submit" >Submit</button>
 </div>
         
        </form>
      </div>
    
    </div>
  </div>
</div><br><br>


<?php
      include('connection.php');
      $query = "select * from  add_doctor";
      $data = mysqli_query($connection,$query);
      $total =mysqli_num_rows($data);
      if($total != 0){
      ?>

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Images</th>
            <th>NAME</th>
            <th>Departments</th>
            <th>Experience</th>
            <th>Satisfaction</th>
            <th>Status</th>
     
            <th>ACTION</th>
          </tr>
        </thead>
      

      <?php

      while($result = mysqli_fetch_assoc($data)) {

        echo "

        <tr>
        <td>".$result['id']."</td>
        <td><img src='images/".$result['imag']."' height='100px' width='100px'</td>
        <td>".$result['name']."</td>
        <td>".$result['departments']."</td>
        <td>".$result['experience']."</td>
        <td>".$result['satisfaction']."</td>
        <td>".$result['live']."</td>
        <td>
        
        <a href='Doctorsadd-updata.php?id=$result[id]'   class='btn btn-primary'>Update</a>
        <a name='delete' href='delete.php?id=$result[id]' class='btn btn-success'>Delete</a>

        </td>
    
        </tr>
        
        
        ";
     
      }

      }else{

        echo 'not succesfully';
      }
      
      ?></table>
    


    
      </div>
    </div>
  </div>

 











  <?php

include('connection.php');

   if(isset($_POST['submit'])){


    $img_name= $_FILES["Filename"]["name"];
    $tmp_name= $_FILES["Filename"]["tmp_name"];
    

    move_uploaded_file($tmp_name,"images/".$img_name);
    
   
    $name =$_POST['name']; 
    $live =$_POST['live'];
    $departments =$_POST['departments'];
    $experience =$_POST['experience'];
    $satisfaction =$_POST['satisfaction'];


    $query = "insert into add_doctor(imag,name,live,departments,experience,satisfaction)VALUES('$img_name','$name','$live','$departments','$experience','$satisfaction')";
 
    $data = mysqli_query($connection,$query);

    if($data){
        
        //  echo '<script>alert("scuuecfully");</script>';
        

    }
    else{
        echo '<script>alert("Not scuuecfully");</script>';
    }

}

?>





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
