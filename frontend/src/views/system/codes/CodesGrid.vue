<template>
  <app-mgmt>
    <app-mgmt-header :tabs="tabs"></app-mgmt-header>
  
    <vue-good-table 
      mode="remote"
      :pagination-options="paginationOptions"
      :totalRows="totalRecords"
      :rows="rows"
      :columns="columns"
      :isLoading.sync="isLoading"
      compactMode
      styleClass="vgt-table striped hover"

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

      <template slot="table-row" slot-scope="props">

        <!-- Column: Code -->
        <i v-if="props.column.field == 'comm1_cd'">
          {{ props.row.comm1_cd }}
        </i>

        <!-- Column: Label -->
        <b v-if="props.column.field == 'comm2_nm'">
          {{ props.row.comm2_nm }}
        </b>

        <!-- Column: Sub Codes -->
        <span v-if="props.column.field == 'sub_codes'">
          <strong>{{ props.row.sub_codes.length }}</strong> sub codes
        </span>

        <!-- Column: Action -->
        <div v-if="props.column.field == 'action'">
          <b-button :to="{ name: 'system-codes-edit', params: {code: props.row.comm1_cd} }" variant="flat-dark" size="sm">
            <feather-icon icon="EditIcon" class="mr-50"></feather-icon>
            {{ $t('Edit') }}
          </b-button>
        </div>

      </template>
    </vue-good-table>
  </app-mgmt>
</template>

<script>
import AppMgmt from '@/@core/components/app-mgmt/AppMgmt.vue'
import AppMgmtHeader from '@/@core/components/app-mgmt/AppMgmtHeader.vue'

import { BSpinner, BButton } from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'

export default {
  name: 'codes-grid',

  components: {
    AppMgmt,
    AppMgmtHeader,
    BSpinner,
    BButton,
    VueGoodTable,
  },

  data () {
    return {
      isLoading: false,

      tabs: [
        { key: 'all', title: 'All', active: true }
      ],

      totalRecords: 0,
      rows: [],
      columns: [
        { label: 'Code', field: 'comm1_cd', sortable: false },
        { label: 'Label', field: 'comm2_nm', sortable: false },
        { label: 'Sub Codes', field: 'sub_codes', sortable: false },
        { label: 'Action', field: 'action', sortable: false },
      ],

      serverParams: {
        columnFilters: {},
        'sort[]': {
          field: 'id',
          type: 'asc',
        },
        page: 1, 
        limit: 10,
        search: null,
        with: 'sub_codes'
      }
    }
  },

  props: {
    paginationOptions: {
      type: Object,
      default: () => {
        return {
          enabled: true
        }
      }
    }
  },

  methods: {
    getFromServer (params) {
      let promise = this.$http.get("/api/codes", {
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
      this.updateParams({limit: params.currentPerPage});
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

<style>

</style>