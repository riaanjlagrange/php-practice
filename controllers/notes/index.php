<?php

use Core\Database;

$config = require base_path("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

$userId = 3;
$notes = $db->query("SELECT * FROM notes WHERE user_id = $userId")->fetchAll();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes
]);
