<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees Page</title>
    <style>

        *{
            margin: 0;
            padding: 0;
            font-family: Arial;
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
            width: 100%;
            height: 75px;
            margin: auto;
        }

        .icon{
            width: 200px;
            height: 70px;
            float: left;
        }

        .logo{
            width: 120px;
            float: left;
            margin-top: 22px;
            margin-left: 30px;
            color: white;
        }

        .menu{
            width: 50%;
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

        .header{
            color: white;
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
        }

        .header h2{
            color: white;
            font-size: 28px;
            margin: 20px;
        }

        .content{
            display: flex;
            justify-content: center;
        }

        body {
            font-family: Arial, sans-serif;
        }


        table {
            display: flex;
            justify-content: center;
            width: 80%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th:nth-child(even){
            background-color: hsla(189, 100.00%, 50.00%, 0.1);
        }

        td:nth-child(even){
            background-color: hsla(189, 100.00%, 50.00%, 0.1);
        }

        th {
            background-color: #f4f4f4;
        }

        tr {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eaeaea;
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
            </ul>
        </div>
        </div>
        <div class="header">
            <h2>EMPLOYEES</h2>
        </div>
        <div class="content">    

<?php
// Query
$sql = "SELECT id, name, email, position, department, start_date FROM tbl_employees";
$result = $conn->query($sql);

// Displaying results in table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Department</th>
            <th>Start Date</th>
            <th>Actions</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
echo "<td>" . htmlspecialchars($row['id']) . "</td>";
echo "<td>" . htmlspecialchars($row['name']) . "</td>";
echo "<td>" . htmlspecialchars($row['email']) . "</td>";
echo "<td>" . htmlspecialchars($row['position']) . "</td>";
echo "<td>" . htmlspecialchars($row['department']) . "</td>";
echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
echo "<td>
        <a href='profile.php?id=" . $row['id'] . "' style='margin-right:10px;'>View</a>
        <a href='update.php?id=" . $row['id'] . "' style='margin-right:10px;'>Update</a>
        <a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
      </td>";
echo "</tr>";

    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

$conn->close();

?>
</div>
</div>
</body>
</html>