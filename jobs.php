<?php
// Inline database configuration to bypass external settings.php file dependencies
$host    = "localhost";
$user    = "root";
$pwd     = ""; // Default XAMPP password is empty
$sql_db = "ethical_edge_db"; 

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
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Core Team Stylesheet -->
  <link rel="stylesheet" href="main.css">

  <!-- ==================================================== -->
  <!-- INTEGRATED JOB DESCRIPTIONS PAGE STYLES              -->
  <!-- ==================================================== -->
  <style>
    /* ===== BODY SCOPE OVERRIDE ===== */
    body.jobs-view {
      font-family: 'Orbitron', sans-serif !important; /* Changed from Poppins to match index.php */
      color: white;
      overflow-x: hidden;
      background: #020617 !important;
    }

    /* ===== MAIN ISOLATION CONTAINER ===== */
    #jobs-page-wrapper {
      width: 100%;
      min-height: 100vh;
      box-sizing: border-box;
    }

    /* ===== HERO SECTION ===== */
    #jobs-page-wrapper .hero {
      background: 
        radial-gradient(circle at 50% 50%, rgba(212,175,55,0.1), transparent 60%),
        linear-gradient(135deg, #020617, #0f172a) !important;
      padding: 140px 20px 60px !important;
      text-align: center !important;
      border-bottom: 1px solid rgba(212,175,55,0.1);
    }

    #jobs-page-wrapper .hero h1 {
      font-size: 48px;
      color: #D4AF37;
      margin-bottom: 15px;
      letter-spacing: 1px;
    }

    #jobs-page-wrapper .hero p {
      color: #94a3b8;
      max-width: 600px;
      margin: 0 auto 30px auto;
      font-size: 14px;
      line-height: 1.6;
    }

    /* Filter Buttons Container */
    #jobs-page-wrapper .buttons {
      display: flex !important;
      justify-content: center !important;
      gap: 15px !important;
      flex-wrap: wrap !important;
    }

    #jobs-page-wrapper .buttons a {
      text-decoration: none;
      color: white;
      border: 1px solid rgba(212,175,55,0.4);
      padding: 10px 24px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
      background: rgba(255,255,255,0.02);
      transition: all 0.3s ease;
    }

    #jobs-page-wrapper .buttons a:hover {
      background: rgba(212,175,55,0.15);
      border-color: #D4AF37;
      transform: translateY(-2px);
    }

    /* ===== DYNAMIC JOBS LISTING SECTION ===== */
    #jobs-page-wrapper .jobs {
      padding: 80px 60px;
      max-width: 1300px;
      margin: 0 auto;
    }

    #jobs-page-wrapper .row {
      display: grid !important;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)) !important;
      gap: 40px !important;
      width: 100% !important;
    }

    /* Individual Card Layout */
    #jobs-page-wrapper .card {
      background: rgba(15, 23, 42, 0.4) !important;
      border: 1px solid rgba(212,175,55,0.15) !important;
      border-radius: 16px !important;
      padding: 35px !important;
      display: flex !important;
      flex-direction: column !important;
      justify-content: space-between !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }

    #jobs-page-wrapper .card:hover {
      transform: translateY(-5px);
      border-color: rgba(212,175,55,0.4);
      box-shadow: 0 15px 40px rgba(212,175,55,0.08);
    }

    #jobs-page-wrapper .card h3 {
      font-size: 22px;
      color: white;
      margin-top: 0;
      margin-bottom: 8px;
      line-height: 1.3;
    }

    #jobs-page-wrapper .card h3 span {
      color: #D4AF37;
      font-size: 14px;
      display: block;
      margin-top: 4px;
      letter-spacing: 0.5px;
    }

    #jobs-page-wrapper .card .meta {
      font-size: 12px;
      color: #64748b;
      font-weight: 500;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    #jobs-page-wrapper .card .desc {
      color: #cbd5e1;
      font-size: 13px;
      line-height: 1.6;
      margin-bottom: 25px;
    }

    #jobs-page-wrapper .card h4 {
      color: #D4AF37;
      font-size: 14px;
      text-transform: uppercase;
      margin-top: 0;
      margin-bottom: 12px;
      letter-spacing: 0.5px;
    }

    /* Responsibilities Lists */
    #jobs-page-wrapper .card ul {
      padding-left: 20px;
      margin-top: 0;
      margin-bottom: 25px;
    }

    #jobs-page-wrapper .card ul li {
      color: #cbd5e1;
      font-size: 13px;
      line-height: 1.5;
      margin-bottom: 8px;
    }

    /* Dynamic Tag Badge Groups */
    #jobs-page-wrapper .skills {
      display: flex !important;
      flex-wrap: wrap !important;
      gap: 8px !important;
      margin-bottom: 30px !important;
    }

    #jobs-page-wrapper .skills span {
      background: rgba(212,175,55,0.1);
      border: 1px solid rgba(212,175,55,0.25);
      color: #D4AF37;
      padding: 5px 12px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 500;
    }

    #jobs-page-wrapper .card .deadline {
      font-size: 12px;
      color: #94a3b8;
      margin-bottom: 25px;
      border-top: 1px solid rgba(255,255,255,0.05);
      padding-top: 15px;
    }

    /* Action Buttons Inside Cards */
    #jobs-page-wrapper .apply-btn {
      display: block !important;
      text-align: center !important;
      text-decoration: none;
      background: #D4AF37;
      color: #020617;
      font-weight: 700;
      padding: 12px 0;
      border-radius: 8px;
      font-size: 14px;
      letter-spacing: 0.5px;
      transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
    }

    #jobs-page-wrapper .apply-btn:hover {
      background: #f5d76e;
      transform: scale(1.02);
      box-shadow: 0 0 15px rgba(212,175,55,0.4);
    }

    /* ===== WHY JOIN SECTION ===== */
    #jobs-page-wrapper .why {
      background: rgba(255,255,255,0.01);
      border-top: 1px solid rgba(255,255,255,0.05);
      padding: 80px 60px;
      text-align: center;
    }

    #jobs-page-wrapper .why h2 {
      color: #D4AF37;
      font-size: 32px;
      margin-bottom: 50px;
    }

    /* Stats Counter Rows */
    #jobs-page-wrapper .stats {
      display: flex !important;
      justify-content: center !important;
      gap: 80px !important;
      margin-bottom: 60px !important;
      flex-wrap: wrap !important;
    }

    #jobs-page-wrapper .stats h3 {
      font-size: 42px;
      color: white;
      margin: 0 0 5px 0;
    }

    #jobs-page-wrapper .stats p {
      color: #94a3b8;
      margin: 0;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Strategic Benefits Grid Matrix */
    #jobs-page-wrapper .why-grid {
      display: grid !important;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)) !important;
      gap: 30px !important;
      max-width: 1100px;
      margin: 0 auto;
    }

    #jobs-page-wrapper .why-grid div {
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.05);
      padding: 25px;
      border-radius: 12px;
      text-align: left;
    }

    #jobs-page-wrapper .why-grid h4 {
      color: white;
      margin-top: 0;
      margin-bottom: 10px;
      font-size: 16px;
    }

    #jobs-page-wrapper .why-grid p {
      color: #94a3b8;
      margin: 0;
      font-size: 13px;
      line-height: 1.5;
    }

    /* ===== BREAKPOINTS ===== */
    @media (max-width: 768px) {
      #jobs-page-wrapper .hero h1 { font-size: 36px; }
      #jobs-page-wrapper .jobs { padding: 40px 20px; }
      #jobs-page-wrapper .row { grid-template-columns: 1fr !important; }
      #jobs-page-wrapper .why { padding: 60px 20px; }
      #jobs-page-wrapper .stats { gap: 40px !important; }
    }
  </style>
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
