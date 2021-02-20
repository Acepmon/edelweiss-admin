<template>
  <b-form @submit.prevent="onSubmit">
    <b-row>

      <!-- Primary Code -->
      <b-col cols="12">
        <b-form-group
          :label="$t('codes.primary-code')"
          label-for="v-comm1-cd"
        >
          <b-form-input
            id="v-comm1-cd"
            v-model="code.comm1_cd"
            :placeholder="$t('codes.primary-code')"
            :disabled="code.comm2_cd == '$$'"
            required
          />
        </b-form-group>
      </b-col>

      <!-- Secondary Code -->
      <b-col cols="12">
        <b-form-group
          :label="$t('codes.secondary-code')"
          label-for="v-comm2-cd"
        >
          <b-form-input
            id="v-comm2-cd"
            v-model="code.comm2_cd"
            :placeholder="$t('codes.secondary-code')"
            :disabled="code.comm2_cd == '$$'"
            required
          />
        </b-form-group>
      </b-col>

      <!-- Label -->
      <b-col cols="12">
        <b-form-group
          :label="$t('codes.label')"
          label-for="v-label"
        >
          <b-form-input
            id="v-label"
            v-model="code.comm2_nm"
            :placeholder="$t('codes.label')"
            required
          />
        </b-form-group>
      </b-col>

      <!-- submit and reset -->
      <b-col cols="12">
        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          type="submit"
          variant="success"
          class="mr-1"
        >
          <feather-icon icon="SaveIcon" class="mr-50"></feather-icon>
          {{ $t('Save') }}
        </b-button>

        <b-button
          v-ripple.400="'rgba(255, 255, 255, 0.15)'"
          variant="outline-danger"
          class="float-right"
          @click="onDelete"
        >
          <feather-icon icon="Trash2Icon" class="mr-50"></feather-icon>
          {{ $t('Delete') }}
        </b-button>
      </b-col>
    </b-row>
  </b-form>
</template>

<script>
import {
  BRow, BCol, BFormGroup, BFormInput, BFormCheckbox, BForm, BButton,
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  name: 'codes-form',

  components: {
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BForm,
    BButton,
    ToastificationContent
  },

  directives: {
    Ripple,
  },

  data () {
    return {
      code: {
        comm1_cd: null,
        comm2_cd: null,
        comm2_nm: null
      }
    }
  },

  props: {
    primary: {
      type: String
    },
    secondary: {
      type: String,
      default: '$$'
    }
  },

  methods: {
    onSubmit () {
      this.$http.put('/api/codes/' + this.primary + '/' + this.secondary, this.code)
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
    },

    onDelete () {
      this.$bvModal.msgBoxConfirm('Are you sure you want to delete primary code ' + this.code.comm1_cd + ' and related sub codes? This process cannot be reverted.', {
        title: 'Delete ' + this.code.comm2_nm + '?',
        size: 'md',
        okVariant: 'danger',
        okTitle: 'Delete Code',
        cancelTitle: 'Cancel',
        cancelVariant: 'outline-secondary',
        centered: true
      })
      .then(res => {
        if (res) {
          this.$http.delete('/api/codes/' + this.primary + '/' + this.secondary, this.code)
            .then((res) => {
              this.$toast({
                component: ToastificationContent,
                props: {
                  title: this.$t('Success!'),
                  icon: 'CheckCircleIcon',
                  text: 'Deleted code!',
                  variant: 'success',
                },
              })
              this.$router.push({ name: 'system-codes' })
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
      })
    }
  },

  created () {
    this.$http.get('/api/codes/' + this.primary + '/' + this.secondary)
      .then((res) => {
        this.code = res.data.data
      })
  }
}
</script>

<style>

</style>