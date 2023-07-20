import api from './index'
import Config from '@/config/app'

const {
  http
} = api

/**
 * ===================
 * CoreByte API
 * ===================
 */
export default {
  baseUrl: Config.services.url,
  url: 'age-counting',
  http,

    /**
     * Get total count that have an age equal to or greater than 50.
     *
     */
    fetchAgeCounting () {
        return this.http(this.baseUrl).get(this.url)
    }
}
