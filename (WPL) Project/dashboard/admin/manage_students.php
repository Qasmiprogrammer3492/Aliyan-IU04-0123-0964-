<?php

include("../../includes/auth_session.php");
include("../../includes/db.php");


if (isset($_POST['delete_student'])) {
    $student_id = $_POST['student_id'];
    $conn->query("DELETE FROM users WHERE id = '$student_id' AND role='student'");
}

$result = $conn->query("SELECT * FROM users WHERE role='student'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<div class="container mt-4">
    <h3>All Students</h3>
    <a href="add_student.php" class="btn btn-success mb-2">Add Student</a>
    <table class="table table-bordered">
        <thead>
        <tr><th>ID</th><th>Name</th><th>Username</th><th>Email</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['full_name']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td>
                <a href="edit_student.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>

                <form method="post" action="" style="display:inline;">
                    <input type="hidden" name="student_id" value="<?= $row['id']; ?>">
                    <button type="submit" name="delete_student" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
