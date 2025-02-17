<?php

include('connection.php');
$id =$_GET['id'];
$query = "DELETE FROM   health_blogs_add WHERE id = '$id'";
$data = mysqli_query($connection,$query);



?>
   <?php


include('healthblogs-add.php');

if(isset($_POST['delete'])){

    $name =$_POST['id']; 
    $email =$_POST['Title'];
    $phone =$_POST['Content'];
  


 $query = "DELETE FROM  health_blogs_add WHERE id = '$id'";

 $data = mysqli_query($connection,$query);

 if($data){
     
     echo '<script>window.location.href="Patients.php" </script> ';
    

 }
 else{
     echo 'not scuuecfully';
 }

}

?>
