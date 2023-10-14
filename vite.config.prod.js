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
            // Otras configuraciones para producción si es necesario
        }),
    ],
    build: {
        // Configuraciones específicas para producción
        outDir: 'public/build', // Directorio de salida para los archivos de construcción
        assetsDir: '', // Directorio de activos (assets) en la carpeta outDir
        minify: true, // Minificación de archivos en producción
        sourcemap: false, // Desactivar generación de sourcemaps en producción
    },
    // Otras configuraciones específicas para producción si es necesario
    define: {
        'process.env.NODE_ENV': 'production',
    },
});
