<template>
  <div>
    <div class="text-left" v-if="loading">
      <b-spinner type="grow" label="Loading..."></b-spinner>
    </div>

    <div class="row" v-else>
      <div class="col-12">
        <b-form-checkbox
          v-model="checked"
          name="maintenance"
          switch
          inline
        >
          Enable Maintenance Mode
        </b-form-checkbox>
      </div>

      <div class="col-12 pt-1">
        <b-button @click="onSave" variant="dark">{{ $t('Save') }}</b-button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { BFormCheckbox, BButton, BSpinner } from 'bootstrap-vue'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  name: 'settings-maintenance',

  components: {
    BFormCheckbox,
    BButton,
    BSpinner,
    ToastificationContent
  },

  data () {
    return {
      appKey: 'base64:9lNJ3N6AsZ11RI6SH4sVevvymfBlzJjvmNeRV+ug1ko=',
      loading: true,
      result: null,
      checked: false,
    }
  },

  methods: {
    onSave () {
      let uri = this.checked ? 'down' : 'up'
      axios.post('http://localhost:8080/api/maintenance/' + uri, { app_key: this.appKey })
        .then(res => {
          this.$toast({
            component: ToastificationContent,
            props: {
              title: this.$t('Success!'),
              icon: 'CheckCircleIcon',
              text: (this.checked ? 'Enabled' : 'Disabled') + ' maintenance!',
              variant: 'success',
            },
          })
        })
    }
  },

  created () {
    this.loading = true
    axios.post('http://localhost:8080/api/maintenance/check', { app_key: this.appKey })
      .then(res => {
        this.loading = false
        this.result = res.data.result
        this.checked = res.data.result == 'down'
      })
  }
}
</script>

<style>

</style>