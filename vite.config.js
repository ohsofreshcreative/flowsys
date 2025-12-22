import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin'
// --- POCZĄTEK ZMIANY ---
// Importujemy moduł 'path' z Node.js, aby stworzyć absolutną ścieżkę
import path from 'path'
// --- KONIEC ZMIANY ---

export default defineConfig(({ command }) => ({
  server: {
    host: 'flowsys.local',
    port: 5981,
    strictPort: true,
    cors: true,
    hmr: {
      protocol: 'ws',
      host: 'flowsys.local',
      port: 5981,
    },
  },

  base: command === 'build'
    ? '/wp-content/themes/flowsys/public/build/'
    : '/build/',

  plugins: [
    // --- POCZĄTEK ZMIANY ---
    // Zmuszamy wtyczkę Tailwind do użycia konkretnego pliku konfiguracyjnego
    tailwindcss({
      config: path.resolve(__dirname, 'tailwind.config.js'),
    }),
    // --- KONIEC ZMIANY ---

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

    // Upraszczamy tę wtyczkę, usuwając ustawienia kolorów, które nie działały
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