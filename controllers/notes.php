<?php

$heading = "Notes";

$config = require("config.php");
$username = 'root';
$password = 'P@ssw0rd';
$db = new Database($config['database'], $username, $password);

$userId = 3;
$notes = $db->query("SELECT * FROM notes WHERE user_id = $userId")->fetchAll();

require "views/notes.view.php";
