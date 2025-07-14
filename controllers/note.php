<?php

$config = require("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

$heading = "Note";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_GET['id']])->fetch();

require "views/note.view.php";
