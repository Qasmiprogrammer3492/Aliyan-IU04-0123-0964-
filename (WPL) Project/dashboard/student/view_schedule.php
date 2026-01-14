<?php
include("../../includes/db.php");
include("../../includes/auth_session.php");

?>


<!DOCTYPE html>
<html>
<head>
    <title>Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Class Schedule</h3>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <!-- <th>Date</th> -->
            <th>Description</th>
            <th>Created At</th>
        </tr>
        <?php
        $sql = "SELECT * FROM schedules ORDER BY date ASC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>

               
                <td>{$row['created_at']}</td>
            </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
