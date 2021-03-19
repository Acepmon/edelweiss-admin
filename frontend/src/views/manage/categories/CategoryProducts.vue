<template>
  <div>
    <b-form ref="form" @submit.prevent="onSave">

      <div class="text-left" v-if="loading">
        <b-spinner type="grow" label="Loading..."></b-spinner>
      </div>

      <vue-perfect-scrollbar class="container-fluid scroll-area" v-else>
        <!-- Row Loop -->
        <b-row 
          v-for="(item, index) in items"
          :id="item.id"
          :key="item.id"
          ref="row"
          class="my-1"
        >
          <b-col md="10">
            <b-media>
              <template #aside>
                <b-img-lazy :src="item.product_thumb || require('@/assets/images/misc/placeholder.jpg')" thumbnail fluid width="100"></b-img-lazy>
              </template>

              <router-link tag="a" :to="{ name: 'manage-products-edit', params: {product: item.id} }" class="mt-0 mb-0 d-block">
                {{ item.product_title }}
              </router-link>

              <product-status :code="item.product_status_cd" :label="item.product_status_label"></product-status>
            </b-media>
          </b-col>

          <b-col md="2" class="text-right">
            <b-button @click="onRemove(index, item)" size="sm" class="btn-icon" variant="flat-dark" v-ripple.400="'rgba(113, 102, 240, 0.15)'">
              <feather-icon icon="XIcon"></feather-icon>
            </b-button>
          </b-col>
        </b-row>
      </vue-perfect-scrollbar>

      <hr>

      <b-row>
        <b-col>
          <b-button v-b-modal.add-modal variant="primary" v-ripple.400="'rgba(113, 102, 240, 0.15)'">
            <feather-icon icon="PlusSquareIcon" class="mr-50"></feather-icon>
            Add Product to Category
          </b-button>
        </b-col>
      </b-row>

    </b-form>

    <b-modal
      id="add-modal"
      title="Search For Products"
      ok-only
      :ok-disabled="searchItemsChecked.length == 0"
      ok-title="Set Category"
      @ok="onAdd"
    >
      <p>
        Search through <strong>uncategorized</strong> products
      </p>

      <b-form @submit.prevent="onSearch">
        <b-form-group>
          <b-input-group>
            <b-form-input placeholder="Search for products" />
            <b-input-group-append>
              <b-button type="submit" variant="outline-primary">
                {{ $t('Search') }}
              </b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-form>

      <vue-perfect-scrollbar class="container-fluid scroll-area">
        <!-- Row Loop -->
        <b-row 
          v-for="(item, index) in searchItems"
          :id="index"
          :key="index"
          ref="row"
          class="my-1"
        >
          <b-col md="12">
            <b-media right-align>
              <b-form-checkbox v-model="searchItemsChecked" :value="item" class="mb-1">
                <h5 class="mt-0 mb-0 d-block">
                  {{ item.product_title }}
                </h5>
              </b-form-checkbox>

              <product-status :code="item.product_status_cd" :label="item.product_status_label"></product-status>

              <template #aside>
                <b-img-lazy :src="item.product_thumb || require('@/assets/images/misc/placeholder.jpg')" thumbnail fluid width="100"></b-img-lazy>
              </template>
            </b-media>
          </b-col>
        </b-row>
      </vue-perfect-scrollbar>
    </b-modal>
  </div>
</template>

<script>
import { BForm, BFormGroup, BFormInput, BInputGroup, BInputGroupAppend, BRow, BCol, BFormCheckbox, BButton, BMedia, BImgLazy, BModal, BSpinner } from 'bootstrap-vue'
import ProductStatus from '../products/ProductStatus.vue'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import Ripple from 'vue-ripple-directive'

export default {
  name: 'category-products',

  components: {
    BForm,
    BFormGroup,
    BFormInput,
    BInputGroup,
    BInputGroupAppend,
    BRow,
    BCol,
    BFormCheckbox,
    BButton,
    BMedia,
    BImgLazy,
    BModal,
    BSpinner,
    ProductStatus,
    VuePerfectScrollbar
  },

  directives: {
    Ripple,
  },

  props: {
    category: {
      required: true
    }
  },

  data () {
    return {
      loading: true,
      items: [],
      searchQuery: null,
      searchItems: [],
      searchItemsChecked: []
    }
  },

  methods: {
    fetchProducts () {
      this.loading = true
      this.$http.get('/api/categories/' + this.category + '/products?limit=-1')
        .then(res => {
          this.loading = false
          this.items = res.data.data
        })
    },

    onAdd () {
      let ids = this.searchItemsChecked.map(searchItem => {
        return searchItem.id
      })
      this.$http.put('/api/products', {
        whereIn: { key: 'id', val: ids },
        set: { category_id: this.category }
      })
      .then(() => {
        this.fetchProducts()
      })
    },

    onSearch () {
      this.$http.get('/api/products', {
        params: {
          limit: 10,
          search: this.searchQuery,
          uncategorized: true
        }
      })
      .then(res => {
        this.searchItems = res.data.data
      })
    },

    onRemove (index, item) {
      this.$bvModal
        .msgBoxConfirm('Please confirm that you want to remove product from category.', {
          title: 'Please Confirm',
          size: 'sm',
          okVariant: 'primary',
          okTitle: 'Yes',
          cancelTitle: 'No',
          cancelVariant: 'outline-secondary',
          hideHeaderClose: false,
          centered: true,
        })
        .then(value => {
          if (value) {
            this.$http.put('/api/products', {
              where: { id: item.id },
              set: { category_id: null }
            })
            .then(() => {
              this.items.splice(index, 1)
            })
          }
        })
    }
  },

  created () {
    this.fetchProducts()
  }
}
</script>

<style lang="scss">
.scroll-area {
  max-height: 300px;
}
</style>
