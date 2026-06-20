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
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="Styles/main.css?v=<?php echo time(); ?>">
        
        <link rel="stylesheet" href="contributions.css">
        
        <title>ETHICAL EDGE - About Our Team</title>
    </head>
    <body>
    

<?php include 'header.inc';?>


<div class="About" style="padding:128px 16px" id="team">
    <h1 class="About" id="Title_about">THE TEAM</h1>
    <h2 class="About" id="Title_about">The ones who runs this company</h2>
    <img id="GroupImg" src="Image/Group.jpg" alt="GroupPhoto" title="GroupPhoto">

   <h3 id="LabelAbout">Group: 5 Group Name: Newbie Corders</h3>

<div class="list-center">
  <ul class="nested-list">
    <li>
      Day
      <ol class="nested-list">
        <li>Tuesday</li>
        <li>Wednesday</li>
      </ol>
    </li>
    <li>
      Time
      <ol>
        <li>2-4p.m.</li>
        <li>8-10a.m.</li>
      </ol>
    </li>
  </ul>
</div>
</div>

<section>
    <div class="TeamContainer">
        <div class="TeamCard">
            <img src="Image/Kyle.jpg" alt="OngLunHang" title="OngLunHang">
            <div class="TeamContent">
                <h3>Ong Lun Hang</h3>
                <p>Group Leader</p>
                <p>Taking Part of about site, giving ideas and checking.</p>

                <input type="checkbox" id="Contact1" class="ContactCheckBox">
                <label for="Contact1" class="ContactButtonLabel">Contact</label>
                <div class="ContactList">
                    <ul>
                        <li>Phone No: 017-870-7932</li>
                        <li><a href="mailto:j24041246@student.newinti.edu.my" class="contact-item">Gmail: j24041246@student.newinti.edu.my</a></li>
                    </ul>
                </div>

                <input type="checkbox" id="Info1" class="InfoCheckBox">
                <label for="Info1" class="InfoButtonLabel">📋 Info</label>
                <div class="InfoPopup">
                    <div class="InfoPopupContent">
                        <label for="Info1" class="InfoCloseBtn">✕</label>
                        <h4>📌 Personal Info</h4>
                        <ul>
                            <li><strong>🎓 Job Application: </strong> HTML/CSS, and About Site</li>
                            <li><strong>⭐ First Language: </strong> Chinese</li>
                            <li><strong>🏆 Dream Job: </strong> be a professional Gamer</li>
                            <li><strong>📍 Hometown: </strong> Kuala Lumpur</li>
                        </ul>
                        <div class="project-task">
                            <p><strong>🚀 <em>Project 1:</em></strong> <?php echo getMemberTask('j24041246', 'project_1_tasks', $contributions); ?></p>
                            <p><strong>🚀 <em>Project 2:</em></strong> <?php echo getMemberTask('j24041246', 'project_2_tasks', $contributions); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="TeamCard">
            <img src="Image/Raima.jpg" alt="Raima" title="Raima">
            <div class="TeamContent">
                <h3>Raima Mehreen Muskan</h3>
                <p>Form developer and validation</p>
                <p>Taking part of form and doing validation</p>

                <input type="checkbox" id="Contact2" class="ContactCheckBox">
                <label for="Contact2" class="ContactButtonLabel">Contact</label>
                <div class="ContactList">
                    <ul>
                        <li>Phone No: 017-523-5430</li>
                        <li><a href="mailto:j25044579@student.newinti.edu.my" class="contact-item"> Gmail: j25044579@student.newinti.edu.my</a></li>
                    </ul>
                </div>

                <input type="checkbox" id="Info2" class="InfoCheckBox">
                <label for="Info2" class="InfoButtonLabel">📋 Info</label>
                <div class="InfoPopup">
                    <div class="InfoPopupContent">
                        <label for="Info2" class="InfoCloseBtn">✕</label>
                        <h4>📌 Personal Info</h4>
                        <ul>
                            <li><strong>🎓 Job Application: </strong> Form development</li>
                            <li><strong>⭐ First Language: </strong> Bangla</li>
                            <li><strong>🏆 Dream Job: </strong> Doing well in corporate</li>
                            <li><strong>📍 Hometown: </strong> Dhaka Bangladesh</li>
                        </ul>
                        <div class="project-task">
                            <p><strong>🚀 <em>Project 1:</em></strong> <?php echo getMemberTask('j25044579', 'project_1_tasks', $contributions); ?></p>
                            <p><strong>🚀 <em>Project 2:</em></strong> <?php echo getMemberTask('j25044579', 'project_2_tasks', $contributions); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div> 
</section>
<section>  
    <div class="TeamContainer">
        <div class="TeamCard">
            <img src="Image/Arshad.jpg" alt="Arshad" title="Arshad">
            <div class="TeamContent">
                <h3>Nahian Arshad</h3>
                <p>Home page developer and CSS</p>
                <p>Taking part of Home page and the base CSS for member</p>

                <input type="checkbox" id="Contact3" class="ContactCheckBox">
                <label for="Contact3" class="ContactButtonLabel">Contact</label>
                <div class="ContactList">
                    <ul>
                        <li>Phone No: 014-764-7910</li>
                        <li><a href="mailto:j26046174@student.newinti.edu.my" class="contact-item"> Gmail: j26046174@student.newinti.edu.my</a></li>
                    </ul>
                </div>

                <input type="checkbox" id="Info3" class="InfoCheckBox">
                <label for="Info3" class="InfoButtonLabel">📋 Info</label>
                <div class="InfoPopup">
                    <div class="InfoPopupContent">
                        <label for="Info3" class="InfoCloseBtn">✕</label>
                        <h4>📌 Personal Info</h4>
                        <ul>
                            <li><strong>🎓 Job Application: </strong> Home page development and Navigation Part</li>
                            <li><strong>⭐ First Language: </strong> Bangla</li>
                            <li><strong>🏆 Dream Job: </strong> Software Engineer</li>
                            <li><strong>📍 Hometown: </strong> Bangladesh</li>
                        </ul>
                        <div class="project-task">
                            <p><strong>🚀 <em>Project 1:</em></strong> <?php echo getMemberTask('j26046174', 'project_1_tasks', $contributions); ?></p>
                            <p><strong>🚀 <em>Project 2:</em></strong> <?php echo getMemberTask('j26046174', 'project_2_tasks', $contributions); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="TeamCard">
            <img src="Image/Tanvir.jpg" alt="Tanvir" title="Tanvir">
            <div class="TeamContent">
                <h3>Md Yeasin Tanvir</h3>
                <p>HTML developer and Designer Assistance</p>
                <p>Taking part of Job Description and giving idea for CSS design</p>

                <input type="checkbox" id="Contact4" class="ContactCheckBox">
                <label for="Contact4" class="ContactButtonLabel">Contact</label>
                <div class="ContactList">
                    <ul>
                        <li>Phone No: 011-162-6418</li>
                        <li><a href="mailto:j25045535@student.newinti.edu.my" class="contact-item"> Gmail: j25045535@student.newinti.edu.my</a></li>
                    </ul>
                </div>

                <input type="checkbox" id="Info4" class="InfoCheckBox">
                <label for="Info4" class="InfoButtonLabel">📋 Info</label>
                <div class="InfoPopup">
                    <div class="InfoPopupContent">
                        <label for="Info4" class="InfoCloseBtn">✕</label>
                        <h4>📌 Personal Info</h4>
                        <ul>
                            <li><strong>🎓 Job Application: </strong> Designer Assistance</li>
                            <li><strong>⭐ First Language: </strong> Bangla</li>
                            <li><strong>🏆 Dream Job: </strong> Software Engineer</li>
                            <li><strong>📍 Hometown: </strong> Bangladesh</li>
                        </ul>
                        <div class="project-task">
                            <p><strong>🚀 <em>Project 1:</em></strong> <?php echo getMemberTask('j25045535', 'project_1_tasks', $contributions); ?></p>
                            <p><strong>🚀 <em>Project 2:</em></strong> <?php echo getMemberTask('j25045535', 'project_2_tasks', $contributions); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

<?php include 'footer.inc';?>

    </body>
</html>