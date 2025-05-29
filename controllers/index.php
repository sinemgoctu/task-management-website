<?php

function displayAll()
{
    $config = require('config.php');
    $db = new Database($config['database']);
    return $db->query(/** @lang text */ "SELECT * FROM tasks WHERE user_id = 1")->fetchAll();
}

require "views/index.view.php";

