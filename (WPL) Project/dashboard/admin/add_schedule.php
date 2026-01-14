<?php
include("../../includes/db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_at = $_POST['created_at']; 

    $sql = "INSERT INTO schedules (title, description, created_at) VALUES ('$title', '$description', '$created_at')";
    if ($conn->query($sql)) {
        $success = "Schedule added!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Add Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Add Schedule</h3>

    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="post">
        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Date & Time</label>
            <input type="datetime-local" name="created_at" class="form-control" required>
        </div>
        <button class="btn btn-success">Add</button>
    </form>
</div>
</body>
</html>
