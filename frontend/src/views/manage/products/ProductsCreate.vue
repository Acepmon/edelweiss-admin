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

          <product-input-category v-model="product.category_id"></product-input-category>

          <product-input-desc v-model="product.product_desc"></product-input-desc>
        </b-card>

        <product-form-media v-model="medias"></product-form-media>

        <b-card no-body>
          <b-card-header>
            <b-card-title>Pricing</b-card-title>
          </b-card-header>

          <b-card-body>
            <product-input-price v-model="product.product_price"></product-input-price>

            <product-input-tax v-model="product.charge_tax"></product-input-tax>
          </b-card-body>
        </b-card>

        <b-card no-body>
          <b-card-header>
            <b-card-title>Inventory</b-card-title>
          </b-card-header>

          <b-card-body class="border-bottom">
            <b-row cols="2">
              <b-col>
                <product-input-sku v-model="product.product_sku"></product-input-sku>
              </b-col>
              <b-col>
                <product-input-barcode v-model="product.product_barcode"></product-input-barcode>
              </b-col>
            </b-row>

          </b-card-body>

          <b-card-header>
            <b-card-title>Quantity</b-card-title>
          </b-card-header>

          <b-card-body>
            <b-row cols="2">
              <b-col>
                <product-input-stock v-model="product.product_stock"></product-input-stock>
              </b-col>
            </b-row>
          </b-card-body>
        </b-card>

        <b-card no-body>
          <b-card-header>
            <b-card-title>Variants</b-card-title>
          </b-card-header>

          <b-card-body>
            <product-input-variant v-model="product.has_variants"></product-input-variant>
          </b-card-body>

          <product-form-variant-option v-model="variants_options" v-if="product.has_variants"></product-form-variant-option>

          <product-form-variant-preview 
            v-model="variants" 
            v-if="product.has_variants" 
            :options="variants_options"
            :defaultPrice="product.product_price"
            :defaultSku="product.product_sku"
            :defaultBarcode="product.product_barcode"
          ></product-form-variant-preview>
        </b-card>

        <product-form-seo v-model="seo"></product-form-seo>

      </b-col>

      <b-col cols="12" sm="6" md="4" lg="3">

        <product-form-status v-model="product.product_status_cd"></product-form-status>

        <product-form-tags v-model="product.tags"></product-form-tags>

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
import { BCard, BRow, BCol, BForm, BButton, BCardHeader, BCardBody, BCardTitle } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

import ProductInputTitle from './ProductInputTitle.vue'
import ProductInputCategory from './ProductInputCategory.vue'
import ProductInputDesc from './ProductInputDesc.vue'
import ProductInputPrice from './ProductInputPrice.vue'
import ProductInputTax from './ProductInputTax.vue'
import ProductInputVariant from './ProductInputVariant.vue'
import ProductInputSku from './ProductInputSku.vue'
import ProductInputBarcode from './ProductInputBarcode.vue'
import ProductInputStock from './ProductInputStock.vue'

import ProductFormMedia from './ProductFormMedia.vue'
import ProductFormVariantOption from './ProductFormVariantOption.vue'
import ProductFormVariantPreview from './ProductFormVariantPreview.vue'
import ProductFormSeo from './ProductFormSeo.vue'
import ProductFormStatus from './ProductFormStatus.vue'
import ProductFormTags from './ProductFormTags.vue'

export default {
  components: {
    BCard,
    BRow,
    BCol,
    BForm,
    BButton,
    BCardHeader,
    BCardBody,
    BCardTitle,
    ToastificationContent,

    ProductInputTitle,
    ProductInputCategory,
    ProductInputDesc,
    ProductInputPrice,
    ProductInputTax,
    ProductInputVariant,
    ProductInputSku,
    ProductInputBarcode,
    ProductInputStock,

    ProductFormMedia,
    ProductFormVariantOption,
    ProductFormVariantPreview,
    ProductFormSeo,
    ProductFormStatus,
    ProductFormTags,
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      product: {
        product_title: null,
        product_status_cd: '10',
        product_desc: null,
        product_price: 0.00,
        category_id: null,
        tags: [],

        product_sku: null,
        product_barcode: null,
        product_stock: 0,

        charge_tax: false,
        sell_out_of_stock: false,
        has_variants: false,
      },

      seo: {
        seo_title: null,
        seo_desc: null,
        seo_url: null,
        seo_url_host: 'https://edelweissflower.mn/product/',
      },

      medias: [],

      variants_options: [
        {
          option_type: 'color',
          option_value: []
        }
      ],

      variants: []
    }
  },

  methods: {
    onSubmit () {
      console.log(this.seo)
      // console.log(this.variants_options)
      // console.log(this.variants)

      this.$http.post('/api/products', this.product)
        .then((res) => {
          let product = res.data.data

          if (this.medias.length > 0) {
            this.$http.post('/api/products/' + product.id + '/medias', {medias: this.medias})
              .then((res) => {
                console.log(res)
              })
              .catch((err) => {
                console.log(err)
              })
          }

          this.$http.post('/api/products/' + product.id + '/seo', this.seo)
            .then((res) => {
              console.log(res)
            })
            .catch((err) => {
              console.log(err)
            })
        })
        .catch((err) => {
          console.log(err)
        })
    }
  },

  created () {
    // 
  }
}
</script>

<style>

</style>