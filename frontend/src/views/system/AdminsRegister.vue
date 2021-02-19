<template>
  <b-form @submit="onSubmit" @reset="onReset" ref="form">

    <b-alert :variant="alert.variant" :show="alert.show">
      <div class="alert-body">
        <span>
          <strong v-if="alert.title" v-text="alert.title"></strong>
          {{ alert.message }}
        </span>
      </div>
    </b-alert>

    <b-form-group
      id="input-group-1"
      label="Name:"
      label-for="input-1"
      description="Full name of the administrator."
    >
      <b-form-input
        id="input-1"
        v-model="form.name"
        type="text"
        :state="errors.name ? false : null"
        placeholder="Enter name"
        required
      ></b-form-input>

      <template v-if="errors.name">
        <b-form-invalid-feedback v-for="(msg, index) in errors.name" :key="index" v-text="msg"></b-form-invalid-feedback>
      </template>
    </b-form-group>

    <b-form-group
      id="input-group-1"
      label="Email address:"
      label-for="input-2"
      description="We'll never share your email with anyone else."
    >
      <b-form-input
        id="input-2"
        v-model="form.email"
        type="email"
        :state="errors.email ? false : null"
        placeholder="Enter email"
        required
      ></b-form-input>

      <template v-if="errors.email">
        <b-form-invalid-feedback v-for="(msg, index) in errors.email" :key="index" v-text="msg"></b-form-invalid-feedback>
      </template>
    </b-form-group>

    <b-form-group
      id="input-group-1"
      label="Password:"
      label-for="input-3"
      description="Minimum of 6 characters."
    >
      <b-form-input
        id="input-3"
        v-model="form.password"
        type="password"
        :state="errors.password ? false : null"
        placeholder="Enter password"
        required
      ></b-form-input>

      <template v-if="errors.password">
        <b-form-invalid-feedback v-for="(msg, index) in errors.password" :key="index" v-text="msg"></b-form-invalid-feedback>
      </template>
    </b-form-group>

    <b-form-group
      id="input-group-1"
      label="Confirm password:"
      label-for="input-4"
      description="Enter your password again for confirmation."
    >
      <b-form-input
        id="input-4"
        v-model="form.password_confirmation"
        type="password"
        :state="errors.password_confirmation ? false : null"
        placeholder="Enter password again"
        required
      ></b-form-input>

      <template v-if="errors.password_confirmation">
        <b-form-invalid-feedback v-for="(msg, index) in errors.password_confirmation" :key="index" v-text="msg"></b-form-invalid-feedback>
      </template>
    </b-form-group>

    <b-form-group
      id="input-group-1"
      label="Role:"
      label-for="input-5"
      description="Administrator role & authority."
    >
      <b-form-select
        id="input-5"
        v-model="form.role"
        :state="errors.role ? false : null"
        placeholder="Select role"
        :options="roles"
      ></b-form-select>

      <template v-if="errors.role">
        <b-form-invalid-feedback v-for="(msg, index) in errors.role" :key="index" v-text="msg"></b-form-invalid-feedback>
      </template>
    </b-form-group>

    <b-button type="submit" variant="primary">
      <feather-icon icon="SaveIcon" class="mr-50"></feather-icon>
      {{ $t('Register') }}
    </b-button>
    <b-button type="reset" variant="light">{{ $t('Reset') }}</b-button>
  </b-form>
</template>

<script>
import { BForm, BButton, BFormGroup, BFormInput, BFormSelect, BIcon, BAlert, BFormInvalidFeedback } from 'bootstrap-vue'

export default {
  name: 'admins-register',

  components: {
    BForm,
    BButton,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BIcon,
    BAlert,
    BFormInvalidFeedback
  },

  props: {
    onSuccess: {
      type: Function,
      default: () => {}
    }
  },

  data () {
    return {
      roles: [],

      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },

      alert: {
        show: false,
        variant: 'primary',
        title: null,
        message: null
      },

      errors: {}
    }
  },

  methods: {
    showAlert (variant, title, message) {
      this.alert.show = true
      this.alert.variant = variant
      this.alert.title = title
      this.alert.message = message
    },

    hideAlert () {
      this.alert.show = false
      this.alert.variant = 'primary'
      this.alert.title = null
      this.alert.message = null
    },

    onSubmit (event) {
      event.preventDefault()
      this.hideAlert()
      this.errors = {}

      this.$http.post('/api/admins', this.form)
        .then(res => {
          console.log(res)
          this.showAlert('success', this.$t('Success!'), 'Admin record saved.')
          this.onSuccess(res)
          this.errors = {}
          this.$refs.form.reset()
        })
        .catch(err => {
          this.showAlert('danger', this.$t('Failed!'), err.response.data.message)
          this.errors = err.response.data.errors
        })
    },

    onReset () {
      // 
    }
  },

  created () {
    this.$http.get('/api/codes/A01')
      .then(res => {
        this.roles = res.data.data.map(role => {
          return {
            value: role.comm2_cd,
            text: role.comm2_nm
          }
        })
      })
  }
}
</script>

<style>

</style>