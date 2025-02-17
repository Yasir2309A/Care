<?php
session_start();

// Check if the session is set
$namea = $_SESSION['name'];
if (!$namea) {
    echo '<script>window.location.href="l.php" </script>';
    exit;
}

include('connection.php');

// Get the doctor ID from the URL
$doctor_id = $_GET['id'];

// Fetch specific doctor data by ID
$doctor_query = "SELECT * FROM add_doctor WHERE id = '$doctor_id'";
$doctor_data = mysqli_query($connection, $doctor_query);
$doctor = mysqli_fetch_assoc($doctor_data);

// Fetch patients for the specific doctor
$patient_query = "
    SELECT vc.id, 
           vc.name AS patient_name, 
           vc.email AS patient_email, 
           vc.phone AS patient_phone, 
           vc.address AS patient_address
    FROM video_consultation vc
    INNER JOIN add_doctor ad ON vc.doctorname = ad.name
    WHERE ad.id = '$doctor_id'
";
$patient_data = mysqli_query($connection, $patient_query);
$total_patients = mysqli_num_rows($patient_data);

?>
<!doctype html>
<html lang="en">
<head>
    <title>Doctor Profile and Patients</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/f.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?php include('nav.php')?>
    <div class="body-wrapper">
        <?php include('header.php')?>
        <div class="container-fluid">

            <!-- Doctor Information -->
            <h1>Doctor Profile</h1><br><br>
            <?php if ($doctor) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Departments</th>
                            <th>Experience</th>
                         
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $doctor['id']; ?></td>
                            <td><img src="images/<?php echo $doctor['imag']; ?>" width="130px"></td>
                            <td><?php echo $doctor['name']; ?></td>
                            <td><?php echo $doctor['departments']; ?></td>
                            <td><?php echo $doctor['experience']; ?></td>
                           
                            <td><?php echo $doctor['live']; ?></td>
                            <td><a href="Doctorsadd-updata.php?id=<?php echo $doctor['id']; ?>" class="btn btn-primary">Update</a></td>
                        </tr>
                    </tbody>
                </table>
            <?php } else {
                echo '<p>No doctor found.</p>';
            } ?>

            <br><br>

            <!-- Patients Information -->
            <h1>Doctor Patients </h1><br><br>
            <?php if ($total_patients > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Phone</th>
                            <th>Patient Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($patient = mysqli_fetch_assoc($patient_data)) { ?>
                            <tr>
                                <td><?php echo $patient['id']; ?></td>
                                <td><?php echo $patient['patient_name']; ?></td>
                                <td><?php echo $patient['patient_email']; ?></td>
                                <td><?php echo $patient['patient_phone']; ?></td>
                                <td><?php echo $patient['patient_address']; ?></td>
                                <td>
                                    <a href="delete-Patients.php?id=<?php echo $patient['id']; ?>" class="btn btn-danger">Delete</a>
                                    <button onclick="gg()" class="btn btn-success">Book</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                echo '<p>No patients found for this doctor.</p>';
            } ?>

        </div>
    </div>
</div>

<script>
function gg() {
    alert('Book Appointments');
}
</script>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
