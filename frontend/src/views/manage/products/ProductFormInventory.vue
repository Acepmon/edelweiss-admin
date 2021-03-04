<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Inventory</b-card-title>
    </b-card-header>

    <b-card-body class="border-bottom">

      <b-row cols="2">
        <b-col>
          <b-form-group label="SKU (Stock Keeping Unit)" label-for="v-sku">
            <b-form-input id="v-sku" placeholder="SKU code here ..." :value="local.sku" @input="handleInput('sku', $event)" />
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group label="Barcode" label-for="v-barcode">
            <b-form-input id="v-barcode" placeholder="Barcode here ..." :value="local.barcode" @input="handleInput('barcode', $event)" />
          </b-form-group>
        </b-col>

      </b-row>

    </b-card-body>

    <b-card-header>
      <b-card-title>Quantity</b-card-title>
    </b-card-header>

    <b-card-body>

      <b-row cols="2">
        <b-col>
          <b-form-group label="Available" label-for="v-stock">
            <b-form-input id="v-stock" type="number" placeholder="Available quantity here ..." :value="local.stock" @input="handleInput('stock', $event)" />
          </b-form-group>
        </b-col>

      </b-row>

    </b-card-body>
  </b-card>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton } from 'bootstrap-vue'
import { BFormGroup, BFormInput } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'

export default {
  name: 'product-form-inventory',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BCardFooter,
    BButton,

    BFormGroup,
    BFormInput,

    BRow,
    BCol,
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      required: true,
      type: Object
    }
  },

  computed: {
    local() {
      return this.value ? this.value : { sku: null, barcode: null, stock: null }
    }
  },

  methods: {
    handleInput (key, val) {
      let keyVal = {}
      keyVal[key] = val
      this.$emit('input', { ...this.local, ...keyVal })
    }
  }
}
</script>

<style>

</style>