<?php
include 'db.php';

function getTasks()
{
    global $mysqli;
    $result = $mysqli->query('SELECT * FROM tasks');
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addTask($taskName)
{
    global $mysqli;
    $taskName = $mysqli->real_escape_string($taskName);
    $mysqli->query("INSERT INTO tasks (name) VALUES ('$taskName')");
}

function markTaskAsDone($taskId)
{
    global $mysqli;
    $taskId = (int)$taskId;
    $mysqli->query("UPDATE tasks SET done = 1 WHERE id = $taskId");
}

function deleteTask($taskId)
{
    global $mysqli;
    $taskId = (int)$taskId;
    $mysqli->query("DELETE FROM tasks WHERE id = $taskId");
}
