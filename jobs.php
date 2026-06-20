<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inline database configuration to bypass external settings.php file dependencies
$host   = "localhost";
$user   = "root";
$pwd    = ""; // Default XAMPP password is empty
$sql_db = "Newbie_db"; 

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ethical Edge - Careers</title>

  <!-- External Typography & Icon Frameworks -->
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Core Team Stylesheet -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap">

  <link rel="stylesheet" href="Styles/main.css?v=<?php echo time(); ?>">

  
</head>
<body class="jobs-view">

<?php 
// Links directly to your template header
include_once 'header.inc'; 
?>

<!-- ================= ISOLATED CAREERS PAGE WRAPPER ================= -->
<main id="jobs-page-wrapper">

  <!-- HERO PANEL -->
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

  <!-- DYNAMIC JOB MATRIX ENGINE -->
  <section class="jobs">
    <?php
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($conn, $query);

    echo '<div class="row">';

    while($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="card">
        <div>
          <h3><?php echo htmlspecialchars($row['title']); ?>
            <span>[<?php echo htmlspecialchars($row['job_reference']); ?>]</span>
          </h3>

          <p class="meta"><?php echo htmlspecialchars($row['meta']); ?></p>
          <p class="desc"><?php echo htmlspecialchars($row['description']); ?></p>

          <h4>Responsibilities</h4>
          <ul>
            <?php
            // Converts string data strings split by pipes into an iterative array loop structure
            $responsibilities = explode("|", $row['responsibilities']);
            foreach($responsibilities as $item) {
                if(!empty(trim($item))) {
                    echo "<li>" . htmlspecialchars(trim($item)) . "</li>";
                }
            }
            ?>
          </ul>
        </div>

        <div>
          <h4>Key Skills</h4>
          <div class="skills">
            <?php
            $skills = explode("|", $row['skills']);
            foreach($skills as $skill) {
                if(!empty(trim($skill))) {
                    echo "<span>" . htmlspecialchars(trim($skill)) . "</span>";
                }
            }
            ?>
          </div>

          <p class="deadline">
            <strong>Deadline:</strong> <?php echo htmlspecialchars($row['deadline']); ?>
          </p>

          <!-- Links cleanly to your newly established job application page -->
          <a href="jobapplication.php" class="apply-btn">Apply Now</a>
        </div>
      </div>
    <?php
    }

    echo '</div>';
    ?>
  </section>

  <!-- STRATEGIC CORE VALUE HIGHLIGHTS SECTION -->
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

</main>

<?php 
// Links directly to your layout footer component
include_once 'footer.inc'; 
?>

</body>
</html>
<?php
mysqli_close($conn);
?>