<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $bodyLength = strlen($_POST['body']);

    if (!Validator::string($_POST['body'], 20, 500)) {
	$errors['body'] = "You have entered $bodyLength characters, but the limit is between 20 and 500 characters";
    }

    if (empty($errors)) {
	$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
	    "body" => $_POST["body"],
	    "user_id" => 3
	]);
	$_POST['body'] = '';
    }
}

view("notes/create.view.php", [
    "heading" => "Create a note",
    "errors" => $errors,
]);
