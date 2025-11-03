// resources/js/front/app.js
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import http from '@front/api/http'
import { APP_NAME } from '@front/constants'
import { useAuth } from '@front/composables/useAuth'
import FrontApp from '@front/components/FrontApp.vue'
import UserDropdown from '@front/components/UserDropdown.vue'

// Create main Vue app
const app = createApp(FrontApp)
app.use(createPinia())

// Provide globals
app.provide('http', http)
app.config.globalProperties.$http = http
app.config.globalProperties.$appName = APP_NAME

// Kick off auth check
useAuth(http).check()

// Mount main SPA container (header has only small Vue widgets)
app.mount('#front-app')

/* -------------------------------
 * User dropdown (mounted on demand)
 * ------------------------------*/

// Remove any user dropdowns (new and legacy)
function cleanupAnyUserDropdowns(anchor) {
  // New ones (our wrapper)
  document.querySelectorAll('[data-user-dd]').forEach(el => {
    // If anchor passed — keep only elements inside it
    if (!anchor || !anchor.contains(el)) el.remove()
  })
  // Legacy leftovers from old implementation (mounted to body with fixed/right/top)
  document.querySelectorAll('.fixed.right-4.top-14.z-50').forEach(el => el.remove())
  document.querySelectorAll('.user-dropdown-floating').forEach(el => el.remove())
}

// Mount dropdown strictly under the anchor
function mountUserDropdown(anchor) {
  // Anchor must be positioned (relative) in Blade
  cleanupAnyUserDropdowns(anchor)

  const host = document.createElement('div')
  host.setAttribute('data-user-dd', '1')
  anchor.appendChild(host)

  const dd = createApp(UserDropdown)
  dd.provide('http', http)
  dd.mount(host)
}

let isOpen = false

// Toggle by click on the profile button
document.addEventListener('click', (e) => {
  const btn = e.target.closest('[data-modal="user"]')
  if (!btn) return

  e.preventDefault()

  const anchor = document.getElementById('user-dd-anchor')
  if (!anchor) return

  if (isOpen) {
    cleanupAnyUserDropdowns()
    isOpen = false
    return
  }

  mountUserDropdown(anchor)
  isOpen = true
})

// Close on click outside of the anchor/dropdown
document.addEventListener('click', (e) => {
  const anchor = document.getElementById('user-dd-anchor')
  if (!anchor) return
  const insideAnchor = anchor.contains(e.target)
  const insideDropdown = !!e.target.closest('[data-user-dd]')
  if (!insideAnchor && !insideDropdown) {
    cleanupAnyUserDropdowns()
    isOpen = false
  }
})

// Close on Escape
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    cleanupAnyUserDropdowns()
    isOpen = false
  }
})
