<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userId = 3;

$id = $_GET['id'];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->fetchOrAbort();

authorize($note['user_id'] === $userId);

view("notes/show.view.php", [
    "heading" => "View note",
    "note" => $note,
]);
