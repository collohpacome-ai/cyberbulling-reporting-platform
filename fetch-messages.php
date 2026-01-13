<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "cyber_reports");

$user_email = $_SESSION['user_email'];

$query = "SELECT * FROM support_messages WHERE user_email='$user_email' ORDER BY timestamp ASC";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['sender'] === 'user') {
        echo "<div class='message user'>{$row['message']}<br><small>{$row['timestamp']}</small></div>";
    } else {
        echo "<div class='message admin'><strong>Admin:</strong> {$row['message']}<br><small>{$row['timestamp']}</small></div>";
    }
}
?>
