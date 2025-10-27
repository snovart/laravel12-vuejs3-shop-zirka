// resources/js/front/store/auth.js
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    loading: false,
    error: null,
  }),
  getters: {
    isAuthenticated: (s) => !!s.user,
  },
  actions: {
    async check(http) {
      this.loading = true
      this.error = null
      try {
        const { data } = await http.get('/auth/me')
        this.user = data?.user || null
      } catch (e) {
        this.user = null
        this.error = e?.message || 'Auth check failed'
      } finally {
        this.loading = false
      }
    },
  },
})
