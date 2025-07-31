<?php

use Core\Validator;
use Core\Database;
use Core\App;

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

// validate user email
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

// validate password
if (!Validator::string($password)) {
    $errors['password'] = "Please provide a valid password.";
}

// if errors, return the errors
if (!empty($errors)) {
     return view("session/create.view.php", [
	"errors" => $errors,
    ]);
}

// initialize the database
$db = App::resolve(Database::class);

// find the user with matching email from the database
$user = $db->query("SELECT * FROM users WHERE email = :email", ["email" => $email])->fetch();

// if user with matching email address was found
if ($user) {
    // if the passwords match
    if (password_verify($password, $user['password'])) {
	// login the user
	login([
	    'username' => $user['username'],
	    'email' => $email,
	]);

	// redirect
	header("location: /");
	die();
    }
}

 return view("session/create.view.php", [
    "errors" => [
	"password" => "No matching account found for that email address and password."
    ],
]);

