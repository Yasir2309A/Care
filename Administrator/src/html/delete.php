<?php

include('connection.php');

$id =$_GET['id'];
$query = "DELETE FROM add_doctor WHERE id = '$id'";
$data = mysqli_query($connection,$query);



?>
<?php


include('Doctorsaddprofile.php');

if(isset($_POST['delete'])){

 $name =$_POST['name']; 
 $live =$_POST['live'];


 $query = "DELETE FROM add_doctor WHERE id = '$id'";

 $data = mysqli_query($connection,$query);

 if($data){
     
     echo '<script>window.location.href="Doctorsadd.php" </script> ';
    

 }
 else{
     echo 'not scuuecfully';
 }

}

?>
