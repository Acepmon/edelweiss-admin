<template>
  <b-form-group label="Category" label-for="v-category">
    <b-form-select
      id="v-category" 
      :value="value" 
      @input="handleInput" 
      :options="options"
      required
    ></b-form-select>
  </b-form-group>
</template>

<script>
import { BFormGroup, BFormSelect } from 'bootstrap-vue'

export default {
  name: 'product-input-category',

  components: {
    BFormGroup,
    BFormSelect
  },

  data () {
    return {
      options: []
    }
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
      this.$emit('input', changedValue)
    }
  },

  created () {
    this.$http.get('/api/categories').then((res) => {
      this.options = res.data.data.map((cat) => {
        return {
          value: cat.id,
          text: cat.name
        }
      })
    })
  }
}
</script>

<style>

</style>