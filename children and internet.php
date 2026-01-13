<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Children and the Internet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

    nav ul li a {
      text-decoration: none;
      color: black;
    }

    nav ul li a:hover {
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
      z-index: 9999;
    }

    .dropdown-content a {
      color: var(--text-color);
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      z-index:  9999;
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
      header {
     background: linear-gradient(to right, #00bcd4, #009688);
  color: white;
  padding: 30px;
  text-align: center;
  font-size: 1.8em;
  position: sticky;
  top: 0;
  z-index: 1; /* Lower than dropdown */
    }

     .section {
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      background: var(--card-bg);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .collapsible {
      background-color: #00796b;
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      text-align: left;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      margin-top: 10px;
    }

    .content {
      display: none;
      padding: 15px;
      background-color: var(--bg-color);
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .button {
      background-color: #4caf50;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
    }

    .quiz {
      background: #e8f5e9;
      padding: 15px;
      border-radius: 10px;
      margin-top: 20px;
    }

    .quiz h3 {
      margin-top: 0;
    }

    .quiz input[type="radio"] {
      margin-right: 8px;
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
        <li><a href="contact uss.php"><i class="fa-solid fa-phone"></i> Contact Us</a></li>
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

  <header>
    👧 Welcome Kids & Teens – Let's Stay Safe Online!
  </header>

  <main class="section">
    <button class="collapsible">🔍 What is Cyberbullying?</button>
    <div class="content">
      <p>Cyberbullying is when someone is mean online. It can happen on games, texts, or social media. You're not alone—speak up!</p>
    </div>

    <button class="collapsible">😢 How it Feels</button>
    <div class="content">
      <p>It can make you feel sad, scared, or angry. Don’t hide it—talk to someone you trust.</p>
    </div>

    <button class="collapsible">🛡️ What You Can Do</button>
    <div class="content">
      <ul>
        <li>Talk to a parent or teacher</li>
        <li>Block the bully</li>
        <li>Use our <a href="child Related Cyber Incident Reporting Form.php" class="button">Report Form</a></li>
      </ul>
    </div>

    <button class="collapsible">📊 Facts and Safety Tips</button>
    <div class="content">
      <ul>
        <li>1 in 5 teens face online harassment</li>
        <li>Most bullying happens in DMs or comments</li>
        <li>Never share passwords or personal info</li>
      </ul>
    </div>
    <button class="collapsible">💬 Need Help?</button>
<div class="content">
  <p>We’re here to support you. If something online makes you uncomfortable or scared, don’t keep it to yourself. Talk to someone or use the button below to reach out to us directly.</p>
  <a href="contact uss.php" class="button">Contact Support</a>
</div>

    <div class="quiz">
      <h3>🎯 Quick Quiz: What should you do if bullied online?</h3>
      <form onsubmit="return checkQuiz()">
        <label><input type="radio" name="q1" value="a"> Ignore and stay silent</label><br>
        <label><input type="radio" name="q1" value="b"> Share your password</label><br>
        <label><input type="radio" name="q1" value="c"> Report to an adult and block the bully</label><br><br>
        <button type="submit" class="button">Submit Answer</button>
        <p id="quiz-result"></p>
      </form>
    </div>
  </main>

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
      document.body.classList.toggle('dark-mode');
    }

    document.querySelectorAll(".collapsible").forEach(btn => {
      btn.addEventListener("click", function () {
        const content = this.nextElementSibling;
        content.style.display = (content.style.display === "block") ? "none" : "block";
      });
    });

    function checkQuiz() {
      const answer = document.querySelector('input[name="q1"]:checked');
      const result = document.getElementById("quiz-result");
      if (!answer) {
        result.textContent = "Please select an answer!";
        return false;
      }
      if (answer.value === "c") {
        result.textContent = "✅ Correct! Always talk to a trusted adult and block the bully.";
      } else {
        result.textContent = "❌ Not quite. Try again!";
      }
      return false; // prevent form submission
    }
  </script>
</body>
</html>
