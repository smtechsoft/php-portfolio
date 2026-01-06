<?php

use App\Services\Auth;

$auth = new Auth();
$auth->logout();
header("Location: /admin/auth/login");