<?php

include('connection.php');
$id =$_GET['id'];
$query = "DELETE FROM singup WHERE id = '$id'";
$data = mysqli_query($connection,$query);



?>
   <?php


include('singin.php');

if(isset($_POST['delete'])){

    $YourNAME = $_POST['fname'];
    $PhoneNumber = $_POST['fnum'];
    $EMAIL = $_POST['email'];
    $PASSWORD = $_POST['password'];


 $query = "DELETE FROM singup WHERE id = '$id'";

 $data = mysqli_query($connection,$query);

 if($data){
     
     echo '<script>window.location.href="Doctorsadd.php" </script> ';
    

 }
 else{
     echo 'not scuuecfully';
 }

}

?>
