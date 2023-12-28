<?php
include 'tasks.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addTask'])) {
        $taskName = $_POST['taskName'];
        addTask($taskName);
    } elseif (isset($_POST['markDone'])) {
        $taskId = $_POST['taskId'];
        markTaskAsDone($taskId);
    } elseif (isset($_POST['deleteTask'])) {
        $taskId = $_POST['taskId'];
        deleteTask($taskId);
    }
}

$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>ToDo List</title>
</head>

<body>
    <!-- As a link -->
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">ToDo List</a>
        </div>
    </nav>

    <section class="text-center m-2">
        <form method="post">
            <input type="text" name="taskName" required>&nbsp;
            <input class="btn btn-primary" type="submit" name="addTask" value="Add" />
        </form>
    </section>

    <ul class="list-group m-2 p-2">
        <?php foreach ($tasks as $task): ?>
        <li
            class="list-group-item <?= $task['done'] ? 'list-group-item-success' : 'list-group-item-warning' ?> d-flex align-items-center justify-content-between">
            <?= htmlspecialchars($task['name']) ?>
            <div>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="taskId" value="<?= $task['id'] ?>">
                    <button class="btn btn-primary" name="markDone" <?= $task['done'] ? 'disabled' : '' ?>>Done</button>
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="taskId" value="<?= $task['id'] ?>">
                    <button class="btn btn-danger" name="deleteTask">X</button>
                </form>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
