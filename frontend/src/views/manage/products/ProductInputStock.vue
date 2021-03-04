<template>
  <b-form-group
    label="Available"
    label-for="v-stock"
  >
    <b-form-input 
      id="v-stock"
      type="number"
      placeholder="Available quantity here ..."
      :value="value"
      @input="handleInput"
    />
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormInput } from 'bootstrap-vue'

export default {
  name: 'product-input-stock',

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