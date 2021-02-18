<template>
  <vue-good-table 
    :mode="mode"
    :pagination-options="paginationOptions"
    :select-options="selectOptions"
    :totalRows="totalRecords"
    :rows="rows"
    :columns="columns"
    :isLoading.sync="isLoading"
    compactMode

    @on-page-change="onPageChange"
    @on-sort-change="onSortChange"
    @on-column-filter="onColumnFilter"
    @on-per-page-change="onPerPageChange"
  >
    <template #loadingContent>
      <div class="text-center my-2">
        <b-spinner type="grow" label="Loading..."></b-spinner>
      </div>
    </template>
  </vue-good-table>
</template>

<script>
import { BSpinner } from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'

export default {
  name: 'app-mgmt-grid',

  components: {
    BSpinner,
    VueGoodTable
  },

  data () {
    return {
      isLoading: false,

      mode: 'remote',
      paginationOptions: {
        enabled: true
      },

      selectOptions: {
        enabled: true
      },

      rows: [],
      totalRecords: 0,

      serverParams: {
        columnFilters: {
        },
        'sort[]': {
          field: 'id',
          type: 'asc',
        },
        page: 1, 
        perPage: 10
      }
    }
  },

  props: {
    columns: {
      type: Array,
      default: () => []
    },

    api: {
      type: String,
      default: null
    }
  },

  methods: {
    getFromServer (params) {
      let promise = this.$http.get(this.api, {
        params: params
      })

      return promise
    },

    updateParams(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
    },
    
    onPageChange(params) {
      this.updateParams({page: params.currentPage});
      this.loadItems();
    },

    onPerPageChange(params) {
      this.updateParams({perPage: params.currentPerPage});
      this.loadItems();
    },

    onSortChange(params) {
      this.updateParams({
        'sort[]': params[0],
      });
      this.loadItems();
    },

    onColumnFilter(params) {
      this.updateParams(params);
      this.loadItems();
    },

    // load items is what brings back the rows from server
    loadItems() {
      this.getFromServer(this.serverParams).then(response => {
        this.totalRecords = response.data.meta.total;
        this.rows = response.data.data;
      });
    }
  },

  created () {
    this.loadItems()
  }
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';

table.vgt-table {
  font-size: 1rem;
  border: none;
}

table.vgt-table tr > td:first-child,
table.vgt-table tr > th:first-child {
  border-left: 0px;
}

table.vgt-table tr > td:last-child, 
table.vgt-table tr > th:last-child {
  border-left: 0px;
}

table.vgt-table thead tr > th,
table.vgt-table thead tr > th.vgt-checkbox-col {
  background-color: #f3f2f7;
}

.vgt-wrap__footer {
  border-left: 0px;
  border-right: 0px;
}
</style>