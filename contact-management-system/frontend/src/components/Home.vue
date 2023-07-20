<template>
    <v-container>
    <v-row>
      <v-col cols="12">
        <v-card>
          <v-card-text>
            <v-row>
              <v-col
                cols="12"
                md="4"
              >
                <v-text-field
                  v-model="form.search"
                  label="Search"
                  outlined
                  dense
                  hide-details
                  color="black"
                  append-icon="mdi-magnify"
                  rounded
                  clearable
                  @keyup.enter="fetch"
                  @click:append="fetch"
                />
              </v-col>

              <v-col
                cols="12"
                md="4"
              >
                <v-text-field
                  v-model="form.filter"
                  label="Email Domain"
                  outlined
                  dense
                  hide-details
                  color="black"
                  prepend-inner-icon="mdi-at"
                  rounded
                  clearable
                  @keyup.enter="fetch"
                  @click:append="fetch"
                />
              </v-col>

              <v-col
                cols="12"
                md="4"
              >
                <v-select
                  v-model="form.sort"
                  label="Username"
                  :items="directions"
                  outlined
                  rounded
                  dense
                  hide-details
                  item-text="text"
                  item-value="value"
                  @input="fetch"
                />
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>

      <v-col cols="12">
        <v-card>
          <v-card-text>
            <template v-if="loading">
              <v-skeleton-loader
                v-for="item in 3"
                :key="item"
                type="list-item-avatar-three-line"
              />
            </template>

            <template v-else>
              <v-list three-line v-if="list">
                <template v-for="(item, index) in list.data">
                  <v-divider
                    v-if="index"
                    :key="index"
                    inset
                  ></v-divider>

                  <v-list-item
                    :key="item.title"
                  >
                    <v-list-item-avatar>
                      <v-img src="https://source.unsplash.com/featured"></v-img>
                    </v-list-item-avatar>

                    <v-list-item-content>
                      <v-list-item-title v-html="item.name" class="font-weight-bold"></v-list-item-title>
                      <v-list-item-subtitle><strong>Username:</strong> {{ item.username }}</v-list-item-subtitle>
                      <v-list-item-subtitle><strong>Email Address:</strong> {{ item.email_address }}</v-list-item-subtitle>
                      <v-list-item-subtitle><strong>Phone Number:</strong> {{ item.phone_number }}</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </template>
              </v-list>
            </template>
          </v-card-text>

          <v-card-actions class="justify-center" v-if="!loading">
            <v-pagination
              v-if="list"
              v-model="form.page"
              :length="list.last_page"
              circle
              :total-visible="5"
              @input="fetch"
            />
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  export default {
    name: 'Home',

    props: {
      list: {
        required: true
      },
      loading: {
        required: true
      }
    },

    data() {
      return {
        form: {
          search: null,
          page: 1,
          sort: 'ASC',
          filter: null
        },
        directions: [
          {
            text: 'Ascending',
            value: 'ASC'
          },
          {
            text: 'Descending',
            value: 'DESC'
          }
        ]
      }
    },

    watch: {
      'form.search' () {
        if(!this.form.search) this.fetch()
      },
      'form.filter' () {
        if(!this.form.filter) this.fetch()
      },
    },

    methods: {
      fetch () {
        this.$emit('update:loading', true)
        this.$emit('fetch', this.form);
      }
    }
  }
</script>