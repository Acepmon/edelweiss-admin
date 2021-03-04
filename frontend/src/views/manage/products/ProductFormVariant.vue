<template>
  <b-card-body class="border-top">

    variant table

  </b-card-body>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton } from 'bootstrap-vue'
import { BFormGroup, BFormInput, BFormTextarea, BFormText, BInputGroup } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'

export default {
  name: 'product-form-variant',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BCardFooter,
    BButton,

    BFormGroup,
    BFormInput,
    BFormTextarea,
    BFormText,
    BInputGroup,

    BRow,
    BCol,
  },

  model: {
    prop: 'value',
    event: 'input'
  },

  props: {
    value: {
      required: true,
      type: Array
    }
  },

  computed: {
    local() {
      return this.value ? this.value : { seo_title: null, seo_desc: null, seo_url: null }
    },
  },

  methods: {
    handleInput (key, val) {
      let keyVal = {}
      keyVal[key] = val
      this.$emit('input', { ...this.local, ...keyVal })
    },

    formatSeoTitle (e) {
      return String(e).substring(0, 70)
    },

    formatSeoDesc (e) {
      return String(e).substring(0, 320)
    }
  }
}
</script>

<style>

</style>