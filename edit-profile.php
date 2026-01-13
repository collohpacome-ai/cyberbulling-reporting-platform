<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: loginpage.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "user_registration");
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);

    $sql = "UPDATE users SET name='$name', phone='$phone' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        header("Location: user-profile.php?updated=true");
        exit();
    } else {
        $error = "Failed to update: " . mysqli_error($conn);
    }
}

$query = "SELECT name, phone FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <style>
    body { font-family: Arial; background: #f2f2f2; padding: 40px; }
    .box { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    label { display: block; margin-top: 20px; }
    input { width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ccc; }
    .button { background: orange; color: white; padding: 10px 20px; border: none; margin-top: 20px; border-radius: 5px; }
    .button:hover { background: darkorange; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Edit Profile</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
      <label>Name:</label>
      <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

      <label>Phone:</label>
      <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>

      <button class="button" type="submit">Save Changes</button>
    </form>
    <a href="user-profile.php" class="button" style="margin-top: 20px; display: inline-block;">Back</a>
  </div>
</body>
</html>
