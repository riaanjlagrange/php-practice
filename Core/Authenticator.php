<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator {
    public function attempt($email, $password) {
	// initialize the database
	$db = App::resolve(Database::class);

	// find the user with matching email from the database
	$user = $db->query("SELECT * FROM users WHERE email = :email", ["email" => $email])->fetch();

	// if user with matching email address was found
	if ($user) {
	    // if the passwords match
	    if (password_verify($password, $user['password'])) {
		// login the user
		$this->login([
		    'username' => $user['username'],
		    'email' => $email,
		]);
		return true;
	    }
	}
	return false;
    }

    public function login($user) {
	$_SESSION['user'] = [
	    "username" => $user['username'],
	    "email" => $user['email']
	];

	// create new session id when user logs in
	session_regenerate_id();
    }

    public function logout() {
	// clear out the session superglobal.
	$_SESSION = [];
	// destroy the session file
	session_destroy();

	// clear out the cookie
	$params = session_get_cookie_params();
	setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
