<template>
  <div>
    <div class="text-center" v-if="loading">
      <b-spinner type="grow" label="Loading..."></b-spinner>
    </div>

    <b-table-simple v-if="item" borderless small>
      <b-tbody>
        <b-tr>
          <b-th>Email</b-th>
          <b-td>{{ item.email }}</b-td>
        </b-tr>

        <b-tr>
          <b-th>Phone Number</b-th>
          <b-td>{{ item.phone_number }}</b-td>
        </b-tr>
      </b-tbody>
    </b-table-simple>
  </div>
</template>

<script>
import { BCard, BRow, BCol, BForm, BButton, BCardHeader, BCardBody, BCardTitle, BSpinner } from 'bootstrap-vue'
import { BTableSimple, BTbody, BTr, BTh, BTd } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  name: 'orders-details-contact',

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

    BTableSimple, 
    BTbody,
    BTr, 
    BTh, 
    BTd
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      loading: true,
      item: null
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