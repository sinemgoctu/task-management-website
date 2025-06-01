<?php

function displayAll()
{
    $config = require base_path("config.php");
    $db = new Database($config['database']);
    return $db->query(/** @lang text */ "SELECT * FROM tasks WHERE user_id = 1")->get();
}

require base_path("views/tasks/index.view.php");

