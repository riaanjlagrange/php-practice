<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userId = 3;
$notes = $db->query("SELECT * FROM notes WHERE user_id = $userId")->fetchAll();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);
