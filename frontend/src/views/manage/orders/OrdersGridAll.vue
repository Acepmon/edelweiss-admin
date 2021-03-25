<template>
  <div>
    <div class="form-row px-1 pb-1">
      <div class="col-2">
        <app-mgmt-input-search v-model="filter.search" />
      </div>

    </div>
    <app-mgmt-grid 
      ref="grid"
      :columns="options.columns" 
      :api="options.api" 
      @on-row-click="onRowClick" 
      :searchOptions="{
        enabled: true,
        trigger: 'enter',
        externalQuery: filter.search
      }">
    </app-mgmt-grid>
  </div>
</template>

<script>
import AppMgmtGrid from '@/@core/components/app-mgmt/AppMgmtGrid.vue'
import AppMgmtInputSearch from '@/@core/components/app-mgmt/AppMgmtInputSearch.vue'
import AppMgmtInputDropdown from '@/@core/components/app-mgmt/AppMgmtInputDropdown.vue'

export default {
  name: 'manage-orders-grid-all',

  components: {
    AppMgmtGrid,
    AppMgmtInputSearch,
    AppMgmtInputDropdown
  },

  data () {
    return {
      filter: {
        search: '',
        status: []
      },

      statuses: [],

      options: {
        api: "/api/orders?with=products",
        columns: [
          { label: 'Order #', field: 'id', sortable: true, formatFn: (val) => '#' + val, filterOptions: { enabled: false, placeholder: 'Filter from draft number'} },
          { label: 'Date', field: 'created_at', type: 'date', dateInputFormat: 'yyyy-MM-dd HH:mm', dateOutputFormat: 'yyyy-MM-dd HH:mm', sortable: true, filterOptions: { enabled: false, placeholder: 'Search date'} },
          { label: 'Customer', field: 'customer_name', sortable: false, filterOptions: { enabled: false, placeholder: 'Search customer'} },
          { label: 'Total', field: 'total_amount', type: 'decimal', sortable: true, formatFn: (val) => 'MNT ' + val, filterOptions: { enabled: false, placeholder: 'Filter total amount'} },
          { label: 'Status', field: 'order_status_label', sortable: false, filterOptions: { enabled: false } },
          { label: 'Payment', field: 'payment_status_label', sortable: false, filterOptions: { enabled: false } },
          { label: 'Fulfillment', field: 'fulfillment_status_label', sortable: false, filterOptions: { enabled: false } },
          { label: 'Items', field: 'products', sortable: false, formatFn: (val) => val.length + ' items', filterOptions: { enabled: false } },
        ]
      }
    }
  },

  methods: {
    onRowClick (params) {
      this.$router.push({
        name: 'manage-orders-edit',
        params: {
          order: params.row.id
        }
      })
    }
  }
}
</script>

<style>

</style>