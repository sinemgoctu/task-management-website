<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_GET["id"]
])->findOrFail();

$currentUserId = 1;

authorize($task["user_id"] === $currentUserId);

view("tasks/edit", ["task" => $task]);

