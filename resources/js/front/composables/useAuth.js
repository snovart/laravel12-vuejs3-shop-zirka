// resources/js/front/composables/useAuth.js
// Composable for user authentication logic

import { useAuthStore } from '@front/store/auth'
import { apiAuthMe, apiLogin, apiRegister, apiLogout } from '@front/api/auth'
import { ensureCsrfCookie } from '@front/api/http' // get Sanctum CSRF cookie before stateful requests
import { AUTH_MESSAGES } from '@front/constants/authConstants' // centralized UI text constants

export function useAuth(http) {
  const store = useAuthStore()

  /**
   * Check if user is authenticated
   */
  async function check() {
    // NOTE: store.check should call /api/auth/me (or similar)
    await store.check(http)
  }

  /**
   * Login with email and password
   */
  async function login(email, password) {
    store.loading = true
    store.error = null
    try {
      // Must set XSRF-TOKEN cookie for Sanctum before POST
      await ensureCsrfCookie()

      const data = await apiLogin(http, { email, password })
      store.user = data.user || null
      return data
    } catch (e) {
      store.error = e?.response?.data?.message || AUTH_MESSAGES.LOGIN_ERROR
      throw e
    } finally {
      store.loading = false
    }
  }

  /**
   * Register new user
   */
  async function register(name, email, password) {
    store.loading = true
    store.error = null
    try {
      // Must set XSRF-TOKEN cookie for Sanctum before POST
      await ensureCsrfCookie()

      const data = await apiRegister(http, { name, email, password })
      store.user = data.user || null
      return data
    } catch (e) {
      store.error = e?.response?.data?.message || AUTH_MESSAGES.REGISTER_ERROR
      throw e
    } finally {
      store.loading = false
    }
  }

  /**
   * Logout current user
   */
  async function logout() {
    store.loading = true
    store.error = null
    try {
      // Ensure CSRF cookie exists for stateful POST logout as well
      await ensureCsrfCookie()

      await apiLogout(http)
      store.user = null
    } catch (e) {
      store.error = e?.response?.data?.message || AUTH_MESSAGES.LOGOUT_ERROR
      throw e
    } finally {
      store.loading = false
    }
  }

  return {
    store,
    check,
    login,
    register,
    logout,
  }
}
