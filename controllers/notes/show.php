<?php

use Core\Database;

$config = require base_path("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

$userId = 3;

$id = $_GET['id'];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->fetchOrAbort();

authorize($note['user_id'] === $userId);

view("notes/show.view.php", [
    "heading" => "View note",
    "note" => $note,
]);
