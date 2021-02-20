<template>
  <b-form-group label="Title" label-for="v-title">
    <b-form-input 
      id="v-title" 
      :value="value" 
      @input="handleInput" 
      placeholder="Title here ..."
    />
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormInput } from 'bootstrap-vue'

export default {
  name: 'product-input-title',

  components: {
    BFormGroup,
    BFormInput
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