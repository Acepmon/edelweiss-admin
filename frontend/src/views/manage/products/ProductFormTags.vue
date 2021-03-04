<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Tags</b-card-title>
    </b-card-header>

    <b-card-body>
      <b-form-group label-for="v-tags">
        <b-form-tags
          size="lg"
          id="v-tags" 
          :value="value" 
          @input="handleInput" 
        ></b-form-tags>

      </b-form-group>
    </b-card-body>

  </b-card>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BFormGroup, BFormTags, BFormText } from 'bootstrap-vue'

export default {
  name: 'product-form-tags',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BFormGroup,
    BFormTags,
    BFormText,
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
      type: Array,
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