<?php

use Core\Database;
use Core\Validator;
use Core\App;

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
$db = App::resolve(Database::class);

if (!Validator::checkString($username, 7, 255)) {
    $errors["username"] = "Please provide a valid username of at least 7 characters";
}

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email";
}

if (!Validator::checkString($password, 7, 255)) {
    $errors["password"] = "Please provide a valid password of at least 7 characters";
}

if (!empty($errors)) {
    return view("registration/create", ["errors" => $errors]);
}

$user = $db->query(/** @lang text */ "SELECT * FROM user WHERE email = :email",
    ["email" => $email])->find();

if ($user) {
    return view("registration/create", ["errors" => ["email" => "This email is already taken"]]);
} else {
    $db->query(/** @lang text */ "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)",
    [
        "username" => $username,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login(["username" => $username, "email" => $email]);

    header("Location: /");
    exit();
}

