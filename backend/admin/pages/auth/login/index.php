<?php
if (isset($_SESSION['user_id'])) {
    header("Location: /admin");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>

<body>
    <form action="/request/backend/auth/login" method='post'>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password">
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>