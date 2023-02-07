import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        // host: process.env.LARAVEL_SAIL ? Object.values(os.networkInterfaces()).flat().find(info => info?.internal === false)?.address : undefined,
        hmr: {
            host: 'localhost',
            port:5173
        },
        watch:{
            usePolling:true
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],
        }),
        
    ],
});
