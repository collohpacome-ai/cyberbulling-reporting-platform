<?php
// Connect to your database
$conn = new mysqli("localhost", "root", "", "cyber_reports");

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']); // Get the ID securely

    // Delete the record
    $sql = "DELETE FROM incident_reports WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "✅ Report deleted successfully.";
    } else {
        echo "❌ Error deleting report: " . $conn->error;
    }
}

$conn->close();
?>
