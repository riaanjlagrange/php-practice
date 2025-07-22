<?php

use Core\Database;

$config = require base_path("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

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
