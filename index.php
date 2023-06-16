<!DOCTYPE html>
<html>
<head>
    <title>TODO App</title>
    <style>
        .task-list {
            list-style-type: none;
        }
    </style>
</head>
<body>
    <h2>TODO App</h2>

    <form action="add_task.php" method="POST">
        <input type="text" name="task_name" placeholder="Enter task name" required>
        <button type="submit">Add Task</button>
    </form>

    <h3>Task List:</h3>

    <?php
    // Fetching tasks from the database
    $conn = mysqli_connect("localhost", "root", "", "todo_db");
    $query = "SELECT * FROM tasks";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul class='task-list'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row['task_name'] . " <a href='edit_task.php?id=" . $row['id'] . "'>Edit</a> 
                <a href='delete_task.php?id=" . $row['id'] . "'>Delete</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No tasks found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
