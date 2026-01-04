<?php

namespace App\Services;

use App\Services\DbQuery;

class Auth
{
    protected static $user;

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param array $credentials ['email' => '...', 'password' => '...']
     * @param bool $remember Whether to remember the user (persistent login)
     * @return bool
     */
    public static function attempt(array $credentials, bool $remember = false): bool
    {
        if (!isset($credentials['email']) || !isset($credentials['password'])) {
            return false;
        }

        $db = new DbQuery();
        // Find user by email
        $db->query = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->returnConnect()->prepare($db->query);
        $stmt->execute([$credentials['email']]);
        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($user && password_verify($credentials['password'], $user->password)) {
            self::login($user, $remember);
            return true;
        }

        return false;
    }

    /**
     * Log a user into the application.
     *
     * @param object $user
     * @param bool $remember
     * @return void
     */
    public static function login($user, bool $remember = false): void
    {
        $_SESSION['user_id'] = $user->id;
        self::$user = $user;

        if ($remember) {
            $token = bin2hex(random_bytes(32));
            
            // Save token to DB
            $db = new DbQuery();
            $db->query = "UPDATE users SET remember_token = ? WHERE id = ?";
            $stmt = $db->returnConnect()->prepare($db->query);
            $stmt->execute([$token, $user->id]);

            // Set Cookie (30 days)
            setcookie('remember_token', $token, time() + (86400 * 30), "/", "", false, true);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public static function logout(): void
    {
        // Remove token from DB if logged in
        if (self::check()) {
            $user = self::user();
            $db = new DbQuery();
            $db->query = "UPDATE users SET remember_token = NULL WHERE id = ?";
            $stmt = $db->returnConnect()->prepare($db->query);
            $stmt->execute([$user->id]);
        }

        unset($_SESSION['user_id']);
        self::$user = null;
        session_destroy();

        // Clear Cookie
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, "/");
            unset($_COOKIE['remember_token']);
        }
    }

    /**
     * Get the currently authenticated user.
     *
     * @return object|null
     */
    public static function user()
    {
        if (self::$user) {
            return self::$user;
        }

        $db = new DbQuery();

        // Check Session
        if (isset($_SESSION['user_id'])) {
            $result = $db->find('users', $_SESSION['user_id']);
            if ($result['row']) {
                self::$user = $result['row'];
                return self::$user;
            }
        }

        // Check Remember Cookie
        if (isset($_COOKIE['remember_token'])) {
            $token = $_COOKIE['remember_token'];
            $db->query = "SELECT * FROM users WHERE remember_token = ?";
            $stmt = $db->returnConnect()->prepare($db->query);
            $stmt->execute([$token]);
            $user = $stmt->fetch(\PDO::FETCH_OBJ);

            if ($user) {
                // Login user (set session) but don't regenerate token
                $_SESSION['user_id'] = $user->id;
                self::$user = $user;
                return self::$user;
            }
        }

        return null;
    }

    /**
     * Get the currently authenticated user's ID.
     *
     * @return int|null
     */
    public static function id()
    {
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public static function check(): bool
    {
        return self::user() !== null;
    }
}