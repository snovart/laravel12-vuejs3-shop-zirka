// resources/js/front/api/auth.js
// Auth API methods

// Base path for auth endpoints
const AUTH_BASE = '/auth/'

/**
 * Get current authenticated user (or null if guest).
 * @param {import('axios').AxiosInstance} http
 */
export function apiAuthMe(http) {
  return http.get(AUTH_BASE + 'me').then(r => r.data)
}

/**
 * Login with email and password.
 * @param {import('axios').AxiosInstance} http
 * @param {{email:string,password:string}} payload
 */
export function apiLogin(http, payload) {
  return http.post(AUTH_BASE + 'login', payload).then(r => r.data)
}

/**
 * Register a new user.
 * @param {import('axios').AxiosInstance} http
 * @param {{name:string,email:string,password:string}} payload
 */
export function apiRegister(http, payload) {
  return http.post(AUTH_BASE + 'register', payload).then(r => r.data)
}

/**
 * Logout current user.
 * @param {import('axios').AxiosInstance} http
 */
export function apiLogout(http) {
  return http.post(AUTH_BASE + 'logout').then(r => r.data)
}
