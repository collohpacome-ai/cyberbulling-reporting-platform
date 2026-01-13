
<?php
session_start();

// continue with your code...
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Communications Authority of Kenya</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --bg-color: #ffffff;
      --text-color: #000000;
      --card-bg: #f5f5f5;
    }

    body.dark-mode {
      --bg-color: #121212;
      --text-color: #ffffff;
      --card-bg: #1e1e1e;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: var(--bg-color);
      color: var(--text-color);
      transition: background-color 0.3s, color 0.3s;
    }

 .header-section {
  background-color: orange;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #ccc;
  position: relative;
}


    .logo {
      display: flex;
      align-items: center;
    }

    .logo figure {
      display: flex;
      align-items: center;
      margin: 0;
    }

    .logo img {
      height: 100px;
      margin-right: 10px;
    }

    figcaption {
      font-size: 18px;
      font-weight: bold;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
      align-items: center;
    }

    nav ul li {
      position: relative;
    }
      nav ul li a {
      text-decoration: none;
      color:black;

    }
      nav ul li a:hover {
      color: white;
      transition: color 2s;

    }


    nav ul li:hover {
      cursor: pointer;
      color: white;
      transition: color 2s;
    }

    nav ul li::after {
      
      font-size: 10px;
    }
    
.dropdown {
      position: relative;
      display: inline-block;
    }

    .dropbtn {
      background-color: orange;
      color: black;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: var(--bg-color);
      min-width: 250px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: var(--text-color);
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: var(--card-bg);
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: darkorange;
    }

    

 .toggle-theme {
  position: absolute;
  top: 20px;
  right: 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 14px;
  z-index: 10;
}

    .card {
      background: var(--white);
      padding: 40px;
      border-radius: var(--radius);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
      margin: 50px auto;
    }

    h2 {
      text-align: center;
      color: var(--primary);
      margin-bottom: 30px;
      font-weight: 600;
    }

    label {
      display: block;
      margin: 15px 0 5px;
      font-weight: 500;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      border: 2px solid #ccc;
      border-radius: var(--radius);
      font-size: 16px;
    }

    button[type="submit"] {
      width: 100%;
      padding: 14px;
      margin-top: 25px;
      background: var(--primary);
      color: var(--white);
      border: none;
      border-radius: var(--radius);
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background: #004de0;
    }


   

    
    

   
   

   

    .footer-section {
  background-color: #1e1e1e;
  color: white;
  padding: 40px 20px;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: space-between;
  max-width: 1200px;
  margin: auto;
}

.footer-section a {
  color: #4da6ff;
  text-decoration: none;
}

.footer-section h2 {
  border-bottom: 2px solid white;
  padding-bottom: 5px;
  margin-bottom: 15px;
}

.contact-info {
  flex: 1 1 300px;
  min-width: 250px;
}

.map {
  flex: 1 1 300px;
  min-width: 250px;
}

.contact-form {
  flex: 1 1 300px;
  min-width: 250px;
}

.contact-form form {
  display: flex;
  flex-direction: column;
}

.contact-form input,
.contact-form textarea {
  padding: 10px;
  margin-bottom: 15px;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  width: 100%;
}

.contact-form textarea {
  resize: vertical;
  min-height: 80px;
}

.contact-form button {
  background-color: #0074d9;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  text-transform: uppercase;
}

.contact-form button:hover {
  background-color: #005fa3;
}
.footer-section {
  background-color: #1e1e1e;
  color: white;
  padding: 50px 20px 30px;
  font-size: 14px;
}

     footer {
      background-color: #1e1e1e;
      color: white;
      padding: 40px 20px;
    }

    .footer-container {
       display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: auto;
    }

    .footer-section a {
      color: #4da6ff;
      text-decoration: none;
    }

    .footer-section h2 {
        color: orange;
  margin-bottom: 15px;
  font-size: 18px;
  border-bottom: 1px solid orange;
  padding-bottom: 5px;
    }
    .footer-column p, .footer-column a {
  color: #ccc;
  line-height: 1.8;
  text-decoration: none;
}

.footer-column a:hover {
  color: white;
}
    .contact-form {
  background-color: #2a2a2a;
  padding: 20px;
  border-radius: 10px;
}

.contact-form .form-group {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 12px;
  border-radius: 6px;
  border: 1px solid #444;
  background: #333;
  color: #fff;
  margin-bottom: 12px;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: orange;
  outline: none;
}
.contact-form button {
  background-color: orange;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.contact-form button:hover {
  background-color: darkorange;
}

.footer-bottom {
  text-align: center;
  margin-top: 40px;
  color: #aaa;
  font-size: 12px;
}

  </style>
</head>
<body>
   <section class="header-section">
    <div class="logo">
      <figure>
        <img src="http://localhost/peace/robotic-hand.png" alt="CA Kenya Logo">
        <figcaption>Emblem Technologies</figcaption>
      </figure>
    </div>
    <nav>
      <ul>
        <li><a href="final project.php"><i class="fa-solid fa-house"></i> Home</a></li>
        <li>
          <div class="dropdown">
            <button class="dropbtn">Report Incident <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
              <a href="report incident.php">Report an Incident</a>
              <a href="Vulnerability.php">Report a Vulnerability</a>
              <a href="child Related Cyber Incident Reporting Form.php">Child Related Cyber Incident Reporting</a>
            </div>
          </div>
        </li>
        <li><a href="children and internet.php"><i class="fa-solid fa-child-reaching"></i> Children & The Internet</a></li>
        <li><a href="contact uss.php "><i class="fa-solid fa-phone"></i> Contact Us</a></li>
        <li>
          <div class="dropdown">
            <button class="dropbtn"><i class="fa-solid fa-user"></i> Profile <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
              <a href="user-profile.php">View Personal Details</a>
              <a href="user-notifications.php">Notifications</a>
              <a href="loginpage.php">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <button class="toggle-theme" onclick="toggleTheme()">Toggle Mode</button>
  </section>


  <section class="card" style="padding: 40px;">
  <h2><i class="fas fa-headset"></i> Contact Support</h2>

 <?php
 // Ensure session is started

$servername = "localhost";
$username = "root";
$password = "";

// Connect
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create DB
$sql_create_db = "CREATE DATABASE IF NOT EXISTS user_messages";
mysqli_query($conn, $sql_create_db);

// Select DB
mysqli_select_db($conn, "user_messages");

// Create table
$sql_create_table = "CREATE TABLE IF NOT EXISTS support_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    reply TEXT,
    message TEXT,
    date_sent DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'Pending'
)";
mysqli_query($conn, $sql_create_table);

// Insert form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    // Enforce session email instead of user-typed email
    $email = $_SESSION['email'] ?? '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO support_messages (name, email, message)
                VALUES ('$name', '$email', '$message')";

        if (mysqli_query($conn, $sql)) {
            $success_message = "Your message has been submitted successfully!";
        } else {
            $success_message = "Insert error: " . mysqli_error($conn);
        }
    } else {
        $success_message = "All fields are required.";
    }
}
if (isset($_POST['footer_submit'])) {
    // Get footer form data safely
    $footer_name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $footer_email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $footer_message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

    if (!empty($footer_name) && !empty($footer_email) && !empty($footer_message)) {
        $sql_footer = "INSERT INTO support_messages (name, email, message)
                       VALUES ('$footer_name', '$footer_email', '$footer_message')";

        if (mysqli_query($conn, $sql_footer)) {
            echo "<script>alert('Your footer message has been sent successfully!');</script>";
        } else {
            echo "<script>alert('Error sending footer message: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('All footer fields are required.');</script>";
    }
}


mysqli_close($conn);
?>




  <form id="supportForm" method="post">
    <?php if (isset($success_message)): ?>
  <script>
    alert("<?= $success_message ?>");
  </script>
<?php endif; ?>



    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" placeholder="John Doe" autofocus required>

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="john@example.com" required>

    <label for="message">Your Message</label>
    <textarea id="message" name="message" rows="5" placeholder="Type your concern here..." required></textarea>

    <button type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
  </form>

  


</section>

   <footer class="footer-section">
  <div class="footer-container">
    <!-- Contact Info -->
   <!-- Contact Info -->
<div class="footer-column">
  <h2>Contact Info</h2>
  <p><strong>Web portal:</strong><br>
    emblemtechnologies.co.ke</p>

  <p><strong>Email:</strong><br>
    <a href="mailto:support@emblemtechnologies.co.ke">support@emblemtechnologies.co.ke</a></p>

  <p><strong>Mail Us:</strong><br>
    Emblem Technologies,<br>
    P.O. Box 00100,<br>
    Nairobi, Kenya</p>
</div>


    <!-- Map Embed -->
    <div class="footer-column">
      <h2>Our Location</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- Contact Form -->
    <div class="footer-column contact-form">
      <h2>Get in Touch</h2>
<form action="" method="post">
  <input type="text" name="name" placeholder="Your Name" required>
  <input type="email" name="email" placeholder="Your Email" required>
  <textarea name="message" placeholder="Your Message" required></textarea>
  <button type="submit" name="footer_submit">Send</button>
</form>


    </div>
  </div>

  <div class="footer-bottom">
    &copy; 2025 Communications Authority of Kenya. All rights reserved.
  </div>
</footer>



  <script>
    function toggleTheme() {
      document.body.classList.toggle("dark-mode");
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    }, {
      threshold: 0.1
    });

      // Theme toggle (already present)
  function toggleTheme() {
    document.body.classList.toggle("dark-mode");
  }



     

    
  </script>
</body>
</html>
