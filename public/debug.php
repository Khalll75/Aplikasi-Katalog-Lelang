<?php
// Simple debug script to check Laravel installation
echo "<h1>Laravel Debug Info</h1>";

echo "<h2>PHP Version:</h2>";
echo phpversion();

echo "<h2>Environment:</h2>";
echo "<pre>";
echo "APP_ENV: " . ($_ENV['APP_ENV'] ?? 'Not set') . "\n";
echo "APP_KEY: " . (isset($_ENV['APP_KEY']) ? 'Set (' . strlen($_ENV['APP_KEY']) . ' chars)' : 'Not set') . "\n";
echo "APP_DEBUG: " . ($_ENV['APP_DEBUG'] ?? 'Not set') . "\n";
echo "</pre>";

echo "<h2>File Permissions:</h2>";
echo "<pre>";
echo "Laravel root: " . (is_readable('/var/www/laravel') ? 'Readable' : 'Not readable') . "\n";
echo "Storage dir: " . (is_writable('/var/www/laravel/storage') ? 'Writable' : 'Not writable') . "\n";
echo "Bootstrap cache: " . (is_writable('/var/www/laravel/bootstrap/cache') ? 'Writable' : 'Not writable') . "\n";
echo "</pre>";

echo "<h2>Required Files:</h2>";
echo "<pre>";
echo ".env file: " . (file_exists('/var/www/laravel/.env') ? 'Exists' : 'Missing') . "\n";
echo "autoload.php: " . (file_exists('/var/www/laravel/vendor/autoload.php') ? 'Exists' : 'Missing') . "\n";
echo "app.php: " . (file_exists('/var/www/laravel/bootstrap/app.php') ? 'Exists' : 'Missing') . "\n";
echo "</pre>";

echo "<h2>Try Laravel:</h2>";
try {
    require_once '/var/www/laravel/vendor/autoload.php';
    $app = require_once '/var/www/laravel/bootstrap/app.php';
    echo "Laravel bootstrap: SUCCESS\n";
} catch (Exception $e) {
    echo "Laravel bootstrap ERROR: " . $e->getMessage() . "\n";
}
?>
