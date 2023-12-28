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
