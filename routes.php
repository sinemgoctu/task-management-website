<?php

$router->get("/", "controllers/tasks/index.php");
$router->get("/task", "controllers/tasks/edit.php");
$router->get("/task/create", "controllers/tasks/create.php");
$router->post("/", "controllers/tasks/store.php");
$router->delete("/", "controllers/tasks/destroy.php");
