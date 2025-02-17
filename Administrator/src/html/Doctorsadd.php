<?php
session_start();

// Check if the session for 'name' is set, otherwise redirect
if (!isset($_SESSION['name'])) {
    echo '<script>window.location.href="l.php";</script>';
    exit;
}

$server = "localhost";
$name = "root";
$password = "";
$database = "care_project";

$conn = mysqli_connect($server, $name, $password, $database);

// Ensure that $conn is available globally
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/f.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <?php include('nav.php'); ?>
    <div class="body-wrapper">
        <?php include('header.php'); ?>
        <div class="container-fluid">
            <h1>Add Doctors</h1>
            <br><br>

            <?php
            include("connection.php");
            // Fetch all pending doctors
            $query = "SELECT * FROM doctor_ar";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Query Failed: " . mysqli_error($conn));
            }
            ?>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Departments</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr id="row-<?php echo $row['id']; ?>">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['departments']; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="doctor_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                <a href="reject.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Reject</a>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
// If the approve button is clicked
if (isset($_POST['approve'])) {
    $doctor_id = $_POST['doctor_id'];

    // Fetch data of the selected doctor
    $sql = "SELECT * FROM doctor_ar WHERE id='$doctor_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $column1 = $row['imag'];
            $column2 = $row['name'];
            $column3 = $row['live'];
            $column4 = $row['departments'];
            $column5 = $row['experience'];
            $column6 = $row['satisfaction'];
            $column7 = $row['email'];
            $column8 = $row['password'];

            // Insert into the second table
            $insert_sql = "INSERT INTO add_doctor (imag, name, live, departments, experience, satisfaction, email, password)
                           VALUES ('$column1', '$column2', '$column3', '$column4', '$column5', '$column6', '$column7', '$column8')";

            if ($conn->query($insert_sql) === TRUE) {
                // Delete the doctor from the `doctor_ar` table
                $delete_sql = "DELETE FROM doctor_ar WHERE id='$doctor_id'";
                $conn->query($delete_sql);

                // Hide the row for the approved doctor
                echo '<script>
                        alert("Data approved successfully!");
                        document.getElementById("row-' . $doctor_id . '").style.display = "none";
                      </script>';
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "No data found for the selected doctor.";
    }
}

$conn->close(); // Close the connection after use
?>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
