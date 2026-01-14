<?php
include("../../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    $conn->query("INSERT INTO users (username, password, role, full_name, email)
                  VALUES ('$username', '$password', 'student', '$full_name', '$email')");
    header("Location: manage_students.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<div class="container mt-4">
    <h3>Add Student</h3>
    <form method="POST">
        <input class="form-control mb-2" name="full_name" placeholder="Full Name" required>
        <input class="form-control mb-2" name="username" placeholder="Username" required>
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
        <button type="submit" class="btn btn-success">Add</button>
        <a href="manage_students.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
