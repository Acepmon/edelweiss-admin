<template>
  <b-card no-body v-bind="$attrs">
    <slot></slot>
  </b-card>
</template>

<script>
import { 
  BCard
} from 'bootstrap-vue'

export default {
  name: 'app-mgmt',

  components: {
    BCard,
  }
}
</script>

<style>

</style>