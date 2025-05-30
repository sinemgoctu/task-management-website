<?php

$config = require('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db->query(/** @lang text */ "INSERT INTO tasks (title, due_date, user_id) 
    VALUES (:title, :due_date, :user_id)", [
        'title' => $_POST['title'],
        'due_date' => $_POST['due_date'],
        'user_id' => 1
    ]);
}

require "views/task-create.view.php";