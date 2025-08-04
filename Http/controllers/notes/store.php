<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

$bodyLength = strlen($_POST['body']);

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "You have entered $bodyLength characters, but the limit is between 20 and 500 characters";
}

if (!empty($errors)) {
     return view("notes/create.view.php", [
	"heading" => "Create a note",
	"errors" => $errors,
    ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
    "body" => $_POST["body"],
    "user_id" => 3
]);

header("location: /notes");

die();
