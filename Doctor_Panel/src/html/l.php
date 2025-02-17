
   
<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><br><br><br>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form  method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    
                        <button type="submit" value="submit" name="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
  

include('connection.php');

    if(isset($_POST['submit'])){

    $email =$_POST['email'];
    $password =$_POST['password'];


    // if($email=='admin@email.com'&& $password=='admin')
    // {
    //    echo '<script>window.location.href="../admin/template/index.php"</script>';
    // }
    

    $query = "SELECT * FROM   add_doctor WHERE email='$email' && password='$password'";

    $data = mysqli_query($connection,$query);

    $total = mysqli_num_rows($data);

    if($total == true){
        $_SESSION['name'] = $email;


        echo '<script>window.location.href="index.php"</script>';
      
       

   }
   else{
      echo '<script>alert("Not successfully");</script>';
   }



}






  














?>
   