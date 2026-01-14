<?php
include("../../includes/db.php");
include("../../includes/auth_session.php");

$username = $_SESSION['username'];
$get_id = $conn->query("SELECT id FROM users WHERE username='$username'");
$student = $get_id->fetch_assoc();
$student_id = $student['id'];

$tasks = $conn->query("SELECT * FROM tasks WHERE student_id='$student_id'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h4>Assigned Tasks</h4>
    <table class="table table-bordered">
        <thead><tr><th>Title</th><th>Description</th><th>Date</th></tr></thead>
        <tbody>
            <?php while($row = $tasks->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['assign_date']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
