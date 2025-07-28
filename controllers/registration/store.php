<?php

use Core\Validator;
use Core\Database;
use Core\App;

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirm_password"];

$errors = [];

$usernameLength = strlen($username);

// validate that username is no longer than 30 characters
if (!Validator::string($username, 1, 30)) {
    $errors['username'] = "Username cannot be more than 30 characters.";
}

// validate user email
if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

// validate if passwords match
if ($password !== $confirmPassword) {
    $errors['password'] = "Passwords do not match.";
    $errors['confirm_password'] = "Passwords do not match.";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password of at least 7 characters.";
}

// if errors, return the errors
if (!empty($errors)) {
     return view("registration/create.view.php", [
	"errors" => $errors,
    ]);
}

$db = App::resolve(Database::class);
// check if user with email already exists

$user = $db->query("SELECT * FROM users WHERE email = :email", ["email" => $email])->fetch();

if ($user) {
    // if user exists, send him to the login page
    header('location /');
    die();
} else {
    // else create the user and store them in the db
    $db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)", [
	"username" => $username,
	"email" => $email,
	"password" => $password
    ]);

    // mark that the user has logged in
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
	'username' => $username,
	'email' => $email,
    ];
    
    header('location: /');
    die();
}



header("location: /success");

die();
