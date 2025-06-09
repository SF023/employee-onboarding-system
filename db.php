<?php
// connecting to our database
$host = "localhost";
$username = "root";
$password = "";
$database = "employee_onboarding";

$conn = new mysqli($host, $username, $password, $database);

// checking database connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
    //echo "Connected successfully!";
?>