<?php

$config = require("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

$heading = "Note";

$userId = 3;

$id = $_GET['id'];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->fetchOrAbort();

authorize($note['user_id'] === $userId);

require "views/note.view.php";
