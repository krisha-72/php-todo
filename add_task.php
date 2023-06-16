<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['task_name'];

    // Saving task to the database
    $conn = mysqli_connect("localhost", "root", "", "todo_db");
    $query = "INSERT INTO tasks (task_name) VALUES ('$taskName')";
    mysqli_query($conn, $query);
    mysqli_close($conn);

    // Redirecting back to the homepage
    header("Location: index.php");
    exit();
}
