<?php
$heading = "Create Note";

$config = require("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $db->query("INSERT INTO notes (body, user_id) VALUES (:body, :user_id)", [
	"body" => $_POST["body"],
	"user_id" => 3
    ]);
}

require "views/note-create.view.php";
