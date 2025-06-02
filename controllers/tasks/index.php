<?php

use Core\Database;

function displayAll()
{
    $config = require base_path("config.php");
    $db = new Database($config['database']);
    return $db->query(/** @lang text */ "SELECT * FROM tasks WHERE user_id = 1")->get();
}

view("tasks/index", ["tasks" => displayAll()]);

