<template>
  <b-form-group label-for="v-charge-tax">
    <b-form-checkbox 
      id="v-charge-tax" 
      :checked="value" 
      @input="handleInput" 
      :value="true"
      :unchecked-value="false"
    >
      Charge tax on this product
    </b-form-checkbox>
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormCheckbox } from 'bootstrap-vue'

export default {
  name: 'product-input-price',

  components: {
    BFormGroup,
    BFormCheckbox
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      type: Boolean,
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