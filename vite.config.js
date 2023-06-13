import { defineConfig } from 'vite';
import inject from '@rollup/plugin-inject'
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        inject({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
        })
    ]

});
