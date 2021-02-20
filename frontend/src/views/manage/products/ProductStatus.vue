<template>
  <b-badge :variant="statusVariant">
    {{ label }}
  </b-badge>
</template>

<script>
import { BBadge } from 'bootstrap-vue'

export default {
  name: 'product-status',
  components: {
    BBadge,
  },

  computed: {
    statusVariant () {
      switch (this.code) {
        case '10': return 'light-dark'
        case '20': return 'light-success'
        case '30': return 'light-warning'
        default: return 'light-primary'
      }
    }
  },

  props: {
    code: {
      type: String,
      default: '10'
    },
    label: {
      type: String,
      default: 'Undefined'
    }
  }
}
</script>

<style>

</style>