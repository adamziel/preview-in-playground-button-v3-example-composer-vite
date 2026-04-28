import { defineConfig } from 'vite';

// Plugin assets get loaded under a plugins_url() origin, so emit relative
// paths and pin the entry filename so PHP can enqueue it without reading a
// manifest.
export default defineConfig({
    base: '',
    build: {
        outDir: 'dist',
        emptyOutDir: true,
        rollupOptions: {
            input: 'src-js/admin.js',
            output: {
                entryFileNames: 'admin.js',
                chunkFileNames: '[name].js',
                assetFileNames: '[name][extname]',
            },
        },
    },
});
