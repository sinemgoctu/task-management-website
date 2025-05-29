<?php

require "functions.php";
//require "router.php";
require 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);

$tasks = $db->query(/** @lang text */ "select * from tasks")->fetchAll();
dd($tasks);