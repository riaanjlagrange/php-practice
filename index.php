<?php

require "helpers.php";

// require "router.php";

require "Database.php";

/* $config = require('config.php'); */
/**/
/* $username = 'root'; */
/* $password = 'P@ssw0rd'; */
/**/
/* $db = new Database($config['database'], $username, $password); */
/**/
/* $id = $_GET['id']; */
/**/
/* $query = "SELECT * FROM posts WHERE id = ?"; */
/**/
/* $posts = $db->query($query, [$id])->fetch(); */
/**/
/* dd($posts); */

/* foreach ($posts as $post) { */
/*     echo "<li>{$post["name"]}</li>"; */
/* } */

$config = require("config.php");

$username = 'root';
$password = 'P@ssw0rd';

$db = new Database($config["database"], $username, $password);

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = :id";

$post = $db->query($query, [":id" => $id])->fetch();

dd($post);

