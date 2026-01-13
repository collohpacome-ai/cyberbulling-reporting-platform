<?php
$step = 1;
$error = "";
$success = "";

$conn = mysqli_connect("localhost", "root", "", "user_registration");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $step = 2; // Move to reset step
    } else {
      $error = "Email not found.";
    }
  } elseif (isset($_POST['new_password']) && isset($_POST['confirm_password']) && isset($_POST['reset_email'])) {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    $email = $_POST['reset_email'];

    if ($newPassword !== $confirmPassword) {
      $error = "Passwords do not match.";
      $step = 2;
    } else {
      $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
      $update = "UPDATE users SET password='$hashed' WHERE email='$email'";
      if (mysqli_query($conn, $update)) {
        $success = "Password updated successfully. <a href='loginpage.php'>Login</a>";
        $step = 3;
      } else {
        $error = "Failed to update password.";
        $step = 2;
      }
    }
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: orange;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      color: white;
      cursor: pointer;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    .success {
      color: green;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Forgot Password</h2>

    <?php if ($step === 1): ?>
      <form method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Submit</button>
      </form>
    <?php elseif ($step === 2): ?>
      <form method="POST">
        <input type="hidden" name="reset_email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Reset Password</button>
      </form>
    <?php endif; ?>

    <?php if ($error): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>
  </div>
</body>
</html>
