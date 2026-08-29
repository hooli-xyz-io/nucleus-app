<?php

if (!defined('NUCLEUS_BASE_PATH')) {
    define('NUCLEUS_BASE_PATH', dirname(__DIR__));
}

// Start session for web auth
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Load composer autoloader & helper functions first
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

// Fallback helper loader for local monorepo development
if (file_exists(__DIR__ . '/../core/support/Helpers.php')) {
    require_once __DIR__ . '/../core/support/Helpers.php';
}

// Fallback loader for case-mismatched project directories on case-sensitive filesystems.
require_once __DIR__ . '/case_insensitive_autoload.php';

if (!function_exists('base_path')) {
    function base_path(string $path = '') {
        $base = defined('NUCLEUS_BASE_PATH') ? NUCLEUS_BASE_PATH : dirname(__DIR__);
        $normalizedBase = rtrim(str_replace('\\', '/', $base), '/');
        return $normalizedBase . ($path === '' ? '' : '/' . ltrim(str_replace('\\', '/', $path), '/'));
    }
}

/**
 * 2. LOAD ENV
 */
$envPath = base_path('.env');

// Allow key:generate CLI command to run even without .env or APP_KEY
$isKeyGenerate = (isset($argv[1]) && $argv[1] === 'key:generate');

if (!file_exists($envPath)) {
    if (!$isKeyGenerate) {
        $errorMsg = "The application environment file [.env] is missing.\nPlease copy .env.example to .env or run \"php nucleus key:generate\".";

        if (php_sapi_name() === 'cli') {
            echo "\033[31mError:\033[0m {$errorMsg}\n";
            exit(1);
        } else {
            http_response_code(500);
            die("<h1>500 Internal Server Error</h1><p>" . nl2br(htmlspecialchars($errorMsg)) . "</p>");
        }
    }
} else {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        if (strpos($line, '=') !== false) {
            [$key, $value] = explode('=', $line, 2);

            $key = trim($key);
            $value = trim($value, "\"'");

            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
            putenv("{$key}={$value}");
        }
    }
}

/**
 * 2. REQUIRE APP_KEY
 */
$appKey = env('APP_KEY');
if (empty($appKey) && !$isKeyGenerate) {
    $errorMsg = "No application encryption key has been specified.\nPlease set APP_KEY in your .env file or run \"php nucleus key:generate\".";

    if (php_sapi_name() === 'cli') {
        echo "\033[31mError:\033[0m {$errorMsg}\n";
        exit(1);
    } else {
        http_response_code(500);
        die("<h1>500 Internal Server Error</h1><p>" . nl2br(htmlspecialchars($errorMsg)) . "</p>");
    }
}

/**
 * 3. LOAD DATABASE AFTER ENV IS READY
 */
require_once __DIR__ . '/database.php';

// Error reporting (dev mode)
if (env('APP_DEBUG')) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
