<input type="checkbox" id="menu-toggle">

<!-- ================= HEADER / NAVIGATION ================= -->
<header>

  <!-- Hamburger icon to open side menu -->
  <label for="menu-toggle" class="menu-icon">☰</label>

  <!-- Branding section with logo and title -->
  <div class="brand">
    <a href="index.php">
      <img src="Image/Logo.JPG" alt="Ethical Edge Logo" title="Home_page">
    </a>

    <div class="brand-text">
      <h1>ETHICAL <span>EDGE</span></h1>
      <p>Integrity. Impact. Excellence.</p>
    </div>
  </div>

</header>

<!-- ================= SIDE NAVIGATION MENU ================= -->
<div class="side-menu">

  <!-- Close button for side menu -->
  <label for="menu-toggle" class="close-btn">✕</label>

  <!-- Navigation links -->
  <div class="menu-links">
    <a href="index.php">Homepage</a>
    <a href="jobs.php">Job Description</a>
    <a href="jobapplication.php">Job Application</a>
    <a href="about.php">About</a>
    <!-- Added for Assignment Part 4 (HR portal entry point) -->
    <a href="login.php" style="border-top: 1px solid rgba(212,175,55,0.3); padding-top: 15px; margin-top: 15px;"><i class="fas fa-lock"></i> HR Manager Portal</a>
  </div>

  <!-- Footer branding inside menu -->
  <div class="menu-footer">
    <img src="Image/Logo.JPG" alt="Logo">
    <h2>ETHICAL <span>EDGE</span></h2>
  </div>

</div>

<!-- Overlay to close menu when clicking outside -->
<label for="menu-toggle" class="overlay"></label>