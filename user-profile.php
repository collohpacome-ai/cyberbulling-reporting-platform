<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: loginpage.php");
  exit();
}

$conn = mysqli_connect("localhost", "root", "", "user_registration");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$email = $_SESSION['email'];

// Fetch user details
$sql_user = "SELECT name, email, phone, date_registered, role, photo FROM users WHERE email='$email'";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['review']) && !empty($_POST['rating'])) {
  $review = mysqli_real_escape_string($conn, $_POST['review']);
  $rating = (int) $_POST['rating'];
  $insert = "INSERT INTO reviews (user_email, review, rating) VALUES ('$email', '$review', $rating)";
  mysqli_query($conn, $insert);
}



// Fetch reviews
$sql_reviews = "SELECT review, rating, created_at FROM reviews WHERE user_email='$email' ORDER BY created_at DESC";
$review_result = mysqli_query($conn, $sql_reviews);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 40px;
    }

    .profile-card {
      max-width: 700px;
      margin: auto;
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-card h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .profile-photo {
      width: 130px;
      height: 130px;
      object-fit: cover;
      border-radius: 50%;
      display: block;
      margin: 0 auto 15px;
      border: 2px solid orange;
    }

    .profile-info {
      font-size: 16px;
      line-height: 2;
      margin-bottom: 30px;
    }

    .profile-info strong {
      width: 150px;
      display: inline-block;
    }

    .button {
      display: inline-block;
      margin-top: 10px;
      background-color: orange;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    .button:hover {
      background-color: darkorange;
    }

    .center-button {
      text-align: center;
      margin-top: 20px;
    }

    .review-section {
      margin-top: 30px;
    }

    .review-box {
      background: #fff8e1;
      border-left: 5px solid orange;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 5px;
    }

    .review-box p {
      margin: 5px 0;
    }

    .review-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      margin-top: 10px;
      border-radius: 5px;
      font-size: 14px;
    }

    .review-form button {
      margin-top: 10px;
      background-color: orange;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .review-form button:hover {
      background-color: darkorange;
    }

    .top-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="profile-card">
  <h2>My Profile</h2>

  <!-- Profile Photo -->
  <?php if (!empty($user['photo'])): ?>
    <img src="<?php echo htmlspecialchars($user['photo']); ?>" class="profile-photo" alt="Profile Photo">
  <?php else: ?>
    <img src="default-profile.png" class="profile-photo" alt="Default Profile Photo">
  <?php endif; ?>

  <!-- Edit Profile / Upload Photo -->
  <div class="top-buttons">
    <a href="edit-profile.php" class="button">Edit Profile</a>
    <a href="upload-photo.php" class="button">Upload Profile Photo</a>
  </div>

  <!-- Personal Info -->
  <div class="profile-info">
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
    <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
    <p><strong>Registered:</strong> <?php echo htmlspecialchars($user['date_registered']); ?></p>
  </div>

  <!-- Reviews -->
  <div class="review-section">
    <h3>Your Reviews</h3>

    <form method="POST" class="review-form">
  <label for="review">Leave a Review:</label>
  <textarea name="review" id="review" rows="4" required placeholder="Share your experience..."></textarea>

  <label for="rating">Rate us:</label>
  <select name="rating" id="rating" required>
    <option value="">--Select Rating--</option>
    <option value="5">★★★★★ (5 stars)</option>
    <option value="4">★★★★☆ (4 stars)</option>
    <option value="3">★★★☆☆ (3 stars)</option>
    <option value="2">★★☆☆☆ (2 stars)</option>
    <option value="1">★☆☆☆☆ (1 star)</option>
  </select>

  <button type="submit">Submit Review</button>
</form>

    <hr>

 <?php
if ($review_result && mysqli_num_rows($review_result) > 0) {
  while ($row = mysqli_fetch_assoc($review_result)) {
    echo "<div class='review-box'>";
    echo "<p><strong>Review:</strong> " . htmlspecialchars($row['review']) . "</p>";

    // Star display
    if (isset($row['rating'])) {
      echo "<p><strong>Rating:</strong> ";
      for ($i = 1; $i <= 5; $i++) {
        echo $i <= $row['rating'] ? "★" : "☆";
      }
      echo "</p>";
    }

    echo "<p><small>Posted on: " . htmlspecialchars($row['created_at']) . "</small></p>";
    echo "</div>";
  }
} else {
  echo "<p>No reviews yet.</p>";
}
?>

  </div>

  <div class="center-button">
    <a href="final project.php" class="button">← Back to Dashboard</a>
  </div>
</div>

</body>
</html>

<?php mysqli_close($conn); ?>
