import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/nav.css',
                'resources/css/style_validation.css',
                'resources/sass/app.scss',
                'resources/sass/404.scss',
                'resources/js/app.js',
                'resources/js/admin_gestionUsuarios.js',
                'resources/js/buscar_en_tabla.js',
            ],
            refresh: true,
        }),
    ],
});
