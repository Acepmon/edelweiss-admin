<template>
  <b-form-group 
    label="Barcode (ISBN, UPC, GTIN, etc.)" 
    label-for="v-barcode"
  >
    <b-form-input 
      id="v-barcode"
      placeholder="Barcode here ..."
      :value="value"
      @input="handleInput"
    />
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormInput } from 'bootstrap-vue'

export default {
  name: 'product-input-barcode',

  components: {
    BFormGroup,
    BFormInput,
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      type: String,
      default: null
    }
  },

  methods: {
    handleInput (changedValue) {
      this.$emit('input', changedValue)
    }
  }
}
</script>

<style>

</style>