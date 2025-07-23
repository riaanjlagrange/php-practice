<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function() {
    $config = require base_path("config.php");
    $username = 'root';
    $password = 'P@ssw0rd';

    return new Database($config['database'], $username, $password);
});

App::setContainer($container);
