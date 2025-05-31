<?php

require "Validator.php";
$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (!Validator::checkString($_POST['title'], 1, 100)) {
        $errors["title"] = "A title of no more than 100 characters is required";
    }

    if (!Validator::checkDate($_POST["due_date"])) {
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