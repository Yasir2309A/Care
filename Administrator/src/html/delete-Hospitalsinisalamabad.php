<?php

  session_start();

  $namea =  $_SESSION['name'];
  if($namea == true){



  }
  else{
    echo '<script>window.location.href="l.php" </script> ';
    
    
  }
  ?>
<?php

include('connection.php');
$id =$_GET['id'];
$query = "DELETE FROM  hospital_islamabad WHERE id = '$id'";
$data = mysqli_query($connection,$query);



?>
   <?php


include('Hospitals in islamabad.php');

if(isset($_POST['delete'])){

 $name =$_POST['name']; 
 $live =$_POST['address'];


 $query = "DELETE FROM  hospital_islamabad WHERE id = '$id'";

 $data = mysqli_query($connection,$query);

 if($data){
     
     echo '<script>window.location.href="Hospitals in isalamabad.php" </script> ';
    

 }
 else{
     echo 'not scuuecfully';
 }

}

?>
