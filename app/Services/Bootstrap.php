<?php

namespace App\Services;

use Dotenv\Dotenv;
use PDO;
use Exception;

/**
 * Class Bootstrap
 * 
 * Handles the initial setup of the application including:
 * - Environment variable loading
 * - Error handling configuration
 * - Database migrations
 */
class Bootstrap
{
    private string $root;
    private array $env = [];

    /**
     * Bootstrap constructor.
     * Sets the project root directory.
     */
    public function __construct()
    {
        $this->root = dirname(__DIR__, 2); // project root
    }

    /**
     * Boot the application.
     * Runs the sequence of startup tasks.
     */
    public function boot(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->ensureEnvExists();
        $this->loadEnv();
        $this->configureErrorHandling();
        $this->runMigrations();
    }

    /**
     * Ensure .env exists.
     * If not, it attempts to copy from .env.example.
     */
    private function ensureEnvExists(): void
    {
        $envFile = $this->root . '/.env';
        $envExample = $this->root . '/.env.example';

        if (!file_exists($envFile)) {
            if (!file_exists($envExample)) {
                die("Error: .env file missing and .env.example not found. Please upload .env.example");
            }
            copy($envExample, $envFile);
        }
    }

    /**
     * Load Environment Variables using Dotenv.
     */
    private function loadEnv(): void
    {
        $dotenv = Dotenv::createImmutable($this->root);
        $dotenv->load();
        $this->env = $_ENV;
        // Debug output
        // file_put_contents('debug_env.txt', print_r($_ENV, true));
    }

    /**
     * Configure Error Handling based on environment settings.
     * Sets display_errors and error_reporting.
     * Registers a global exception handler.
     */
    private function configureErrorHandling(): void
    {
        $debug = ($this->env['APP_DEBUG'] ?? 'false') === 'true';
        $env   = $this->env['APP_ENV'] ?? 'production';

        if (php_sapi_name() === 'cli') {
            return;
        }

        if ($debug && $env === 'local') {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            \Spatie\Ignition\Ignition::make()->register();
        } else {
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(0);

            // Global Exception Handler for production
            set_exception_handler(function ($e) {
                $this->renderError(500, 'Server Error');
            });
        }
    }

    /**
     * Run Database Migrations.
     * Checks if the database is configured and runs any pending migrations from db.sql.
     */
    private function runMigrations(): void
    {
        $host = $this->env['DB_HOST'] ?? '127.0.0.1';
        $db   = $this->env['DB_DATABASE'] ?? null;
        $user = $this->env['DB_USERNAME'] ?? null;
        $pass = $this->env['DB_PASSWORD'] ?? null;

        if (empty($db) || empty($user)) {
            return; // DB not configured yet
        }

        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlFile = $this->root . "/db.sql";
        if (!file_exists($sqlFile)) {
            return;
        }

        $sqlContent = file_get_contents($sqlFile);
        $queries = array_filter(array_map('trim', explode(";", $sqlContent)));

        foreach ($queries as $query) {
            if (preg_match('/CREATE TABLE (IF NOT EXISTS )?`?([a-zA-Z0-9_]+)`?/i', $query, $match)) {
                $table = $match[2];
                $check = $pdo->prepare("SHOW TABLES LIKE ?");
                $check->execute([$table]);
                if ($check->rowCount() > 0) {
                    continue;
                }
            }

            try {
                $pdo->exec($query);
            } catch (\PDOException $e) {
                // Ignore "Multiple primary key defined" (1068), "Duplicate key name" (1061), "Duplicate column name" (1060)
                if (in_array($e->errorInfo[1], [1068, 1061, 1060])) {
                    continue;
                }
                throw $e;
            }
        }

        $this->seedDefaultUser($pdo);
    }

    /**
     * Seed default admin user if not exists.
     */
    private function seedDefaultUser(PDO $pdo): void
    {
        // Check if users table exists
        $checkTable = $pdo->query("SHOW TABLES LIKE 'users'");
        if ($checkTable->rowCount() === 0) {
            return;
        }

        // Check if admin user exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute(['admin@mail.com']);

        if ($stmt->rowCount() === 0) {
            // Create default user
            $password = password_hash('12345678', PASSWORD_DEFAULT);

            $slugService = new SlugService();
            $slug = $slugService->generate('users', 'Admin');

            $insert = $pdo->prepare("INSERT INTO users (name, email, phone, password, slug) VALUES (?, ?, ?, ?, ?)");
            $insert->execute(['Admin', 'admin@mail.com', '0000000000', $password, $slug]);
        }
    }

    /**
     * Render Error Page.
     * Looks for a specific error file in the error directory, otherwise shows a generic message.
     *
     * @param int $code HTTP status code
     * @param string|null $message Optional custom error message
     */
    public function renderError(int $code, ?string $message = null): void
    {
        http_response_code($code);
        $file = $this->root . "/error/{$code}.php";

        if (is_file($file)) {
            include $file;
        } else {
            echo $message ?? "{$code} Error";
        }
        exit;
    }
}
