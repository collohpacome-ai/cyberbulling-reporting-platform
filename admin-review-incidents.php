<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Review Incidents</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f2f5;
    }
    .container {
      padding: 30px;
      max-width: 1200px;
      margin: auto;
    }
    h1 {
      color: #1a73e8;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    th, td {
      padding: 16px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    th {
      background-color: #f8f9fa;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .actions button {
      margin-right: 6px;
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 13px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .view-btn { background-color: #1a73e8; color: white; }
    .resolve-btn { background-color: #34a853; color: white; }
    .delete-btn { background-color: #ea4335; color: white; }
    .badge {
      padding: 5px 10px;
      font-size: 12px;
      border-radius: 20px;
      color: white;
    }
    .badge.pending { background-color: orange; }
    .badge.resolved { background-color: green; }
    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.6);
    }
    .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 30px;
      border-radius: 10px;
      width: 70%;
      position: relative;
    }
    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 22px;
      color: #888;
      cursor: pointer;
    }
    .back-link {
      margin: 20px;
      display: inline-block;
      text-decoration: none;
      color: #1a73e8;
      font-weight: bold;
    }
    .back-link:hover {
      text-decoration: underline;
    }
    .platform-select {
      padding: 6px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 13px;
    }
  </style>
</head>
<body>
<a href="admin.php" class="back-link">&larr; Back to Admin Dashboard</a>
<div class="container">
  <h1><i class="fas fa-exclamation-triangle"></i> Reported Incidents</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Title</th>
        <th>Reporter</th>
        <th>Date</th>
        <th>Status</th>
        <th>Platform</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "cyber_reports");
      if (!$conn) die("Connection failed: " . mysqli_connect_error());
      $query = "SELECT * FROM incident_reports ORDER BY status DESC, submitted_at ASC";

      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr data-id='{$row['id']}'>";
        echo "<td>{$row['id']}</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "<td class='report-title'>" . substr(htmlspecialchars($row['type']), 0, 30) . "...</td>";
        echo "<td class='report-reporter'>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . $row['submitted_at'] . "</td>";

        $statusBadge = ($row['status'] === "Resolved") 
          ? "<span class='badge resolved'>Resolved</span>" 
          : "<span class='badge pending'>Pending</span>";
        echo "<td>$statusBadge</td>";

        // Dropdown for platform selection
        echo "<td class='platform-cell'>
          <select class='platform-select'>
            <option value=''>-- Select Platform --</option>
            <option value='Facebook'>Facebook</option>
            <option value='Twitter'>Twitter</option>
            <option value='Instagram'>Instagram</option>
            <option value='WhatsApp'>WhatsApp</option>
          </select>
        </td>";

        echo "<td class='actions'>
          <button class='view-btn' onclick=\"openModal('{$row['name']}', '{$row['category']}', '{$row['submitted_at']}', '{$row['status']}', '" . htmlspecialchars($row['details'], ENT_QUOTES) . "')\"><i class='fas fa-eye'></i> View</button>
          <button class='resolve-btn' onclick='markResolved(this)'><i class='fas fa-check'></i> Resolved</button>
          <button class='delete-btn' data-id='{$row['id']}'><i class='fas fa-trash'></i> Delete</button>
          <button class='view-btn forward-btn'><i class='fas fa-share'></i> Forward</button>
        </td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div id="incidentModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <h2>Incident Details</h2>
    <p><strong>Reporter:</strong> <span id="modalReporter"></span></p>
    <p><strong>Type:</strong> <span id="modalType"></span></p>
    <p><strong>Date:</strong> <span id="modalDate"></span></p>
    <p><strong>Status:</strong> <span id="modalStatus"></span></p>
    <p><strong>Platform:</strong> <span id="modalPlatform"></span></p>
    <p><strong>Description:</strong></p>
    <p id="modalDescription"></p>
  </div>
</div>

<script>
function openModal(reporter, type, date, status, description) {
  const modal = document.getElementById("incidentModal");
  const row = event.target.closest("tr");
  const reportId = row.getAttribute("data-id");
  const platformSelect = row.querySelector(".platform-select");
  const platform = platformSelect.value || "Not selected";

  // Mark as seen (AJAX)
  fetch("mark-seen.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${reportId}`
  });

  document.getElementById("modalReporter").textContent = reporter;
  document.getElementById("modalType").textContent = type;
  document.getElementById("modalDate").textContent = date;
  document.getElementById("modalStatus").textContent = status;
  document.getElementById("modalDescription").textContent = description;
  document.getElementById("modalPlatform").textContent = platform;

  modal.style.display = "block";
}

function closeModal() {
  document.getElementById("incidentModal").style.display = "none";
}

function markResolved(button) {
  const row = button.closest("tr");
  const statusCell = row.querySelector(".badge");
  statusCell.textContent = "Resolved";
  statusCell.classList.remove("pending");
  statusCell.classList.add("resolved");
  button.disabled = true;
  button.textContent = "Resolved";
  button.style.backgroundColor = "#ccc";
}

document.addEventListener("DOMContentLoaded", function () {
  // Forward functionality
  document.querySelectorAll(".forward-btn").forEach(button => {
    button.addEventListener("click", () => {
      const row = button.closest("tr");
      const platformSelect = row.querySelector(".platform-select");
      const platform = platformSelect.value;

      if (!platform) return alert("Please select a platform to forward to.");

      const reporter = row.querySelector(".report-reporter").textContent;
      const title = row.querySelector(".report-title").textContent;
      const details = row.dataset.details || "No description available";

      const formData = new FormData();
      formData.append("platform", platform);
      formData.append("reporter", reporter);
      formData.append("title", title);
      formData.append("details", details);

      fetch("forward-report.php", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(msg => alert(msg))
      .catch(() => alert("Error forwarding the report."));
    });
  });

  // Store details when modal is opened
  document.querySelectorAll(".view-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const row = btn.closest("tr");
      const desc = btn.getAttribute("onclick").split(", ").pop().replace(/'/g, "");
      row.dataset.details = desc;
    });
  });

  // Delete functionality
  document.querySelectorAll(".delete-btn").forEach(button => {
    button.addEventListener("click", () => {
      const reportId = button.getAttribute("data-id");
      const row = button.closest("tr");

      if (confirm("Are you sure you want to delete this report?")) {
        fetch("delete-report.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `id=${reportId}`
        })
        .then(response => response.text())
        .then(result => {
          alert(result);
          if (result.includes("✅")) {
            row.remove();
          }
        })
        .catch(() => alert("❌ Failed to delete report."));
      }
    });
  });
});
</script>
</body>
</html>
