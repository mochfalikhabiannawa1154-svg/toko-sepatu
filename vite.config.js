import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // <-- Tambahkan import ini

export default defineConfig({
    plugins: [
        tailwindcss(), // <-- Pasang plugin Tailwind v4 di sini
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});