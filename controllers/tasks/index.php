<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = $db->query( /** @lang text */ "SELECT * FROM user WHERE email=:email", ["email" => $_SESSION["user"]["email"]]
)->find();

$tasks = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE user_id = :user_id", ["user_id" => $user["id"]]
)->get();


view("tasks/index", ["tasks" => $tasks, "user" => $user]);



