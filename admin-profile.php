






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 20px;
    }

    .profile-container {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      color: #1a73e8;
      margin-bottom: 25px;
    }

    .info-group {
      margin-bottom: 20px;
    }

    .info-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .info-group input {
      width: 100%;
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #1a73e8;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #155ab6;
    }
  </style>
</head>
<body>
   <a href="admin.php" style="text-decoration: none; color: #1a73e8; font-weight: bold;">
    &larr; Back to Admin Dashboard
  </a>
  <div class="profile-container">
    <h2>Admin Profile</h2>
    <form>
      <div class="info-group">
        <label>Full Name</label>
        <input type="text" value="Admin User">
      </div>

      <div class="info-group">
        <label>Email</label>
        <input type="email" value="admin@example.com">
      </div>

      <div class="info-group">
        <label>Role</label>
        <input type="text" value="System Administrator" disabled>
      </div>

      <button type="submit">Update Profile</button>
    </form>
  </div>
</body>
</html>
