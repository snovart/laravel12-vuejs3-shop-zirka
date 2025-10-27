// resources/js/front/api/http.js
import axios from 'axios'

const http = axios.create({
  baseURL: '/api',
  withCredentials: true, // обязательно для Sanctum cookie
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    'Accept': 'application/json',
  },
})

/**
 * Get CSRF cookie before any POST login/register requests
 */
export async function ensureCsrfCookie() {
  await axios.get('/sanctum/csrf-cookie', { withCredentials: true })
}

export default http
