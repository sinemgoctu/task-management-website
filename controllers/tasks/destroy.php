<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = 1;

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_POST["id"]
])->findOrFail();


authorize($task["user_id"] === $currentUserId);

$db->query(/** @lang text */ "DELETE from tasks WHERE id=:id", ["id" => $_POST["id"]]);


header("Location: /");
exit();


