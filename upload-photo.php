<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: loginpage.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "user_registration");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $email = $_SESSION['email'];
    $photo = $_FILES["photo"];

    $target_dir = "uploads/";
    $file_name = basename($photo["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;

    if (move_uploaded_file($photo["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET photo='$target_file' WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            header("Location: user-profile.php?photo=updated");
            exit();
        } else {
            $error = "Database error: " . mysqli_error($conn);
        }
    } else {
        $error = "File upload failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Photo</title>
  <style>
    body { font-family: Arial; background: #f9f9f9; padding: 40px; }
    .box { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    input[type="file"] { display: block; margin: 20px 0; }
    .button { background: orange; padding: 10px 20px; color: white; text-decoration: none; border: none; border-radius: 5px; }
    .button:hover { background: darkorange; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Upload Profile Photo</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
      <input type="file" name="photo" accept="image/*" required>
      <button class="button" type="submit">Upload</button>
    </form>
    <a href="user-profile.php" class="button" style="margin-top: 20px; display: inline-block;">Back</a>
  </div>
</body>
</html>
