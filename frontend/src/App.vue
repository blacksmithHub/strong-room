<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
          transition="scale-transition"
          width="40"
        />

        <v-img
          alt="Vuetify Name"
          class="shrink mt-1 hidden-sm-and-down"
          contain
          min-width="100"
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-name-dark.png"
          width="100"
        />
      </div>
    </v-app-bar>

    <v-main>
      <Home :count="count" />
    </v-main>
  </v-app>
</template>

<script>
import _ from 'lodash'
import Coderbyte from './api/coderbyte'
import Home from './components/Home';

export default {
  name: 'App',

  components: {
    Home,
  },

  data () {
    return {
      count: 0,
      timerId: null
    }
  },

  created () {
    this.init()
  },

  methods: {
    async init () {
      clearInterval(this.timerId)

      await this.fetch()

      this.timerId = setInterval(async () => {
        await this.fetch()
      }, 3000)
    },

    fetch: _.debounce(async function () {
      await Coderbyte.fetchAgeCounting()
        .then(({ data }) => {
          if(this.count !== data.count) this.count = data.count
        })
    }, 2000)
  }
};
</script>
