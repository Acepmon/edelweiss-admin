<template>
  <b-form-group label="Price" label-for="v-price">
    <b-input-group prepend="MNT">
      <b-form-input 
        type="number"
        id="v-price" 
        :value="value" 
        @input="handleInput" 
        placeholder="Price here ..."
      />
    </b-input-group>
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormInput, BInputGroup } from 'bootstrap-vue'

export default {
  name: 'product-input-price',

  components: {
    BFormGroup,
    BFormInput,
    BInputGroup
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      type: Number,
      default: null
    }
  },

  methods: {
    handleInput (changedValue) {
      this.$emit('input', parseFloat(changedValue))
    }
  }
}
</script>

<style>

</style>