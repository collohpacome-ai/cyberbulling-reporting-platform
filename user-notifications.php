<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Notifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f5;
        }

        #notification-container {
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            padding: 10px;
        }

        .notification-box {
            padding: 15px;
            background-color: #ffffff;
            border-left: 5px solid #2196F3;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .notification-box small {
            color: gray;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        #chat-form {
            width: 80%;
            max-width: 600px;
            margin: 0 auto 20px auto;
            display: block;
        }

        #chat-form textarea {
            width: 100%;
            padding: 10px;
            resize: vertical;
        }

        #chat-form button {
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            border: none;
            margin-top: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>🔔 Your Notifications</h2>

<!-- Chat Form OUTSIDE the auto-refresh container -->
<form id="chat-form">
    <textarea name="message" placeholder="Type your message..." required></textarea><br>
    <button type="submit">Send</button>
</form>

<!-- This part will be updated via JavaScript -->
<div id="notification-container"></div>

<script>
function fetchChat() {
    fetch('fetch-chat.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('notification-container').innerHTML = data;
        });
}

// Submit new message
document.getElementById('chat-form').onsubmit = function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('email', '<?= $email ?>');
    fetch('send-message.php', {
        method: 'POST',
        body: formData
    }).then(() => {
        this.reset();
        fetchChat();
    });
};

// Auto-refresh every 2 seconds
setInterval(fetchChat, 2000);
fetchChat(); // initial load
</script>

</body>
</html>
