<?php

$router->get("/", "controllers/tasks/index.php")->only("auth");
$router->get("/task/create", "controllers/tasks/create.php");
$router->get("/task/edit", "controllers/tasks/edit.php");
$router->patch("/task", "controllers/tasks/update.php");
$router->post("/", "controllers/tasks/store.php");
$router->delete("/", "controllers/tasks/destroy.php");
$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php");
