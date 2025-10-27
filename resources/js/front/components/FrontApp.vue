<!-- resources/js/front/components/FrontApp.vue -->
<template>
  <div>
    <!-- User dropdown (only when authenticated) -->
    <div
      v-if="auth.isAuthenticated && showUserMenu"
      class="fixed right-4 top-14 z-50"
    >
      <div class="w-48 rounded-md bg-white shadow-xl ring-1 ring-black/5">
        <ul class="py-2 text-sm text-gray-700">
          <li>
            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Мій профіль</a>
          </li>
          <li>
            <a href="/orders" class="block px-4 py-2 hover:bg-gray-100">Замовлення</a>
          </li>
          <li v-if="auth.user?.role === 'admin'">
            <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">Адмінка</a>
          </li>
          <li>
            <button
              type="button"
              class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600"
              @click="onLogout"
            >
              Вийти
            </button>
          </li>
        </ul>
      </div>
    </div>

    <!-- Login/Register modal -->
    <LoginModal v-if="modals.loginOpen" @close="modals.close('login')" />

    <!-- Cart modal (оставляем, но ты пока не используешь) -->
    <CartModal v-if="modals.cartOpen" @close="modals.close('cart')" />
  </div>
</template>

<script setup>
// Root modals manager: connects global stores and mounts modal components
import { onMounted, onBeforeUnmount, ref, inject } from 'vue'
import { useModalsStore } from '@front/store/modals'
import { useAuthStore } from '@front/store/auth'
import { useAuth } from '@front/composables/useAuth'

import LoginModal from '@front/components/modals/LoginModal.vue'
import CartModal from '@front/components/modals/CartModal.vue'

const modals = useModalsStore()
const auth = useAuthStore()
const showUserMenu = ref(false)

// use logout from useAuth (у нас уже есть logout в composable)
const http = inject('http')
const { logout } = useAuth(http)

function headerClickHandler(e) {
  const target = e.target.closest('[data-modal]')
  if (!target) return

  const type = target.getAttribute('data-modal')

  if (type === 'cart') {
    modals.toggle('cart')
    return
  }

  if (type === 'user') {
    if (auth.isAuthenticated) {
      showUserMenu.value = !showUserMenu.value
    } else {
      modals.open('login')
    }
  }
}

function outsideClickHandler(e) {
  // Закрываем меню по клику вне кнопки и вне самого меню
  const clickedUserBtn = !!e.target.closest('[data-modal="user"]')
  const clickedMenu = !!e.target.closest('.user-menu-panel')
  if (!clickedUserBtn && !clickedMenu) {
    showUserMenu.value = false
  }
}

onMounted(() => {
  const header = document.getElementById('site-header')
  if (header) {
    // capture = true, чтобы поймать ранние клики
    header.addEventListener('click', headerClickHandler, true)
  }
  document.addEventListener('click', outsideClickHandler)
})

onBeforeUnmount(() => {
  const header = document.getElementById('site-header')
  if (header) {
    header.removeEventListener('click', headerClickHandler, true)
  }
  document.removeEventListener('click', outsideClickHandler)
})

async function onLogout() {
  await logout()
  showUserMenu.value = false
}
</script>

<style scoped>
/* Помечаем панель для outsideClickHandler */
.user-menu-panel {}
</style>
