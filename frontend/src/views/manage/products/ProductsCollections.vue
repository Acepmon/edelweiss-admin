<template>
  <app-mgmt>
    <app-mgmt-header :tabs="tabs"></app-mgmt-header>

    <div class="form-row px-1 pb-1">
      <div class="col-2">
        <app-mgmt-input-search v-model="filter.search" />
      </div>

      <div class="col text-right">
        <app-mgmt-button variant="primary" @click="onCreate">
          <feather-icon icon="PlusIcon" class="mr-1"></feather-icon>
          New Collection
        </app-mgmt-button>
      </div>
    </div>

    <products-collections-grid 
      :searchOptions="{
        enabled: true,
        trigger: 'enter',
        externalQuery: filter.search
      }">
    </products-collections-grid>
  </app-mgmt>
</template>

<script>
import AppMgmt from '@/@core/components/app-mgmt/AppMgmt.vue'
import AppMgmtHeader from '@/@core/components/app-mgmt/AppMgmtHeader.vue'
import AppMgmtInputSearch from '@/@core/components/app-mgmt/AppMgmtInputSearch.vue'
import AppMgmtInputDropdown from '@/@core/components/app-mgmt/AppMgmtInputDropdown.vue'
import AppMgmtButton from '@/@core/components/app-mgmt/AppMgmtButton.vue'
import AppMgmtGrid from '@/@core/components/app-mgmt/AppMgmtGrid.vue'
import ProductsCollectionsGrid from './ProductsCollectionsGrid.vue'

export default {
  name: 'manage-products-collections',

  components: {
    AppMgmt,
    AppMgmtHeader,
    AppMgmtInputSearch,
    AppMgmtInputDropdown,
    AppMgmtButton,
    AppMgmtGrid,

    ProductsCollectionsGrid,
  },

  data () {
    return {
      filter: {
        search: ''
      },

      tabs: [
        { key: 'all', title: 'All', active: true }
      ]
    }
  },

  methods: {
    onCreate() {
      // route to collection create page
    }
  }
}
</script>

<style>

</style>