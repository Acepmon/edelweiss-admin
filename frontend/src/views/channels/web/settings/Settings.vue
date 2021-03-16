<template>
  <div class="mt-1">
    <b-row cols="1" cols-md="2">
      <b-col md="4">
        <h4 class="text-dark font-weight-bold">Maintenance Mode</h4>
        <p class="text-muted">
          When your application is in maintenance mode, a custom view will be 
          displayed for all requests into your application. This makes it easy 
          to "disable" your application while it is updating or when you are 
          performing maintenance.
        </p>
      </b-col>

      <b-col md="8">
        <b-card>

          <settings-maintenance></settings-maintenance>

        </b-card>
      </b-col>
    </b-row>

    <hr class="my-3">

  </div>
</template>

<script>
import { BRow, BCol, BCard } from 'bootstrap-vue'
import SettingsMaintenance from './SettingsMaintenance.vue'

export default {
  components: {
    BRow,
    BCol,
    BCard,
    SettingsMaintenance
  }
}
</script>

<style>

</style>