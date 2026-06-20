<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Ethical Edge | Job Application</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="main.css">

  <style>
    /* ===== BODY SCOPE OVERRIDE ===== */
    body.apply-view {
      font-family: 'Orbitron', sans-serif !important;
      color: white;
      overflow-x: hidden;
      background: #020617 !important;
    }

    /* ===== NAV BAR COLOR SAFETY (ISOLATED OVERRIDES) ===== */
    header .brand-text h1 {
      color: white !important;
    }
    header .brand-text h1 span {
      color: #D4AF37 !important;
    }
    .side-menu .menu-footer h2 {
      color: #ffffff !important;
    }
    .side-menu .menu-footer h2 span {
      color: #D4AF37 !important;
    }

    /* ===== MAIN ISOLATION CONTAINER ===== */
    #apply-page-wrapper {
      width: 100%;
      min-height: 100vh;
      margin: 0;
      box-sizing: border-box;
    }

    /* ===== SECTION ===== */
    #apply-page-wrapper section {
      width: 100%;
      min-height: 100vh;
      background:
        radial-gradient(circle at 20% 40%, rgba(212,175,55,0.15), transparent 40%),
        linear-gradient(135deg, #020617, #0f172a);
      padding: 120px 80px 80px;
      box-sizing: border-box;
    }

    /* ===== TITLE ===== */
    #apply-page-wrapper section h2 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 32px;
      color: #D4AF37;
      font-family: 'Orbitron', sans-serif;
    }

    #apply-page-wrapper section p {
      color: #CBD5E1;
      font-size: 14px;
      margin-bottom: 30px;
    }

    #apply-page-wrapper #Lname {
      color: #D4AF37;
      margin: 5px 0 15px 0;
    }

    /* ===== FORM LAYOUT ===== */
    #apply-page-wrapper form {
      display: flex !important;
      flex-direction: column !important;
      gap: 22px !important;
      max-width: 800px;
      margin: 0 auto;
      text-align: left;
    }

    /* ===== LABELS & LEGENDS ===== */
    #apply-page-wrapper label,
    #apply-page-wrapper legend {
      color: #D4AF37;
      font-size: 14px;
      font-weight: 600;
      display: block;
    }

    /* ===== INPUT FIELDS (DARK GREY INTEGRATION) ===== */
    #apply-page-wrapper input[type="text"],
    #apply-page-wrapper input[type="email"],
    #apply-page-wrapper input[type="tel"],
    #apply-page-wrapper input[type="number"],
    #apply-page-wrapper input[type="date"],
    #apply-page-wrapper select,
    #apply-page-wrapper textarea {
      width: 100%;
      background-color: #9ca3af !important;     /* DARK GREY */
      color: #020617 !important;
      border: 1px solid #6b7280 !important;
      border-radius: 6px !important;
      padding: 12px 14px !important;
      font-size: 14px !important;
      font-family: Arial, sans-serif; /* Cleaner readability inside form entries */
      box-sizing: border-box;
    }

    #apply-page-wrapper select {
      font-family: 'Orbitron', sans-serif;
    }

    /* Focus States */
    #apply-page-wrapper input:focus,
    #apply-page-wrapper select:focus,
    #apply-page-wrapper textarea:focus {
      outline: 2px solid #D4AF37 !important;
      background-color: #d1d5db !important;
    }

    /* ===== FIELDSETS ===== */
    #apply-page-wrapper fieldset {
      border: 1px solid #D4AF37 !important;
      padding: 25px !important;
      border-radius: 8px !important;
      display: flex !important;
      flex-direction: column !important;
      gap: 15px !important;
      background: rgba(15, 23, 42, 0.2);
    }

    /* Inline row container styles for fieldset checkbox blocks */
    #apply-page-wrapper .checkbox-group,
    #apply-page-wrapper .radio-group {
      display: flex !important;
      flex-direction: row !important;
      flex-wrap: wrap !important;
      gap: 20px !important;
      margin-top: 5px;
    }

    #apply-page-wrapper .checkbox-group label,
    #apply-page-wrapper .radio-group label {
      color: #CBD5E1 !important;
      font-weight: 400;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    #apply-page-wrapper input[type="checkbox"],
    #apply-page-wrapper input[type="radio"] {
      accent-color: #D4AF37;
      width: 18px;
      height: 18px;
    }

    /* ===== SUBMIT BUTTON ===== */
    #apply-page-wrapper button[type="submit"] {
      margin-top: 30px;
      width: 220px;
      padding: 14px;
      background-color: #D4AF37 !important;
      color: #020617 !important;
      border: none !important;
      border-radius: 8px !important;
      font-weight: bold !important;
      font-family: 'Orbitron', sans-serif;
      font-size: 16px;
      cursor: pointer;
      align-self: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }

    #apply-page-wrapper button[type="submit"]:hover {
      transform: scale(1.05) !important;
      box-shadow: 0 0 20px rgba(212, 175, 55, 0.7) !important;
    }

    /* ===== RESPONSIVE BREAKPOINTS ===== */
    @media (max-width: 768px) {
      #apply-page-wrapper section {
        padding: 110px 20px 60px;
      }

      #apply-page-wrapper section h2 {
        font-size: 26px;
      }

      #apply-page-wrapper button[type="submit"] {
        width: 100%;
      }
      
      #apply-page-wrapper fieldset {
        padding: 15px !important;
      }
    }
  </style>
</head>
<body class="apply-view">

<?php 
// Links directly to your template components inside the root directory
include_once 'header.inc'; 
?>

<main id="apply-page-wrapper">
  <section>
    <h2>Job Application Form</h2>

    <p><strong>*</strong> Fields marked with an asterisk are mandatory.</p>

    <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php">

      <div>
        <label for="jobRef">Job Reference Number *</label>
        <select id="jobRef" name="jobRef" required>
          <option value="">Select Job Reference</option>
          <option value="FE101">Frontend Developer (FE101)</option>
          <option value="FE104">UI Developer (FE104)</option>
          <option value="UX102">UI/UX Designer (UX102)</option>
          <option value="UX103">Product Designer (UX103)</option>
          <option value="IT105">IT Support Specialist (IT105)</option>
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
        <p id="Lname">Applicants must be at least <strong>18 years old</strong> to apply.</p>
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
        <label for="state">State/Territory *</label>
        <select id="state" name="state" required>
          <option value="">Select State</option>
          <option value="Johor">Johor</option>
          <option value="Kedah">Kedah</option>
          <option value="Kelantan">Kelantan</option>
          <option value="Melaka">Melaka</option>
          <option value="Negeri Sembilan">Negeri Sembilan</option>
          <option value="Pahang">Pahang</option>
          <option value="Penang">Penang</option>
          <option value="Perak">Perak</option>
          <option value="Perlis">Perlis</option>
          <option value="Sabah">Sabah</option>
          <option value="Sarawak">Sarawak</option>
          <option value="Selangor">Selangor</option>
          <option value="Terengganu">Terengganu</option>
          <option value="Kuala Lumpur">Kuala Lumpur</option>
          <option value="Putrajaya">Putrajaya</option>
          <option value="Labuan">Labuan</option>
        </select>
      </div>

      <div>
        <label for="postcode">Postcode *</label>
        <input type="text" id="postcode" name="postcode" pattern="\d{5}" required>
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