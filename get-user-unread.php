<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo 0;
    exit;
}

$conn = new mysqli("localhost", "root", "", "user_messages");

if ($conn->connect_error) {
    echo 0;
    exit;
}

$user_email = $_SESSION['email'];

// Count unread replies from admin
$sql = "SELECT COUNT(*) AS unread FROM support_messages WHERE email = ? AND Reply IS NOT NULL AND status = 'Replied'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo $row['unread'];
?>
