<template>
  <b-card no-body>

    <div class="card-header">
      <!-- Title & SubTitle -->
      <div>
        <b-card-title>Common Codes</b-card-title>
      </div>

      <div>
        <b-button variant="flat-primary" class="btn-icon" v-ripple.400="'rgba(113, 102, 240, 0.15)'" @click="$refs.table.refresh()">
          <feather-icon icon="RefreshCwIcon"></feather-icon>
        </b-button>
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

      <template #cell(action)="data">
        <b-button variant="outline-primary" v-b-modal.subCodesModal @click="showSubCodes(data.item.comm1_cd)" size="sm">SUB CODES</b-button>
      </template>
    </b-table>

    <b-modal id="subCodesModal" title="Sub Codes" hide-footer>
      <b-table :items="items2" :fields="fields2" :isBusy.sync="items2Loading">
        <template #table-busy>
          <div class="text-center my-2">
            <b-spinner type="grow" label="Loading..."></b-spinner>
          </div>
        </template>

        <template #cell(index)="data">
          {{ data.index + 1 }}
        </template>
      </b-table>
    </b-modal>

  </b-card>
</template>

<script>
import { BCard, BCardTitle, BTable, BButton, BModal, BSpinner } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
  name: 'admins-codes',

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
        { key: 'comm1_cd', label: 'Code' },
        { key: 'comm2_nm', label: 'Name' },
        'action'
      ],
      items: [],
      itemsLoading: false,

      fields2: [
        'index',
        { key: 'comm1_cd', label: 'Code' },
        { key: 'comm2_nm', label: 'Name' }
      ],
      items2: [],
      items2Loading: false,
    }
  },

  methods: {
    query () {
      let promise = this.$http.get('/api/codes', {
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

    showSubCodes (cd1) {
      this.items2Loading = true
      this.$http.get('/api/codes/' + cd1)
        .then((res) => {
          this.items2Loading = false
          this.items2 = res.data.data
        })
        .catch((err) => {
          this.items2Loading = false
          this.items2 = []
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