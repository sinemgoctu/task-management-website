<?php


$config = require('config.php');
$db = new Database($config['database']);

$task = $db->query(/** @lang text */ "SELECT * FROM tasks WHERE id=:id", ["id"=>$_GET["id"]])->fetch();

require "views/task.view.php";