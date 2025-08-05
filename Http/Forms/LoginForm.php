<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function validate($email, $password) {
	// validate user email
	if (!Validator::email($email)) {
	    $this->errors['email'] = "Please provide a valid email address.";
	}

	// validate password
	if (!Validator::string($password)) {
	    $this->errors['password'] = "Please provide a valid password.";
	}

	return empty($this->errors);
    }

    public function errors() {
	return $this->errors;
    }

    public function error($field, $message) {
	$this->errors[$field] = $message;
    }
}
