<?php
session_start();

$namea = $_SESSION['name'];
if (!$namea) {
    header('Location: login.php'); // Redirect to login if session is not set
    exit();
}

include('connection.php');
$id = $_GET['id'];
$query = "SELECT * FROM add_doctor WHERE id = '$id'";
$data = mysqli_query($connection, $query);
$result = mysqli_fetch_assoc($data);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Doctor Panel</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/f.png"/>
    <link rel="stylesheet" href="../assets/css/styles.min.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <?php include('nav.php') ?>
    <div class="body-wrapper">
        <?php include('header.php') ?>
        <div class="container">
            <br><br>
            <h3>Update Doctor Data</h3>
            <br>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="imag" value="<?php echo $result['imag']; ?>"
                           placeholder="enter your name">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>"
                           placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="">Departments</label>
                    <select class="form-control" name="departments">
                        <option <?php if ($result['departments'] == 'Neurology') echo 'selected'; ?>>Neurology</option>
                        <option <?php if ($result['departments'] == 'Cardiology') echo 'selected'; ?>>Cardiology</option>
                        <option <?php if ($result['departments'] == 'Pathology') echo 'selected'; ?>>Pathology</option>
                        <option <?php if ($result['departments'] == 'Oncology') echo 'selected'; ?>>Oncology</option>
                        <option <?php if ($result['departments'] == 'Pediatrics') echo 'selected'; ?>>Pediatrics</option>
                        <option <?php if ($result['departments'] == 'Urology') echo 'selected'; ?>>Urology</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Experience</label>
                    <input type="text" class="form-control" name="experience"
                           value="<?php echo $result['experience']; ?>" placeholder="Enter your experience">
                </div>
      
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="live">
                        <option <?php if ($result['live'] == 'Online') echo 'selected'; ?>>Online</option>
                        <option <?php if ($result['live'] == 'Offline') echo 'selected'; ?>>Offline</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="Update">Update</button>
                </div>
            </form>

            <?php
            if (isset($_POST['Update'])) {
                $img_name = $_FILES["imag"]["name"];
                $tmp_name = $_FILES["imag"]["tmp_name"];

                if (!empty($img_name)) {
                    move_uploaded_file($tmp_name, "images/" . $img_name);
                } else {
                    $img_name = $result['imag']; // Keep the existing image if none is uploaded
                }

                $name = $_POST['name'];
                $live = $_POST['live'];
                $departments = $_POST['departments'];
                $experience = $_POST['experience'];
                $satisfaction = $_POST['satisfaction'];

                // Correct SQL query
                $query = "UPDATE add_doctor SET imag ='$img_name', name='$name', departments='$departments', experience='$experience', satisfaction='$satisfaction', live='$live' WHERE id='$id'";

                $data = mysqli_query($connection, $query);

                if ($data) {
                    echo '<script>window.location.href="Doctorsadd.php?id=' . $result['id'] . '";</script>';
                } else {
                    echo 'Update not successful';
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>
</body>
</html>
