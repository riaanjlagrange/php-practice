<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = LoginForm::validate([
    "email" => $email,
    "password" => $password
]);

// validate email and password
// authenticate user
$auth = new Authenticator();
if ($auth->attempt($email, $password)) {
    redirect("/");
}

$form->error("password", "No matching account found for that email address and password.");




