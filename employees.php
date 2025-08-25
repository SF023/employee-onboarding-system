 <?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>    
<meta charset="UTF-8">
    <title>Employees Page</title>
    <link rel="stylesheet" href="employees.css">
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

    <div class="header">
        <h2>EMPLOYEES</h2>
    </div>

    <div class="content">
        <?php
        $sql = "SELECT id, name, email, position, department, start_date FROM tbl_employees";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) { 
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
