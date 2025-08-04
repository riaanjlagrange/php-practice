<?php

use Core\Validator;
use Core\Database;
use Core\App;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
     return view("session/create.view.php", [
	"errors" => $form->errors(),
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

