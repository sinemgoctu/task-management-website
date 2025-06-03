<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_POST["id"]
])->findOrFail();

$user = $db->query( /** @lang text */ "SELECT * FROM user WHERE email=:email", ["email" => $_SESSION["user"]["email"]]
)->find();


authorize($task["user_id"] === $user["id"]);

$db->query(/** @lang text */ "DELETE from tasks WHERE id=:id", ["id" => $_POST["id"]]);


header("Location: /");
exit();


