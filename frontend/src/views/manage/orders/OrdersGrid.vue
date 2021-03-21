<template>
  <app-mgmt>
    <app-mgmt-header :tabs="options.tabs"></app-mgmt-header>

    <div class="form-row px-1 pb-1">
      <div class="col-2">
        <app-mgmt-input-search v-model="filter.search" />
      </div>

    </div>

    <app-mgmt-grid 
      ref="grid"
      :columns="options.columns" 
      :api="options.api" 
      :columnFilters="{status_cd: filter.status}"
      @on-row-dblclick="onRowClick" 
      :searchOptions="{
        enabled: true,
        trigger: 'enter',
        externalQuery: filter.search
      }">
    </app-mgmt-grid>
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
  name: 'manage-orders-grid',

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
      filter: {
        search: '',
        status: []
      },

      statuses: [],

      options: {
        tabs: [
          { key: 'all', title: 'All', active: true }
        ],

        api: "/api/drafts",
        columns: [
          { label: 'Order #', field: 'id', sortable: true, formatFn: (val) => '#D' + val, filterOptions: { enabled: true, placeholder: 'Filter from draft number'} },
          { label: 'Date', field: 'created_at', type: 'date', dateInputFormat: 'yyyy-MM-dd HH:mm', dateOutputFormat: 'yyyy-MM-dd HH:mm', sortable: true, filterOptions: { enabled: true, placeholder: 'Search date'} },
          { label: 'Customer', field: 'customer_name', sortable: false, filterOptions: { enabled: true, placeholder: 'Search customer'} },
          { 
            label: 'Status',
            field: 'status_cd',
            sortable: false,
            formatFn: (val) => {
              let text = val
              this.statuses.forEach(status => {
                if (status.value == val) {
                  text = status.text
                }
              });
              return text
            },
            filterOptions: { enabled: true, filterDropdownItems: [], placeholder: 'Filter from status'}
          },
          { label: 'Total', field: 'total_amount', type: 'decimal', sortable: true, formatFn: (val) => 'MNT ' + val, filterOptions: { enabled: true, placeholder: 'Filter total amount'} },
        ]
      }
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
      console.log(this.$refs.grid)
      this.$refs.grid.loadItems()
    },

    onRowClick (params) {
      console.log(params)
    }
  },

  mounted () {
    // 
  }
}
</script>

<style>

</style>