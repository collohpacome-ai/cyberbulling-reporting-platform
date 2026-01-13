<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "cyber_reports");

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Chat with Admin</title>
    <style>
        body { font-family: Arial; background: #f1f1f1; }
        #chat-box { width: 90%; max-width: 600px; height: 400px; overflow-y: scroll; background: white; padding: 10px; border-radius: 5px; margin: 20px auto; box-shadow: 0 0 10px #ccc; }
        .message { padding: 5px 10px; margin: 5px 0; border-radius: 5px; max-width: 75%; }
        .user { background-color: #dcf8c6; align-self: flex-end; text-align: right; margin-left: auto; }
        .admin { background-color: #f1f0f0; align-self: flex-start; }
        #chat-form { display: flex; width: 90%; max-width: 600px; margin: auto; margin-top: 10px; }
        #msg { flex: 1; padding: 10px; }
        #send { padding: 10px; background: #2196F3; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<h2 style="text-align:center;">💬 Live Chat with Admin</h2>
<div id="chat-box"></div>

<form id="chat-form">
    <input type="text" id="msg" placeholder="Type your message..." required>
    <button type="submit" id="send">Send</button>
</form>

<script>
function loadMessages() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch-messages.php", true);
    xhr.onload = function() {
        document.getElementById("chat-box").innerHTML = this.responseText;
        document.getElementById("chat-box").scrollTop = document.getElementById("chat-box").scrollHeight;
    };
    xhr.send();
}

document.getElementById("chat-form").addEventListener("submit", function(e) {
    e.preventDefault();
    const msg = document.getElementById("msg").value;
    if (msg.trim() === "") return;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send-message.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        document.getElementById("msg").value = "";
        loadMessages();
    };
    xhr.send("message=" + encodeURIComponent(msg));
});

setInterval(loadMessages, 3000); // refresh chat every 3 seconds
loadMessages(); // load on start
</script>

</body>
</html>
