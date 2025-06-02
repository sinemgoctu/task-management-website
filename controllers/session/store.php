<?php

use Core\Database;
use Core\Validator;
use Core\App;


$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
$db = App::resolve(Database::class);

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email";
}

if (!Validator::checkString($password)) {
    $errors["password"] = "Please provide a valid password";
}

if (!empty($errors)) {
    return view("session/create", ["errors" => $errors]);
}

$user = $db->query(/** @lang text */ "SELECT * FROM user WHERE email = :email",
    ["email" => $email])->find();


if ($user) {
    if (password_verify($password, $user["password"])) {
        login(["email" => $user["email"]]);

        header("Location: /");
        exit();
    }
}

return view("session/create", ["errors" => ["password" => "No matching account found for this email and password."]]);