<?php 

declare(strict_types = 1);

function is_input_empty ($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        return true;
    }
    else {
        return false;
    }
}

function is_username_wrong (bool|array $user) {
    if ($user === false) {
        return true;
    }
    else {
        return false;
    }
}

function is_password_wrong (string $pwd, string $hashed_pwd) {
    if (!password_verify($pwd, $hashed_pwd)) {
        return true;
    }
    else {
        return false;
    }
}
