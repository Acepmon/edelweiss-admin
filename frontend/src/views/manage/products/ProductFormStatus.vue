<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Product status</b-card-title>
    </b-card-header>

    <b-card-body>
      <b-form-group label-for="v-status">
        <b-form-select
          id="v-status" 
          :value="value" 
          @input="handleInput" 
          :options="options"
        ></b-form-select>

        <!-- Draft Status -->
        <b-form-text v-if="value == '10'">
          This product will be hidden from all sales channels
        </b-form-text>

        <!-- Active Status -->
        <b-form-text v-if="value == '20'">
          This product is active and is shown to all sales channels
        </b-form-text>

        <!-- Archived Status -->
        <b-form-text v-if="value == '30'">
          This product is archived and only you can view
        </b-form-text>
      </b-form-group>
    </b-card-body>

  </b-card>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BFormGroup, BFormSelect, BFormText } from 'bootstrap-vue'

export default {
  name: 'product-form-status',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BFormGroup,
    BFormSelect,
    BFormText,
  },

  data () {
    return {
      options: []
    }
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      type: String,
      default: null
    }
  },

  methods: {
    handleInput (changedValue) {
      this.$emit('input', changedValue)
    }
  },

  created () {
    this.$http.get('/api/codes/C01').then((res) => {
      this.options = res.data.data.map((code) => {
        return {
          value: code.comm2_cd,
          text: code.comm2_nm
        }
      })
    })
  }
}
</script>

<style>

</style>