<template>
  <b-list-group flush>
    <b-list-group-item v-for="(code, index) in codes" :key="index">
      <b-form @submit.prevent="onSubmit(code)">
        <b-row>
          <b-col cols="5">
            <b-form-group :label="$t('codes.code')" :label-for="'v-code-' + index">
              <b-form-input :id="'v-code-' + index" required :placeholder="$t('codes.code')" v-model="code.comm2_cd" disabled />
            </b-form-group>
          </b-col>
          <b-col cols="5">
            <b-form-group :label="$t('codes.label')" :label-for="'v-label-' + index">
              <b-form-input :id="'v-label-' + index" required :placeholder="$t('codes.label')" v-model="code.comm2_nm" />
            </b-form-group>
          </b-col>
          <b-col cols="2">
            <b-form-group :label="$t('Action')">
              <b-button
                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                type="submit"
                variant="outline-success"
                class="mr-1"
                block
              >
                <feather-icon icon="SaveIcon" class="mr-50"></feather-icon>
                {{ $t('Save') }}
              </b-button>
            </b-form-group>
          </b-col>
        </b-row>
      </b-form>
    </b-list-group-item>
  </b-list-group>
</template>

<script>
import { BListGroup, BListGroupItem, BRow, BCol, BFormGroup, BFormInput, BForm, BButton } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  name: 'codes-sub-codes',

  components: {
    BListGroup,
    BListGroupItem,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BForm,
    BButton,
    ToastificationContent
  },

  directives: {
    Ripple,
  },

  props: {
    primary: {
      type: String
    }
  },

  data () {
    return {
      codes: []
    }
  },

  methods: {
    onSubmit (code) {
      this.$http.put('/api/codes/' + code.comm1_cd + '/' + code.comm2_cd, code)
        .then((res) => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: this.$t('Success!'),
              icon: 'CheckCircleIcon',
              text: 'Saved code details!',
              variant: 'success',
            },
          })
        })
        .catch((err) => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: this.$t('Failed!'),
              icon: 'AlertTriangleIcon',
              text: err.response.data.message,
              variant: 'danger',
            },
          })
        })
    }
  },

  created () {
    this.$http.get('/api/codes/' + this.primary + '?limit=-1')
      .then((res) => {
        this.codes = res.data.data
      })
  }
}
</script>

<style>

</style>