<!-- resources/js/front/components/modals/CartModal.vue -->
<template>
  <!-- Backdrop -->
  <div class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center" @click.self="emit('close')">
    <!-- Modal card -->
    <div class="bg-white rounded shadow-xl w-full max-w-lg p-6">
      <h2 class="text-xl font-semibold text-center mb-4">Кошик</h2>

      <!-- Cart items list -->
      <div v-if="items.length > 0" class="divide-y divide-gray-200">
        <div
          v-for="(item, index) in items"
          :key="index"
          class="flex justify-between items-center py-3"
        >
          <div>
            <p class="font-medium">{{ item.name }}</p>
            <p class="text-sm text-gray-500">x{{ item.qty }}</p>
          </div>
          <p class="font-semibold">{{ item.price * item.qty }} ₴</p>
        </div>
      </div>

      <!-- Empty cart -->
      <div v-else class="text-center text-gray-600 py-6">
        Кошик порожній
      </div>

      <!-- Footer buttons -->
      <div class="flex gap-2 pt-4">
        <button
          type="button"
          class="flex-1 py-2 rounded bg-gray-900 text-white"
          :disabled="items.length === 0"
          @click="goToCheckout"
        >
          Оформити замовлення
        </button>
        <button
          type="button"
          class="flex-1 py-2 rounded border"
          @click="emit('close')"
        >
          Закрити
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
// Cart modal (placeholder version)
import { computed } from 'vue'
import { useAuthStore } from '@front/store/auth'
import { useModalsStore } from '@front/store/modals'

const emit = defineEmits(['close'])

const auth = useAuthStore()
const modals = useModalsStore()

// Mock data for now; later we’ll connect real cart composable
const items = computed(() => [
  { name: 'Тестовий товар', qty: 2, price: 350 },
  { name: 'Ще один товар', qty: 1, price: 200 },
])

function goToCheckout() {
  if (!auth.isAuthenticated) {
    modals.close('cart')
    modals.open('login')
  } else {
    window.location.href = '/checkout'
  }
}
</script>
