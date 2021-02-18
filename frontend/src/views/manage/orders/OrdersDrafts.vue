<template>
  <app-mgmt>
    <app-mgmt-header :tabs="options.tabs"></app-mgmt-header>

    <div class="form-row px-1 pb-1">
      <div class="col">
        <app-mgmt-input-search v-model="filter.search" />
      </div>

      <div class="col-1">
        <app-mgmt-input-dropdown v-model="filter.status" :options="statuses" text="Status" @change="onStatusChange" />
      </div>

      <div class="col-1">
        <app-mgmt-button block @click="onFilter">Filter</app-mgmt-button>
      </div>
    </div>

    <app-mgmt-grid :columns="options.columns" :api="options.api" @on-row-dblclick="onRowClick"></app-mgmt-grid>
  </app-mgmt>
</template>

<script>
import AppMgmt from '@/@core/components/app-mgmt/AppMgmt.vue'
import AppMgmtHeader from '@/@core/components/app-mgmt/AppMgmtHeader.vue'
import AppMgmtInputSearch from '@/@core/components/app-mgmt/AppMgmtInputSearch.vue'
import AppMgmtInputDropdown from '@/@core/components/app-mgmt/AppMgmtInputDropdown.vue'
import AppMgmtButton from '@/@core/components/app-mgmt/AppMgmtButton.vue'
import AppMgmtGrid from '@/@core/components/app-mgmt/AppMgmtGrid.vue'

export default {
  name: 'manage-orders-drafts',

  components: {
    AppMgmt,
    AppMgmtHeader,
    AppMgmtInputSearch,
    AppMgmtInputDropdown,
    AppMgmtButton,
    AppMgmtGrid
  },

  data () {
    return {
      options: {
        tabs: [
          { key: 'all', title: 'All', active: true },
          { key: 'sent', title: 'Invoice sent', active: false },
          { key: 'completed', title: 'Completed', active: false },
        ],

        api: "/api/drafts",
        columns: [
          { label: 'Draft order', field: 'id', sortable: true, formatFn: (val) => '#D' + val },
          { label: 'Date', field: 'created_at', type: 'date', dateInputFormat: 'yyyy-MM-dd HH:mm', dateOutputFormat: 'MMM do yyyy', sortable: true },
          { label: 'Customer', field: 'customer_name', sortable: false },
          { label: 'Status', field: 'status_label', sortable: false },
          { label: 'Total', field: 'total_amount', type: 'decimal', sortable: true, formatFn: (val) => 'MNT ' + val },
        ]
      },

      filter: {
        search: null,
        status: []
      },

      statuses: [
        { text: 'Open', value: 'open' },
        { text: 'Invoice Sent', value: 'sent' },
        { text: 'Completed', value: 'completed' },
      ]
    }
  },

  methods: {
    tabClick (tab) {
      console.log(tab)
    },

    onStatusChange () {
      console.log(this.filter.status)
    },

    onFilter () {
      this.filter.status = ['open']
    },

    onRowClick (params) {
      console.log(params)
    }
  }
}
</script>

<style>

</style>