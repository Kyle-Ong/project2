<?php

// DATABASE CONNECTION

$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "newbie_db";

$conn = new mysqli($host, $user, $pwd);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create DB if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);


// BLOCK DIRECT ACCESS

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: jobapplication.php");
    exit();
}


// SANITISE FUNCTION

function clean($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


// GET DATA

$jobRef = clean($_POST['jobRef'] ?? '');
$fname = clean($_POST['fname'] ?? '');
$lname = clean($_POST['lname'] ?? '');
$dob = clean($_POST['dob'] ?? '');
$gender = clean($_POST['gender'] ?? '');
$street = clean($_POST['street'] ?? '');
$suburb = clean($_POST['suburb'] ?? '');
$state = clean($_POST['state'] ?? '');
$postcode = clean($_POST['postcode'] ?? '');
$email = clean($_POST['email'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$qualification = clean($_POST['qualification'] ?? '');
$field = clean($_POST['field'] ?? '');
$institution = clean($_POST['institution'] ?? '');
$year = clean($_POST['year'] ?? '');
$otherskills = clean($_POST['otherskills'] ?? '');

// Skills array
$skills = $_POST['skills'] ?? [];
$skills_str = implode(", ", array_map('clean', $skills));


// VALIDATION

$errors = [];

// REQUIRED
$required = [$jobRef,$fname,$lname,$dob,$gender,$street,$suburb,$state,$postcode,$email,$phone,$qualification,$field,$institution,$year,$otherskills];

foreach ($required as $fieldvalue) {
    if ($fieldvalue == "") {
        $errors[] = "All fields are required.";
        break;
    }
}

// NAME CHECK
if (!preg_match("/^[A-Za-z]{1,20}$/", $fname)) {
    $errors[] = "Invalid First Name";
}
if (!preg_match("/^[A-Za-z]{1,20}$/", $lname)) {
    $errors[] = "Invalid Last Name";
}

// DOB (18+ simple check)
if ($dob != "") {
    $birth = strtotime($dob);
    if ($birth > strtotime("-18 years")) {
        $errors[] = "Must be 18+";
    }
}

// EMAIL
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email";
}

// PHONE
if (!preg_match("/^[0-9]{8,12}$/", $phone)) {
    $errors[] = "Phone must be 8-12 digits";
}

// POSTCODE (4 digit AU)
if (!preg_match("/^[0-9]{4}$/", $postcode)) {
    $errors[] = "Postcode must be 4 digits";
}

// YEAR

$currentYear = date("Y");

if ($year < 1900 || $year > $currentYear) {
    $errors[] = "Invalid year";
}


// SKILLS
if (empty($skills)) {
    $errors[] = "Select at least one skill";
}


// ERROR DISPLAY

if (!empty($errors)) {
    echo "<h2>Form Errors</h2><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul><a href='jobapplication.php'>Go Back</a>";
    exit();
}


// CREATE TABLE

$sql = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    jobRef VARCHAR(10),
    fname VARCHAR(20),
    lname VARCHAR(20),
    dob DATE,
    gender VARCHAR(10),
    street VARCHAR(50),
    suburb VARCHAR(50),
    state VARCHAR(5),
    postcode VARCHAR(4),
    email VARCHAR(100),
    phone VARCHAR(15),
    qualification VARCHAR(50),
    field VARCHAR(50),
    institution VARCHAR(100),
    year INT,
    skills TEXT,
    otherskills TEXT,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);


// INSERT DATA

$stmt = $conn->prepare("
INSERT INTO eoi
(jobRef,fname,lname,dob,gender,street,suburb,state,postcode,email,phone,qualification,field,institution,year,skills,otherskills)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
");

$stmt->bind_param(
    "ssssssssssssissss",
    $jobRef,$fname,$lname,$dob,$gender,$street,$suburb,$state,$postcode,$email,$phone,$qualification,$field,$institution,$year,$skills_str,$otherskills
);

if ($stmt->execute()) {
    $eoi_id = $stmt->insert_id;

    echo "<h2>✅ Application Submitted!</h2>";
    echo "<p>Your EOI Number: <strong>$eoi_id</strong></p>";
    echo "<a href='jobapplication.php'>Apply Again</a>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
