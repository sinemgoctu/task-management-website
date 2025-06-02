<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$tasks = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE user_id = 1")->get();
$user = $db->query( "SELECT * FROM user WHERE email=:email", ["email" => $_SESSION["user"]["email"]]
)->find();


view("tasks/index", ["tasks" => $tasks, "user" => $user]);



