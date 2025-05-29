<?php

require "functions.php";
//require "router.php";
require 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];

//Prevent sql injection using wildcards
$query = /** @lang text */
    "select * from tasks where id = :id";

$tasks = $db->query($query, [':id' => $id])->fetch();
dd($tasks);