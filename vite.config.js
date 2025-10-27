import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
  plugins: [
    vue(),
    laravel({
      input: [
        'resources/js/front/app.js',
        'resources/js/dashboard/app.js',
        'resources/css/app.css',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@front': path.resolve(__dirname, 'resources/js/front'),
      '@dashboard': path.resolve(__dirname, 'resources/js/dashboard'),
      '@shared': path.resolve(__dirname, 'resources/js/shared'),
    },
  },
})
