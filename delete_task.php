<?php
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // Deleting task from the database
    $conn = mysqli_connect("localhost", "root", "", "todo_db");
    $query = "DELETE FROM tasks WHERE id = '$taskId'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}

// Redirecting back to the homepage
header("Location: index.php");
exit();
