<?php
include 'db.php';

// Check if id is provided and valid 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid employee ID.");
}

$employee_id = intval($_GET['id']);

// Fetch employee data
$stmt = $conn->prepare("SELECT id, name, email, position, department, start_date FROM tbl_employees WHERE id = ?");
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Employee not found.");
}

$employee = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($employee['name']); ?> - Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="main">
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">Onboardify</h2>
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="registration.html">REGISTRATION</a></li>
                <li><a href="employees.php">EMPLOYEES</a></li>
            </ul>
        </div>
    </div>
        <div class="content">    
            <div class="profile-card">
                <img src="images/profilepicture.png">
                <h2><?php echo htmlspecialchars($employee['name']); ?></h2>
                <p><strong>Position:</strong> <?php echo htmlspecialchars($employee['position']); ?></p>
                <p><strong>Department:</strong> <?php echo htmlspecialchars($employee['department']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($employee['email']); ?></p>
                <p><strong>Start Date:</strong> <?php echo htmlspecialchars($employee['start_date']); ?></p>
                <a href="employees.php" class="back-button">Back to List</a>
            </div>
        </div>
    </div>

</body>
</html>
