<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Child Incident Reports</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
    }

    .container {
      padding: 20px;
    }

    h1 {
      color: #1a73e8;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      margin-top: 20px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
    }

    table th, table td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background-color: #f1f1f1;
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    .actions button {
      margin-right: 5px;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 13px;
    }

    .view-btn {
      background-color: #1a73e8;
      color: white;
    }

    .resolve-btn {
      background-color: #34a853;
      color: white;
    }

    .delete-btn {
      background-color: #ea4335;
      color: white;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.6);
    }

    .modal-content {
      background-color: #fff;
      margin: auto;
      padding: 30px;
      border: 1px solid #888;
      width: 70%;
      border-radius: 10px;
      position: relative;
      animation: slideIn .3s ease-in-out;
    }

    @keyframes slideIn {
      from {opacity: 0; top: -50px;}
      to {opacity: 1; top: 0;}
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 24px;
      color: #555;
      cursor: pointer;
    }
  </style>
</head>
<body>
   <a href="admin.php" style="text-decoration: none; color: #1a73e8; font-weight: bold;">
    &larr; Back to Admin Dashboard
  </a>
  <div class="container">
    <h1>Child-Related Incidents</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Reporter</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tbody>
  <?php
  // Connect to the database
  $conn = new mysqli("localhost", "root", "", "Child_reports");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch all child reports
  $sql = "SELECT id, reporter_name, incident_description, submitted_at FROM child_incident_reports ORDER BY submitted_at DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $count = 1;
    while ($row = $result->fetch_assoc()) {
      $id = "CH" . str_pad($row['id'], 3, '0', STR_PAD_LEFT);
      $title = substr($row['incident_description'], 0, 40) . "...";
      $reporter = $row['reporter_name'] ?: "Anonymous";
      $date = date("Y-m-d", strtotime($row['submitted_at']));
      $desc = htmlspecialchars($row['incident_description']);

      echo "
      <tr>
        <td>$id</td>
        <td>$title</td>
        <td>$reporter</td>
        <td>$date</td>
        <td>Pending</td>
        <td class='actions'>
          <button class='view-btn' onclick=\"openModal('$reporter', '$title', '$date', 'Pending', `$desc`)\" >View</button>
          <button class='resolve-btn' onclick='markResolved(this)'>Mark Resolved</button>
          <button class='delete-btn' onclick='deleteRow(this)'>Delete</button>
        </td>
      </tr>
      ";
    }
  } else {
    echo "<tr><td colspan='6'>No reports found.</td></tr>";
  }

  $conn->close();
  ?>
</tbody>

      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div id="incidentModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2>Incident Details</h2>
      <p><strong>Reporter:</strong> <span id="modalReporter"></span></p>
      <p><strong>Title:</strong> <span id="modalTitle"></span></p>
      <p><strong>Date:</strong> <span id="modalDate"></span></p>
      <p><strong>Status:</strong> <span id="modalStatus"></span></p>
      <p><strong>Description:</strong></p>
      <p id="modalDescription"></p>
    </div>
  </div>

  <script>
    function openModal(reporter, title, date, status, description) {
      document.getElementById("modalReporter").textContent = reporter;
      document.getElementById("modalTitle").textContent = title;
      document.getElementById("modalDate").textContent = date;
      document.getElementById("modalStatus").textContent = status;
      document.getElementById("modalDescription").textContent = description;
      document.getElementById("incidentModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("incidentModal").style.display = "none";
    }

    function markResolved(button) {
      const row = button.closest("tr");
      const statusCell = row.children[4];
      statusCell.textContent = "Resolved";
      row.style.backgroundColor = "#e6f4ea";
      button.disabled = true;
      button.textContent = "Resolved";
      button.style.backgroundColor = "#ccc";
    }

    function deleteRow(button) {
      const row = button.closest("tr");
      row.remove();
    }
  </script>
</body>
</html>
