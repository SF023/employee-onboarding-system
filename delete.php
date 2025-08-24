<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM tbl_employees WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
       // echo "<p>Record deleted successfully.</p>";
        echo "<p>Record updated successfully.</p>";
        header("Location: employees.php");
        exit();
    } else { 
        echo "<p>Error deleting record: " . $stmt->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid request.</p>";
}

$conn->close();

// Redirect back to main page after a short delay
header("refresh:2; url=index.php");
?>