<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

if (!Validator::checkString($_POST['title'], 1, 100)) {
    $errors["title"] = "A title of no more than 100 characters is required";
}

if (!Validator::checkDate($_POST["due_date"])) {
    $errors["due_date"] = "A valid date is required";
}

if (!empty($errors)) {
    return view("tasks/create", ["errors" => $errors]);
}


$db->query(/** @lang text */ "INSERT INTO tasks (title, due_date, user_id) 
    VALUES (:title, :due_date, :user_id)", [
    'title' => $_POST['title'],
    'due_date' => $_POST['due_date'],
    'user_id' => 1
]);

header("Location: /");
die();

