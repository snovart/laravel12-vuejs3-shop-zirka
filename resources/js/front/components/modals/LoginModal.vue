<!-- resources/js/front/components/modals/LoginModal.vue -->
<template>
  <!-- Backdrop -->
  <div class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center" @click.self="emit('close')">
    <!-- Modal card -->
    <div class="bg-white rounded shadow-xl w-full max-w-md p-6">
      <h2 class="text-xl font-semibold text-center mb-4">Увійти / Реєстрація</h2>

      <!-- Tabs -->
      <div class="flex gap-2 mb-4">
        <button
          class="flex-1 py-2 rounded border"
          :class="tab === 'login' ? 'bg-gray-900 text-white' : 'bg-white'"
          @click="tab = 'login'"
        >
          Увійти
        </button>
        <button
          class="flex-1 py-2 rounded border"
          :class="tab === 'register' ? 'bg-gray-900 text-white' : 'bg-white'"
          @click="tab = 'register'"
        >
          Реєстрація
        </button>
      </div>

      <!-- Login form -->
      <form v-if="tab === 'login'" class="space-y-3" @submit.prevent="onLogin">
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input v-model="loginData.email" type="email" class="w-full border rounded px-3 py-2" required />
        </div>
        <div>
          <label class="block text-sm mb-1">Пароль</label>
          <input v-model="loginData.password" type="password" class="w-full border rounded px-3 py-2" required />
        </div>

        <p v-if="error" class="text-red-600 text-sm">{{ error }}</p>

        <div class="flex gap-2 pt-2">
          <button type="submit" class="flex-1 py-2 rounded bg-gray-900 text-white" :disabled="loading">
            {{ loading ? '...' : 'Увійти' }}
          </button>
          <button type="button" class="flex-1 py-2 rounded border" @click="emit('close')">Закрити</button>
        </div>
      </form>

      <!-- Register form -->
      <form v-else class="space-y-3" @submit.prevent="onRegister">
        <div>
          <label class="block text-sm mb-1">Ім’я</label>
          <input v-model="registerData.name" type="text" class="w-full border rounded px-3 py-2" required />
        </div>
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input v-model="registerData.email" type="email" class="w-full border rounded px-3 py-2" required />
        </div>
        <div>
          <label class="block text-sm mb-1">Пароль</label>
          <input v-model="registerData.password" type="password" class="w-full border rounded px-3 py-2" required />
        </div>

        <p v-if="error" class="text-red-600 text-sm">{{ error }}</p>

        <div class="flex gap-2 pt-2">
          <button type="submit" class="flex-1 py-2 rounded bg-gray-900 text-white" :disabled="loading">
            {{ loading ? '...' : 'Зареєструватися' }}
          </button>
          <button type="button" class="flex-1 py-2 rounded border" @click="emit('close')">Закрити</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
// Auth modal with login/register tabs
import { reactive, ref, inject } from 'vue'
import { useAuth } from '@front/composables/useAuth'

const emit = defineEmits(['close'])

const http = inject('http')
const { store, login, register } = useAuth(http)

const tab = ref('login')
const loading = ref(false)
const error = ref('')

const loginData = reactive({
  email: '',
  password: '',
})

const registerData = reactive({
  name: '',
  email: '',
  password: '',
})

async function onLogin() {
  error.value = ''
  loading.value = true
  try {
    await login(loginData.email, loginData.password)
    emit('close')
  } catch {
    error.value = store.error || 'Помилка входу'
  } finally {
    loading.value = false
  }
}

async function onRegister() {
  error.value = ''
  loading.value = true
  try {
    await register(registerData.name, registerData.email, registerData.password)
    emit('close')
  } catch {
    error.value = store.error || 'Помилка реєстрації'
  } finally {
    loading.value = false
  }
}
</script>
