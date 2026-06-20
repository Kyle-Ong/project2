<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Security Gatekeeper check
if (!isset($_SESSION['manager_user'])) {
    header("Location: login.php");
    exit();
}

require_once('settings.php');
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

$action_message = "";

// 1. Process EOI Status Changes (Aligned with 'New', 'Current', 'Final')
if (isset($_POST['update_status'])) {
    $eoi_id = intval($_POST['eoi_id']);
    $new_status = $_POST['status'] ?? 'New';
    if (!in_array($new_status, ['New', 'Current', 'Final'])) { $new_status = 'New'; }
    
    $stmt = mysqli_prepare($conn, "UPDATE eoi SET status = ? WHERE EOInumber = ?");
    mysqli_stmt_bind_param($stmt, "si", $new_status, $eoi_id);
    if (mysqli_stmt_execute($stmt)) {
        $action_message = "Status updated to '$new_status' for EOI #$eoi_id.";
    }
    mysqli_stmt_close($stmt);
}

// 2. Process Delete Loop by Job Reference Spec
if (isset($_POST['delete_jobref'])) {
    $del_ref = trim($_POST['del_job_ref']);
    if (!empty($del_ref)) {
        $stmt = mysqli_prepare($conn, "DELETE FROM eoi WHERE jobRef = ?");
        mysqli_stmt_bind_param($stmt, "s", $del_ref);
        mysqli_stmt_execute($stmt);
        $deleted_rows = mysqli_stmt_affected_rows($stmt);
        $action_message = "Purge Complete. Erased $deleted_rows record(s) matching Job Reference '$del_ref'.";
        mysqli_stmt_close($stmt);
    }
}

// 3. Dynamic Filtering Logic & Safe White-list Sorting
$search_ref  = trim($_GET['search_ref'] ?? '');
$search_name = trim($_GET['search_name'] ?? '');
$sort_field  = trim($_GET['sort_field'] ?? 'EOInumber');

$allowed_sorts = ['EOInumber', 'jobRef', 'fname', 'lname', 'date_applied', 'status'];
if (!in_array($sort_field, $allowed_sorts)) { $sort_field = 'EOInumber'; }

// Dynamic Query Joined with your teammate's jobs table!
$query = "SELECT eoi.*, jobs.title AS job_title 
          FROM eoi 
          LEFT JOIN jobs ON eoi.jobRef = jobs.job_reference 
          WHERE 1=1";

if (!empty($search_ref)) {
    $query .= " AND eoi.jobRef LIKE '%" . mysqli_real_escape_string($conn, $search_ref) . "%'";
}
if (!empty($search_name)) {
    $escaped_name = mysqli_real_escape_string($conn, $search_name);
    $query .= " AND (eoi.fname LIKE '%$escaped_name%' OR eoi.lname LIKE '%$escaped_name%')";
}

$query .= " ORDER BY eoi.$sort_field ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HR Management Dashboard - Ethical Edge</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="Styles/main.css?v=<?php echo time(); ?>">
  <style>

  </style>
</head>
<body class="manage-view">

<?php include_once 'header.inc'; ?>

<div class="admin-container">
    <div class="top-bar">
        <div>
            <h1 class="section-title">Manager Admin Suite</h1>
            <p style="color: #94a3b8; margin: 0;">Session Key: <strong><?php echo htmlspecialchars($_SESSION['manager_user']); ?></strong></p>
        </div>
        <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <?php if(!empty($action_message)): ?>
        <div class="status-alert"><?php echo htmlspecialchars($action_message); ?></div>
    <?php endif; ?>

    <div class="management-grid">
        <div class="panel">
            <h3 style="margin-top:0; font-family:'Orbitron';">Filter Queries</h3>
            <form method="GET" action="manage.php" class="search-form">
                <div class="form-ctrl">
                    <label>Job Ref</label>
                    <input type="text" name="search_ref" value="<?php echo htmlspecialchars($search_ref); ?>">
                </div>
                <div class="form-ctrl">
                    <label>Name</label>
                    <input type="text" name="search_name" value="<?php echo htmlspecialchars($search_name); ?>">
                </div>
                <div class="form-ctrl">
                    <label>Sort By</label>
                    <select name="sort_field">
                        <option value="EOInumber" <?php if($sort_field=='EOInumber') echo 'selected'; ?>>EOI ID</option>
                        <option value="jobRef" <?php if($sort_field=='jobRef') echo 'selected'; ?>>Job Ref</option>
                        <option value="fname" <?php if($sort_field=='fname') echo 'selected'; ?>>First Name</option>
                        <option value="lname" <?php if($sort_field=='lname') echo 'selected'; ?>>Last Name</option>
                        <option value="status" <?php if($sort_field=='status') echo 'selected'; ?>>Status</option>
                    </select>
                </div>
                <button type="submit" class="action-btn">Filter</button>
            </form>
        </div>

        <div class="panel">
            <h3 style="margin-top:0; font-family:'Orbitron'; color:#ef4444;">Purge Loop</h3>
            <form method="POST" action="manage.php" onsubmit="return confirm('Delete all items matching this job reference code?');">
                <div class="form-ctrl" style="margin-bottom:12px;">
                    <label>Target Job Reference</label>
                    <input type="text" name="del_job_ref" required placeholder="e.g. EE101">
                </div>
                <button type="submit" name="delete_jobref" class="action-btn danger" style="width:100%;">Execute Purge</button>
            </form>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Target Role Reference</th>
                    <th>Applicant Name</th>
                    <th>Contact Credentials</th>
                    <th>Status Lifecycle</th>
                    <th>Update State</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) == 0): ?>
                    <tr><td colspan="6" style="text-align:center; color:#64748b;">No system data blocks matching criteria.</td></tr>
                <?php else: ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>#<?php echo $row['EOInumber']; ?></td>
                            <td>
                                <strong><?php echo htmlspecialchars($row['jobRef']); ?></strong><br>
                                <small style="color:#d4af37;"><?php echo htmlspecialchars($row['job_title'] ?? 'Custom Listing'); ?></small>
                            </td>
                            <td><?php echo htmlspecialchars($row['fname'] . ' ' . $row['lname']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><span class="badge <?php echo strtolower($row['status']); ?>"><?php echo htmlspecialchars($row['status']); ?></span></td>
                            <td>
                                <form method="POST" action="manage.php" style="display:inline-flex; gap:4px;">
                                    <input type="hidden" name="eoi_id" value="<?php echo $row['EOInumber']; ?>">
                                    <select name="status" style="background:#000; color:white; font-size:12px; border-radius:4px;">
                                        <option value="New" <?php if($row['status']=='New') echo 'selected'; ?>>New</option>
                                        <option value="Current" <?php if($row['status']=='Current') echo 'selected'; ?>>Current</option>
                                        <option value="Final" <?php if($row['status']=='Final') echo 'selected'; ?>>Final</option>
                                    </select>
                                    <button type="submit" name="update_status" class="action-btn" style="padding:4px 8px;"><i class="fas fa-save"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'footer.inc'; ?>
</body>
</html>
<?php mysqli_close($conn); ?>