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
      color:black;
      text-decoration: none;
    }
      nav ul li a:hover {
      color:white;
      transition: color 2s;
    }

    nav ul li:hover {
      cursor: pointer;
      color: white;
      transition: color 2s;
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

    .search-icon {
      font-size: 18px;
      cursor: pointer;
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


    .background {
      height: 400px;
      background-image: url("http://localhost/peace/pic1.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .background .text-box {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 20px;
      max-width: 600px;
      border-radius: 8px;
      margin: 0 auto;
      text-align: center;
    }

    .background h2 {
      font-size: 24px;
      font-weight: bold;
      
      margin-bottom: 15px;
    }
     .background h2:hover{
      
      text-decoration: underline;
    
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
    .form-decoration{
      
      
      padding:40px 40px;
      box-shadow: 4px 3px 10px black;


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
        <li>
        <li><a href="contact uss.php"><i class="fa-solid fa-phone"></i> Contact US</a></li>
        <li>
          <div class="dropdown">
            <button class="dropbtn"><i class="fa-solid fa-user"></i> Profile <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
              <a href="user-profile.php">View Personal Details</a>
              <a href="users-notifications.php">Notifications</a>
              <a href="loginpage.php">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <button class="toggle-theme" onclick="toggleTheme()">Toggle Mode</button>
  </section>

  <section class="background">
    <div class="text-box">
      <h2>Report an Incident</h2>
    </div>
  </section>
  <section style="padding: 40px 20px; max-width: 900px; margin: auto;">
  <h2 style="text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; display: inline-block;">Report an Incident Form</h2>
 <div class="form-decoration">
  <?php
$servername="localhost";
  $username="root";
  $password="";
  $connect=mysqli_connect($servername,$username,$password);
if (!$connect){
  die("Connection failed: " . mysqli_connect_error());
}
$createdatabase= "CREATE DATABASE IF NOT EXISTS cyber_reports";
               mysqli_query($connect, $createdatabase);

               mysqli_select_db($connect,"cyber_reports");

$name= $email =$phone=$organisation=$category=$type=$details="";
 $createTable="CREATE TABLE IF NOT EXISTS incident_reports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(30),
  organisation VARCHAR(100),
  category VARCHAR(50),
  type TEXT,
  details TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
  mysqli_query($connect,$createTable);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["PhoneNo"];
    $platform = $_POST["platform"];
    $category = $_POST["select"];
    $type = $_POST["textArea1"];
    $details = $_POST["textArea2"];

   $sql = "INSERT INTO incident_reports (name, email, phone, platform, category, type, details)
          VALUES ('$name', '$email', '$phone', '$platform', '$category', '$type', '$details')";
          
    if (mysqli_query($connect, $sql)) {
        echo "Incident submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
  mysqli_close($connect);
}

  ?>
  <form method="post">
    <input type="text"  name="name"placeholder="Your Name (optional)" style="width: 100%; padding: 10px; margin-bottom: 10px;">
    <small>In order to submit anonymously, please fill in the name Anonymous, in the email - Anonymous@anonymous, in the phone number - anonymous. Please note, that in such case it will be impossible for CIRT team to return to you with incident resolution or comments.</small><br><br>

    <input type="email" name="email" placeholder="Your Email (optional)" style="width: 100%; padding: 10px; margin-bottom: 10px;">
    <input type="text" name="PhoneNo" placeholder="Your Phone number (optional)" style="width: 100%; padding: 10px; margin-bottom: 10px;">
    <input type="text" name="platform" placeholder="Platform (e.g. Facebook, Instagram)" style="width: 100%; padding: 10px; margin-bottom: 20px;" required>


    <label><strong>Category (required) *</strong></label><br>
    <select name="select"required style="width: 100%; padding: 10px; margin-bottom: 20px;">
      <option value="">Select a category</option>
      <option value="abusive-content">Abusive Content</option>
      <option value="malware">Malware</option>
      <option value="phishing">Phishing</option>
      <option value="fraud">E-commerce Fraud</option>
    </select>

    <label><strong>Incident type (required) *</strong></label><br>
    <textarea name="textArea1"required style="width: 100%; padding: 10px; margin-bottom: 20px;" placeholder="Incident type (describe and categorize according to your knowledge and understanding): Social media abuse, e-commerce fraud, phishing, malware attack, etc."></textarea>

    <label><strong>More details on the incidents</strong></label><br>
    <textarea name="textArea2"style="width: 100%; padding: 10px; margin-bottom: 30px;" placeholder="Please provide more details on the incident"></textarea>

    <button  type="submit" style="background-color: #0074D9; color: white; padding: 14px 0; width: 100%; border: none; font-weight: bold; letter-spacing: 1px;">SUBMIT</button>
  </form>
</div>
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
      <form>
        <div class="form-group">
          <input type="text" placeholder="First Name" required>
          
        </div>
        <input type="email" placeholder="Email Address" required>
        <textarea rows="4" placeholder="Your Message..." required></textarea>
        <button type="submit">Send Message</button>
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

    document.querySelectorAll('.profile-card').forEach(card => {
      observer.observe(card);
    });
  </script>
</body>
</html>
