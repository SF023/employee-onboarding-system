<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch existing data
    $stmt = $conn->prepare("SELECT name, email, position, department, start_date FROM tbl_employees WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $email, $position, $department, $start_date);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "<p>ID not provided.</p>";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_position = $_POST['position'];
    $new_department = $_POST['department'];
    $new_start_date = $_POST['start_date'];

    $update_stmt = $conn->prepare("UPDATE tbl_employees SET name = ?, email = ?, position = ?, department = ?, start_date = ? WHERE id = ?");
    $update_stmt->bind_param("sssssi", $new_name, $new_email, $new_position, $new_department, $new_start_date, $id);

    if ($update_stmt->execute()) {
        echo "<p>Record updated successfully.</p>";
        header("Location: read.php");
        //exit;
    } else {
        echo "<p>Error updating record: " . $update_stmt->error . "</p>";
    }

    $update_stmt->close();
}
?>

<h2>Update Member</h2>
<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>

    <label>Position:</label><br>
    <input type="text" name="position" value="<?= htmlspecialchars($position) ?>"><br><br>

    <label>Department:</label><br> <select name="department" required>
                    <option value="hr">Human Resource</option>
                    <option value="finance">Finance and Accounting</option>
                    <option value="marketing">Marketing</option>
                    <option value="sales">Sales</option>
                    <option value="operations">Operations</option>
                    <option value="tech">Information Technology</option>
                    <option value="customerService">Customer Service</option>
                    <option value="research">Research and Development</option>
                    <option value="legal">Legal</option>
                </select> <br><br>
   <!-- <input type="text" name="department" value="<?= htmlspecialchars($department) ?>"><br><br>
-->
    <label>Start Date:</label><br>
    <input type="date" name="start_date" value="<?= htmlspecialchars($start_date) ?>"><br><br>

    <input type="submit" value="Update">
</form>
