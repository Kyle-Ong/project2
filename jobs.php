<?php
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ethical Edge - Careers</title>

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="styles.css">
</head>

<body>

<input type="checkbox" id="menu-toggle">

<!-- HEADER -->
<header>
<label for="menu-toggle" class="menu-icon">☰</label>

<div class="brand">
<a href="Homepg.html">
<img src="Image/Logo.JPG">
</a>

<div class="brand-text">
<h1>ETHICAL <span>EDGE</span></h1>
<p>Integrity. Impact. Excellence.</p>
</div>
</div>
</header>

<!-- SIDE MENU -->
<div class="side-menu">
<label for="menu-toggle" class="close-btn">✕</label>

<div class="menu-links">
<a href="Homepg.html">Home Page</a>
<a href="jobapplication.html">Job Application</a>
<a href="jobs.html" class="active">Job Description</a>
<a href="About.html">About</a>
</div>

<div class="menu-footer">
<img src="Image/Logo.JPG">
<h2>ETHICAL <span>EDGE</span></h2>
</div>
</div>

<label for="menu-toggle" class="overlay"></label>

<!-- HERO -->
<section class="hero">
<h1>Join Our Team</h1>
<p>We are strengthening our product and design team through passionate tech talent.</p>

<div class="buttons">
<a href="#">All</a>
<a href="#">Design</a>
<a href="#">Development</a>
<a href="#">Support</a>
</div>
</section>

<!-- JOB SECTION -->
<section class="jobs">

<?php

$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

echo '<div class="row">';

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<h3><?php echo $row['title']; ?>
<span>[<?php echo $row['job_reference']; ?>]</span></h3>

<p class="meta"><?php echo $row['meta']; ?></p>

<p class="desc"><?php echo $row['description']; ?></p>

<h4>Responsibilities</h4>

<ul>

<?php
$responsibilities = explode("|", $row['responsibilities']);

foreach($responsibilities as $item)
{
    echo "<li>$item</li>";
}
?>

</ul>

<h4>Key Skills</h4>

<div class="skills">

<?php
$skills = explode("|", $row['skills']);

foreach($skills as $skill)
{
    echo "<span>$skill</span>";
}
?>

</div>

<p class="deadline">
Deadline: <?php echo $row['deadline']; ?>
</p>

<a href="jobapplication.html" class="apply-btn">
Apply Now
</a>

</div>

<?php
}

echo '</div>';
?>

</section>
<!-- WHY SECTION -->
<section class="why">
<h2>Why Join Ethical Edge?</h2>

<div class="stats">
<div><h3>50+</h3><p>Projects</p></div>
<div><h3>20+</h3><p>Team Members</p></div>
<div><h3>5★</h3><p>Work Culture</p></div>
</div>

<div class="why-grid">
<div><h4>🚀 Fast Growth</h4><p>Be part of a rapidly growing startup.</p></div>
<div><h4>🎨 Design Culture</h4><p>Strong focus on UI/UX innovation.</p></div>
<div><h4>📈 Career Growth</h4><p>Continuous learning and development.</p></div>
<div><h4>🌍 Flexible Work</h4><p>Remote-friendly environment.</p></div>
</div>
</section>

<footer>
© 2026 Ethical Edge. All rights reserved.
</footer>

</body>
</html>