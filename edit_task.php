<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_POST['id'];
    $taskName = $_POST['task_name'];

    // Include the configuration file

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "todo_db");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the task in the database
    $query = "UPDATE tasks SET task_name = '$taskName' WHERE id = '$taskId'";
    mysqli_query($conn, $query);

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the homepage
    header("Location: index.php");
    exit();
} elseif (isset($_GET['id'])) {
    $taskId = $_GET['id'];


    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "todo_db");

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch the task from the database
    $query = "SELECT * FROM tasks WHERE id = '$taskId'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>

    <form action="edit_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="task_name" value="<?php echo $row['task_name']; ?>" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>

<?php
} else {
    // Redirect back to the homepage if no task ID is provided
    header("Location: index.php");
    exit();
}
?>
