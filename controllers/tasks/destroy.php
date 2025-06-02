<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);
$currentUserId = 1;

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_POST["id"]
])->findOrFail();


authorize($task["user_id"] === $currentUserId);

$db->query(/** @lang text */ "DELETE from tasks WHERE id=:id", ["id" => $_POST["id"]]);


header("Location: /");
exit();


