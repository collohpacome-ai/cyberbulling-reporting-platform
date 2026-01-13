<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
  header("Location: loginpage.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --primary: #ff8c00;
      --background: #f4f6f9;
      --sidebar-bg: #1f2c3a;
      --sidebar-text: #ecf0f1;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-color: var(--background);
    }

    .sidebar {
      width: 250px;
      background: var(--sidebar-bg);
      color: var(--sidebar-text);
      display: flex;
      flex-direction: column;
      padding: 20px 0;
      position: fixed;
      height: 100vh;
    }

    .sidebar h2 {
      text-align: center;
      font-size: 22px;
      margin-bottom: 30px;
    }

    .sidebar a {
      padding: 15px 25px;
      color: var(--sidebar-text);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
      width: calc(100% - 250px);
    }

    .top-bar {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-bar h1 {
      font-size: 24px;
      color: #333;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card i {
      font-size: 32px;
      color: var(--primary);
      margin-bottom: 15px;
    }

    .card h3 {
      font-size: 16px;
      color: #444;
      margin-bottom: 8px;
    }

    .card p {
      font-size: 22px;
      font-weight: bold;
      color: #1a73e8;
    }

    .content-box {
      margin-top: 30px;
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        width: 100%;
      }

      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h2><i class="fas fa-shield-alt"></i> Admin Panel</h2>
  <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
  <?php
$incidentConn = mysqli_connect("localhost", "root", "", "cyber_reports");
$incidentCount = 0;

if ($incidentConn) {
  $result = mysqli_query($incidentConn, "SELECT COUNT(*) AS total FROM incident_reports WHERE status = 'pending'");
  $row = mysqli_fetch_assoc($result);
  $incidentCount = $row['total'];
}
?>
<a href="admin-review-incidents.php">
  <i class="fas fa-exclamation-triangle"></i> Review Incidents
  <?php if ($incidentCount > 0): ?>
    <span style="background:red; color:white; padding:2px 6px; border-radius:50%; font-size:12px; margin-left:5px;">
      <?php echo $incidentCount; ?>
    </span>
  <?php endif; ?>
</a>

  
  <a href="admin-vulnerability-reports.php"><i class="fas fa-bug"></i> Vulnerability Reports</a>
  <a href="Child Related Incident Reports.php"><i class="fas fa-child"></i> Child Incidents</a>
  <a href="admin-manage-users.php"><i class="fas fa-users"></i> Manage Users</a>
 <a href="admin_messages.php">
  <i class="fas fa-envelope"></i> Support
  <span id="supportBadge" style="background:red; color:white; padding:2px 6px; border-radius:50%; font-size:12px; margin-left:5px; display:none;">0</span>
</a>
  <a href="settings.php"><i class="fas fa-cogs"></i> Settings</a>
  <a href="admin-profile.php"><i class="fas fa-user-cog"></i> Profile</a>
  <a href="loginpage.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-content">
  <div class="top-bar">
    <h1>Welcome, Admin</h1>
  </div>

  <div class="dashboard-cards">
    <div class="card">
      <i class="fas fa-database"></i>
      <h3>Total Incidents</h3>
      <p>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cyber_reports");
        echo $conn ? mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM incident_reports"))['total'] : "Error";
        ?>
      </p>
    </div>

    <div class="card">
      <i class="fas fa-child"></i>
      <h3>Child-Related Cases</h3>
      <p>
        <?php
        $conn2 = mysqli_connect("localhost", "root", "", "Child_reports");
        echo $conn2 ? mysqli_fetch_assoc(mysqli_query($conn2, "SELECT COUNT(*) as total FROM child_incident_reports"))['total'] : "Error";
        ?>
      </p>
    </div>

    <div class="card">
      <i class="fas fa-users"></i>
      <h3>Registered Users</h3>
      <p>
        <?php
        $conn3 = mysqli_connect("localhost", "root", "", "user_registration");
        echo $conn3 ? mysqli_fetch_assoc(mysqli_query($conn3, "SELECT COUNT(*) as total FROM users"))['total'] : "Error";
        ?>
      </p>
    </div>

    <div class="card">
      <i class="fas fa-clock"></i>
      <h3>Pending Approvals</h3>
      <p>9</p>
    </div>
  </div>

  <div class="content-box">
    <h2>System Overview</h2>
    <p>This is the Admin Dashboard. Use the menu to navigate through reports, user management, vulnerabilities, and settings.</p>
  </div>
</div>
<script>
function loadSupportBadge() {
  fetch('get-unread-count.php')
    .then(response => response.text())
    .then(count => {
      const badge = document.getElementById('supportBadge');
      if (parseInt(count) > 0) {
        badge.textContent = count;
        badge.style.display = 'inline-block';
      } else {
        badge.style.display = 'none';
      }
    });
}

loadSupportBadge();
setInterval(loadSupportBadge, 5000); // Refresh every 5 seconds
</script>


</body>
</html>
