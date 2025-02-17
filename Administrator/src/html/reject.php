<?php
// Include the database connection
include('connection.php'); // Connection file

// Get the user ID from the URL parameter
$id = $_GET['id'];

if (isset($id)) {
    // Update the user's status to 'rejected'
    $query = "UPDATE doctor_ar SET live = 'rejected' WHERE id = $id";
    
    if (mysqli_query($connection, $query)) {
        echo "User has been successfully rejected.";
    } else {
        echo "Error rejecting Doctor: " . mysqli_error($connection);
    }
} else {
    echo "Invalid user ID.";
}
?>
<a href="admin.php"></a>
<?php

include('connection.php');
$id =$_GET['id'];
$query = "DELETE FROM doctor_ar WHERE id = '$id'";
$data = mysqli_query($connection,$query);



?>
   <?php


include('Doctorsadd.php');

if(isset($_POST['delete'])){

 $name =$_POST['name']; 
 $live =$_POST['live'];


 $query = "DELETE FROM doctor_ar WHERE id = '$id'";

 $data = mysqli_query($connection,$query);

 if($data){
     
     echo '<script>window.location.href="" </script> ';
    

 }
 else{
     echo 'not scuuecfully';
 }

}

?>