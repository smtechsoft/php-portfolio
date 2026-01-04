<?php

use App\Services\Auth;
use App\Services\DbQuery;

$auth = new Auth();
$db = new DbQuery();
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

setcookie('test_cookie', $email, time() + 3600, "/");

// if (!empty($email) && !empty($password)) {

//     $auth->attempt([
//         'email' => $email,
//         'password' => $password
//     ]);
//     header('Location: /admin/dashboard');
//     exit();
// } else {
//     // Handle missing credentials
//     header('Location: /admin/auth/login?error=missing_credentials');
//     exit();
// }