<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Emblem Technologies</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
.register-container {
      background: #fff; padding: 40px;border-radius: 10px;box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
 h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
input[type="text"],
input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
button {
      width: 100%;padding: 12px;background-color: orange; border: none;border-radius: 5px;font-size: 16px;font-weight: bold;
      color: white;
      cursor: pointer;
      margin-top: 10px;
    }
 button:hover {
      background-color: darkorange;
    }
.login-link {
      text-align: center;
      margin-top: 15px;
    }
.login-link a {
      color: orange;
      text-decoration: none;
    }
.login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="register-container">
  <h2>Register</h2>
<!-- ... (keep all your HTML head and styles as-is) ... -->
<form method="POST" onsubmit="return validatePassword()">
  <input type="text" name="fullname" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email Address" required>
  <input type="text" name="phone" placeholder="Phone Number" required>
  <input type="password" id="password" name="password" placeholder="Password" required onkeyup="checkStrength()">
  <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
  
  <div id="strength-message" style="color:red; font-size: 14px; margin-bottom: 10px;"></div>
  
  <button type="submit">Register</button>
</form>


  <div class="login-link">
    Already have an account? <a href="loginpage.php">Login</a>
  </div>
</div>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$connect = mysqli_connect($servername, $username, $password);

// Create database if it doesn't exist
$createDatabase = "CREATE DATABASE IF NOT EXISTS user_registration";
mysqli_query($connect, $createDatabase);
mysqli_select_db($connect, "user_registration");
$createTable = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  phone VARCHAR(20),
  password VARCHAR(255),
  date_registered DATETIME,
  role VARCHAR(20)
)";
mysqli_query($connect, $createTable);
$registrationError = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['fullname']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $password = $_POST['password'];
  $confirm = $_POST['confirm_password'];
 if ($password !== $confirm) {
    $registrationError = "❌ Passwords do not match.";
  } else {
    // Assign role
    $role = (strtolower($email) === 'collins@gmail.com') ? 'admin' : 'user';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
      $registrationError = "❌ An account with that email already exists.";
    } else {
      // Insert into database
      $insertQuery = "INSERT INTO users (name, email, phone, password, date_registered, role)
                      VALUES ('$name', '$email', '$phone', '$hashedPassword', NOW(), '$role')";
if (mysqli_query($connect, $insertQuery)) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        header("Location: " . ($role === 'admin' ? "admin.php" : "final project.php"));
        exit();
      } else {
        $registrationError = "❌ Database error: " . mysqli_error($connect);
      }
    }
  }
 mysqli_close($connect);
}
?>
<script>  

function checkStrength() {
  const password = document.getElementById('password').value;
  const message = document.getElementById('strength-message');

  const hasUpperCase = /[A-Z]/.test(password);
  const hasLowerCase = /[a-z]/.test(password);
  const hasNumber = /\d/.test(password);
  const hasSpecialChar = /[\W_]/.test(password);
  const hasMinLength = password.length >= 8;

  if (!hasMinLength || !hasUpperCase || !hasLowerCase || !hasNumber || !hasSpecialChar) {
    message.innerHTML = "Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.";
  } else {
    message.style.color = "green";
    message.innerHTML = "✅ Strong password!";
  }
}

function validatePassword() {
  const password = document.getElementById('password').value;
  const confirm = document.getElementById('confirm_password').value;
  const message = document.getElementById('strength-message');

  const isValid =
    /[A-Z]/.test(password) &&
    /[a-z]/.test(password) &&
    /\d/.test(password) &&
    /[\W_]/.test(password) &&
    password.length >= 8;

  if (!isValid) {
    alert("Please enter a stronger password.");
    return false;
  }

  if (password !== confirm) {
    alert("Passwords do not match.");
    return false;
  }

  return true;
}
</script>


</body>
</html>
