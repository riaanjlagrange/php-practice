<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

$id = $_POST['id'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->fetchOrAbort();

$bodyLength = strlen($_POST['body']);
if (!Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = "You have entered $bodyLength characters, but the limit is between 20 and 500 characters";
}

if (count($errors)) {
     return view("notes/create.view.php", [
	"heading" => "Edit note",
	"errors" => $errors,
	"note" => $note
    ]);
}

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    "body" => $_POST["body"],
    "id" => $note['id'],
]);

header("location: /notes");

die();
