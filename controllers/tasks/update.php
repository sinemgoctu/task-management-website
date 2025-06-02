<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = 1;

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", [
    "id" => $_POST["id"]
])->findOrFail();

authorize($task["user_id"] === $currentUserId);

$errors = [];

if (!Validator::checkString($_POST['title'], 1, 100)) {
    $errors["title"] = "A title of no more than 100 characters is required";
}

if (!Validator::checkDate($_POST["due_date"])) {
    $errors["due_date"] = "A valid date is required";
}

if (count($errors)) {
    return view("tasks/edit", [
        "errors" => $errors,
        "task" => $task]);
}

$db->query( "UPDATE tasks SET title=:title, due_date=:due_date WHERE id=:id", [
    "id" => $_POST["id"],
    "title" => $_POST["title"],
    "due_date" => $_POST["due_date"],
]);

header("Location: /");
die();

