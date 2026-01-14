<?php
include("../../includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Notices</h3>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <!-- <th>Posted By</th> -->
            <th>Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM notices ORDER BY created_at DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
            </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
