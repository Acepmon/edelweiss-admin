<template>
  <div class="mt-1">
    <b-row cols="1" cols-md="2">
      <b-col md="4">
        <h4 class="text-dark font-weight-bold">Edit Form</h4>
        <p class="text-muted"></p>
      </b-col>

      <b-col md="8">
        <b-card>

          <category-form :category="$route.params.category"></category-form>

        </b-card>
      </b-col>
    </b-row>

    <hr class="my-3">

    <b-row cols="1" cols-md="2">
      <b-col md="4">
        <h4 class="text-dark font-weight-bold">Products</h4>
        <p class="text-muted"></p>
      </b-col>

      <b-col md="8">
        <b-card>

          <category-products :category="$route.params.category"></category-products>

        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import { BRow, BCol, BCard } from 'bootstrap-vue'
import CategoryForm from './CategoryForm.vue'
import CategoryProducts from './CategoryProducts.vue'

export default {
  components: {
    BRow,
    BCol,
    BCard,
    CategoryForm,
    CategoryProducts
  }
}
</script>

<style>

</style>