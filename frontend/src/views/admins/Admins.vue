<template>
  <b-card no-body>
    <div class="card-header">
      <!-- Title & SubTitle -->
      <div>
        <b-card-title>Admin Users</b-card-title>
      </div>

      <div>
        <b-button variant="flat-primary" class="btn-icon" v-ripple.400="'rgba(113, 102, 240, 0.15)'" @click="$refs.table.refresh()">
          <feather-icon icon="RefreshCwIcon"></feather-icon>
        </b-button>
        <b-button variant="primary" v-b-modal.registerModal>Register</b-button>
      </div>
    </div>

    <b-table responsive="md" :items="query" :fields="fields" :isBusy.sync="itemsLoading" ref="table">
      <template #table-busy>
        <div class="text-center my-2">
          <b-spinner type="grow" label="Loading..."></b-spinner>
        </div>
      </template>

      <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
    </b-table>

    <b-modal id="registerModal" title="Register admin user" hide-footer>
      <admins-register :onSuccess="onRegister"></admins-register>
    </b-modal>
  </b-card>
</template>

<script>
import { BCard, BCardTitle, BTable, BButton, BModal, BSpinner } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import AdminsRegister from './AdminsRegister'

export default {
  name: 'admins-admins',

  components: {
    BCard,
    BCardTitle,
    BTable,
    BButton,
    BModal,
    BSpinner,
    AdminsRegister
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      fields: [
        'index',
        { key: 'name', label: 'Name' },
        { key: 'email', label: 'Email' },
        { key: 'role_nm', label: 'Role' },
        { key: 'created_at_parsed', label: 'Registered' },
      ],
      items: [],
      itemsLoading: false,
    }
  },

  methods: {
    query () {
      let promise = this.$http.get('/api/admins', {
        params: {
          limit: -1,
          with: 'role'
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