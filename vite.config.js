// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import Pusher from 'pusher-js';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js', // Your entry JavaScript file
            // output: 'public/js', // Your output directory
            refresh: true,
            // manifest: true,
            // clearConsole: false,
        }),
    ],
});