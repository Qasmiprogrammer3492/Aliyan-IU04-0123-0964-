<?php
include("../../includes/db.php");
include("../../includes/auth_session.php");

$students = $conn->query("SELECT * FROM users WHERE role='student'");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $student_id = $_POST['student_id'];
    $teacher = $_SESSION['username'];

    $conn->query("INSERT INTO tasks (teacher_username, student_id, title, description)
                  VALUES ('$teacher', '$student_id', '$title', '$desc')");
    echo "<div class='alert alert-success'>Task assigned successfully.</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assign Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h4>Assign Task</h4>
    <form method="POST">
        <input class="form-control mb-2" name="title" placeholder="Task Title" required>
        <textarea class="form-control mb-2" name="description" placeholder="Task Description" required></textarea>
        <select class="form-control mb-2" name="student_id" required>
            <option value="">Select Student</option>
            <?php while ($row = $students->fetch_assoc()): ?>
                <option value="<?= $row['id']; ?>"><?= $row['full_name']; ?></option>
            <?php endwhile; ?>
        </select>
        <button class="btn btn-primary">Assign</button>
        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
