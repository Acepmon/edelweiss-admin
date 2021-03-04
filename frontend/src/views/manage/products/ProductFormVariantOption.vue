<template>
  <b-card-body class="border-top">
    <b-form ref="form" class="repeater-form" @submit.prevent="repeatAgain">
      <b-row v-for="(item, index) in value" :key="index" :id="index" ref="row">

        <b-col cols="12">
          <b-button @click="value.splice(index, 1)" variant="flat-light" class="float-right" size="sm">Remove</b-button>
          <h5 class="font-weight-bolder">Option {{ (index + 1) }}</h5>
        </b-col>

        <b-col md="4">
          <b-form-group label-for="option-type">
            <b-form-select
              id="option-type"
              v-model="item.option_type"
              :options="filterOptions"
            ></b-form-select>
          </b-form-group>
        </b-col>

        <b-col md="8">
          <b-form-group label-for="option-value">
            <b-form-tags
              id="option-value" 
              v-model="item.option_value" 
              placeholder="Separate options with 'enter' key"
            ></b-form-tags>
          </b-form-group>
        </b-col>

        <b-col cols="12">
          <hr>
        </b-col>

      </b-row>
    </b-form>

    <b-button
      v-ripple.400="'rgba(255, 255, 255, 0.15)'"
      variant="outline-primary"
      @click="repeatAgain"
      v-if="value.length < options.length"
    >
      <feather-icon
        icon="PlusIcon"
        class="mr-25"
      />
      <span>Add another option</span>
    </b-button>

  </b-card-body>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton } from 'bootstrap-vue'
import { BForm, BFormGroup, BFormSelect, BFormTags } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
  name: 'product-form-variant-option',

  components: {
    BCard,
    BCardHeader,
    BCardBody,
    BCardTitle,
    BCardFooter,
    BButton,

    BForm,
    BFormGroup,
    BFormSelect,
    BFormTags,

    BRow,
    BCol,
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      options: [],
    }
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

    filterOptions () {
      return this.options.map((option) => {
        option.disabled = this.value.filter(item => item.option_type == option.value).length > 0 ? true : false
        return option
      })
    }
  },

  methods: {
    handleInput (key, val) {
      let keyVal = {}
      keyVal[key] = val
      this.$emit('input', { ...this.local, ...keyVal })
    },

    repeatAgain() {
      this.value.push({
        option_type: null,
        option_value: []
      })
    }
  },

  created () {
    this.$http.get('/api/codes/C02').then((res) => {
      this.options = res.data.data.map((code) => {
        return {
          value: code.comm2_cd,
          text: code.comm2_nm,
          disabled: false
        }
      })
    })
  }
}
</script>

<style>

</style>