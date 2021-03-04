<template>
  <b-card-body class="border-top">

    <b-button @click="resetVariants" variant="outline-secondary" :disabled="options.length == 0" size="sm">
      <feather-icon icon="RefreshCwIcon" class="mr-50"></feather-icon>
      <span>{{ value.length == 0 ? 'Generate' : 'Reset' }} variants</span>
    </b-button>

    <b-table responsive="sm" :items="value" :fields="fields" small v-if="value.length > 0" class="mt-1">
      <template #cell(variant_price)="data">
        <b-input-group prepend="₮" size="sm">
          <b-form-input type="number" :value="data.item.variant_price"></b-form-input>
        </b-input-group>
      </template>

      <template #cell(variant_quantity)="data">
        <b-form-input size="sm" type="number" :value="data.item.variant_quantity"></b-form-input>
      </template>

      <template #cell(variant_sku)="data">
        <b-form-input size="sm" :value="data.item.variant_sku"></b-form-input>
      </template>

      <template #cell(variant_barcode)="data">
        <b-form-input size="sm" :value="data.item.variant_barcode"></b-form-input>
      </template>
    </b-table>

  </b-card-body>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton } from 'bootstrap-vue'
import { BFormGroup, BFormInput, BFormTextarea, BFormText, BInputGroup } from 'bootstrap-vue'
import { BTable, BTr, BTd } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'
import { combineArrays } from './odometer.js'

export default {
  name: 'product-form-variant',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BCardFooter,
    BButton,
    BTable,

    BFormGroup,
    BFormInput,
    BFormTextarea,
    BFormText,
    BInputGroup,

    BTable,
    BTr,
    BTd,

    BRow,
    BCol,
  },

  data () {
    return {
      fields: [
        { key: 'variant_value', label: 'Variant' },
        { key: 'variant_price', label: 'Price' },
        { key: 'variant_quantity', label: 'Quantity' },
        { key: 'variant_sku', label: 'SKU' },
        { key: 'variant_barcode', label: 'Barcode' },
      ]
    }
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      required: true,
      type: Array
    },

    options: {
      required: true,
      type: Array
    },

    defaultPrice: {
      required: false,
      type: String,
    },

    defaultSku: {
      required: false,
      type: String,
    },

    defaultBarcode: {
      required: false,
      type: String,
    }
  },

  methods: {
    handleInput (key, val) {
      let keyVal = {}
      keyVal[key] = val
      this.$emit('input', { ...this.local, ...keyVal })
    },

    resetVariants () {
      let items = []
      let values = this.options.map(option => option.option_value)
      let variants = combineArrays(values).map(combined => combined.split('::').filter(el => el != null && el != ''))

      variants.forEach((variant, index) => {
        items.push({
          variant_value: variant.join(' / '),
          variant_image: null,
          variant_price: this.defaultPrice,
          variant_quantity: 0,
          variant_sku: this.defaultSku ? this.defaultSku + '-' + (index + 1) : null,
          variant_barcode: this.defaultBarcode ? this.defaultBarcode + '-' + (index + 1) : null
        })
      })

      this.$emit('input', items)
    }
  }
}
</script>

<style>

</style>