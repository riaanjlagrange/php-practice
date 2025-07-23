<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userId = 3;

$id = $_POST['id'];

// get note to use for auth
$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->fetchOrAbort();

// check if the user is authorized to delete the note
authorize($note['user_id'] === $userId);

// delete the note form the database
$db->query("DELETE FROM notes WHERE id = :id", [
    "id" => $id,
]);

header("location: /notes");
exit();
