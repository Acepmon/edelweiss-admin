<template>
  <b-form-group 
    label="SKU (Stock Keeping Unit)" 
    label-for="v-sku"
  >
    <b-form-input 
      id="v-sku" 
      placeholder="SKU code here ..." 
      :value="value" 
      @input="handleInput"
    />
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormInput } from 'bootstrap-vue'

export default {
  name: 'product-input-sku',

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