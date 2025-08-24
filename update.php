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
        header("Location: employees.php");
        //exit;
    } else {
        echo "<p>Error updating record: " . $update_stmt->error . "</p>";
    }

    $update_stmt->close();
}
?>

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
        echo "<p class='success'>Record updated successfully.</p>";
        header("Location: employees.php");
    } else {
        echo "<p class='error'>Error updating record: " . $update_stmt->error . "</p>";
    }

    $update_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Member</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div class="main">
<div class="container">
    <h2>Update Details</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">

        <label>Position:</label>
        <input type="text" name="position" value="<?= htmlspecialchars($position) ?>">

        <label>Department:</label>
        <select name="department" required>
            <option value="hr" <?= $department=="hr"?"selected":"" ?>>Human Resource</option>
            <option value="finance" <?= $department=="finance"?"selected":"" ?>>Finance and Accounting</option>
            <option value="marketing" <?= $department=="marketing"?"selected":"" ?>>Marketing</option>
            <option value="sales" <?= $department=="sales"?"selected":"" ?>>Sales</option>
            <option value="operations" <?= $department=="operations"?"selected":"" ?>>Operations</option>
            <option value="tech" <?= $department=="tech"?"selected":"" ?>>Information Technology</option>
            <option value="customerService" <?= $department=="customerService"?"selected":"" ?>>Customer Service</option>
            <option value="research" <?= $department=="research"?"selected":"" ?>>Research and Development</option>
            <option value="legal" <?= $department=="legal"?"selected":"" ?>>Legal</option>
        </select>

        <label>Start Date:</label>
        <input type="date" name="start_date" value="<?= htmlspecialchars($start_date) ?>">

        <button type="submit" class="btn-submit">Update</button>
    </form>

</div>
</div>

</body>
</html>














