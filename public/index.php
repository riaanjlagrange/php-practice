<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("$class.php");
});

require base_path("Core/router.php");


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

