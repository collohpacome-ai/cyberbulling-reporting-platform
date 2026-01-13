<?php
session_start();
$conn = new mysqli("localhost", "root", "", "user_messages");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header("Content-Type: application/json");

$user_email = $_SESSION['email'] ?? '';

if (!$user_email) {
    echo json_encode(['count' => 0, 'error' => 'no_session']);
    exit;
}

$stmt = $conn->prepare("SELECT COUNT(*) AS unread_count FROM support_messages WHERE user_id = ? AND admin_reply IS NOT NULL AND user_read = 0");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode(['count' => $row['unread_count'] ?? 0]);
?>
