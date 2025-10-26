import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    vue(),
    laravel({
      input: [
        'resources/js/front/app.js', // front entry
        'resources/js/dashboard/app.js',    // dashboard SPA entry
        'resources/css/app.css',
      ],
      refresh: true,
    }),
  ],
})
