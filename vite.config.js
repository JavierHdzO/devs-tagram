import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import os from 'os';

export default defineConfig({
    server: {
        // host: process.env.LARAVEL_SAIL ? Object.values(os.networkInterfaces()).flat().find(info => info?.internal === false)?.address : undefined,
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
        
        }),
    ],
});
