<?php
include 'db.php';

// Check if 'id' is provided and valid
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
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .main{
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5)50%,
            rgba(0, 0, 0, 0.5)50%), url('images/gradient6.jpeg');
            background-position: center;
            background-size: cover;
            height: 100vh;
        }

        .navbar{
            width: 1200px;
            height: 75px;
            margin: auto;
        }

        .icon{
            width: 200px;
            float: left;
            height: 70px;
        }

        .logo{
            color: white;
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: 5px;
            float: left;
            padding-top: 15px;
            position: fixed;
        }

        .menu{
            width: 400px;
            float: right;
            height: 70px;
            position: fixed;
            right: 80px;
        }

        ul{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li{
            list-style: none;
            margin-left: 62px;
            margin-top: 27px;
            font-size: 17px;
        }

        ul li a{
            text-decoration: none;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            transition: 0.4s ease-in-out; 
        }

        ul li a:hover{
            color: orange;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .profile-card {
            background: #fff;
            max-width: 600px;
            margin: auto;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            text-align: center;
        }

        .profile-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-card h2 {
            margin: 10px 0 5px;
        }

        .profile-card p {
            margin: 5px 0;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.4s ease-in-out;
        }

        .back-button:hover {
            background-color: orange;
            transform: scale(1.05);
        
        }
    </style>
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
                        <li><a href="registration.html">REGISTER</a></li>
                        <li><a href="list.php">EMPLOYEES</a></li>
                        <li><a href="#">Faq</a></li>
                    </ul>
                </div>
            </div>     
    <div class="profile-card">

    <img src="images/profilepicture.png">

    <h2><?php echo htmlspecialchars($employee['name']); ?></h2>
    <p><strong>Position:</strong> <?php echo htmlspecialchars($employee['position']); ?></p>
    <p><strong>Department:</strong> <?php echo htmlspecialchars($employee['department']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($employee['email']); ?></p>
    <p><strong>Start Date:</strong> <?php echo htmlspecialchars($employee['start_date']); ?></p>

    <a href="list.php" class="back-button" >Back to List</a>
    </div>
    </div>

</body>
</html>
