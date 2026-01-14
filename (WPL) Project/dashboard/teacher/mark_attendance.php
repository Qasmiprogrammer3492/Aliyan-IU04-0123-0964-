<?php
include("../../includes/db.php");
include("../../includes/auth_session.php");

$students = $conn->query("SELECT * FROM users WHERE role='student'");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    foreach ($_POST['attendance'] as $student_id => $status) {
        $conn->query("INSERT INTO attendance (student_id, date, status) VALUES ('$student_id', '$date', '$status')");
    }
    echo "<div class='alert alert-success'>Attendance marked for $date.</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h4>Mark Attendance</h4>
    <form method="POST">
        <div class="mb-3">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <table class="table">
            <thead><tr><th>Student</th><th>Status</th></tr></thead>
            <tbody>
                <?php while ($row = $students->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['full_name']; ?></td>
                        <td>
                            <select name="attendance[<?= $row['id']; ?>]" class="form-select">
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button class="btn btn-success">Submit Attendance</button>
        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
