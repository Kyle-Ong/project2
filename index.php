<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ethical Edge | Home</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="Styles/main.css?v=<?php echo time(); ?>">

</head>
<body class="homepage-view">

<?php 
include_once 'header.inc'; 
?>

<main id="homepage-unique-wrapper">

  <section class="hero">
    <div class="hero-left">
      <h4>BUILD WITH PURPOSE</h4>
      <h1>
        SHAPE A BETTER <br>
        <span>TOMORROW</span>
      </h1>
      <p>At Ethical Edge, we empower innovators to create solutions that drive real impact.</p>
      <div class="top-cta">
        <a href="jobs.php" class="cta-btn">→ Explore Career Opportunities with us</a>
      </div>
    </div>
  </section>

  <section class="why-section">
    <h2>WHY ETHICAL EDGE?</h2>
    <div class="why-grid">
      <div class="why-card">
        <div class="icon">👥</div>
        <h3>People First</h3>
        <p>We value people, ideas and collaboration.</p>
      </div>
      <div class="why-card">
        <div class="icon">🚀</div>
        <h3>Innovate Boldly</h3>
        <p>Solve meaningful problems with cutting-edge technology.</p>
      </div>
      <div class="why-card">
        <div class="icon">🛡️</div>
        <h3>Operate with Integrity</h3>
        <p>We uphold transparency, trust and accountability.</p>
      </div>
      <div class="why-card">
        <div class="icon">🏆</div>
        <h3>Excellence Always</h3>
        <p>We strive for quality in everything we do.</p>
      </div>
    </div>
  </section>

  <div class="apply-cta">
    <a href="jobapplication.php" class="cta-btn">→ Apply and Join Our Team</a>
  </div>

  <section class="skills-section">
    <div class="skills-container">
      <div class="skills-left">
        <h2>Our Strength</h2>
        <p>We are a startup focused on strengthening our product and design team...</p>
        <p>From frontend innovation to secure backend systems...</p>
      </div>
      <div class="skills-right">
        <div class="skill">
          <span>Frontend Development</span>
          <div class="bar"><div class="fill" style="width:90%">90%</div></div>
        </div>
        <div class="skill">
          <span>UI/UX Design</span>
          <div class="bar"><div class="fill" style="width:85%">85%</div></div>
        </div>
        <div class="skill">
          <span>Product Design</span>
          <div class="bar"><div class="fill" style="width:80%">80%</div></div>
        </div>
        <div class="skill">
          <span>UI Development</span>
          <div class="bar"><div class="fill" style="width:75%">75%</div></div>
        </div>
        <div class="skill">
          <span>Specialized IT Support</span>
          <div class="bar"><div class="fill" style="width:70%">70%</div></div>
        </div>
      </div>
    </div>
  </section>

  <div class="bottom-cta" style="text-align: center; margin-bottom: 40px;">
    <a href="about.php" class="cta-btn">→ Explore More About Us</a>
  </div>

  <section class="contact-section" id="Location">
    <div class="contact-container">
      <div class="contact-info">
        <h2>Contact Information</h2>
        <p><strong>Ethical Edge</strong></p>
        <p>1st Floor, Block E, Level 2,</p>
        <p>📍 Bandar Utama, No.2,</p>
        <p>50480 Petaling Jaya, Selangor, Malaysia</p>
        <p>🕒 Mon - Fri: 9:00 AM - 6:00 PM</p>
        <p>📞 014-764 7910</p>
        <p>✉ info@ethicaledge.com</p>
      </div>
      <div class="map-box">
        <iframe src="https://www.google.com/maps?q=Petaling+Jaya&output=embed"></iframe>
      </div>
    </div>
  </section>

  <section class="connect-section">
    <h2>Connect With Us</h2>
    <div class="connect-buttons">
      <a href="https://www.facebook.com/share/18nWDdgKT2/" target="_blank" class="contact-item">🌐 Follow us on Facebook</a>
      <a href="mailto:ethicaledge@gmail.com" class="contact-item">✉ Email Us</a>
      <a href="tel:+60147647910" class="contact-item">📞 Call Us</a>
      <a href="https://wa.me/60147647910" target="_blank" class="contact-item">💬 WhatsApp</a>
    </div>
  </section>

</main>

<?php 
include_once 'footer.inc'; 
?>

</body>
</html>
