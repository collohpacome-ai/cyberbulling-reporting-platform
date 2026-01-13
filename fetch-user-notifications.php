<?php
session_start();

// Connect to your database
$conn = new mysqli("localhost", "root", "", "user_messages");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user's email from session
$user_email = $_SESSION['email'] ?? '';

if (empty($user_email)) {
    echo "0"; // User not logged in
    exit;
}

// Query to count unread messages
$stmt = $conn->prepare("SELECT COUNT(*) AS unread_count FROM support_messages WHERE user_id = ? AND Reply IS NOT NULL AND is_read = 0");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo $row['unread_count'] ?? "0";
?>
