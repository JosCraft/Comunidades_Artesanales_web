import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/nav.css',
                'resources/css/style_validation.css',
                'resources/css/sidebarAdmin.css',
                'resources/sass/app.scss',
                'resources/sass/404.scss',
                'resources/js/app.js',
                'resources/js/admin_gestionUsuarios.js',
                'resources/js/buscar_en_tabla.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: true, // Escucha en todas las interfaces de red
        port: 3000, // Puedes cambiar el puerto si lo deseas
        hmr: {
            host: '192.168.1.100', // O la IP de tu servidor si es necesario
        },
    },
});
