<?php
  session_start();
  ?>
<?php
      include('connection.php');
      $query = "select * from  add_doctor";
      $data = mysqli_query($connection,$query);
      $total =mysqli_num_rows($data);
      if($total != 0){
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
<style>
  .hospitals{
    width: 100%;
    height: 270px;
    border-radius: 20px;
   border: 1px solid black;
    background-color: #166e56;
    border: none;
  }
  #img{
    width: 75%;
    height: 190px;
    border-radius: 100%;
    margin-top: 40px;
    margin-left: 20px;
  }
</style>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
  
    <?php
    include("nav.php")
    ?>
    <!-- end header section -->
  </div>

  <!-- doctor section -->

  <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Doctors
        </h2>
        <p class="col-md-10 mx-auto px-0">
          Incilint sapiente illo quo praesentium officiis laudantium nostrum, ad adipisci cupiditate sit, quisquam aliquid. Officiis laudantium fuga ad voluptas aspernatur error fugiat quos facilis saepe quas fugit, beatae id quisquam.
        </p>
        </div>  
      </div>
</section>

<?php
              while($result = mysqli_fetch_assoc($data)) {
       ?>
      <section class="doctor_section layout_padding">


<div class="container">

  <div class="row">


    <div class="container">  
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 hospitals">
      
   
         <div class="row">
    
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 ">
        <img src="images/<?php echo $result['imag']; ?>" id="img"  alt="">
        
        </div>
        <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
          <br><br>

          <h5><?php echo $result['name']; ?>
           </h5>
            <p></p>
            
            <p><?php echo $result['departments']; ?></p>
            <div class="row w-75">
              <div class="col-md-4 border-right">
              <p>Status </p>
              <p><?php echo $result['live']; ?></p>
              </div>
              <div class="col-md-4 border-right">
               
                <p>Experience</p>
                <p><?php echo $result['experience']; ?></p>
              </div>
              <div class="col-md-4 border-right">
             
              <p>Satisfaction</p>
              <p><?php echo $result['satisfaction']; ?></p>
              </div>
              
           

            </div>
            </div>
          
            <div class="col-3 col-sm-5 col-md-4 col-lg-4 col-xl-4 col-xxl-4   " >
              <br>
              <!-- <a href="" class="btn btn-success row w-100 m-2 mr-1">
                Call Helpline  1200
              </a>
              
              <a  href="Doctors.php" class="btn btn-success row w-100 m-2">
                Find Doctor
              </a> -->
              <div class="btn-box d-flex justify-content-start" >
                  <a  class="w-100 btn row"  data-toggle="modal" data-target="#exampleModal" onc>
                  Appointments
                  </a>
        


                 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Appointments Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="form" method ="POST" enctype="multipart/form-data">
        <div class="form-group">
              <label for="">Doctor Name</label>
              <input type="text"
                class="form-control" name="doctorname" required id="" aria-describedby="helpId" placeholder="Enter your name">
            </div>

        <div class="form-group">
              <label for="">Name</label>
              <input type="text"
                class="form-control" name="name" required id="" aria-describedby="helpId" placeholder="Enter your name">
            </div>
            
            <div class="form-group">
              <label for="">Email</label>
              <input type="text"
                class="form-control" name="email" required id="" aria-describedby="helpId" placeholder="Enter your Email">
            </div>

            <div class="form-group">
              <label for="">Phone</label>
              <input type="text"
                class="form-control" name="phone" required id="" aria-describedby="helpId" placeholder="Enter your Phone">
            </div>

            
            <div class="form-group">
              <label for="">Address</label>
              <input type="text"
                class="form-control" name="address" required id="" aria-describedby="helpId" placeholder="Enter your Address">
            </div>

            <div class="form-group">
              <label for="">Appointments Date</label>
              <input type="date"
                class="form-control" name="" required id="" aria-describedby="helpId" placeholder="Enter your Address">
            </div>
            <div class="form-group">
              <label for="">Appointments Time</label>
              <input type="time"
                class="form-control" name="" required id="" aria-describedby="helpId" placeholder="Enter your Address">
            </div>
            
      
<div class="modal-footer">                
   <button class="btn btn-primary"  type="submit"  id="camera"  name="submit">submit</button>
   <!-- <a  href="camera.php" >video consultation</a> -->
 </div>


         
 
        </form>
      </div>
    
    </div>
  </div>
</div>






               
                </div>
                <div class="btn-box d-flex justify-content-start" >
                  <a href="Appointments.php" class="w-100 btn row" onc>
                   video
                  </a>
        
               
                </div>
           
       

      </div>
     
    </div>
    



  </div>
    

  </div>

</section>    <?php
        }
        ?>

<?php
      
} else {
  echo 'Not successfully retrieved data.';
}
?>


<?php

include('connection.php');

   if(isset($_POST['submit'])){


      
      
  
    
   
    $name =$_POST['name']; 
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];
    $doctorname =$_POST['doctorname'];
    


    $query = "insert into video_consultation(name,email,phone,address,doctorname)VALUES('$name','$email','$phone','$address','$doctorname')";
 
    $data = mysqli_query($connection,$query);

    if($data){
        
        //  echo '<script>alert("scuuecfully");</script>';
        echo '<script>alert("Appointment pending ");</script>';
    

    }
    else{
        echo '<script>alert("Not scuuecfully");</script>';
    }

}

?>












   






<script>
 
  </script>
































  <!-- footer section -->
  
<?php
include("footer.php");
?>

  <!-- footer section -->












  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>