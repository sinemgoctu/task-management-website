<?php

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (strlen($_POST["title"]) === 0) {
        $errors["title"] = "A title is required";
    }
    if (strlen($_POST["title"]) > 100) {
        $errors["title"] = "Title cannot be longer than 100 characters";
    }
    if (!isValidDate($_POST["due_date"])) {
        $errors["due_date"] = "A valid date is required";
    }
    if (empty($errors)) {
        $db->query(/** @lang text */ "INSERT INTO tasks (title, due_date, user_id) 
    VALUES (:title, :due_date, :user_id)", [
            'title' => $_POST['title'],
            'due_date' => $_POST['due_date'],
            'user_id' => 1
        ]);
    }
}


require "views/task-create.view.php";