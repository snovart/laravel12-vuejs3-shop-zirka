<!-- resources/js/front/components/UserDropdown.vue -->
<template>
  <!-- positioned relative to #user-dd-anchor -->
  <div ref="menuEl" class="absolute right-0 top-full mt-3 z-50">
    <div class="w-48 rounded-md bg-white shadow-xl ring-1 ring-black/5">
      <ul class="py-2 text-sm text-gray-700">
        <li>
          <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Мій профіль</a>
        </li>
        <li>
          <a href="/orders" class="block px-4 py-2 hover:bg-gray-100">Замовлення</a>
        </li>
        <li v-if="isAdmin">
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
</template>

<script setup>
// Dropdown driven from app.js; here we only handle outside click to self-close
import { computed, inject, onMounted, onBeforeUnmount, ref } from 'vue'
import { useAuth } from '@front/composables/useAuth'

const emit = defineEmits(['close'])

const http = inject('http')
const { store, logout } = useAuth(http)

const isAdmin = computed(() => store.user?.role === 'admin')

const menuEl = ref(null)
function handleOutside(e) {
  if (!menuEl.value) return
  const inside = menuEl.value.contains(e.target)
  if (!inside) emit('close')
}
onMounted(() => document.addEventListener('click', handleOutside))
onBeforeUnmount(() => document.removeEventListener('click', handleOutside))

async function onLogout() {
  await logout()
  emit('close')
  window.location.href = '/'
}
</script>
