<?php

namespace App\Services;

use Exception;
use App\Database\Database;
use mysqli;
use App\Services\SlugService;

/**
 * Class Installer
 * 
 * Handles the application installation process:
 * - Database connection and creation
 * - Environment configuration
 * - Database migrations
 * - Default admin user creation
 */
class Installer
{
    private string $root;

    public function __construct()
    {
        $this->root = dirname(__DIR__, 2);
    }

    /**
     * Run the installation process.
     * 
     * @param array $data Form data containing DB credentials
     * @throws Exception If any step fails
     */
    public function install(array $data): void
    {
        $host = $data['db_host'];
        $port = $data['db_port'];
        $dbName = $data['db_database'];
        $user = $data['db_username'];
        $pass = $data['db_password'];

        // 1. Test Connection & Create Database
        $this->setupDatabase($host, $user, $pass, $dbName, $port);

        // 2. Update .env file
        $this->updateEnvFile($host, $port, $dbName, $user, $pass);

        // 3. Update current runtime environment for Database class
        $this->updateRuntimeEnv($host, $port, $dbName, $user, $pass);

        // 4. Run Migrations
        $this->runMigrations();

        // 5. Create Default Admin
        $this->createDefaultAdmin();

        // 6. Mark as Installed
        $this->markAsInstalled();
    }

    /**
     * Connect to MySQL and create the database if it doesn't exist.
     */
    private function setupDatabase($host, $user, $pass, $dbName, $port): void
    {
        try {
            // Connect without DB selected
            $dsn = "mysql:host=$host;port=$port;charset=utf8mb4";
            $pdo = new \PDO($dsn, $user, $pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Create DB if not exists
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName`");
        } catch (\PDOException $e) {
            throw new Exception("Database setup failed: " . $e->getMessage());
        }
    }

    /**
     * Update the .env file with provided credentials.
     */
    private function updateEnvFile($host, $port, $dbName, $user, $pass): void
    {
        $writer = new EnvWriter($this->root . '/.env');
        $writer->update([
            'DB_HOST' => $host,
            'DB_PORT' => $port,
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $user,
            'DB_PASSWORD' => $pass,
        ]);
    }

    /**
     * Update $_ENV superglobal so Database class can use new credentials immediately.
     */
    private function updateRuntimeEnv($host, $port, $dbName, $user, $pass): void
    {
        $_ENV['DB_HOST'] = $host;
        $_ENV['DB_PORT'] = $port;
        $_ENV['DB_DATABASE'] = $dbName;
        $_ENV['DB_USERNAME'] = $user;
        $_ENV['DB_PASSWORD'] = $pass;
    }

    /**
     * Run database migrations from db.sql.
     */
    private function runMigrations(): void
    {
        $db = new Database();
        $pdo = $db->returnConnect();
        
        $sqlFile = $this->root . '/db.sql';
        if (!file_exists($sqlFile)) {
            return;
        }

        $sqlContent = file_get_contents($sqlFile);
        $queries = array_filter(array_map('trim', explode(";", $sqlContent)));

        foreach ($queries as $query) {
            if (empty($query)) continue;

            // Check for CREATE TABLE to skip existing
            if (preg_match('/CREATE TABLE\s+(?:IF NOT EXISTS\s+)?`?([a-zA-Z0-9_]+)`?/i', $query, $match)) {
                $table = $match[1];
                $check = $pdo->prepare("SHOW TABLES LIKE ?");
                $check->execute([$table]);
                if ($check->rowCount() > 0) {
                    continue; // Table exists, skip
                }
            }

            try {
                $pdo->exec($query);
            } catch (\PDOException $e) {
                // Ignore "Multiple primary key defined" (1068) and "Duplicate key name" (1061)
                if (in_array($e->errorInfo[1], [1068, 1061])) {
                    continue;
                }
                // Continue on other errors but maybe log them? For now, we just continue as per original logic
                continue;
            }
        }
    }

    /**
     * Create default admin user if not exists.
     */
    private function createDefaultAdmin(): void
    {
        $db = new Database();
        $pdo = $db->returnConnect();

        $adminEmail = 'admin@mail.com';
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$adminEmail]);
        
        if ($stmt->rowCount() == 0) {
            $adminName = 'Admin';
            $adminPass = password_hash('12345678', PASSWORD_BCRYPT);
            $adminAbout = 'Super Admin';
            
            $slugService = new SlugService();
            $slug = $slugService->generate('users', $adminName);

            $insert = $pdo->prepare("INSERT INTO users (name, email, password, about, slug) VALUES (?, ?, ?, ?, ?)");
            $insert->execute([$adminName, $adminEmail, $adminPass, $adminAbout, $slug]);
        }
    }

    /**
     * Mark application as installed in .env.
     */
    private function markAsInstalled(): void
    {
        $writer = new EnvWriter($this->root . '/.env');
        $writer->update(['APP_INSTALLED' => 'true']);
    }
}
