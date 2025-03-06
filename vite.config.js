import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel.default({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/deleteResource.js'
            ],
            refresh: true,
        }),
    ],
});
