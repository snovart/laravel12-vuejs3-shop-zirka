// Pinia store to control global modals (login/register, cart, etc.)
import { defineStore } from 'pinia'

export const useModalsStore = defineStore('modals', {
  state: () => ({
    loginOpen: false,
    cartOpen: false,
  }),
  actions: {
    // Generic open/close helpers
    open(name) {
      // name: 'login' | 'cart'
      if (name === 'login') this.loginOpen = true
      if (name === 'cart') this.cartOpen = true
    },
    close(name) {
      if (name === 'login') this.loginOpen = false
      if (name === 'cart') this.cartOpen = false
    },
    closeAll() {
      this.loginOpen = false
      this.cartOpen = false
    },
    toggle(name) {
      if (name === 'login') this.loginOpen = !this.loginOpen
      if (name === 'cart') this.cartOpen = !this.cartOpen
    },
  },
})
