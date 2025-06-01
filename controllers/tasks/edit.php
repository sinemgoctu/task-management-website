<?php

$config = require base_path("config.php");
$db = new Database($config['database']);

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_GET["id"]
])->findOrFail();

$currentUserId = 1;

authorize($task["user_id"] === $currentUserId);

require base_path("views/tasks/edit.view.php");

