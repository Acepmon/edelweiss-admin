<template>
  <b-button 
    variant="outline-secondary" 
    v-ripple.400="'rgba(186, 191, 199, 0.15)'"
    v-bind="$attrs"
    @click="$emit('click')"
  ><slot></slot></b-button>
</template>

<script>
import { BButton } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
  name: 'app-mgmt-button',

  components: {
    BButton
  },

  directives: {
    Ripple,
  },
}
</script>

<style>

</style>