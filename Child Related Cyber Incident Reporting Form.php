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
      margin-top: -2px;
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
  top: -6px;
  right: 20px;
  background-color:white;
  border: 1px solid #ccc;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 14px;
  z-index: 10;
  color: black;
  

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
      border-bottom: 2px solid white;
      margin-bottom: 15px;
    }
       .container {
      max-width: 960px;
      margin: auto;
      background: var(--card-bg);
      border-radius: 12px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      animation: fadeIn 0.6s ease forwards;
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    h1 {
      margin: 0;
      padding: 30px;
      font-size: 1.8rem;
      text-align: center;
      background: var(--brand);
      color: #ffffff;
    }

    /* ───────────────────── ACCORDION ───────────────────── */
    .accordion {
      border-top: 1px solid #e0e0e0;
    }

    .accordion-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 18px 30px;
      cursor: pointer;
      background: #fafafa;
      font-weight: 600;
      transition: background 0.25s;
    }

    .accordion-header:hover { background: #f0f0f0; }

    .accordion-header i { transition: transform 0.35s ease; }

    .accordion-content {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.45s ease;
      padding: 0 30px;
    }

    .accordion-content.open {
      padding-top: 20px;
      padding-bottom: 30px;
    }

    /* ───────────────────── FORM ELEMENTS ───────────────────── */
    label {
      display: block;
      margin-top: 18px;
      font-weight: 600;
    }

    .required::after { content: " *"; color: var(--danger); }

    input, select, textarea {
      width: 100%;
      padding: 12px 14px;
      margin-top: 6px;
      border: 1px solid #c7c7c7;
      border-radius: 6px;
      font-size: 0.95rem;
      font-family: inherit;
    }

    textarea { resize: vertical; min-height: 120px; }

    small {
      font-size: 0.8rem;
      color: #666;
      margin-top: 4px;
      display: block;
    }

    /* ───────────────────── SUBMIT BUTTON ───────────────────── */
    .submit-btn {
  display: block;
  width: 100%;
  background:darkblue;
  color:orange;
  border: none;
  padding: 18px 0;
  font-size: 1.15rem;
  font-weight: 700;
  border-radius: 0 0 12px 12px;
  cursor: pointer;
  transition: background 0.25s, transform 0.2s;
  box-shadow: 0 4px 12px rgba(0, 93, 180, 0.3);
}

.submit-btn:hover {
  background: var(--brand-dark);
  transform: scale(1.02);
}


    .submit-btn:hover { background: var(--brand-dark); }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="number"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .required::after {
      content: " *";
      color: red;
    }

    button {
      margin-top: 25px;
      background-color: orange;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: darkorange;
    }

    small {
      display: block;
      margin-top: 5px;
      color: #666;
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
        <li><a href="contact uss.php"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
        <li>
          <div class="dropdown">
            <button class="dropbtn"><i class="fa-solid fa-user"></i> Profile <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
              <a href="user-profile.php">View Personal Details</a>
              <a href="user.notifications.php">Notifications</a>
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
      <h2>Child Related Cyber Incident Reporting</h2>
    </div>
  </section>
  <section style="padding: 40px 20px; max-width: 900px; margin: auto;">
  <h2 style="text-align: center; margin-bottom: 30px; border-bottom: 2px solid black; display: inline-block;">Child Related Cyber Incident Reporting Form</h2>
  <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";

// Step 1: Connect to MySQL
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Create database if it doesn't exist
$createDatabase = "CREATE DATABASE IF NOT EXISTS Child_reports";
if (!mysqli_query($conn, $createDatabase)) {
  die("Database creation failed: " . mysqli_error($conn));
}

// Step 3: Select the database
mysqli_select_db($conn, "Child_reports");

// Step 4: Create table with all fields
$createTable = "CREATE TABLE IF NOT EXISTS child_incident_reports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reporter_name VARCHAR(100),
  reporter_address VARCHAR(255),
  reporter_email VARCHAR(100),
  reporter_phone VARCHAR(100),
  victim_name VARCHAR(100),
  victim_nickname VARCHAR(100),
  victim_age INT,
  victim_location VARCHAR(255),
  victim_relationship VARCHAR(255),
  victim_vulnerability TEXT,
  victim_language VARCHAR(100),
  platform VARCHAR(100),
  suspect_nicknames VARCHAR(100),
  suspect_gender VARCHAR(50),
  other_info TEXT,
  incident_datetime DATETIME,
  incident_place VARCHAR(255),
  incident_description TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $createTable);

// Step 5: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reporter_name = $_POST['reporter_name'];
  $reporter_address = $_POST['reporter_address'];
  $reporter_email = $_POST['reporter_email'];
  $reporter_phone = $_POST['reporter_phone'];
  $victim_name = $_POST['victim_name'];
  $victim_nickname = $_POST['victim_nickname'];
  $victim_age = $_POST['victim_age'];
  $victim_location = $_POST['victim_location'];
  $victim_relationship = $_POST['victim_relationship'];
  $victim_vulnerability = $_POST['victim_vulnerability'];
  $victim_language = $_POST['victim_language'];
  $platform = $_POST['platform'];
  $suspect_nicknames = $_POST['suspect_nicknames'];
  $suspect_gender = $_POST['suspect_gender'];
  $other_info = $_POST['other_info'];
  $incident_datetime = $_POST['incident_datetime'];
  $incident_place = $_POST['incident_place'];
  $incident_description = $_POST['incident_description'];

  $sql = "INSERT INTO child_incident_reports 
  (reporter_name, reporter_address, reporter_email, reporter_phone, victim_name, victim_nickname, victim_age, victim_location, victim_relationship, victim_vulnerability, victim_language, platform, suspect_nicknames, suspect_gender, other_info, incident_datetime, incident_place, incident_description)
  VALUES 
  ('$reporter_name', '$reporter_address', '$reporter_email', '$reporter_phone', '$victim_name', '$victim_nickname', '$victim_age', '$victim_location', '$victim_relationship', '$victim_vulnerability', '$victim_language', '$platform', '$suspect_nicknames', '$suspect_gender', '$other_info', '$incident_datetime', '$incident_place', '$incident_description')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Incident submitted successfully.');</script>";
  } else {
    echo "Error inserting data: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>


  
 <form class="container" method="post">

    <h1>Cyber‑Bullying & Online Harm Reporting</h1>

    <!-- ═══════════════ REPORTING PARTY ══════════════ -->
    <div class="accordion">
      <div class="accordion-header">
        <span>Reporting Party</span>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <div class="accordion-content">
        <label>Name of Reporter (optional)</label>
        <input type="text" name="reporter_name" placeholder="Anonymous" />
        <small>To submit anonymously, use: Name = Anonymous, Email = anonymous@anonymous, Phone = anonymous</small>

        <label>Address (optional)</label>
        <input type="text" name="reporter_address" />

        <label>Email (optional)</label>
        <input type="email" name="reporter_email" placeholder="anonymous@anonymous" />

        <label>Telephone (optional)</label>
        <input type="tel" name="reporter_phone" placeholder="anonymous" />
      </div>
    </div>

    <!-- ═══════════════ VICTIM DETAILS ══════════════ -->
    <div class="accordion">
      <div class="accordion-header">
        <span>Victim Details</span>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <div class="accordion-content">
        <label class="required">Name</label>
        <input type="text" name="victim_name" required />

        <label>Nickname / Other names used online (optional)</label>
        <input type="text" name="victim_nickname" />

        <label>Age (optional)</label>
        <input type="number" name="victim_age" />

        <label>Present location (optional)</label>
        <input type="text" name="victim_location" />

        <label>Relationship to reporting party (optional)</label>
        <input type="text" name="victim_relationship" />

        <label>Vulnerability of the child due to age, disability or other (expound) (optional)</label>
        <textarea name="victim_vulnerability" rows="3"></textarea>

        <label>Language (optional)</label>
        <input type="text" name="victim_language" />
      </div>
    </div>

    <!-- ═══════════════ INVOLVED PARTIES ══════════════ -->
    <div class="accordion">
      <div class="accordion-header">
        <span>Involved Parties</span>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <div class="accordion-content">
        <label class="required">Platform used</label>
        <input type="text" name="platform" required />

        <label>Name / Nicknames used by suspect (optional)</label>
        <input type="text" name="suspect_nicknames" />

        <label class="required">Gender of suspect</label>
        <select name="suspect_gender" required>
          <option value="">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Unknown">Unknown</option>
          <option value="Prefer not to say">Prefer not to say</option>
        </select>

        <label>Other relevant information (optional)</label>
        <textarea name="other_info" rows="3"></textarea>
      </div>
    </div>

    <!-- ═══════════════ INCIDENT DETAILS ══════════════ -->
    <div class="accordion">
      <div class="accordion-header">
        <span>Incident Details</span>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <div class="accordion-content">
        <label class="required">Date and Time of the incident</label>
        <input type="datetime-local" name="incident_datetime" required />

        <label class="required">Place of Incident</label>
        <input type="text" name="incident_place" required />

        <label class="required">Narrative Description (What victim(s) said / what the reporter observed / similar or past incidents involving the victim(s) or suspect)</label>
        <textarea name="incident_description" required></textarea>
      </div>
    </div>

    <!-- ═══════════════ SUBMIT ══════════════ -->
    <button type="submit" class="submit-btn">SUBMIT</button>
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
      threshold: 0.4
    });

    document.querySelectorAll('.profile-card').forEach(card => {
      observer.observe(card);
    });

     /* ─────────── Accordion Toggle Logic ─────────── */
    document.querySelectorAll('.accordion-header').forEach(header => {
      header.addEventListener('click', () => {
        const content = header.nextElementSibling;
        const icon = header.querySelector('i');

        // open / close current section
        content.classList.toggle('open');
        if (content.classList.contains('open')) {
          content.style.maxHeight = content.scrollHeight + 'px';
          icon.style.transform = 'rotate(180deg)';
        } else {
          content.style.maxHeight = null;
          icon.style.transform = 'rotate(0deg)';
        }
      });
    });

   
  </script>
</body>
</html>
