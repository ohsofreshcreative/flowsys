import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin'

export default defineConfig(({ command }) => ({
  server: {
    host: 'tlc.local',
    port: 5981,
    strictPort: true,
    cors: true,
    origin: 'http://tlc.local:5981',

    hmr: {
      protocol: 'ws',
      host: 'tlc.local',
      port: 5981,
    },
  },

  base: command === 'build'
    ? '/wp-content/themes/tlc/public/build/'
    : '/build/',

  plugins: [
    tailwindcss(),

    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/editor.css',
        'resources/js/editor.js',
      ],
      refresh: true,
    }),

    wordpressPlugin(),

    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
    }),
  ],

  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
}))