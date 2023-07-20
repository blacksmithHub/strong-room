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
      <Home :list="list" @fetch="fetch" :loading.sync="loading"/>
    </v-main>
  </v-app>
</template>

<script>
import _ from 'lodash'
import Contact from './api/contact'
import Home from './components/Home';

export default {
  name: 'App',

  components: {
    Home,
  },

  data () {
    return {
      list: null,
      loading: false
    }
  },

  created () {
    this.loading = true
    this.fetch()
  },

  methods: {
    fetch: _.debounce(async function (form = {}) {
      this.loading = true
      let payload = {}

      if(Object.keys(form).length) {
        payload = {
          search_criteria: {
            sort_orders: [
              {
                field: 'logins.username',
                direction: form.sort
              }
            ]
          }
        }

        const filter_groups = []
        
        if(form.search) {
          filter_groups.push({
            filters: [
              {
                field: 'contacts.name',
                value: `%${form.search}%`,
                condition_type: 'like'
              },
              {
                field: 'contacts.email_address',
                value: `%${form.search}%`,
                condition_type: 'like'
              }
            ]
          })
        }

        if(form.filter) {
          filter_groups.push({
            filters: [
              {
                field: 'contacts.email_address',
                value: `%${form.filter}%`,
                condition_type: 'like'
              }
            ]
          })
        }

        if(filter_groups.length) {
          payload.search_criteria = {
            ...payload.search_criteria,
            filter_groups: filter_groups
          }
        }
      }

      await Contact.search(payload)
        .then(({ data }) => {
          this.list = data
        })
        .finally(() => {
          this.loading = false
        })
    }, 300)
  }
};
</script>
