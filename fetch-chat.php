<?php
session_start();
$email = $_SESSION['email'];

$conn = new mysqli("localhost", "root", "", "user_messages");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT message, Reply, date_sent, status 
        FROM support_messages 
        WHERE email = ? AND Reply IS NOT NULL 
        ORDER BY date_sent DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$output = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<div class='notification-box'>
                    <strong>Your Message:</strong> " . htmlspecialchars($row['message']) . "<br><br>
                    <strong>Admin Reply:</strong> " . htmlspecialchars($row['Reply']) . "<br><br>
                    <small>Sent on: " . htmlspecialchars($row['date_sent']) . " | Status: " . htmlspecialchars($row['status']) . "</small>
                    </div>";
    }
} else {
    $output = "<p>No replies yet. Please check back later.</p>";
}

echo $output;

$stmt->close();
$conn->close();
?>
