<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_messages";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle reply submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply']) && isset($_POST['message_id'])) {
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);
    $message_id = intval($_POST['message_id']);

    $update_sql = "UPDATE support_messages SET reply='$reply', status='Replied' WHERE id=$message_id";
    mysqli_query($conn, $update_sql);
}

// Fetch all messages
$sql = "SELECT * FROM support_messages ORDER BY date_sent DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Support Replies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f4f7;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        th {
            background-color: orange;
            color: white;
        }
        form textarea {
            width: 100%;
            height: 70px;
            padding: 8px;
            resize: vertical;
            font-family: inherit;
        }
        form input[type="submit"] {
            margin-top: 8px;
            padding: 8px 16px;
            background: #28a745;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .reply-box {
            background: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #28a745;
            margin-top: 5px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<h2>Support Messages and Replies</h2>

<table>
    <tr>
        <th>ID</th>
        <th>User Info</th>
        <th>Message</th>
        <th>Reply</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td>
            <strong><?= htmlspecialchars($row['name']) ?></strong><br>
            <small><?= htmlspecialchars($row['email']) ?></small><br>
            <small><?= $row['date_sent'] ?></small>
        </td>
        <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
        <td>
            <?php if (!empty($row['reply'])): ?>
                <div class="reply-box"><?= htmlspecialchars($row['reply']) ?></div>
            <?php else: ?>
                <form method="post">
                    <input type="hidden" name="message_id" value="<?= $row['id'] ?>">
                    <textarea name="reply" required placeholder="Type your reply..."></textarea>
                    <input type="submit" value="Send Reply">
                </form>
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
