<?php

include('connection.php');
$id =$_GET['id'];
$query = "DELETE FROM  video_consultation WHERE id = '$id'";
$data = mysqli_query($connection,$query);



?>
   <?php


include('Patients.php');

if(isset($_POST['delete'])){

    $name =$_POST['name']; 
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];


 $query = "DELETE FROM video_consultation WHERE id = '$id'";

 $data = mysqli_query($connection,$query);

 if($data){
     
     echo '<script>window.location.href="Patients.php" </script> ';
    

 }
 else{
     echo 'not scuuecfully';
 }

}

?>
