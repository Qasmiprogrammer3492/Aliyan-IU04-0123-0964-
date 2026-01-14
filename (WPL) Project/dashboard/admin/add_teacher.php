<?php
include("../../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (full_name, email, username, password, role)
            VALUES ('$name', '$email', '$username', '$password', 'teacher')";
    
    if ($conn->query($sql)) {
        header("Location: manage_teacher.php");
        exit();
    } else {
        echo "Error adding teacher.";
    }
}
?>
<!-- 
<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add Teacher</button>
</form> -->


<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<div class="container mt-4">
    <h3>Add Teacher</h3>
    <form method="POST">
        <input class="form-control mb-2" name="name" placeholder="Full Name" required>
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-2" name="username" placeholder="Username" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
        <button type="submit" class="btn btn-success">Add</button>
        <a href="manage_students.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
