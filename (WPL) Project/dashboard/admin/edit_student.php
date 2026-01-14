<?php
include("../../includes/db.php");

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    $conn->query("UPDATE users SET full_name='$full_name', email='$email' WHERE id=$id");
    header("Location: manage_students.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<div class="container mt-4">
    <h3>Edit Student</h3>
    <form method="POST">
        <input class="form-control mb-2" name="full_name" value="<?= $student['full_name']; ?>" required>
        <input class="form-control mb-2" name="email" type="email" value="<?= $student['email']; ?>" required>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="manage_students.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
