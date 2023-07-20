import api from './index'
import Config from '@/config/app'

const {
  http
} = api

/**
 * ===================
 * Contact API
 * ===================
 */
export default {
  baseUrl: Config.services.url,
  url: 'api/contacts',
  http,

    /**
     * Search for specific resources in the database.
     *
     */
    search (payload = {}) {
        return this.http(this.baseUrl).post(`${this.url}/search`, payload)
    }
}
