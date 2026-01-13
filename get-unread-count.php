<?php
$conn = new mysqli("localhost", "root", "", "user_messages");

if ($conn->connect_error) {
    echo 0;
    exit;
}

// Count messages that are pending reply
$sql = "SELECT COUNT(*) AS unread FROM support_messages WHERE status = 'Pending'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['unread'];
?>
