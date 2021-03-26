<template>
  <div>
    <b-row>
      <b-col cols="12" sm="6" md="8" lg="9">
        <!--  -->
      </b-col>

      <b-col cols="12" sm="6" md="4" lg="3">
        <orders-details-notes :order="$route.params.order"></orders-details-notes>

        <b-card no-body>
          <b-card-header>
            <b-card-title>Customer</b-card-title>
          </b-card-header>

          <b-card-body>

            <orders-details-customer :order="$route.params.order"></orders-details-customer>

            <hr>

            <h5>Contact Information</h5>
            <orders-details-contact :order="$route.params.order"></orders-details-contact>

            <hr>

            <h5>Shipping Address</h5>
            <orders-details-shipping :order="$route.params.order"></orders-details-shipping>

            <hr>

            <h5>Billing Address</h5>
            <orders-details-billing :order="$route.params.order"></orders-details-billing>

          </b-card-body>

        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import { BCard, BRow, BCol, BForm, BButton, BCardHeader, BCardBody, BCardTitle } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

import OrdersDetailsNotes from './OrdersDetailsNotes.vue'
import OrdersDetailsCustomer from './OrdersDetailsCustomer.vue'
import OrdersDetailsContact from './OrdersDetailsContact.vue'
import OrdersDetailsShipping from './OrdersDetailsShipping.vue'
import OrdersDetailsBilling from './OrdersDetailsBilling.vue'

export default {
  name: 'manage-orders-details',

  components: {
    BCard,
    BRow,
    BCol,
    BForm,
    BButton,
    BCardHeader,
    BCardBody,
    BCardTitle,
    ToastificationContent,

    OrdersDetailsNotes,
    OrdersDetailsCustomer,
    OrdersDetailsContact,
    OrdersDetailsShipping,
    OrdersDetailsBilling
  },

  directives: {
    Ripple,
  }
}
</script>

<style>

</style>