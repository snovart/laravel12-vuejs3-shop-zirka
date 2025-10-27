// resources/js/front/app.js
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import http from '@front/api/http'
import { APP_NAME } from '@front/constants'
import { useAuth } from '@front/composables/useAuth'
import FrontApp from '@front/components/FrontApp.vue'

const app = createApp(FrontApp)
app.use(createPinia())

app.provide('http', http)
app.config.globalProperties.$http = http
app.config.globalProperties.$appName = APP_NAME

// Kick off auth check via composable (pass http explicitly)
useAuth(http).check()

app.mount('#front-app')
