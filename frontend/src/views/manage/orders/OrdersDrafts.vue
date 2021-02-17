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

    <app-mgmt-grid :columns="options.columns" :api="options.api"></app-mgmt-grid>
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
          { label: 'Draft order', field: 'draft_no' },
          { label: 'Date', field: 'created_at' },
          { label: 'Customer', field: 'customer_name' },
          { label: 'Status', field: 'status_label' },
          { label: 'Total', field: 'total_amount' },
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
    }
  }
}
</script>

<style>

</style>