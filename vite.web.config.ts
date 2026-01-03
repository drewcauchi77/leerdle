import { wayfinder } from '@laravel/vite-plugin-wayfinder';
// @ts-expect-error PHPStorm IDE Glitch
import tailwindcss from '@tailwindcss/vite';
// @ts-expect-error PHPStorm IDE Glitch
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig, UserConfig } from 'vite';

export default defineConfig((): UserConfig => ({
    build: {
        outDir: 'public/build-web',
        manifest: 'manifest.json',
        emptyOutDir: true,
    },
    server: {
        host: '0.0.0.0',
        port: 5174,
        strictPort: true,
        hmr: {
            host: '127.0.0.1',
            protocol: 'ws',
            port: 5174,
        },
        cors: true,
    },
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
            buildDirectory: 'build-web',
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        wayfinder({
            formVariants: true,
        }),
    ],
}));
