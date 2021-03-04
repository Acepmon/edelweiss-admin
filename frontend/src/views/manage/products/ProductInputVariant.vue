<template>
  <b-form-group label-for="v-has-variants">
    <b-form-checkbox 
      id="v-has-variants" 
      :checked="value" 
      @input="handleInput" 
      :value="true"
      :unchecked-value="false"
    >
      This product has multiple options, like different sizes or colors
    </b-form-checkbox>
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormCheckbox } from 'bootstrap-vue'

export default {
  name: 'product-input-variant',

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