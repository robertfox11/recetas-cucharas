import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base : '/recetas-cucharas',
    server: {
        hmr: true
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // Configuraciones específicas para producción
        outDir: 'public/build', // Directorio de salida para los archivos de construcción
        assetsDir: 'assetsDir', // Directorio de activos (assets) en la carpeta outDir
        minify: true, // Minificación de archivos en producción
        sourcemap: false, // Desactivar generación de sourcemaps en producción
    },
    define: {
        'process.env.NODE_ENV': 'production',
    },
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
