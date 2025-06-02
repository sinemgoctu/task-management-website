<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$tasks = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE user_id = 1")->get();

view("tasks/index", ["tasks" => $tasks]);



