<?php
// Handle deletion BEFORE any HTML output
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_user_id"])) {
  $conn = mysqli_connect("localhost", "root", "", "user_registration");
  if (!$conn) {
    echo "DB error";
    exit;
  }

  $id = intval($_POST["delete_user_id"]);
  $delete = "DELETE FROM users WHERE id = $id";
  if (mysqli_query($conn, $delete)) {
    echo "success";
  } else {
    echo "error";
  }

  mysqli_close($conn);
  exit; // stop further output for AJAX
}

// Otherwise, show the full page
$conn = mysqli_connect("localhost", "root", "", "user_registration");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY date_registered DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Manage Users</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 20px;
    }

    h1 {
      color: #1a73e8;
    }

    a.back-link {
      text-decoration: none;
      color: #1a73e8;
      font-weight: bold;
      display: inline-block;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f1f1f1;
    }

    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      color: #fff;
      cursor: pointer;
      font-size: 14px;
    }

    .delete-btn {
      background-color: #ea4335;
    }
  </style>
</head>
<body>

<a href="admin.php" class="back-link">&larr; Back to Admin Dashboard</a>
<h1>Manage Users</h1>

<?php if (mysqli_num_rows($result) > 0): ?>
  <table id="userTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Status</th>
        <th>Date Registered</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr data-user-id="<?php echo $row['id']; ?>">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td>********</td> <!-- Or use $row['password'] to see hash -->
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['phone']); ?></td>
          <td><?php echo $row['role'] ?? 'user'; ?></td>
          <td><?php echo $row['status'] ?? 'active'; ?></td>
          <td><?php echo $row['date_registered']; ?></td>
          <td>
            <button class="btn delete-btn" onclick="deleteUser(this, <?php echo $row['id']; ?>)">Delete</button>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No users found.</p>
<?php endif; ?>

<?php mysqli_close($conn); ?>

<script>
function deleteUser(button, userId) {
  if (confirm("Are you sure you want to delete this user?")) {
    const formData = new FormData();
    formData.append("delete_user_id", userId);

    fetch("", {
      method: "POST",
      body: formData
    })
    .then(res => res.text())
    .then(data => {
      if (data.trim() === "success") {
        const row = button.closest("tr");
        row.remove();
        alert("User deleted successfully.");
      } else {
        alert("Failed to delete user.");
      }
    });
  }
}
</script>

</body>
</html>
