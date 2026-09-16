# preview-in-playground-button-v3-example-composer-vite

Realistic example for the WordPress Playground v4 reusable preview workflows: a plugin that needs **both** `composer install` (PSR-4 autoload + a runtime dep) **and** `npm run build` (Vite-bundled admin JS) before it can run.

Demonstrates that the v4 reusable workflows handle a multi-toolchain build with no per-step boilerplate — caller setup is still ~20 lines across two files.

## What's in here

- `playground-demo-plugin.php` — main plugin file. Loads `vendor/autoload.php`, calls into the namespaced `PlaygroundDemo\Notice` class.
- `src/Notice.php` — autoloaded class, uses a real Composer dep (`psr/log`) to prove `composer install` ran.
- `composer.json` — declares PSR-4 + a runtime require.
- `src-js/admin.js` + `vite.config.js` + `package.json` — Vite source and config, output goes to `dist/admin.js` (no hash, fixed name) so PHP can enqueue it without reading a manifest.
- `.github/workflows/pr-preview-build.yml` — runs `composer install --no-dev`, then `npm install && npm run build`, stages the result with rsync excludes, zips it.
- `.github/workflows/pr-preview-publish.yml` — exposes the zip, posts the preview button.

Both reusable workflows use `WordPress/action-wp-playground-pr-preview` at `@v4`.
Update the build and publish references together when changing versions.
The repository name retains `v3` so existing links keep working.
