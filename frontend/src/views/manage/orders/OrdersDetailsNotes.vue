<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Notes</b-card-title>
    </b-card-header>

    <b-card-body>
      <div class="text-center" v-if="loading">
        <b-spinner type="grow" label="Loading..."></b-spinner>
      </div>

      <span v-else>{{ item.notes }}</span>
    </b-card-body>
  </b-card>
</template>

<script>
import { BCard, BRow, BCol, BForm, BButton, BCardHeader, BCardBody, BCardTitle, BSpinner } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  name: 'orders-details-notes',

  components: {
    BCard,
    BRow,
    BCol,
    BForm,
    BButton,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BSpinner,
    ToastificationContent,
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      loading: true,
      item: {
        notes: null
      }
    }
  },

  props: {
    order: {
      required: true
    }
  },

  created () {
    this.loading = true
    this.$http.get('/api/orders/' + this.order)
      .then(res => {
        this.loading = false
        this.item = res.data.data
      })
  }
}
</script>

<style>

</style>