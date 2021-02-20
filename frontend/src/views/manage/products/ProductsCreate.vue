<template>
  <b-form @submit.prevent="onSubmit">
    <b-row>
      <b-col>
        <b-button variant="secondary">
          {{ $t('Discard') }}
        </b-button>

        <b-button type="submit" variant="success" class="float-right">
          <feather-icon icon="SaveIcon" class="mr-50"></feather-icon>
          {{ $t('Save') }}
        </b-button>

        <hr>
      </b-col>
    </b-row>

    <b-row>
      <b-col cols="12" sm="6" md="8" lg="9">

        <b-card>
          <product-input-title v-model="product.product_title"></product-input-title>

          <product-input-desc v-model="product.product_desc"></product-input-desc>
        </b-card>

        <product-form-media></product-form-media>

        <product-form-pricing></product-form-pricing>

        <product-form-inventory v-model="inventory"></product-form-inventory>

        <product-form-seo></product-form-seo>

      </b-col>

      <b-col cols="12" sm="6" md="4" lg="3">

        <product-form-status></product-form-status>

        <product-form-collection></product-form-collection>

        <product-form-tags></product-form-tags>

      </b-col>
    </b-row>

    <b-row>
      <b-col>
        <hr>

        <b-button variant="secondary">
          {{ $t('Discard') }}
        </b-button>

        <b-button type="submit" variant="success" class="float-right">
          <feather-icon icon="SaveIcon" class="mr-50"></feather-icon>
          {{ $t('Save') }}
        </b-button>
      </b-col>
    </b-row>
  </b-form>
</template>

<script>
import { BCard, BRow, BCol, BForm, BButton, } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

import ProductInputTitle from './ProductInputTitle.vue'
import ProductInputDesc from './ProductInputDesc.vue'

import ProductFormMedia from './ProductFormMedia.vue'
import ProductFormPricing from './ProductFormPricing.vue'
import ProductFormInventory from './ProductFormInventory.vue'
import ProductFormSeo from './ProductFormSeo.vue'
import ProductFormStatus from './ProductFormStatus.vue'
import ProductFormCollection from './ProductFormCollection.vue'
import ProductFormTags from './ProductFormTags.vue'

export default {
  components: {
    BCard,
    BRow,
    BCol,
    BForm,
    BButton,
    ToastificationContent,

    ProductInputTitle,
    ProductInputDesc,

    ProductFormMedia,
    ProductFormPricing,
    ProductFormInventory,
    ProductFormSeo,
    ProductFormStatus,
    ProductFormCollection,
    ProductFormTags,
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      product: {
        product_title: null,
        product_status_cd: null,
        product_desc: null,
        product_price: null,
        category_id: null,
        tags: null,

        charge_tax: false,
        sell_out_of_stock: false,
        has_variants: false,
        is_variant: false,
      },

      inventory: {
        sku: null,
        barcode: null,
        stock: null,
      },

      seo: {
        seo_title: null,
        seo_desc: null,
        seo_url: null,
      },

      variants: []
    }
  },

  methods: {
    onSubmit () {
      alert('Submitted')
    }
  },

  created () {
    // 
  }
}
</script>

<style>

</style>