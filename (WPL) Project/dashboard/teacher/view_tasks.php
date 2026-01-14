<?php
include("../../includes/db.php");
include("../../includes/auth_session.php");

$teacher = $_SESSION['username'];
$tasks = $conn->query("SELECT tasks.*, users.full_name FROM tasks
                       JOIN users ON tasks.student_id = users.id
                       WHERE teacher_username = '$teacher'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h4>Assigned Tasks</h4>
    <table class="table table-bordered">
        <thead><tr><th>Student</th><th>Title</th><th>Description</th><th>Date</th></tr></thead>
        <tbody>
            <?php while($row = $tasks->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['full_name']; ?></td>
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
