<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function isUrl($value) {
    if ($_SERVER["REQUEST_URI"] === $value) {
	echo "bg-gray-900 text-white";
    } else {
	echo "text-gray-300";
    }
}

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
 }

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
	abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);

    require base_path("views/" . $path);
}

function login($user) {
    $_SESSION['user'] = [
	"username" => $user['username'],
	"email" => $user['email']
    ];

    // create new session id when user logs in
    session_regenerate_id();
}

function logout() {
    // clear out the session superglobal.
    $_SESSION = [];
    // destroy the session file
    session_destroy();

    // clear out the cookie
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
