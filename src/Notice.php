<?php
namespace PlaygroundDemo;

use Psr\Log\NullLogger;

class Notice
{
    public static function register(): void
    {
        // Demonstrates that the Composer PSR-4 autoload + a real third-party
        // runtime dep (psr/log) made it into the built zip. If composer was
        // not run, this file would never be loadable.
        $logger = new NullLogger();
        $logger->info('Playground Demo plugin booted');

        add_action('admin_enqueue_scripts', [self::class, 'enqueueAdmin']);
        add_action('admin_notices', [self::class, 'renderNotice']);
    }

    public static function enqueueAdmin(): void
    {
        $built = plugin_dir_path(__DIR__) . 'dist/admin.js';
        if (!file_exists($built)) {
            return; // Vite output missing — fail closed.
        }
        wp_enqueue_script(
            'playground-demo-admin',
            plugins_url('dist/admin.js', __DIR__),
            [],
            (string) filemtime($built),
            true
        );
    }

    public static function renderNotice(): void
    {
        echo '<div class="notice notice-info" id="playground-demo-notice">';
        echo '<p><strong>Playground Demo</strong> is active. JS counter:';
        echo ' <span id="playground-demo-count">…</span></p>';
        echo '</div>';
    }
}
