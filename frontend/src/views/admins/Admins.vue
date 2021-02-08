<template>
  <b-card no-body>
    <div class="card-header">
      <!-- Title & SubTitle -->
      <div>
        <b-card-title>Admin Users</b-card-title>
      </div>

      <b-button variant="primary">Register</b-button>
    </div>
    <b-table responsive="md" :items="items" :fields="fields">
      <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
    </b-table>
  </b-card>
</template>

<script>
import { BCard, BCardTitle, BTable, BButton } from 'bootstrap-vue'

export default {
  name: 'admins-admins',

  components: {
    BCard,
    BCardTitle,
    BTable,
    BButton
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
      items: []
    }
  },

  created () {
    this.$http.get('/api/admins', {
      params: {
        limit: -1,
        with: 'role'
      }
    })
    .then(res => {
      this.items = res.data.data
    })
    .catch(err => {
      console.log(err)
    })
  }
}
</script>

<style>

</style>