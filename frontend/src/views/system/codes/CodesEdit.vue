<template>
  <div class="mt-1">
    <b-row cols="1" cols-md="2">
      <b-col md="4">
        <h4 class="text-dark font-weight-bold">{{ $t('codes.primary-code') }}</h4>
        <p class="text-muted">{{ $t('codes.primary-code-desc') }}</p>
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
        <h4 class="text-dark font-weight-bold">{{ $t('codes.sub-codes') }}</h4>
        <p class="text-muted">{{ $t('codes.sub-codes-desc') }}</p>
      </b-col>

      <b-col md="8">
        <b-card>

          <codes-sub-codes :primary="$route.params.code"></codes-sub-codes>

        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import { BRow, BCol, BCard } from 'bootstrap-vue'
import CodesForm from './CodesForm.vue'
import CodesSubCodes from './CodesSubCodes.vue'

export default {
  components: {
    BRow,
    BCol,
    BCard,
    CodesForm,
    CodesSubCodes
  }
}
</script>

<style>

</style>