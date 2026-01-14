<?php
include("../../includes/db.php");
include("../../includes/auth_session.php");

$students = $conn->query("SELECT * FROM users WHERE role='student'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h4>Student List</h4>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Email</th></tr>
        </thead>
        <tbody>
            <?php while($row = $students->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['full_name']; ?></td>
                    <td><?= $row['email']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
