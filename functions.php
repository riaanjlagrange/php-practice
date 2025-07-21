<?php

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
