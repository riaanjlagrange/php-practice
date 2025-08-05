<?php

use Core\Authenticator;

$auth = new Authenticator();
$auth->logout();

// redirect back to home
redirect("/");
