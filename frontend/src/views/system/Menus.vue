<template>
  <b-card no-body>

    <div class="card-header">
      <!-- Title & SubTitle -->
      <div>
        <b-card-title>Edelweiss Web Menus</b-card-title>
      </div>

      <div>
        <b-button variant="flat-primary" class="btn-icon" v-ripple.400="'rgba(113, 102, 240, 0.15)'" @click="$refs.table.refresh()">
          <feather-icon icon="RefreshCwIcon"></feather-icon>
        </b-button>
      </div>
    </div>

  </b-card>
</template>

<script>
import { BCard, BCardTitle, BTable, BButton, BModal, BSpinner } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
  name: 'admins-menus',

  components: {
    BCard,
    BCardTitle,
    BTable,
    BButton,
    BModal,
    BSpinner
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      fields: [
        'index',
        { key: 'name', label: 'Name' },
        { key: 'url', label: 'URL' },
        'action'
      ],
      items: [],
      itemsLoading: false,
    }
  },

  methods: {
    query () {
      let promise = this.$http.get('/api/menus', {
        params: {
          limit: -1
        }
      })

      return promise.then((res) => {
        const items = res.data.data

        return (items)
      }).catch(error => {
        return []
      })
    },

    onRegister () {
      this.$refs.table.refresh()
    }
  }
}
</script>

<style>

</style>