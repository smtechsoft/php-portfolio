<?php

use App\Services\Auth;
use App\Services\DbQuery;

$auth = new Auth();
$db = new DbQuery();
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$users = $db->where('users', 'email', $email);
if ($users['rowCount'] == 0) {
    header("Location: /admin/auth/login?emailError=Wrong email address");
    exit;
} else {
    $passwordHashed = password_verify($password, $users['row']->password);
    if ($passwordHashed) {
        $auth->attempt([
            'email' => $email,
            'password' => $password
        ]);
        header("Location: /admin");
    } else {
        header("Location: /admin/auth/login?passwordError=Wrong password");
    }
}


// print_r($users);
// print_r($users['row']->password);