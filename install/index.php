<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Services\Installer;
use Dotenv\Dotenv;

// Load env to check status
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Redirect if already installed
if (($_ENV['APP_INSTALLED'] ?? 'false') === 'true') {
    header('Location: /');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $installer = new Installer();
    $installer->install($_POST);
    
    header('Location: /');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f2f5; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h1 { text-align: center; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        input { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 0.75rem; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; }
        button:hover { background: #0056b3; }
        .error { color: red; margin-bottom: 1rem; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Installation</h1>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>DB Host</label>
                <input type="text" name="db_host" value="127.0.0.1" required>
            </div>
            <div class="form-group">
                <label>DB Port</label>
                <input type="text" name="db_port" value="3306" required>
            </div>
            <div class="form-group">
                <label>Database Name</label>
                <input type="text" name="db_database" value="myphpdb" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="db_username" value="root" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="db_password">
            </div>
            <button type="submit">Install &rarr;</button>
        </form>
    </div>
</body>
</html>
