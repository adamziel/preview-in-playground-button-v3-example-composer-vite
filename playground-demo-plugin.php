<?php
/**
 * Plugin Name: Playground Demo (Composer + Vite)
 * Description: Smallest realistic plugin that needs both `composer install` and `npm run build` before it can run.
 * Version: 0.1.0
 * Requires PHP: 8.0
 */

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    return; // Plugin shipped unbuilt — fail closed instead of fatal.
}

require_once __DIR__ . '/vendor/autoload.php';

\PlaygroundDemo\Notice::register();
