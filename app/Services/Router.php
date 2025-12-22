<?php

namespace App\Services;

/**
 * Class Router
 * 
 * Handles URL routing and dispatching to the appropriate controller or view.
 * Also manages installation checks and redirects.
 */
class Router
{
    private string $root;
    private Bootstrap $bootstrap;

    /**
     * Router constructor.
     * 
     * @param Bootstrap $bootstrap Dependency injection of Bootstrap service
     */
    public function __construct(Bootstrap $bootstrap)
    {
        $this->root = dirname(__DIR__, 2);
        $this->bootstrap = $bootstrap;
    }

    /**
     * Handle the incoming request.
     * Determines the path, checks installation status, and dispatches the route.
     */
    public function handle(): void
    {
        $path = $this->getRequestPath();
        $this->checkInstallation($path);

        $safePath = $this->securePath($path);

        if ($this->isAdminRoute($safePath)) {
            $this->handleAdminRoute($safePath);
            return;
        }

        $this->handleFrontendRoute($safePath);
    }

    /**
     * Get the current request path from the URI.
     * 
     * @return string The trimmed request path
     */
    private function getRequestPath(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        return trim($uri, '/');
    }

    /**
     * Check if the application is installed.
     * Redirects to /install/ if not installed, or blocks access to /install/ if already installed.
     * 
     * @param string $path The current request path
     */
    private function checkInstallation(string $path): void
    {
        $isInstalled = ($_ENV['APP_INSTALLED'] ?? 'false') === 'true';
        $dbName = $_ENV['DB_DATABASE'] ?? '';
        $dbUser = $_ENV['DB_USERNAME'] ?? '';

        // If not installed OR DB credentials missing, redirect to install
        if (!$isInstalled || empty($dbName) || empty($dbUser)) {
            if ($path !== 'install') {
                header('Location: /install/');
                exit;
            }
            require $this->root . '/install/index.php';
            exit;
        }

        if ($path === 'install') {
            header('Location: /');
            exit;
        }
    }

    /**
     * Sanitize the request path to prevent directory traversal or invalid characters.
     * 
     * @param string $path The raw request path
     * @return string The sanitized path
     */
    private function securePath(string $path): string
    {
        $safe = preg_replace('~[^a-zA-Z0-9/_-]~', '', $path);
        return trim($safe, '/');
    }

    /**
     * Check if the path belongs to the admin panel.
     * 
     * @param string $path The sanitized path
     * @return bool True if it's an admin route
     */
    private function isAdminRoute(string $path): bool
    {
        return str_starts_with($path, 'admin');
    }

    /**
     * Handle routing for admin pages.
     * 
     * @param string $path The sanitized path
     */
    private function handleAdminRoute(string $path): void
    {
        if ($path === 'admin') {
            $file = $this->root . "/backend/admin/index.php";
            $this->includeOr404($file);
            return;
        }

        $adminPath = substr($path, strlen('admin/'));
        $file = $this->root . "/backend/admin/pages/{$adminPath}/index.php";
        $this->includeOr404($file);
    }

    /**
     * Handle routing for frontend pages.
     * 
     * @param string $path The sanitized path
     */
    private function handleFrontendRoute(string $path): void
    {
        if ($path === '') {
            $file = $this->root . '/frontend/index.php';
            $this->includeOr404($file);
            return;
        }

        if (is_file($this->root . "/frontend/pages/{$path}/index.php")) {
            $file = $this->root . "/frontend/pages/{$path}/index.php";
            $this->includeOr404($file);
            return;
        }

        if (is_file($this->root . "/{$path}.php")) {
            $file = $this->root . "/{$path}.php";
            $this->includeOr404($file);
            return;
        }

        $this->bootstrap->renderError(404, "404 Not Found");
    }

    /**
     * Include the file if it exists, otherwise show 404.
     * 
     * @param string $file The absolute path to the file
     */
    private function includeOr404(string $file): void
    {
        if (is_file($file)) {
            include $file;
            exit;
        }
        $this->bootstrap->renderError(404, "404 Not Found");
    }
}
