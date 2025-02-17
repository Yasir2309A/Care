<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "care_project";

$conn = new mysqli($servername, $username, $password, $dbname);

include("Doctorsadd.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['approve'])) {
    // Fetch data from the first table
    $sql = "SELECT * FROM doctor_ar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through each row and insert into the second table
        while($row = $result->fetch_assoc()) {
            $column1 = $row['imag'];
            $column2 = $row['name']; // Example columns from table1
            $column3 = $row['live'];
            $column4 = $row['departments'];
            $column5 = $row['experience'];
            $column6 = $row['satisfaction'];

            // Insert into the second table
            $insert_sql = "INSERT INTO add_doctor (imag, name, live, departments, experience, satisfaction) 
                           VALUES ('$column1', '$column2', '$column3', '$column4', '$column5', '$column6')";

            if ($conn->query($insert_sql) === TRUE) {
                echo '<script>alert("Data successfully transferred!");</script>';
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "No data found in the first table.";
    }
}

$conn->close();
?>
