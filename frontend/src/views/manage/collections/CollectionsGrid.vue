<template>
  <app-mgmt>
    <app-mgmt-header :tabs="tabs"></app-mgmt-header>

    <div class="form-row px-1 pb-1">
      <div class="col-2">
        <app-mgmt-input-search v-model="filter.search" />
      </div>

      <div class="col text-right">
        <app-mgmt-button variant="primary" @click="onCreate">
          <feather-icon icon="PlusIcon" class="mr-50"></feather-icon>
          New Collection
        </app-mgmt-button>
      </div>
    </div>

    <vue-good-table 
      mode="remote"
      :pagination-options="{ enabled: true }"
      :search-options="{ enabled: true, externalQuery: filter.search }"
      :select-options="{ enabled: true, selectOnCheckboxOnly: true }"
      :totalRows="totalRecords"
      :rows="rows"
      :columns="columns"
      :isLoading.sync="isLoading"
      compactMode
      styleClass="vgt-table striped hover pointer"

      @on-page-change="onPageChange"
      @on-sort-change="onSortChange"
      @on-column-filter="onColumnFilter"
      @on-per-page-change="onPerPageChange"
      @on-search="onSearch"
    >
      <template #loadingContent>
        <div class="text-center my-2">
          <b-spinner type="grow" label="Loading..."></b-spinner>
        </div>
      </template>

      <template slot="table-row" slot-scope="props">

        <!-- Column: Image -->
        <span v-if="props.column.field == 'coll_image'">
          <b-img :src="props.row.coll_image" :blank-src="require('@/assets/images/misc/placeholder.jpg')" thumbnail fluid></b-img>
        </span>

      </template>
    </vue-good-table>
  </app-mgmt>
</template>

<script>
import AppMgmt from '@/@core/components/app-mgmt/AppMgmt.vue'
import AppMgmtHeader from '@/@core/components/app-mgmt/AppMgmtHeader.vue'
import AppMgmtInputSearch from '@/@core/components/app-mgmt/AppMgmtInputSearch.vue'
import AppMgmtInputDropdown from '@/@core/components/app-mgmt/AppMgmtInputDropdown.vue'
import AppMgmtButton from '@/@core/components/app-mgmt/AppMgmtButton.vue'
import AppMgmtGrid from '@/@core/components/app-mgmt/AppMgmtGrid.vue'
import { BSpinner } from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import { BImg } from 'bootstrap-vue'

export default {
  components: {
    AppMgmt,
    AppMgmtHeader,
    AppMgmtInputSearch,
    AppMgmtInputDropdown,
    AppMgmtButton,
    AppMgmtGrid,
    BSpinner,
    VueGoodTable,
    BImg,
  },

  data () {
    return {
      isLoading: false,

      filter: {
        search: ''
      },

      tabs: [
        { key: 'all', title: 'All', active: true }
      ],

      totalRecords: 0,
      rows: [],
      columns: [
        { label: '', field: 'coll_image', sortable: false, width: '100px' },
        { label: 'Title', field: 'coll_title', sortable: false },
        { label: 'Description', field: 'coll_desc', sortable: false },
      ],

      serverParams: {
        columnFilters: {},
        'sort[]': {
          field: 'id',
          type: 'asc',
        },
        page: 1, 
        limit: 10,
        search: null
      }
    }
  },

  methods: {
    getFromServer (params) {
      let promise = this.$http.get("/api/collections", {
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

    onSearch(params) {
      this.updateParams({
        search: params.searchTerm
      });
      this.loadItems();
    },

    // load items is what brings back the rows from server
    loadItems() {
      this.getFromServer(this.serverParams).then(response => {
        this.totalRecords = response.data.meta.total;
        this.rows = response.data.data;
      });
    },

    onCreate() {
      // route to collection create page
    }
  },

  created () {
    this.loadItems()
  }
}
</script>
