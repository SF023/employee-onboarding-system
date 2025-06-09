<?php
// Include the database
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Get values from the POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $startDate = $_POST['startDate'];

    // Prepare the statements
    $stmt = $conn->prepare("INSERT INTO tbl_employees (name, email, position, department, start_date)
    VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $name, $email, $position, $department, $startDate);
    if ($stmt->execute()){
        echo "Data Inserted Successfully!";
        header("Location: list.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();

?>