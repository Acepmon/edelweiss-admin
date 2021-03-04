<template>
  <b-card no-body>
    <b-card-header>
      <b-card-title>Search engine listing</b-card-title>
    </b-card-header>

    <b-card-body class="border-bottom">

      <b-row cols="1">
        <b-col>
          <b-form-group label="Page title" label-for="v-seo-title">
            <b-form-input 
              id="v-seo-title" 
              placeholder="Page title here ..." 
              :value="local.seo_title" 
              @input="handleInput('seo_title', $event)" 
              aria-describedby="v-help-seo-title"
              :formatter="formatSeoTitle"
            />

            <b-form-text class="text-muted" id="v-help-seo-title">{{ local.seo_title ? local.seo_title.length : 0 }} of 70 characters used</b-form-text>
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group label="Page description" label-for="v-seo-desc">
            <b-form-textarea
              id="v-seo-desc"
              placeholder="Page description here ..." 
              :value="local.seo_desc" 
              @input="handleInput('seo_desc', $event)" 
              rows="3"
              aria-describedby="v-help-seo-desc"
              :formatter="formatSeoDesc"
            ></b-form-textarea>

            <b-form-text class="text-muted" id="v-help-seo-desc">{{ local.seo_desc ? local.seo_desc.length : 0 }} of 320 characters used</b-form-text>
          </b-form-group>
        </b-col>

        <b-col>
          <b-form-group label="URL and handle" label-for="v-seo-url">
            <b-input-group is-text :prepend="local.seo_url_host">
              <b-form-input 
                id="v-seo-url" 
                placeholder="URL handler here ..." 
                :value="local.seo_url" 
                @input="handleInput('seo_url', $event)" 
              />
            </b-input-group>
          </b-form-group>
        </b-col>

      </b-row>

    </b-card-body>

  </b-card>
</template>

<script>
import { BCard, BCardHeader, BCardBody, BCardTitle, BCardFooter, BButton } from 'bootstrap-vue'
import { BFormGroup, BFormInput, BFormTextarea, BFormText, BInputGroup } from 'bootstrap-vue'
import { BRow, BCol } from 'bootstrap-vue'

export default {
  name: 'product-form-seo',

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
      type: Object
    }
  },

  computed: {
    local() {
      return this.value ? this.value : { seo_title: null, seo_desc: null, seo_url: null, seo_url_host: 'https://edelweissflower.mn/product/' }
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