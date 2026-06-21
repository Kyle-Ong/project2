<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('conn.php');

$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$sql_db;charset=$charset";

try {
     $pdo = new PDO($dsn, $user, $pwd);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     die("connection fail" . $e->getMessage());
}

$contributions = [];
if (isset($pdo)) {
    try {
        $stmt = $pdo->query('SELECT student_id, project_1_tasks, project_2_tasks FROM member_contributions');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contributions[$row['student_id']] = $row;
        }
    } catch (\PDOException $e) {
        die("read fail" . $e->getMessage());
    }
}
function getMemberTask($id, $project, $contributions) {
    if (isset($contributions[$id][$project])) {
        return htmlspecialchars($contributions[$id][$project]);
    }
    return 'no record';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ethical Edge | Job Application</title>

        <meta charset="utf-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="Styles/main.css?v=<?php echo time(); ?>">

</head>
<body class="apply-view">

<?php 

include_once 'header.inc'; 
?>

<main id="apply-page-wrapper">
  <section>
    <h2>Job Application Form</h2>

    <p><strong>*</strong> Fields marked with an asterisk are mandatory.</p>

    <form method="post" action="process_eoi.php" novalidate>

      <div>
        <label for="jobRef">Job Reference Number *</label>
        <select id="jobRef" name="jobRef" required>
          <option value="">Select Job Reference</option>
          <option value="EE101">Frontend Developer (FE101)</option>
          <option value="EE104">UI Developer (FE104)</option>
          <option value="EE102">UI/UX Designer (UX102)</option>
          <option value="EE103">Product Designer (UX103)</option>
          <option value="EE105">IT Support Specialist (IT105)</option>
        </select>
      </div>

      <div>
        <label for="fname">First Name *</label>
        <input type="text" id="fname" name="fname" maxlength="20" required>
      </div>

      <div>
        <label for="lname">Last Name *</label>
        <input type="text" id="lname" name="lname" maxlength="20" required>
      </div>

      <div>
        <label for="dob">Date of Birth *</label>  
        <input type="date" id="dob" name="dob" min="1900-01-01" max="2008-04-22" required onfocus="this.showPicker()">
      </div>

      <fieldset>
        <legend>Gender *</legend>
        <div class="radio-group">
          <label><input type="radio" name="gender" value="male" required> Male</label>
          <label><input type="radio" name="gender" value="female"> Female</label>
          <label><input type="radio" name="gender" value="other"> Other</label>
        </div>
      </fieldset>

      <div>
        <label for="street">Street Address *</label>
        <input type="text" id="street" name="street" maxlength="40" required>
      </div>

      <div>
        <label for="suburb">Suburb/Town *</label>
        <input type="text" id="suburb" name="suburb" maxlength="40" required>
      </div>

      <div>
        <label>State*</label>
<select name="state" required>

  <option value="">Select State</option>
  <option value="VIC">VIC</option>
  <option value="NSW">NSW</option>
  <option value="QLD">QLD</option>
  <option value="NT">NT</option>
  <option value="WA">WA</option>
  <option value="SA">SA</option>
  <option value="TAS">TAS</option>
  <option value="ACT">ACT</option>
</select>
      </div>

      <div>
        <label for="postcode">Postcode *</label>
        <input type="text" id="postcode" name="postcode" pattern="\d{4}" required>
      </div>

      <div>
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div>
        <label for="phone">Phone Number *</label>
        <input type="tel" id="phone" name="phone" pattern="\d{8,12}" required>
      </div>

      <fieldset>
        <legend>Educational Background *</legend>

        <div>
          <label for="qualification">Highest Qualification *</label>
          <select id="qualification" name="qualification" required>
            <option value="">Select Qualification</option>
            <option value="Secondary School">Secondary School</option>
            <option value="Certificate">Certificate</option>
            <option value="Diploma">Diploma</option>
            <option value="Bachelor Degree">Bachelor Degree</option>
            <option value="Master Degree">Master Degree</option>
            <option value="PhD">PhD</option>
          </select>
        </div>

        <div>
          <label for="field">Field of Study *</label>
          <input type="text" id="field" name="field" required>
        </div>

        <div>
          <label for="institution">Institution *</label>
          <input type="text" id="institution" name="institution" required>
        </div>

        <div>
          <label for="year">Year of Completion *</label>
          <input type="number" id="year" name="year" min="1900" max="2026" required>
        </div>
      </fieldset>

      <fieldset>
        <legend>Skill List *</legend>
        <div class="checkbox-group">
          <label><input type="checkbox" name="skills[]" value="HTML" required> HTML</label>
          <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
          <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
          <label><input type="checkbox" name="skills[]" value="React"> React</label>
          <label><input type="checkbox" name="skills[]" value="UIUX"> UI/UX Design</label>
          <label><input type="checkbox" name="skills[]" value="Git"> Git & Version Control</label>
          <label><input type="checkbox" name="skills[]" value="ProblemSolving"> Problem Solving</label>
          <label><input type="checkbox" name="skills[]" value="Other"> Other skills…</label>
        </div>
      </fieldset>

      <div>
        <label for="otherskills">Other Skills *</label>
        <textarea id="otherskills" name="otherskills" rows="4" required></textarea>
      </div>

      <button type="submit">Apply Now</button>

    </form>
  </section>
</main>

<?php 
// Links directly to your layout footer component: 'footer.inc'
include_once 'footer.inc'; 
?>

</body>
</html>
