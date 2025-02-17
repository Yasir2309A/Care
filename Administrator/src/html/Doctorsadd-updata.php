
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
  <title> Doctor Panel</title>
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
      <div class="container">
        <!--  Row 1 -->


        <br><br>
        <br><br>
       
        <?php

include('connection.php');
$id =$_GET['id'];
$query = "select * from  add_doctor where id = '$id'";
$data = mysqli_query($connection,$query);
$result = mysqli_fetch_assoc($data);


?>
<div class="container">
<form action="" method ="POST" >

<h3 > Updata Doctor Data</h3>
<br>
       

       <label for="">Name</label>
             <input type="text"
               class="form-control" name="name" id="" aria-describedby="helpId" value="<?php echo  $result['name'] ?>" placeholder="enter your name">
           </div>
           <div class="form-group">   
            <label for="">Departments</label>
                <select class="form-control" name="departments" value="<?php echo  $result['departments'] ?>" id="">
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
                class="form-control" name="experience" id="" value="<?php echo  $result['experience'] ?>" aria-describedby="helpId" placeholder="Enter your Experience">
            </div>
            <div class="form-group">
              <label for="">Satisfaction</label>
              <input type="text"
                class="form-control" name="satisfaction" id=""  value="<?php echo  $result['satisfaction'] ?>" aria-describedby="helpId" placeholder="Enter your Satisfaction">
            </div>
           
           <div class="form-group">   
           <label for="">Status</label>
               <select class="form-control" name="live" value="<?php echo  $result['live']  ?>"  placeholder="Enter Your Country" name="country" id="">
               <option>Online</option>
               <option>Offline</option>
               </select>
             </div>
             <div class="modal-footer">
  
  <button class="btn btn-primary" type="submit"  name="Update" >Update</button>
  </form>
  
</div>


   <?php



   if(isset($_POST['Update'])){
    $img_name= $_FILES["Filename"]["name"];
    $tmp_name= $_FILES["Filename"]["tmp_name"];
    

    move_uploaded_file($tmp_name,"images/".$img_name);
    $name =$_POST['name']; 
    $live =$_POST['live'];
    $departments =$_POST['departments'];
    $experience =$_POST['experience'];
    $satisfaction =$_POST['satisfaction'];

    $query = "UPDATE add_doctor SET name= '$name',departments='$departments',experience='$experience',satisfaction='$satisfaction',live='$live' WHERE id =$id";
 
    $data = mysqli_query($connection,$query);

    if($data){
        
        echo '<script>window.location.href="Doctorsaddprofile.php" </script> ';
      

    }
    else{
        echo 'not scuuecfully';
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
