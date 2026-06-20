<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ethical Edge | Home</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="main.css">

  <style>
    /* ===== BODY STYLING OVERRIDE ===== */
    body.homepage-view {
      font-family: 'Orbitron', sans-serif !important;
      color: white;
      overflow-x: hidden;
      background:
        radial-gradient(circle at 20% 30%, rgba(212,175,55,0.08), transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(255,255,255,0.05), transparent 40%),
        linear-gradient(135deg, #020617, #0f172a, #020617) !important;
    }

    /* Enables smooth scrolling for anchor links */
    html {
      scroll-behavior: smooth;
    }

    /* ===== HERO SECTION ===== */
    #homepage-unique-wrapper .hero {
      min-height: 100vh !important;
      padding: 120px 60px !important;
      display: flex !important;
      align-items: center !important;
      text-align: left !important;
      background:
        linear-gradient(
          to right,
          rgba(2,6,23,0.9) 15%,
          rgba(2,6,23,0.75) 45%,
          rgba(2,6,23,0.4) 75%,
          rgba(2,6,23,0.2) 100%
        ),
        url("Image/hero-image.png") center/cover no-repeat !important;
    }

    #homepage-unique-wrapper .hero-left {
      max-width: 800px;
      z-index: 2;
      background: rgba(15, 23, 42, 0.35);
      backdrop-filter: blur(12px);
      padding: 35px 40px;
      border-radius: 16px;
      border: 1px solid rgba(212,175,55,0.15);
      box-shadow: 0 10px 40px rgba(0,0,0,0.5);
      transition: 0.3s ease;
    }

    #homepage-unique-wrapper .hero-left:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 50px rgba(0,0,0,0.6);
    }

    #homepage-unique-wrapper .hero-left h4 {
      color: #D4AF37;
      letter-spacing: 2px;
      margin-bottom: 10px;
      font-size: 14px;
    }

    #homepage-unique-wrapper .hero-left h1 {
      font-size: 68px;
      line-height: 1.1;
      margin-bottom: 15px;
    }

    #homepage-unique-wrapper .hero-left span {
      color: #D4AF37;
    }

    #homepage-unique-wrapper .hero-left p {
      margin-top: 15px;
      color: #CBD5E1;
      line-height: 1.7;
      font-size: 16px;
      max-width: 600px;
    }

    /* ===== BUTTON STYLING ===== */
    #homepage-unique-wrapper .cta-btn {
      display: inline-block;
      padding: 14px 36px;
      border-radius: 12px;
      background: linear-gradient(90deg, #D4AF37, #F5D76E);
      color: #020617;
      text-decoration: none;
      font-weight: 600;
      letter-spacing: 1px;
      transition: 0.3s ease;
    }

    #homepage-unique-wrapper .cta-btn:hover {
      transform: scale(1.08);
      box-shadow: 0 0 25px rgba(212,175,55,0.6);
    }

    #homepage-unique-wrapper .top-cta {
      margin-top: 25px;
    }

    #homepage-unique-wrapper .apply-cta {
      display: flex !important;
      justify-content: center;
      margin: 80px 0;
    }

    #homepage-unique-wrapper .apply-cta .cta-btn {
      font-size: 16px;
      padding: 18px 50px;
    }

    /* ===== WHY SECTION ===== */
    #homepage-unique-wrapper .why-section {
      padding: 100px 60px;
      text-align: center;
    }

    #homepage-unique-wrapper .why-section h2 {
      color: #D4AF37;
      margin-bottom: 50px;
    }

    #homepage-unique-wrapper .why-grid {
      display: grid !important;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)) !important;
      gap: 30px !important;
      max-width: none !important;
      margin: 0 !important;
    }

    #homepage-unique-wrapper .why-card {
      background: rgba(255,255,255,0.05) !important;
      border: 1px solid rgba(212,175,55,0.2) !important;
      padding: 30px !important;
      border-radius: 15px;
      transition: 0.3s;
    }

    #homepage-unique-wrapper .why-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 0 25px rgba(212,175,55,0.3);
    }

    #homepage-unique-wrapper .icon {
      font-size: 28px;
      margin-bottom: 15px;
      color: #D4AF37;
    }

    #homepage-unique-wrapper .why-card h3 {
      font-family: 'Orbitron', sans-serif;
      letter-spacing: 1px;
    }

    #homepage-unique-wrapper .why-card p {
      color: #CBD5E1;
      font-size: 14px;
    }

    /* ===== SKILLS SECTION ===== */
    #homepage-unique-wrapper .skills-section {
      padding: 100px 60px;
    }

    #homepage-unique-wrapper .skills-container {
      display: flex !important;
      gap: 60px;
      flex-wrap: wrap;
    }

    #homepage-unique-wrapper .skills-left,
    #homepage-unique-wrapper .skills-right {
      flex: 1;
      min-width: 300px;
    }

    #homepage-unique-wrapper .skills-left h2 {
      color: #D4AF37;
      margin-bottom: 20px;
    }

    #homepage-unique-wrapper .skills-left p {
      color: #CBD5E1;
      margin-bottom: 15px;
      line-height: 1.6;
    }

    #homepage-unique-wrapper .skill {
      margin-bottom: 25px;
    }

    #homepage-unique-wrapper .skill span {
      display: block;
      margin-bottom: 8px;
      color: #CBD5E1;
    }

    #homepage-unique-wrapper .bar {
      height: 12px;
      background: rgba(255,255,255,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    #homepage-unique-wrapper .fill {
      height: 100%;
      background: linear-gradient(90deg, #D4AF37, #F5D76E);
      border-radius: 10px;
      text-align: right;
      padding-right: 10px;
      font-size: 12px;
      color: #020617;
    }

    #homepage-unique-wrapper .skill:hover .fill {
      box-shadow: 0 0 10px rgba(212,175,55,0.6);
    }

    #homepage-unique-wrapper .bottom-cta {
      margin-top: 40px;
    }

    /* ===== CONTACT SECTION ===== */
    #homepage-unique-wrapper .contact-section {
      padding: 80px 60px;
    }

    #homepage-unique-wrapper .contact-container {
      display: flex !important;
      gap: 40px;
      flex-wrap: wrap;
      background: rgba(255,255,255,0.05);
      padding: 40px;
      border-radius: 20px;
    }

    #homepage-unique-wrapper .contact-info {
      flex: 1;
      min-width: 300px;
    }

    #homepage-unique-wrapper .contact-info h2 {
      color: #D4AF37;
      margin-bottom: 20px;
    }

    #homepage-unique-wrapper .contact-info p {
      margin: 8px 0;
      color: #CBD5E1;
    }

    #homepage-unique-wrapper .map-box {
      flex: 1;
      min-width: 300px;
    }

    #homepage-unique-wrapper .map-box iframe {
      width: 100%;
      height: 250px;
      border: none;
      border-radius: 15px;
    }

    /* ===== SOCIAL CONNECT SECTION ===== */
    #homepage-unique-wrapper .connect-section {
      text-align: center;
      padding: 40px 60px;
    }

    #homepage-unique-wrapper .connect-section h2 {
      color: #D4AF37;
      margin-bottom: 30px;
    }

    #homepage-unique-wrapper .connect-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    #homepage-unique-wrapper .contact-item {
      display: inline-block;
      padding: 12px 24px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(212, 175, 55, 0.3);
      border-radius: 10px;
      color: white;
      text-decoration: none;
      transition: 0.3s ease;
    }

    #homepage-unique-wrapper .contact-item:hover {
      background: rgba(212, 175, 55, 0.15);
      border-color: #D4AF37;
      transform: translateY(-3px);
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
      #homepage-unique-wrapper .hero {
        flex-direction: column;
        text-align: center !important;
        padding: 100px 20px !important;
      }

      #homepage-unique-wrapper .hero-left h1 {
        font-size: 40px;
      }

      #homepage-unique-wrapper .skills-container,
      #homepage-unique-wrapper .contact-container {
        flex-direction: column;
      }

      #homepage-unique-wrapper .connect-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      #homepage-unique-wrapper .contact-item {
        width: 100%;
        max-width: 300px;
      }
    }
  </style>
</head>
<body class="homepage-view">

<?php 
// Links directly to your exact file: 'header.inc'
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
// Links directly to your exact file: 'footer.inc'
include_once 'footer.inc'; 
?>

</body>
</html>