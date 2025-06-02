<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = 1;

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_GET["id"]
])->findOrFail();


authorize($task["user_id"] === $currentUserId);

view("tasks/edit", [
    "errors" => [],
    "task" => $task]);

