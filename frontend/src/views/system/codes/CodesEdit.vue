<template>
  <div class="mt-1">
    <b-row cols="1" cols-md="2">
      <b-col md="4">
        <h4 class="text-dark font-weight-bold">Primary Code</h4>
        <p class="text-muted">This is your primary common code, you can edit and save here.</p>
      </b-col>

      <b-col md="8">
        <b-card>

          <codes-form :primary="$route.params.code"></codes-form>

        </b-card>
      </b-col>
    </b-row>

    <hr class="my-3">

    <b-row cols="1" cols-md="2">
      <b-col md="4">
        <h4 class="text-dark font-weight-bold">Sub Codes</h4>
        <p class="text-muted">Your primary codes have sub codes that are more defined</p>
      </b-col>

      <b-col md="8">
        <b-card>

          <!-- sub codes here -->

        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import { BRow, BCol, BCard } from 'bootstrap-vue'
import CodesForm from './CodesForm.vue'

export default {
  components: {
    BRow,
    BCol,
    BCard,
    CodesForm
  }
}
</script>

<style>

</style>