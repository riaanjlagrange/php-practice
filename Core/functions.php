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

function redirect($path) {
    header("location: $path");
    exit();
}
