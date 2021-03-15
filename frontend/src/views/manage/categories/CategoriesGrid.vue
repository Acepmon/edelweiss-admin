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
          New Category
        </app-mgmt-button>
      </div>
    </div>

    <vue-good-table 
      mode="remote"
      :pagination-options="{ enabled: true }"
      :search-options="{ enabled: true, externalQuery: filter.search }"
      :select-options="{ enabled: false }"
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
        <span v-if="props.column.field == 'image'">
          <b-img-lazy :src="props.row.image || require('@/assets/images/misc/placeholder.jpg')" thumbnail fluid></b-img-lazy>
        </span>

        <!-- Column: Name -->
        <span v-if="props.column.field == 'name'">
          <h5 class="font-weight-bold">{{ props.row.name }}</h5>
        </span>

        <!-- Column: Products -->
        <span v-if="props.column.field == 'products'">
          <b-button size="sm" variant="outline-dark" v-b-modal.products-modal @click="toggleProductsDialog(props.row.id)"><strong>{{ props.row.products }}</strong> {{ $t('products') }}</b-button>
        </span>

        <!-- Column: Action -->
        <div v-if="props.column.field == 'action'">
          <b-button :to="{ name: 'manage-categories-edit', params: {category: props.row.id} }" variant="outline-dark" size="sm">
            <feather-icon icon="EditIcon" class="mr-50"></feather-icon>
            {{ $t('Edit') }}
          </b-button>
        </div>

      </template>
    </vue-good-table>

    <b-modal id="products-modal" title="Products" scrollable ok-only>
      <ul class="list-unstyled">
        <b-media tag="li" class="my-1" v-for="(product, index) in products" :key="index">
          <template #aside>
            <b-img-lazy :src="product.product_thumb || require('@/assets/images/misc/placeholder.jpg')" thumbnail fluid width="100"></b-img-lazy>
          </template>

          <router-link tag="a" :to="{ name: 'manage-products-edit', params: {product: product.id} }" class="mt-0 mb-0 d-block">
            {{ product.product_title }}
          </router-link>

          <product-status :code="product.product_status_cd" :label="product.product_status_label"></product-status>
        </b-media>
      </ul>
    </b-modal>
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
import { BImg, BImgLazy, BButton, VBModal, BMedia } from 'bootstrap-vue'
import ProductStatus from '../products/ProductStatus.vue'

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
    BImgLazy,
    BButton,
    VBModal,
    BMedia,
    ProductStatus
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
        { label: '', field: 'image', sortable: false, width: '100px' },
        { label: 'Name', field: 'name', sortable: false },
        { label: 'Products', field: 'products', sortable: false },
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
        search: null
      },

      products: []
    }
  },

  methods: {
    getFromServer (params) {
      let promise = this.$http.get("/api/categories", {
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
    },

    toggleProductsDialog (categoryId) {
      this.products = []
      this.$http.get('/api/categories/' + categoryId + '/products')
        .then(res => {
          this.products = res.data.data
          console.log(res.data)
        })
    }
  },

  created () {
    this.loadItems()
  }
}
</script>
