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
$signedIn = $auth->attempt($email, $password);
if (!$signedIn) {
    $form->error("password", "No matching account found for that email address and password.")->throw();
}


return redirect('/');



