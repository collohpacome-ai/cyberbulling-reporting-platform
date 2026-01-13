<?php
session_start();
header('Content-Type: application/json');
require_once 'includes/db.php';

if (!isset($_SESSION['email'])) {
    echo json_encode(['error' => 'User not logged in.']);
    exit;
}

try {
    $email = $_SESSION['email'];
    $stmt = $pdo->prepare("SELECT message, is_read, created_at FROM notifications WHERE user_email = ?");
    $stmt->execute([$email]);
    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($notifications);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
