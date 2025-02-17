

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

         <h1>Health-Blogs-add</h1><br><br>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Health-Blogs-add

</button><br><br>

<?php
      include('connection.php');
      $query = "select * from  health_blogs_add";
      $data = mysqli_query($connection,$query);
      $total =mysqli_num_rows($data);
      if($total != 0){
      ?>

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Images</th>
            <th>Title</th>
            <th>Content</th>
     
            <th>ACTION</th>
          </tr>
        </thead>
      

      <?php

      while($result = mysqli_fetch_assoc($data)) {

        echo "

        <tr>
        <td>".$result['id']."</td>
        <td><img src='images/".$result['imag']."' height='100px' width='100px'></td>
        <td>".$result['title']."</td>
        <td>".$result['content']."</td>
        <td>
        <a name='delete' href='delete -healthblogs.php?id=$result[id]' class='btn btn-success'>Delete</a>

        </td>
    
        </tr>
        
        
        ";
     
      }

      }else{

        echo 'not succesfully';
      }
      
      ?></table>
 

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
    <div class="form-group">
              <label for="">Title</label>
              <input type="text"
                class="form-control" name="title" id="" aria-describedby="helpId" placeholder="Enter your Title">
            </div>

            <!-- <div class="form-group">
            
              <input type="text"
                class="form-control" name="content" id="" aria-describedby="helpId" placeholder="Enter your Content">
            </div> -->
            
            <div class="form-group">
            
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
  </div>
            
   
              <div class="modal-footer">
   
   <button class="btn btn-primary" type="submit"  name="submit" >Submit</button>
 </div>
         
        </form>
      </div>
    
    </div>
  </div>
</div><br><br>



    
      </div>
    </div>
  </div>

 
    











  <?php

include('connection.php');

   if(isset($_POST['submit'])){


    $img_name= $_FILES["Filename"]["name"];
    $tmp_name= $_FILES["Filename"]["tmp_name"];
    

    move_uploaded_file($tmp_name,"images/".$img_name);
    
   
    $title =$_POST['title']; 
    $content =$_POST['content'];


    $query = "insert into health_blogs_add(imag,title,content)VALUES('$img_name','$title','$content')";
 
    $data = mysqli_query($connection,$query);

    if($data){
        
          // echo '<script>alert("scuuecfully");</script>';
        

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
